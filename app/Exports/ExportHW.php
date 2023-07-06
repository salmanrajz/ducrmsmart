<?php

namespace App\Exports;

use App\Models\number_matcher;
use App\Models\TestNumberEmirti;
use App\Models\WhatsAppMnpBank;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportHW implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //

        ini_set('memory_limit', '-1'); //300 seconds = 5 minutes
        return $data = TestNumberEmirti::select('number')->whereIn('count_digit', ['3', '2', '1', 'random'])
        ->where('fiver_four',0)
        // ->offset(6000000)
        ->limit(600000)
        ->get();
        // upr wala du neechy wala etisalat
        // return $data = TestNumberEmirti::select('number')->whereIn('count_digit', ['3', '2', '1', 'random'])
        // // ->where('five_four',0)
        // // ->offset(5400000)
        // ->limit(100000)
        // ->get();
        // ->get();

        // return $data = WhatsAppScan::select('wapnumber')->whereIn('count_digit', ['3', '2', '1', 'random'])->offset(600000)->limit(200000)->get();
        // return $data = number_matcher::where('plan','Home Wireless 4G')->where('prefix',58)->get();
        // return $data = WhatsAppMnpBank::where('data_valid_from','April202K')->get();
    }
}
