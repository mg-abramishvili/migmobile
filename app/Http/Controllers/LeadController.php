<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
        ]);

        $lead = new Lead();

        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->subject = $request->subject;

        $lead->save();

        // send to bitrix24

        if($request->subject == 'bank_card') {
            $subject = 'Банковская карта';
        }
        if($request->subject == 'loan') {
            $subject = 'Денежный займ';
        }

        $url = "https://mobile.bitrix24.ru/rest/87/wwy6shmynfsjmxw6/crm.deal.add.json";
        
        $qr = array(
            'fields' => array(),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        );
        $qr['fields']['TITLE'] = "Заявка с migrantmobile.com" . " " . $subject;
        $qr['fields']['STAGE_ID'] = 'NEW';
        
        $queryData = json_encode($qr);

        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $queryData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        $dealID = $result["result"];

        // adding contact
        $url = 'https://mobile.bitrix24.ru/rest/87/1qbd728a0q0gcc4i/crm.contact.add.json';
        
        $qr = array(
            'fields' => array(),
            'params' => array()
        );
        $qr['fields']['NAME'] = $request->name;
        $qr['fields']['OPENED'] = 'Y';
        $qr['fields']['PHONE']['n1'] = array("VALUE"=>$request->phone, "VALUE_TYPE"=>"WORK");
    
        $queryData = json_encode($qr);

        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $queryData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        $contactId = $result["result"];

        // assign contact to the deal
        $url = 'https://mobile.bitrix24.ru/rest/87/gqpnhgu5bpymu296/crm.deal.contact.add.json';
        
        $qr = array(
            'id' => $dealID,
            'fields' => array()
        );
        $qr['fields']['CONTACT_ID'] = $contactId;
    
        $queryData = json_encode($qr);

        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $queryData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
    }
}
