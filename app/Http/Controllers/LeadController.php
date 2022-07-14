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

        // $this->sendToBitrixAsDeal($lead);
        $this->sendToBitrixAsTask($lead);
    }

    public function sendToBitrixAsTask($lead)
    {
        if($lead->subject == 'bank_card') {
            $subject = 'Банковская карта';
        }
        if($lead->subject == 'loan') {
            $subject = 'Денежный займ';
        }

        $url = "https://mobile.bitrix24.ru/rest/87/kt7lft1djdws3r6z/task.item.add.json";

        $qr = array(
            'taskdata' => array(),
        );
        $qr['taskdata']['TITLE'] = "Заявка с migrantmobile.com" . " " . $subject;
        $qr['taskdata']['DESCRIPTION'] = $subject . ', телефон: ' . $lead->phone . ', имя: ' . $lead->name;
        $qr['taskdata']['RESPONSIBLE_ID'] = 23;
        
        $queryData = json_encode($qr);

        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $queryData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
        // $result = json_decode($result, true);
    }

    public function sendToBitrixAsDeal($lead)
    {
        if($lead->subject == 'bank_card') {
            $subject = 'Банковская карта';
        }
        if($lead->subject == 'loan') {
            $subject = 'Денежный займ';
        }

        $url = "https://mobile.bitrix24.ru/rest/87/o7w21l3knwsfr655/crm.deal.add.json";
        
        $qr = array(
            'fields' => array(),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        );
        $qr['fields']['TITLE'] = "Заявка с migrantmobile.com" . " " . $subject;
        $qr['fields']['STAGE_ID'] = 'NEW';
        $qr['fields']['ASSIGNED_BY_ID'] = 23;
        
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
        $url = 'https://mobile.bitrix24.ru/rest/87/e6msa3s3q1pv81rw/crm.contact.add.json';
        
        $qr = array(
            'fields' => array(),
            'params' => array()
        );
        $qr['fields']['NAME'] = $lead->name;
        $qr['fields']['OPENED'] = 'Y';
        $qr['fields']['PHONE']['n1'] = array("VALUE"=>$lead->phone, "VALUE_TYPE"=>"WORK");
    
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
        $url = 'https://mobile.bitrix24.ru/rest/87/7wq4rejg97lcm6wu/crm.deal.contact.add.json';
        
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
