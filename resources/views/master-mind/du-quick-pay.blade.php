@extends('layouts/contentLayoutMaster')

@section('title', 'Du Quick Pay')

@section('vendor-style')
{{-- vendor css files --}}
{{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
--}}
{{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
--}}
{{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
--}}
{{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
--}}
{{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
--}}
@endsection

@section('content')
@inject('provider', 'App\Http\Controllers\FunctionController')
    <!-- Basic table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-4">
                <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Users Contact #</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="user"></i></span>
                        <input type="tel" maxlength="12"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            onkeypress="return isNumberKey(event) " id="first-name-icon" class="form-control"
                            name="contact_number" placeholder="971522221220" required />
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary me-1"
                onclick="QuickPayChecker('{{ route('NewLeadSubmit') }}', 'MyRoleForm','{{ route('wifi.leads') }}')">Submit</button>
        </div>
        <!-- Modal to add new record -->

    </section>
    <!--/ Basic table -->
    <!-- Basic table -->

    <!--/ Basic table -->


    @endsection


    @section('vendor-script')
    {{-- vendor files --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}">
    </script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}">
    </script> --}}
    @endsection
    @section('page-script')
    {{-- Page js files --}}

    {{-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}">
    </script> --}}
    @endsection
