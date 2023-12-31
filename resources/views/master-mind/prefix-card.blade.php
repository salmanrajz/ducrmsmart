
@extends('layouts/contentLayoutMaster')

@section('title', 'Daily Report')

@section('vendor-style')
  {{-- vendor css files --}}
  {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}"> --}}
@endsection

@section('content')
@inject('provider', 'App\Http\Controllers\FunctionController')
<!-- Basic table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
        @foreach ($counter as $item)
            <button onclick="window.location.href='{{route('TotalPrefixSlug',$item->plan)}}'" class="btn btn-success">{{$item->plan}} - {{$item->count}}</button>
        @endforeach
    </div>
  </div>
  <!-- Modal to add new record -->

</section>
<!--/ Basic table -->
<!-- Basic table -->

<!--/ Basic table -->


@endsection


@section('vendor-script')
  {{-- vendor files --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script> --}}
@endsection
@section('page-script')
  {{-- Page js files --}}

  {{-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> --}}
@endsection
