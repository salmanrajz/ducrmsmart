
@extends('layouts/contentLayoutMaster')

@section('title', 'Daily Report')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
@inject('provider', 'App\Http\Controllers\FunctionController')
<!-- Basic table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-striped table-bordered zero-configuration" id="pdf">
            {{-- <table class="datatables-basic table" id="pdf"> --}}
                <thead>
            <tr>
              <th rowspan="2">Call Center Name</th>
              <th colspan="6" class="text-center">Activation</th>
              <th colspan="6">In Process</th>
              <th colspan="6">Follow Up</th>
              <th colspan="6">Reject</th>
              <th rowspan="2">Point</th>
            </tr>
            <tr>
                <td>New</td>
                <td>P2P</td>
                <td>MNP</td>
                <td>HW 5G - 199</td>
                <td>HW 5G - 299</td>
                <td>Upgrade 4G to 5G</td>
                <td>New</td>
                <td>P2P</td>
                <td>MNP</td>
                <td>HW 5G - 199</td>
                <td>HW 5G - 299</td>
                <td>Upgrade 4G to 5G</td>
                <td>New</td>
                <td>P2P</td>
                <td>MNP</td>
                <td>HW 5G - 199</td>
                <td>HW 5G - 299</td>
                <td>Upgrade 4G to 5G</td>
                <td>New</td>
                <td>P2P</td>
                <td>MNP</td>
                <td>HW 5G - 199</td>
                <td>HW 5G - 299</td>
                <td>Upgrade 4G to 5G</td>
            </tr>
                </thead>

                <tbody>

            @foreach ($cc as $item)

            <tr>
                <td>
                    {{$item->call_center_name}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'New','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'P2P','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'MNP','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'HomeWifi5g199','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'HomeWifi5g','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'HomeWifiUpgrade','Daily')}}
                </td>
                {{-- In Process --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'New','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'P2P','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'MNP','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'HomeWifi5g199','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'HomeWifi5g','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'HomeWifiUpgrade','Daily')}}
                </td>
                {{-- In Process --}}
                {{-- Follow Up --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'New','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'P2P','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'MNP','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'HomeWifi5g','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'HomeWifiUpgrade','Daily')}}
                </td>
                {{-- Follow Up End --}}
                {{-- Follow Up --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'New','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'P2P','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'MNP','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'HomeWifi5g','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'HomeWifiUpgrade','Daily')}}
                </td>
                {{-- Follow Up End --}}

                <td>
                    {{$provider::DailyPoint('1.02',$item->call_center_name,'P2PMNP','Daily')}}
                </td>
            </tr>
                </tbody>

            @endforeach
            <tfoot>
                <td>
                    Total
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','New','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','P2P','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','MNP','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','HomeWifi5g199','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','HomeWifi5g','Daily')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','HomeWifiUpgrade','Daily')}}
                </td>
                {{-- In Process --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','New','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','P2P','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','MNP','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','HomeWifi5g199','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','HomeWifi5g','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','HomeWifiUpgrade','Daily')}}
                </td>
                {{-- In Process --}}
                {{-- Follow Up --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','New','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','P2P','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','MNP','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','HomeWifi5g199','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','HomeWifi5g','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','HomeWifiUpgrade','Daily')}}
                </td>
                {{-- Follow Up End --}}
                {{-- Follow Up --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','New','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','P2P','Daily')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','MNP','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','HomeWifi5g199','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','HomeWifi5g','Daily')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','HomeWifiUpgrade','Daily')}}
                </td>
                <td>
                    {{$provider::DailyPoint('1.02','All','P2PMNP','Daily')}}
                </td>
            </tfoot>



        </table>
      </div>

    </div>
  </div>
  <!-- Modal to add new record -->
  <div class="modal modal-slide-in fade" id="modals-slide-in">
    <div class="modal-dialog sidebar-sm">
      <form class="add-new-record modal-content pt-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="basic-icon-default-fullname"
              placeholder="John Doe"
              aria-label="John Doe"
            />
          </div>
          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-post">Customer #</label>
            <input
              type="text"
              id="basic-icon-default-post"
              class="form-control dt-post"
              placeholder="Web Developer"
              aria-label="Web Developer"
            />
          </div>
          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-email">Emirate</label>
            <input
              type="text"
              id="basic-icon-default-email"
              class="form-control dt-email"
              placeholder="john.doe@example.com"
              aria-label="john.doe@example.com"
            />
            <small class="form-text"> You can use letters, numbers & periods </small>
          </div>
          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-date">Joining Date</label>
            <input
              type="text"
              class="form-control dt-date"
              id="basic-icon-default-date"
              placeholder="MM/DD/YYYY"
              aria-label="MM/DD/YYYY"
            />
          </div>
          <div class="mb-4">
            <label class="form-label" for="basic-icon-default-salary">Salary</label>
            <input
              type="text"
              id="basic-icon-default-salary"
              class="form-control dt-salary"
              placeholder="$12000"
              aria-label="$12000"
            />
          </div>
          <button type="button" class="btn btn-primary data-submit me-1">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</section>
<!--/ Basic table -->
<!-- Basic table -->
<section id="basic-datatable2">
  <div class="row">
    <div class="col-12">
        <h2>Monthly Report</h2>
      <div class="table-responsive">
         <table class="table table-striped table-bordered zero-configuration" id="pdf2">
            {{-- <table class="datatables-basic table" id="pdf"> --}}
                <thead>
            <tr>
              <th rowspan="2"
              style="
    border-top: 3px solid green;
    border-left: 3px solid green;
"
              >Call Center Name</th>
              <th colspan="6" class="text-center" style="border-top: 3px solid green;border-bottom: 3px solid red;border-left: 3px solid red;border-right: 3px solid red;">Activation</th>
              <th rowspan="2" style="border-top:3px solid blue;border-right:3px solid blue">Point</th>
              <th colspan="6">In Process</th>
              <th colspan="6">Follow Up</th>
              <th colspan="6">Reject</th>
            </tr>
            <tr>
                <td style="border-left: 3px solid red;">New</td>
                <td>P2P</td>
                <td>MNP</td>
                <td>HW 5G - 199</td>
                <td>HW 5G - 299</td>
                <td style="border-right: 3px solid red;">Upgrade 4G to 5G</td>
                {{-- 5 END --}}
                <td >New</td>
                <td>P2P</td>
                <td>MNP</td>
                <td>HW 5G - 199</td>
                <td>HW 5G - 299</td>
                <td>Upgrade 4G to 5G</td>
                {{-- 5 END --}}
                <td>New</td>
                <td>P2P</td>
                <td>MNP</td>
                <td>HW 5G - 199</td>
                <td>HW 5G - 299</td>
                <td>Upgrade 4G to 5G</td>
                {{-- 5 END --}}
                <td>New</td>
                <td>P2P</td>
                <td>MNP</td>
                <td>HW 5G - 199</td>
                <td>HW 5G - 299</td>
                <td>Upgrade 4G to 5G</td>
            </tr>
                </thead>
<tbody style="border-left:3px solid green">

            @foreach ($cc as $item)

            <tr>
                <td style="border-right:3px solid red">
                    {{$item->call_center_name}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'New','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'P2P','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'MNP','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'HomeWifi5g199','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'HomeWifi5g','Monthly')}}
                </td>
                <td style="border-right:3px solid red;">
                    {{$provider::DailyActivationCount('1.02',$item->call_center_name,'HomeWifiUpgrade','Monthly')}}
                </td>

                                <td style="border-right:3px solid blue">
                    {{$provider::DailyPoint('1.02',$item->call_center_name,'P2PMNP','Monthly')}}
                </td>
                {{-- In Process --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'New','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'P2P','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'MNP','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'HomeWifi5g199','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'HomeWifi5g','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08',$item->call_center_name,'HomeWifiUpgrade','Monthly')}}
                </td>
                {{-- In Process --}}
                {{-- Follow Up --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'New','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'P2P','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'MNP','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'HomeWifi5g199','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'HomeWifi5g','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19',$item->call_center_name,'HomeWifiUpgrade','Monthly')}}
                </td>
                {{-- Follow Up End --}}
                {{-- Follow Up --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'New','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'P2P','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'MNP','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'HomeWifi5g199','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'HomeWifi5g','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15',$item->call_center_name,'HomeWifiUpgrade','Monthly')}}
                </td>
                {{-- Follow Up End --}}


            </tr>
            @endforeach
