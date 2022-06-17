<?php

namespace App\Exports;

use App\Models\Number;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NumberExport extends DefaultValueBinder implements WithCustomValueBinder, FromQuery, WithMapping, ShouldAutoSize
{
    use Exportable;

    public function __construct(int $plan)
    {
        $this->plan = $plan;
    }

    public function query()
    {
        return Number::query()->where('plan_id', $this->plan);
    }

    public function map($number): array
    {
        return [
            $number->serial_number,
            $number->number,
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        $cell->setValueExplicit($value, DataType::TYPE_STRING);

        return true;
    }
}
