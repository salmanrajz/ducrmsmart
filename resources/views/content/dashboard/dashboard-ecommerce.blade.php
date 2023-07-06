
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Ecommerce')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  {{--  --}}
    {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  {{--  --}}
@endsection
@section('page-style')
  {{-- Page css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row match-height">
    <!-- Medal Card -->
    {{-- <div class="col-xl-4 col-md-6 col-12">
      <div class="card card-congratulation-medal">
        <div class="card-body">
          <h5>Congratulations 🎉 John!</h5>
          <p class="card-text font-small-3">You have won gold medal</p>
          <h3 class="mb-75 mt-2 pt-50">
            <a href="#">$48.9k</a>
          </h3>
          <button type="button" class="btn btn-primary">View Sales</button>
          <img src="{{asset('images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
        </div>
      </div>
    </div> --}}
    <!--/ Medal Card -->

    <!-- Statistics Card -->
    @role('Admin|MainAdmin')
      <div class="table-responsive">
                    <table class="text-center table  table-bordered zero-configuration" id="pdf" style="font-weight:400;">
                        @inject('provider', 'App\Http\Controllers\FunctionController')
                        <thead>
                            <tr>
                            <th colspan="14" style="background:#FFC107">
                                <h3>
                                     Yearly Performance >>
                                    {{$day = \Carbon\Carbon::parse($date = \Carbon\Carbon::today())->format('l')}},
                                    {{$day = \Carbon\Carbon::parse($date = \Carbon\Carbon::today())->format('M, d, Y')}}
                                </h3>
                            </th>
                        </tr>
                            <tr >
                                <th>S#</th>
                                <th>Agent Name</th>
                                @php
                                   $start = $month = strtotime('2023-01-01');
                                    $end = strtotime(date('Y-m-d'));
                                    @endphp
                                 @while($month < $end)
                                 <th>

                                     @php
                             echo date('F Y', $month);
                             $month = strtotime("+1 month", $month);
                             @endphp
                             </th>

                             @endwhile
                             <th>Total</th>
                             <th>
                                Team Leader
                             </th>
                                {{-- <th>Activated</th>
                                <th>MNP Activated</th>
                                <th>Verified</th>
                                <th>Non Verified</th>
                                <th>Rejected</th>
                                <th>Follow</th>
                                <th>Later</th> --}}
                                {{-- <th>Carry Forward</th> --}}
                                {{-- <th>Point</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $numberOfAgent = \App\Models\User::where('agent_code',auth()->user()->agent_code)->where('role','Sale')->get();
                            @endphp
                            @foreach ($numberOfAgent as $key => $agent)
                            {{-- {{$k == 1}} --}}
                            <tr>
                                <td>
                                    {{++$key}}
                                </td>
                                <td>
                                    {{$agent->name}}
                                </td>
                                @php
                                   $start = $month = strtotime('2023-01-01');
                                    $end = strtotime(date('Y-m-d'));
                                    @endphp
                                @while($month < $end)
                                {{-- { --}}
                                    {{-- // echo date('F Y', $month), PHP_EOL; --}}

                                {{-- } --}}
                                   {{-- @endphp --}}
                                {{-- <button class="btn btn-success mb-2" onclick="MyLeadPrepaid('1','{{date('Y', $month)}}','{{date('m',$month)}}','{{asset('assets/images/loader.gif')}}')"> --}}
                                    {{-- {{date('m',$month)}} --}}
                                {{-- </button> --}}

                                   @php
                                //    $id= 1;
                                // echo $month;
                                // $year = date('Y',$month);
                                // $year = '2023';
                                // date('F Y', $month);
                                // $month = strtotime("+1 month", $month);
                                // $month = date('m',$month);
                                // $year = '2023';
                                   @endphp
                                   <td>
                                    {{-- {{$month}} --}}
                                    {{-- {{$year}} --}}
                                    {{$hw = $provider::user_monthly_ach($agent->id,date('m',$month),date('Y',$month))}}

                                   </td>
                                    @php
                             date('F Y', $month);
                             $month = strtotime("+1 month", $month);
                             @endphp
                            {{-- {{}} --}}
                            {{-- @php --}}

                            {{-- @endphp --}}

                            @endwhile
                            <td>
                                   {{$hw = $provider::user_total_act($agent->id,'02','2023')}}
                            </td>
                            <td>
                                   {{$hw = $provider::TeamLeaderName($agent->teamleader)}}
                            </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    Total :
                                    {{$finalTotal = $provider::cctotal(auth()->user()->agent_code,\Carbon\Carbon::now()->month(),'daily')}}
                                </td>

                            </tr>
                        </tfoot>
                    </table>
            </div>
    @endrole
    @role('Manager')
     <div class="table-responsive">
                    <table class="table-bordered text-center" style="font-weight:400;">
                        @inject('provider', 'App\Http\Controllers\FunctionController')
                        <thead>
                            <tr>
                            <th colspan="14" style="background:#FFC107">
                                <h3>
                                     Daily Summary >>
                                    {{$day = \Carbon\Carbon::parse($date = \Carbon\Carbon::today())->format('l')}},
                                    {{$day = \Carbon\Carbon::parse($date = \Carbon\Carbon::today())->format('M, d, Y')}}
                                </h3>
                            </th>
                        </tr>
                            <tr style="background:black;color:#fff">
                                <th>S#</th>
                                <th>Agent Name</th>
                                <th>Agent Email</th>
                                <th>Joining Date</th>
                                <th>Target</th>
                                <th>Acheived</th>
                                <th>P2P Acheived</th>
                                <th>HW Acheived</th>
                                <th>MNP Acheived</th>
                                <th>Remainig</th>
                                <th>Forecast</th>
                                <th>All Lead</th>
                                <th>In Process</th>
                                {{-- <th>Activated</th>
                                <th>MNP Activated</th>
                                <th>Verified</th>
                                <th>Non Verified</th>
                                <th>Rejected</th>
                                <th>Follow</th>
                                <th>Later</th> --}}
                                {{-- <th>Carry Forward</th> --}}
                                {{-- <th>Point</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $numberOfAgent = \App\Models\User::where('agent_code',auth()->user()->agent_code)->where('role','Sale')->get();
                            @endphp
                            @foreach ($numberOfAgent as $key => $agent)
                            {{-- {{$k == 1}} --}}
                            <tr>
                                <td>
                                    {{++$key}}
                                </td>
                                <td>
                                    {{$agent->name}}
                                </td>
                                <td>
                                    {{$agent->email}}
                                </td>
                                <td>
                                    {{$agent->created_at}}
                                </td>
                                <td>
                                    {{$usertarget = 12}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$ach = $provider::userwise_target($agent->id,\Carbon\Carbon::today(),'daily')}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$p2p = $provider::userwise_targetBatch('p2p',$agent->id,\Carbon\Carbon::today(),'daily')}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$hw = $provider::userwise_targetBatch('HomeWifi',$agent->id,\Carbon\Carbon::today(),'daily')}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$mnp = $provider::userwise_targetBatch('MNP',$agent->id,\Carbon\Carbon::today(),'daily')}}
                                </td>
                                <td>
                                    {{$usertarget - $ach}}

                                </td>
                                <td style="background:#e83e8c;color:#fff">
                                    @php
                                    $days = \Carbon\Carbon::now()->daysInMonth;
                                    $total_target_day = $usertarget / $days;
                                    $data = date('d');
                                    echo $final_fc = round($data*$total_target_day,0);
                                    @endphp
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$ach = $provider::userwise_target($agent->id,\Carbon\Carbon::today(),'daily')}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$ach = $provider::inprocesslead($agent->id,\Carbon\Carbon::today(),'1.08')}}
                                </td>

                                {{-- <td>
                                    {{$provider::FloorManagerLeadType($agent->id,'1.07','postpaid','Combined')}}
                                </td>
                                <td>point</td> --}}

                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    Total :
                                    {{$finalTotal = $provider::cctotal(auth()->user()->agent_code,\Carbon\Carbon::today(),'daily')}}
                                </td>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            <div class="table-responsive">
                    <table class="table-bordered text-center" style="font-weight:400;">
                        @inject('provider', 'App\Http\Controllers\FunctionController')
                        <thead>
                            <tr>
                            <th colspan="14" style="background:#FFC107">
                                <h3>
                                     Monthly Summary >>
                                    {{$day = \Carbon\Carbon::parse($date = \Carbon\Carbon::today())->format('l')}},
                                    {{$day = \Carbon\Carbon::parse($date = \Carbon\Carbon::today())->format('M, d, Y')}}
                                </h3>
                            </th>
                        </tr>
                            <tr style="background:black;color:#fff">
                                <th>S#</th>
                                <th>Agent Name</th>
                                <th>Joining Date</th>
                                <th>Target</th>
                                <th>Acheived</th>
                                <th>New Acheived</th>
                                <th>P2P Acheived</th>
                                <th>HW Acheived</th>
                                <th>MNP Acheived</th>
                                <th>Remainig</th>
                                <th>Forecast</th>
                                <th>All Lead</th>
                                <th>In Process</th>
                                {{-- <th>Activated</th>
                                <th>MNP Activated</th>
                                <th>Verified</th>
                                <th>Non Verified</th>
                                <th>Rejected</th>
                                <th>Follow</th>
                                <th>Later</th> --}}
                                {{-- <th>Carry Forward</th> --}}
                                {{-- <th>Point</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $numberOfAgent = \App\Models\User::where('agent_code',auth()->user()->agent_code)->where('role','Sale')->get();
                            @endphp
                            @foreach ($numberOfAgent as $key => $agent)
                            {{-- {{$k == 1}} --}}
                            <tr>
                                <td>
                                    {{++$key}}
                                </td>
                                <td>
                                    {{$agent->name}}
                                </td>
                                                                <td>
                                    {{$agent->created_at}}
                                </td>
                                <td>
                                    {{$usertarget = 12}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$ach = $provider::userwise_target($agent->id,\Carbon\Carbon::now()->month(),'monthly')}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$p2p = $provider::userwise_targetBatch('p2p',$agent->id,\Carbon\Carbon::now()->month(),'monthly')}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$new = $provider::userwise_targetBatch('New',$agent->id,\Carbon\Carbon::now()->month(),'monthly')}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$hw = $provider::userwise_targetBatch('HomeWifi',$agent->id,\Carbon\Carbon::now()->month(),'monthly')}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$mnp = $provider::userwise_targetBatch('MNP',$agent->id,\Carbon\Carbon::now()->month(),'monthly')}}
                                </td>
                                <td>
                                    {{$usertarget - $ach}}

                                </td>
                                <td style="background:#e83e8c;color:#fff">
                                    @php
                                    $days = \Carbon\Carbon::now()->daysInMonth;
                                    $total_target_day = $usertarget / $days;
                                    $data = date('d');
                                    echo $final_fc = round($data*$total_target_day,0);
                                    @endphp
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$ach = $provider::userwise_target($agent->id,\Carbon\Carbon::now()->month(),'monthly')}}
                                </td>
                                <td style="background:#6363d2;color:#fff">
                                    {{$ach = $provider::inprocesslead($agent->id,\Carbon\Carbon::now()->month(),'1.08')}}
                                </td>

                                {{-- <td>
                                    {{$provider::FloorManagerLeadType($agent->id,'1.07','postpaid','Combined')}}
                                </td>
                                <td>point</td> --}}

                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    Total :
                                    {{$finalTotal = $provider::cctotal(auth()->user()->agent_code,\Carbon\Carbon::now()->month(),'daily')}}
                                </td>

                            </tr>
                        </tfoot>
                    </table>
            </div>
            <div class="table-responsive">
                    <table class="table-bordered text-center" style="font-weight:400;">
                        @inject('provider', 'App\Http\Controllers\FunctionController')
                        <thead>
                            <tr>
                            <th colspan="14" style="background:#FFC107">
                                <h3>
                                     Yearly Performance >>
                                    {{$day = \Carbon\Carbon::parse($date = \Carbon\Carbon::today())->format('l')}},
                                    {{$day = \Carbon\Carbon::parse($date = \Carbon\Carbon::today())->format('M, d, Y')}}
                                </h3>
                            </th>
                        </tr>
                            <tr style="background:black;color:#fff">
                                <th>S#</th>
                                <th>Agent Name</th>
                                @php
                                   $start = $month = strtotime('2023-01-01');
                                    $end = strtotime(date('Y-m-d'));
                                    @endphp
                                 @while($month < $end)
                                 <th>

                                     @php
                             echo date('F Y', $month);
                             $month = strtotime("+1 month", $month);
                             @endphp
                             </th>

                            @endwhile
                                {{-- <th>Activated</th>
                                <th>MNP Activated</th>
                                <th>Verified</th>
                                <th>Non Verified</th>
                                <th>Rejected</th>
                                <th>Follow</th>
                                <th>Later</th> --}}
                                {{-- <th>Carry Forward</th> --}}
                                {{-- <th>Point</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $numberOfAgent = \App\Models\User::where('agent_code',auth()->user()->agent_code)->where('role','Sale')->get();
                            @endphp
                            @foreach ($numberOfAgent as $key => $agent)
                            {{-- {{$k == 1}} --}}
                            <tr>
                                <td>
                                    {{++$key}}
                                </td>
                                <td>
                                    {{$agent->name}}
                                </td>
                                @php
                                   $start = $month = strtotime('2023-01-01');
                                    $end = strtotime(date('Y-m-d'));
                                    @endphp
                                @while($month < $end)
                                {{-- { --}}
                                    {{-- // echo date('F Y', $month), PHP_EOL; --}}

                                {{-- } --}}
                                   {{-- @endphp --}}
                                {{-- <button class="btn btn-success mb-2" onclick="MyLeadPrepaid('1','{{date('Y', $month)}}','{{date('m',$month)}}','{{asset('assets/images/loader.gif')}}')"> --}}
                                    {{-- {{date('m',$month)}} --}}
                                {{-- </button> --}}

                                   @php
                                //    $id= 1;
                                // echo $month;
                                // $year = date('Y',$month);
                                // $year = '2023';
                                // date('F Y', $month);
                                // $month = strtotime("+1 month", $month);
                                // $month = date('m',$month);
                                // $year = '2023';
                                   @endphp
                                   <td>
                                    {{-- {{$month}} --}}
                                    {{-- {{$year}} --}}
                                    {{$hw = $provider::user_monthly_ach($agent->id,date('m',$month),date('Y',$month))}}

                                   </td>
                                    @php
                             date('F Y', $month);
                             $month = strtotime("+1 month", $month);
                             @endphp
                            {{-- {{}} --}}
                            {{-- @php --}}

                            {{-- @endphp --}}

                            @endwhile
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    Total :
                                    {{$finalTotal = $provider::cctotal(auth()->user()->agent_code,\Carbon\Carbon::now()->month(),'daily')}}
                                </td>

                            </tr>
                        </tfoot>
                    </table>
            </div>
    @endrole
    @role('Sale')
    @inject('provider', 'App\Http\Controllers\FunctionController')
    @foreach ($product as $item)

    <div class="col-xl-12 col-md-6 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">{{$item->name}} Dashboard</h4>
          <div class="d-flex align-items-center">
            <p class="card-text font-small-2 me-25 mb-0">Updated few minutes ago</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                    <img src="{{asset('images/du-icons/pending.png')}}" alt="Pending" style="height:50px">
                  {{-- <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div> --}}
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingSaleAgent('1.01',$item->name)}}
                  </h4>
                  <p class="card-text font-small-3 mb-0">Pending</p>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-info me-2">
                    <img src="{{asset('images/du-icons/verified.png')}}" alt="Pending" style="height:50px">

                  {{-- <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div> --}}
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::InProcessSaleAgent('1.08',$item->name)}}
                  </h4>
                  <p class="card-text font-small-3 mb-0">Verified</p>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  {{-- <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div> --}}
                    <img src="{{asset('images/du-icons/in-process.png')}}" alt="Pending" style="height:50px">

                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingSaleAgent('1.08',$item->name)}}

                  </h4>
                  <p class="card-text font-small-3 mb-0">Follow Up</p>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  {{-- <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div> --}}
                    <img src="{{asset('images/du-icons/follow-up.png')}}" alt="Pending" style="height:50px">

                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingSaleAgent('1.19',$item->name)}}

                  </h4>
                  <p class="card-text font-small-3 mb-0">In Process</p>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  {{-- <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div> --}}
                    <img src="{{asset('images/du-icons/active.png')}}" alt="Pending" style="height:50px">

                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingSaleAgent('1.02',$item->name)}}

                  </h4>
                  <p class="card-text font-small-3 mb-0">Active</p>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  {{-- <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div> --}}
                    <img src="{{asset('images/du-icons/reject.png')}}" alt="Pending" style="height:50px">

                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingSaleAgent('1.15',$item->name)}}

                  </h4>
                  <p class="card-text font-small-3 mb-0">Reject</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    @endrole
    @role('Verification')
    @inject('provider', 'App\Http\Controllers\FunctionController')
    <div class="col-xl-12 col-md-6 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Verification Dashboard</h4>
          <div class="d-flex align-items-center">
            <p class="card-text font-small-2 me-25 mb-0">Updated few minutes ago</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row" onclick="window.location.href='{{route('wifi.leads')}}'">
                <div class="avatar bg-light-primary me-2">
                  {{-- <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div> --}}
                    <img src="{{asset('images/du-icons/pending.png')}}" alt="Pending" style="height:50px">

                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingVerification('1.01')}}
                  </h4>
                  <p class="card-text font-small-3 mb-0">Pending</p>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-info me-2">
                  {{-- <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div> --}}
                    <img src="{{asset('images/du-icons/verified.png')}}" alt="Pending" style="height:50px">

                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingVerification('Verify')}}

                  </h4>
                  <p class="card-text font-small-3 mb-0">Verified</p>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
    @endrole
    @role('Activator')
    @inject('provider', 'App\Http\Controllers\FunctionController')
    {{--  --}}
        <div class="col-xl-12 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                <h4 class="card-title">HW Dashboard</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 me-25 mb-0">Updated few minutes ago</p>
                </div>
                </div>
                <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="d-flex flex-row" onclick="window.location.href='{{route('ViewInProcessLead')}}'">
                        <div class="avatar bg-light-primary me-2">
                            <img src="{{asset('images/du-icons/pending.png')}}" alt="Pending" style="height:50px">
                        {{-- <div class="avatar-content">
                            <i data-feather="trending-up" class="avatar-icon"></i>
                        </div> --}}
                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::PendingVerification('1.05')}}
                                {{-- {{$provider::PendingSaleAgent('1.01','HomeWifi')}} --}}
                        </h4>
                        <p class="card-text font-small-3 mb-0">Pending</p>
                        </div>
                    </div>
                    </div>
                    {{--  --}}
                    <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="d-flex flex-row" onclick="window.location.href='{{route('inprocessleadhomewifi')}}'">
                        <div class="avatar bg-light-danger me-2">
                        {{-- <div class="avatar-content">
                            <i data-feather="box" class="avatar-icon"></i>
                        </div> --}}
                            <img src="{{asset('images/du-icons/follow-up.png')}}" alt="Pending" style="height:50px">

                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::PendingVerificationActivator('1.08','HomeWifi')}}
                                {{-- {{$provider::PendingSaleAgent('1.19','HomeWifi')}} --}}

                        </h4>
                        <p class="card-text font-small-3 mb-0">In Process</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-12">
                    <div class="d-flex flex-row" onclick="window.location.href='{{route('activate_lead_hw')}}'">
                        <div class="avatar bg-light-success me-2">
                        {{-- <div class="avatar-content">
                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                        </div> --}}
                            <img src="{{asset('images/du-icons/active.png')}}" alt="Pending" style="height:50px">

                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::PendingVerificationActivator('1.02','HomeWifi')}}

                                {{-- {{$provider::PendingSaleAgent('1.02','HomeWifi')}} --}}

                        </h4>
                        <p class="card-text font-small-3 mb-0">Active</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-12">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-success me-2">
                        {{-- <div class="avatar-content">
                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                        </div> --}}
                            <img src="{{asset('images/du-icons/reject.png')}}" alt="Pending" style="height:50px">

                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::PendingVerificationActivator('1.15','HomeWifi')}}

                                {{-- {{$provider::PendingSaleAgent('1.15','HomeWifi')}} --}}

                        </h4>
                        <p class="card-text font-small-3 mb-0">Reject</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                <h4 class="card-title">Postpaid Dashboard</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 me-25 mb-0">Updated few minutes ago</p>
                </div>
                </div>
                <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="d-flex flex-row" onclick="window.location.href='{{route('ViewInProcessLead')}}'">
                        <div class="avatar bg-light-primary me-2">
                            <img src="{{asset('images/du-icons/pending.png')}}" alt="Pending" style="height:50px">
                        {{-- <div class="avatar-content">
                            <i data-feather="trending-up" class="avatar-icon"></i>
                        </div> --}}
                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::PendingVerification('1.05')}}
                                {{-- {{$provider::PendingSaleAgent('1.01','HomeWifi')}} --}}
                        </h4>
                        <p class="card-text font-small-3 mb-0">Pending</p>
                        </div>
                    </div>
                    </div>
                    {{--  --}}
                    <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="d-flex flex-row" onclick="window.location.href='{{route('inprocesslead')}}'">
                        <div class="avatar bg-light-danger me-2">
                        {{-- <div class="avatar-content">
                            <i data-feather="box" class="avatar-icon"></i>
                        </div> --}}
                            <img src="{{asset('images/du-icons/follow-up.png')}}" alt="Pending" style="height:50px">

                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::PendingVerificationActivator('1.08','Postpaid')}}
                                {{-- {{$provider::PendingSaleAgent('1.19','HomeWifi')}} --}}

                        </h4>
                        <p class="card-text font-small-3 mb-0">In Process</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-12">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-success me-2">
                        {{-- <div class="avatar-content">
                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                        </div> --}}
                            <img src="{{asset('images/du-icons/active.png')}}" alt="Pending" style="height:50px">

                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::PendingVerificationActivator('1.02','Postpaid')}}

                                {{-- {{$provider::PendingSaleAgent('1.02','HomeWifi')}} --}}

                        </h4>
                        <p class="card-text font-small-3 mb-0">Active</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row" onclick="window.location.href='{{route('mnpprocesslead')}}'">
                <div class="avatar bg-light-primary me-2">
                  {{-- <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div> --}}
                    <img src="{{asset('images/du-icons/in-process.png')}}" alt="Pending" style="height:50px">

                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingVerification('1.11')}}
                  </h4>
                  <p class="card-text font-small-3 mb-0">MNP Pre Process</p>
                </div>
              </div>
            </div>
                    <div class="col-xl-2 col-sm-6 col-12">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-success me-2">
                        {{-- <div class="avatar-content">
                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                        </div> --}}
                            <img src="{{asset('images/du-icons/reject.png')}}" alt="Pending" style="height:50px">

                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::PendingVerificationActivator('1.15','Postpaid')}}

                                {{-- {{$provider::PendingSaleAgent('1.15','HomeWifi')}} --}}

                        </h4>
                        <p class="card-text font-small-3 mb-0">Reject</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                <h4 class="card-title">Billing Dashboard</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 me-25 mb-0">Updated few minutes ago</p>
                </div>
                </div>
                <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="d-flex flex-row" onclick="window.location.href='{{route('BillingAttempt')}}'">
                        <div class="avatar bg-light-primary me-2">
                            <img src="{{asset('images/du-icons/pending.png')}}" alt="Pending" style="height:50px">
                        {{-- <div class="avatar-content">
                            <i data-feather="trending-up" class="avatar-icon"></i>
                        </div> --}}
                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::billing_count('1')}}
                                {{-- {{$provider::PendingSaleAgent('1.01','HomeWifi')}} --}}
                        </h4>
                        <p class="card-text font-small-3 mb-0">FBD</p>
                        </div>
                    </div>
                    </div>
                    {{--  --}}
                    <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="d-flex flex-row" onclick="window.location.href='{{route('BillingAttempt')}}'">
                        <div class="avatar bg-light-danger me-2">
                        {{-- <div class="avatar-content">
                            <i data-feather="box" class="avatar-icon"></i>
                        </div> --}}
                            <img src="{{asset('images/du-icons/pending.png')}}" alt="Pending" style="height:50px">

                            {{-- <img src="{{asset('images/du-icons/follow-up.png')}}" alt="Pending" style="height:50px"> --}}

                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::billing_count('2')}}

                                {{-- {{$provider::PendingVerificationActivator('1.08','Postpaid')}} --}}
                                {{-- {{$provider::PendingSaleAgent('1.19','HomeWifi')}} --}}

                        </h4>
                        <p class="card-text font-small-3 mb-0">SBD</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-12">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-success me-2">
                        {{-- <div class="avatar-content">
                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                        </div> --}}
                            <img src="{{asset('images/du-icons/pending.png')}}" alt="Pending" style="height:50px">

                            {{-- <img src="{{asset('images/du-icons/active.png')}}" alt="Pending" style="height:50px"> --}}

                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">
                                {{$provider::billing_count('3')}}

                                {{-- {{$provider::PendingVerificationActivator('1.02','Postpaid')}} --}}

                                {{-- {{$provider::PendingSaleAgent('1.02','HomeWifi')}} --}}

                        </h4>
                        <p class="card-text font-small-3 mb-0">TBD</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row" onclick="window.location.href='{{route('mnpprocesslead')}}'">
                <div class="avatar bg-light-primary me-2">
                  {{-- <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div> --}}
                    <img src="{{asset('images/du-icons/in-process.png')}}" alt="Pending" style="height:50px">

                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingVerification('1.11')}}
                  </h4>
                  <p class="card-text font-small-3 mb-0">90 DAYS ACT</p>
                </div>
              </div>
            </div>

                </div>
                </div>
            </div>
        </div>
    {{--  --}}

    @endrole
    @role('Designer')
    @inject('provider', 'App\Http\Controllers\FunctionController')
    <div class="col-xl-12 col-md-6 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Designing Dashboard</h4>
          <div class="d-flex align-items-center">
            <p class="card-text font-small-2 me-25 mb-0">Updated few minutes ago</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row" onclick="window.location.href='{{route('all_lead_designer')}}'">
                <div class="avatar bg-light-primary me-2">
                  {{-- <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div> --}}
                    <img src="{{asset('images/du-icons/pending.png')}}" alt="Pending" style="height:50px">

                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">
                        {{$provider::PendingVerification('1.13')}}
                  </h4>
                  <p class="card-text font-small-3 mb-0">Pending</p>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
    @endrole
    <!--/ Statistics Card -->
  </div>

  {{-- <div class="row match-height">
    <div class="col-lg-4 col-12">
      <div class="row match-height">
        <!-- Bar Chart - Orders -->
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card">
            <div class="card-body pb-50">
              <h6>Orders</h6>
              <h2 class="fw-bolder mb-1">2,76k</h2>
              <div id="statistics-order-chart"></div>
            </div>
          </div>
        </div>
        <!--/ Bar Chart - Orders -->

        <!-- Line Chart - Profit -->
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card card-tiny-line-stats">
            <div class="card-body pb-50">
              <h6>Profit</h6>
              <h2 class="fw-bolder mb-1">6,24k</h2>
              <div id="statistics-profit-chart"></div>
            </div>
          </div>
        </div>
        <!--/ Line Chart - Profit -->

        <!-- Earnings Card -->
        <div class="col-lg-12 col-md-6 col-12">
          <div class="card earnings-card">
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <h4 class="card-title mb-1">Earnings</h4>
                  <div class="font-small-2">This Month</div>
                  <h5 class="mb-1">$4055.56</h5>
                  <p class="card-text text-muted font-small-2">
                    <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span>
                  </p>
                </div>
                <div class="col-6">
                  <div id="earnings-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Earnings Card -->
      </div>
    </div>

    <!-- Revenue Report Card -->
    <div class="col-lg-8 col-12">
      <div class="card card-revenue-budget">
        <div class="row mx-0">
          <div class="col-md-8 col-12 revenue-report-wrapper">
            <div class="d-sm-flex justify-content-between align-items-center mb-3">
              <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center me-2">
                  <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                  <span>Earning</span>
                </div>
                <div class="d-flex align-items-center ms-75">
                  <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                  <span>Expense</span>
                </div>
              </div>
            </div>
            <div id="revenue-report-chart"></div>
          </div>
          <div class="col-md-4 col-12 budget-wrapper">
            <div class="btn-group">
              <button
                type="button"
                class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                2020
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">2020</a>
                <a class="dropdown-item" href="#">2019</a>
                <a class="dropdown-item" href="#">2018</a>
              </div>
            </div>
            <h2 class="mb-25">$25,852</h2>
            <div class="d-flex justify-content-center">
              <span class="fw-bolder me-25">Budget:</span>
              <span>56,800</span>
            </div>
            <div id="budget-chart"></div>
            <button type="button" class="btn btn-primary">Increase Budget</button>
          </div>
        </div>
      </div>
    </div>
    <!--/ Revenue Report Card -->
  </div> --}}

  {{-- <div class="row match-height">
    <!-- Company Table Card -->
    <div class="col-lg-8 col-12">
      <div class="card card-company-table">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Company</th>
                  <th>Category</th>
                  <th>Views</th>
                  <th>Revenue</th>
                  <th>Sales</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar rounded">
                        <div class="avatar-content">
                          <img src="{{asset('images/icons/toolbox.svg')}}" alt="Toolbar svg" />
                        </div>
                      </div>
                      <div>
                        <div class="fw-bolder">Dixons</div>
                        <div class="font-small-2 text-muted">meguc@ruj.io</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-primary me-1">
                        <div class="avatar-content">
                          <i data-feather="monitor" class="font-medium-3"></i>
                        </div>
                      </div>
                      <span>Technology</span>
                    </div>
                  </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">23.4k</span>
                      <span class="font-small-2 text-muted">in 24 hours</span>
                    </div>
                  </td>
                  <td>$891.2</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">68%</span>
                      <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar rounded">
                        <div class="avatar-content">
                          <img src="{{asset('images/icons/parachute.svg')}}" alt="Parachute svg" />
                        </div>
                      </div>
                      <div>
                        <div class="fw-bolder">Motels</div>
                        <div class="font-small-2 text-muted">vecav@hodzi.co.uk</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-success me-1">
                        <div class="avatar-content">
                          <i data-feather="coffee" class="font-medium-3"></i>
                        </div>
                      </div>
                      <span>Grocery</span>
                    </div>
                  </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">78k</span>
                      <span class="font-small-2 text-muted">in 2 days</span>
                    </div>
                  </td>
                  <td>$668.51</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">97%</span>
                      <i data-feather="trending-up" class="text-success font-medium-1"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar rounded">
                        <div class="avatar-content">
                          <img src="{{asset('images/icons/brush.svg')}}" alt="Brush svg" />
                        </div>
                      </div>
                      <div>
                        <div class="fw-bolder">Zipcar</div>
                        <div class="font-small-2 text-muted">davcilse@is.gov</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-warning me-1">
                        <div class="avatar-content">
                          <i data-feather="watch" class="font-medium-3"></i>
                        </div>
                      </div>
                      <span>Fashion</span>
                    </div>
                  </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">162</span>
                      <span class="font-small-2 text-muted">in 5 days</span>
                    </div>
                  </td>
                  <td>$522.29</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">62%</span>
                      <i data-feather="trending-up" class="text-success font-medium-1"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar rounded">
                        <div class="avatar-content">
                          <img src="{{asset('images/icons/star.svg')}}" alt="Star svg" />
                        </div>
                      </div>
                      <div>
                        <div class="fw-bolder">Owning</div>
                        <div class="font-small-2 text-muted">us@cuhil.gov</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-primary me-1">
                        <div class="avatar-content">
                          <i data-feather="monitor" class="font-medium-3"></i>
                        </div>
                      </div>
                      <span>Technology</span>
                    </div>
                  </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">214</span>
                      <span class="font-small-2 text-muted">in 24 hours</span>
                    </div>
                  </td>
                  <td>$291.01</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">88%</span>
                      <i data-feather="trending-up" class="text-success font-medium-1"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar rounded">
                        <div class="avatar-content">
                          <img src="{{asset('images/icons/book.svg')}}" alt="Book svg" />
                        </div>
                      </div>
                      <div>
                        <div class="fw-bolder">Cafés</div>
                        <div class="font-small-2 text-muted">pudais@jife.com</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-success me-1">
                        <div class="avatar-content">
                          <i data-feather="coffee" class="font-medium-3"></i>
                        </div>
                      </div>
                      <span>Grocery</span>
                    </div>
                  </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">208</span>
                      <span class="font-small-2 text-muted">in 1 week</span>
                    </div>
                  </td>
                  <td>$783.93</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">16%</span>
                      <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar rounded">
                        <div class="avatar-content">
                          <img src="{{asset('images/icons/rocket.svg')}}" alt="Rocket svg" />
                        </div>
                      </div>
                      <div>
                        <div class="fw-bolder">Kmart</div>
                        <div class="font-small-2 text-muted">bipri@cawiw.com</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-warning me-1">
                        <div class="avatar-content">
                          <i data-feather="watch" class="font-medium-3"></i>
                        </div>
                      </div>
                      <span>Fashion</span>
                    </div>
                  </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">990</span>
                      <span class="font-small-2 text-muted">in 1 month</span>
                    </div>
                  </td>
                  <td>$780.05</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">78%</span>
                      <i data-feather="trending-up" class="text-success font-medium-1"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar rounded">
                        <div class="avatar-content">
                          <img src="{{asset('images/icons/speaker.svg')}}" alt="Speaker svg" />
                        </div>
                      </div>
                      <div>
                        <div class="fw-bolder">Payers</div>
                        <div class="font-small-2 text-muted">luk@izug.io</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-warning me-1">
                        <div class="avatar-content">
                          <i data-feather="watch" class="font-medium-3"></i>
                        </div>
                      </div>
                      <span>Fashion</span>
                    </div>
                  </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">12.9k</span>
                      <span class="font-small-2 text-muted">in 12 hours</span>
                    </div>
                  </td>
                  <td>$531.49</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">42%</span>
                      <i data-feather="trending-up" class="text-success font-medium-1"></i>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--/ Company Table Card -->

    <!-- Developer Meetup Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-developer-meetup">
        <div class="meetup-img-wrapper rounded-top text-center">
          <img src="{{asset('images/illustration/email.svg')}}" alt="Meeting Pic" height="170" />
        </div>
        <div class="card-body">
          <div class="meetup-header d-flex align-items-center">
            <div class="meetup-day">
              <h6 class="mb-0">THU</h6>
              <h3 class="mb-0">24</h3>
            </div>
            <div class="my-auto">
              <h4 class="card-title mb-25">Developer Meetup</h4>
              <p class="card-text mb-0">Meet world popular developers</p>
            </div>
          </div>
          <div class="mt-0">
            <div class="avatar float-start bg-light-primary rounded me-1">
              <div class="avatar-content">
                <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
              </div>
            </div>
            <div class="more-info">
              <h6 class="mb-0">Sat, May 25, 2020</h6>
              <small>10:AM to 6:PM</small>
            </div>
          </div>
          <div class="mt-2">
            <div class="avatar float-start bg-light-primary rounded me-1">
              <div class="avatar-content">
                <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
              </div>
            </div>
            <div class="more-info">
              <h6 class="mb-0">Central Park</h6>
              <small>Manhattan, New york City</small>
            </div>
          </div>
          <div class="avatar-group">
            <div
              data-bs-toggle="tooltip"
              data-popup="tooltip-custom"
              data-bs-placement="bottom"
              title="Billy Hopkins"
              class="avatar pull-up"
            >
              <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" alt="Avatar" width="33" height="33" />
            </div>
            <div
              data-bs-toggle="tooltip"
              data-popup="tooltip-custom"
              data-bs-placement="bottom"
              title="Amy Carson"
              class="avatar pull-up"
            >
              <img src="{{asset('images/portrait/small/avatar-s-6.jpg')}}" alt="Avatar" width="33" height="33" />
            </div>
            <div
              data-bs-toggle="tooltip"
              data-popup="tooltip-custom"
              data-bs-placement="bottom"
              title="Brandon Miles"
              class="avatar pull-up"
            >
              <img src="{{asset('images/portrait/small/avatar-s-8.jpg')}}" alt="Avatar" width="33" height="33" />
            </div>
            <div
              data-bs-toggle="tooltip"
              data-popup="tooltip-custom"
              data-bs-placement="bottom"
              title="Daisy Weber"
              class="avatar pull-up"
            >
              <img
                src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                alt="Avatar"
                width="33"
                height="33"
              />
            </div>
            <div
              data-bs-toggle="tooltip"
              data-popup="tooltip-custom"
              data-bs-placement="bottom"
              title="Jenny Looper"
              class="avatar pull-up"
            >
              <img
                src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                alt="Avatar"
                width="33"
                height="33"
              />
            </div>
            <h6 class="align-self-center cursor-pointer ms-50 mb-0">+42</h6>
          </div>
        </div>
      </div>
    </div>
    <!--/ Developer Meetup Card -->

    <!-- Browser States Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-browser-states">
        <div class="card-header">
          <div>
            <h4 class="card-title">Browser States</h4>
            <p class="card-text font-small-2">Counter August 2020</p>
          </div>
          <div class="dropdown chart-dropdown">
            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="#">Last 28 Days</a>
              <a class="dropdown-item" href="#">Last Month</a>
              <a class="dropdown-item" href="#">Last Year</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/google-chrome.png')}}"
                class="rounded me-1"
                height="30"
                alt="Google Chrome"
              />
              <h6 class="align-self-center mb-0">Google Chrome</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">54.4%</div>
              <div id="browser-state-chart-primary"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/mozila-firefox.png')}}"
                class="rounded me-1"
                height="30"
                alt="Mozila Firefox"
              />
              <h6 class="align-self-center mb-0">Mozila Firefox</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">6.1%</div>
              <div id="browser-state-chart-warning"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/apple-safari.png')}}"
                class="rounded me-1"
                height="30"
                alt="Apple Safari"
              />
              <h6 class="align-self-center mb-0">Apple Safari</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">14.6%</div>
              <div id="browser-state-chart-secondary"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/internet-explorer.png')}}"
                class="rounded me-1"
                height="30"
                alt="Internet Explorer"
              />
              <h6 class="align-self-center mb-0">Internet Explorer</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">4.2%</div>
              <div id="browser-state-chart-info"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img src="{{asset('images/icons/opera.png')}}" class="rounded me-1" height="30" alt="Opera Mini" />
              <h6 class="align-self-center mb-0">Opera Mini</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">8.4%</div>
              <div id="browser-state-chart-danger"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Browser States Card -->

    <!-- Goal Overview Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Goal Overview</h4>
          <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
        </div>
        <div class="card-body p-0">
          <div id="goal-overview-radial-bar-chart" class="my-2"></div>
          <div class="row border-top text-center mx-0">
            <div class="col-6 border-end py-1">
              <p class="card-text text-muted mb-0">Completed</p>
              <h3 class="fw-bolder mb-0">786,617</h3>
            </div>
            <div class="col-6 py-1">
              <p class="card-text text-muted mb-0">In Progress</p>
              <h3 class="fw-bolder mb-0">13,561</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Goal Overview Card -->

    <!-- Transaction Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-transaction">
        <div class="card-header">
          <h4 class="card-title">Transactions</h4>
          <div class="dropdown chart-dropdown">
            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="#">Last 28 Days</a>
              <a class="dropdown-item" href="#">Last Month</a>
              <a class="dropdown-item" href="#">Last Year</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-primary rounded float-start">
                <div class="avatar-content">
                  <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Wallet</h6>
                <small>Starbucks</small>
              </div>
            </div>
            <div class="fw-bolder text-danger">- $74</div>
          </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-success rounded float-start">
                <div class="avatar-content">
                  <i data-feather="check" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Bank Transfer</h6>
                <small>Add Money</small>
              </div>
            </div>
            <div class="fw-bolder text-success">+ $480</div>
          </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-danger rounded float-start">
                <div class="avatar-content">
                  <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Paypal</h6>
                <small>Add Money</small>
              </div>
            </div>
            <div class="fw-bolder text-success">+ $590</div>
          </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-warning rounded float-start">
                <div class="avatar-content">
                  <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Mastercard</h6>
                <small>Ordered Food</small>
              </div>
            </div>
            <div class="fw-bolder text-danger">- $23</div>
          </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-info rounded float-start">
                <div class="avatar-content">
                  <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Transfer</h6>
                <small>Refund</small>
              </div>
            </div>
            <div class="fw-bolder text-success">+ $98</div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Transaction Card -->
  </div> --}}
</section>
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  {{--  --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  {{--  --}}
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
  {{-- Page js files --}}
<script>
$(document).ready(function () {
    $('#pdf').DataTable({

    });
});
</script>
@endsection