</tbody>

            <tfoot style="border-left:3px solid green;border-bottom:3px solid green">
                <td style="border-right:3px solid red">
                    Total
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','New','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','P2P','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','MNP','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','HomeWifi5g199','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyActivationCount('1.02','All','HomeWifi5g','Monthly')}}
                </td>
                <td style="border-right:3px solid red">
                    {{$provider::DailyActivationCount('1.02','All','HomeWifiUpgrade','Monthly')}}
                </td>
                {{-- In Process --}}
                                <td style="border-right:3px solid blue">
                    {{$provider::DailyPoint('1.02','All','P2PMNP','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','New','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','P2P','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','MNP','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','HomeWifi5g199','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','HomeWifi5g','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.08','All','HomeWifiUpgrade','Monthly')}}
                </td>
                {{-- In Process --}}
                {{-- Follow Up --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','New','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','P2P','Monthly')}}

                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','MNP','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','HomeWifi5g199','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','HomeWifi5g','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.19','All','HomeWifiUpgrade','Monthly')}}
                </td>
                {{-- Follow Up End --}}
                {{-- Follow Up --}}
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','New','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','P2P','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','MNP','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','HomeWifi5g199','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','HomeWifi5g','Monthly')}}
                </td>
                <td>
                    {{$provider::DailyLeadProcessCount('1.15','All','HomeWifiUpgrade','Monthly')}}
                </td>
                {{-- <td>
                    {{$provider::DailyPoint('1.02','All','P2PMNP','Monthly')}}
                </td> --}}
            </tfoot>



        </table>
        <h6>Points</h6>
          <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>
            <th style="border-top: 3px solid blue;border-left: 3px solid blue;">
                Postpaid QTY
            </th>

            <th style="
    border-top: 3px solid blue;
    border-right: 3px solid blue;
">
                Postpaid Points
            </th>
            <th style="border-top: 3px solid red;">
                HW QTY
         </th>
               <th style="border-top: 3px solid red;border-right: 3px solid red;">
                   HW Points
            </th>
            <th style="border-top: 3px solid green;">
                Total Qty
            </th>
            <th style="border-top: 3px solid green;border-right: 3px solid green;">
                Total Points
            </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border-bottom: 3px solid blue;border-left: 3px solid blue;">
                    {{$qty_a = $provider::TotalCount('1.02','All','P2PMNP','Monthly')}}
                </td>

                <td style="
    border-bottom: 3px solid blue;
    border-right: 3px solid blue;
">
                    {{$point_a = $provider::DailyPointType('1.02','All','P2PMNP','Monthly')}}
                </td>
                <td style="border-bottom: 3px solid red;">
                    {{$qty_b = $provider::TotalCount('1.02','All','HomeWifi','Monthly')}}
                </td>
                <td style="border-bottom: 3px solid red;border-right: 3px solid red;">
                    {{$point_b = $provider::DailyPointType('1.02','All','HomeWifi','Monthly')}}
                </td>
                <td style="border-bottom: 3px solid green;">
                    {{$qty_a + $qty_b}}
                </td>
                <td style="border-bottom: 3px solid green;border-right: 3px solid green;">
                    {{$point_a + $point_b}}
                </td>
            </tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
  <!-- Modal to add new record -->

</section>
<!--/ Basic table -->


@endsection


@section('vendor-script')
  {{-- vendor files --}}
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
@endsection
@section('page-script')
  {{-- Page js files --}}
<script>
$(document).ready(function () {
    $('#pdf').DataTable({
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]

    });
    $('#pdf2').DataTable({
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    });
});
</script>
  {{-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> --}}
@endsection
