<?php

namespace App\Http\Controllers;

use App\Models\country_phone_code;
use App\Models\emirate;
use App\Models\lead_sale;
use App\Models\plan;
use App\Models\remark;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function BillingAttempt(Request $request){
        // return $request;
        $breadcrumbs = [
            [
                'link' => "/", 'name' => "Home"
            ], ['link' => "javascript:void(0)", 'name' => "Billing Attempt | Report"]
        ];
        // $cc = call_center::where('status', 1)->get();
        // $numberOfAgent = \App\Models\User::where('role', 'TeamLeader')->get();
        return view('admin.billing.attempt-card', compact('breadcrumbs'));
    }
    public function AttemptView(Request $request){
        // return $request;
        $breadcrumbs = [
            [
                'link' => "/", 'name' => "Home"
            ], ['link' => "javascript:void(0)", 'name' => "Billing Attempt | Report"]
        ];
        // $cc = call_center::where('status', 1)->get();
        // $numberOfAgent = \App\Models\User::where('role', 'TeamLeader')->get();
        return view('admin.billing.attempt-view', compact('breadcrumbs'));
    }
    //
    public function TodayBilling(Request $request){
        // $today = 'https://we.tl/t-TGc4EkX19p';
        // $today = Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2019 00:00:00');
        // $today = Carbon
        $dt = Carbon::now();
        $mdt = $dt->format('d');

        $breadcrumbs = [
            [
                'link' => "/", 'name' => "Home"
            ], ['link' => "javascript:void(0)", 'name' => "Billing Lead Data"]
        ];
        // echo $dt->toDateString();
        // return $mdt;
        $data = lead_sale::select('lead_sales.customer_name', 'lead_sales.id', 'lead_sales.email', 'lead_sales.customer_number', 'status_codes.status_name as status', 'home_wifi_plans.name as plan_name', 'lead_sales.lead_no', 'lead_sales.work_order_num','lead_sales.billing_cycle','lead_sales.contract_id')
        ->whereIn('lead_type', ['HomeWifi'])
            // ->where('lead_type','HomeWifi')
            ->Join(
                'home_wifi_plans',
                'home_wifi_plans.id',
                'lead_sales.plans'
            )
            ->Join(
                'status_codes',
                'status_codes.status_code',
                'lead_sales.status'
            )
            ->whereNotNull('lead_sales.contract_id')
            ->whereNotNull('lead_sales.billing_cycle')
            // ->where('lead_sales.contract_id','!=')
            // ->where('billing_cycle',$mdt)
            ->where('lead_sales.status', '1.02')
            ->whereMonth('lead_sales.updated_at', Carbon::now()->submonth())
            ->where('lead_sales.billing_cycle','<',str_replace('0','',$mdt))
            ->whereYear('lead_sales.updated_at', Carbon::now()->year)

            ->get();
        return view('admin.lead.all-billing-lead', compact('data', 'breadcrumbs'));

        // $data = lead_sale::where('status','1.02')->where('billing_cycle',$mdt)->get();
    }
    //
    public function billing_cycle_view(Request $request)
    {
        // $role =
        $data = lead_sale::select('lead_sales.customer_name', 'lead_sales.id', 'lead_sales.email', 'lead_sales.customer_number', 'status_codes.status_name as status', 'home_wifi_plans.name as plan_name', 'lead_sales.lead_no', 'lead_sales.emirate_id', 'lead_sales.nationality', 'lead_sales.dob', 'lead_sales.emirate_expiry', 'lead_sales.emirate', 'lead_sales.additional_docs_name', 'lead_sales.front_id', 'lead_sales.back_id', 'lead_sales.lead_type', 'lead_sales.reff_id as work_order_num', 'lead_sales.work_order_num as reff_id','lead_sales.contract_id','lead_sales.billing_cycle','lead_sales.account_id')
            ->whereIn('lead_type', ['HomeWifi'])
            // ->where('lead_type','HomeWifi')
            ->Join(
                'home_wifi_plans',
                'home_wifi_plans.id',
                'lead_sales.plans'
            )
            ->Join(
                'status_codes',
                'status_codes.status_code',
                'lead_sales.status'
            )
            ->where('lead_sales.status', '1.02')
            ->where('lead_sales.id', $request->id)
            ->first();
        if (empty($data)) {
            // return "EM";
            // return redirect(route('home'));
        }
        $plan = plan::where('status', '1')->get();
        $country = country_phone_code::select('name')->get();
        $emirate = emirate::select('name')->where('status', 1)->get();
        // $plan = \App\Models\plan
        $breadcrumbs = [
            [
                'link' => "/", 'name' => "Home"
            ], ['link' => "javascript:void(0)", 'name' => "Activate Lead HW"]
        ];
        $remarks = remark::where('lead_no', $request->id)->get();

        return view('admin.lead.bill-lead-hw', compact('data', 'plan', 'country', 'emirate', 'breadcrumbs', 'remarks'));
    }
    //
}
