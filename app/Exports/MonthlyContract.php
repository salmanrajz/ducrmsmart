<?php

namespace App\Exports;

use App\Models\lead_sale;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MonthlyContract implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        \DB::statement(\DB::raw('set @count=0'));

        return $data = lead_sale::select(
                \DB::raw('(@count:=@count+1) AS serial'),
                \DB::raw("CONCAT('Vocus Electronic Trading LLC') as partner_name"), //title
                'lead_sales.customer_name',
                'lead_sales.contract_id',
                'lead_sales.lead_type'
            )
            ->Join(
                'users',
                'users.id',
                'lead_sales.saler_id'
            )
            // ->where('lead_sales.lead_type', 'HomeWifi')
            ->where('lead_sales.status', '1.02')
            ->whereMonth('lead_sales.updated_at', Carbon::now()->submonth())
            // ->whereMonth('lead_sales.updated_at', Carbon::now()->month)
            ->whereYear('lead_sales.created_at', Carbon::now()->year)
            ->get();
        //
    }
    public function headings(): array
    {
        return [
            'S#',
            'Partner Name',
            'Customer Name',
            'Contract ID',
            'Product Type',
            // 'Activation Date',
        ];
    }
}
