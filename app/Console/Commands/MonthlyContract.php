<?php

namespace App\Console\Commands;

use App\Exports\MonthlyContract as ExportsMonthlyContract;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;


class MonthlyContract extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MonthlyContract';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'MonthlyContract';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        Excel::store(new ExportsMonthlyContract, 'vocus-contract-tracker.xlsx', 'azure');
        $details = [
            'pdf_location' => 'https://salmanrajzzdiag.blob.core.windows.net/vocus/vocus-contract-tracker.xlsx',
            'subject' => 'Home Wifi Tracker Report ' . Carbon::now()->subDay()->format('F Y'),
            'email_name' => 'Vocus',
            'send_mail' => 'hwtracker@vocus.ae'
            // 'subject' => 'Sales Report Month Year TTF till ' . Carbon::now()->subDay()->format('d F Y'),
        ];
        // \Mail::to(['salmanahmed334@gmail.com'])
        // \Mail::
        \Mail::mailer('smtp2')
            // ->to(['azeem@vocus.ae', 'sales@vocus.ae'])
            ->to(['parhakooo@gmail.com'])
            ->cc(['salmanahmed334@gmail.com', 'parhakooo@gmail.com'])
            ->bcc(['salmanahmed334@gmail.com'])
            // ->from('crm.riuman.com','riuman')
            ->send(new \App\Mail\DailyHWTracker($details));
    }
}
