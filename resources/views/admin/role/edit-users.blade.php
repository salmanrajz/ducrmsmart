@extends('layouts/contentLayoutMaster')

@section('title', 'Users')

@section('content')
<!-- Basic Horizontal form layout section start -->

<!-- Basic Horizontal form layout section end -->

<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row">

    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Users</h4>
        </div>
        <div class="card-body">
          <form class="form form-vertical"  id="MyRoleForm" onsubmit="return false">
            <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">Users Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="text" id="first-name-icon" class="form-control" name="name"
                                            placeholder="Role Name" value="{{$data->name}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">Users Email</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="text" id="first-name-icon" class="form-control" name="email"
                                            placeholder="Role Name" value="{{$data->email}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">Users Phone</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="text" id="first-name-icon" class="form-control" name="phone"
                                            placeholder="Role Name" value="{{$data->phone}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">Users CNIC/Adhar #</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="text" id="first-name-icon" class="form-control" name="cnic_number"
                                            placeholder="Role Name" value="{{$data->cnic_number}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">Call Center</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="box"></i></span>
                                        <select name="call_center" id="call_center" class="is_mnp form-control">
                                            @foreach($call_center as $item)
                                                <option value="{{ $item->call_center_name }}"
                                                    @if ($data->agent_code == $item->call_center_name) {{ 'selected' }} @endif
                                                    >
                                                    {{ $item->call_center_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">Role</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <select name="role" id="role" class="is_mnp form-control">
                                            @foreach($role as $item)
                                                <option value="{{ $item->name }}"
                                                    @if ($data->role == $item->name) {{ 'selected' }} @endif

                                                    >
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">Team Leader</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <select name="teamleader" id="role" class="is_mnp form-control">
                                            <option value="">Team Leader</option>
                                            @foreach($tl as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($data->teamleader == $item->id) {{ 'selected' }} @endif

                                                    >
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- IMO --}}
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">Password</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="********" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="password" id="password" class="form-control" name="password_confirmation"
                                            placeholder="**********" />
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="form-group">
                                <label for="profile_pic">Profile Picture</label>
                                <input type="file" name="img" id="profile_pic" class="form-control-file">
                                <img id="myImg" src="{{asset('img/').'/'.$data->profile}}" alt="your image" style="width:25%"/>
                                <input type="hidden" name="img_old" value="{{$data->profile}}">

                            </div>
                            <div class="form-group">
                                <label for="profile_pic">CNIC User front</label>
                                <input type="file" name="cnic_front" id="CnicFront" class="form-control-file">
                                {{-- <img src="{{env('CDN_URL')}}/documents/{{$item->document_name}}" alt="Activation Screenshot"> --}}
                                <input type="hidden" name="cnic_back_old" value="{{$data->cnic_front}}">

                                <img id="CnicFrontImg" src="{{env('CDN_URL')}}/user-cnic/{{$data->cnic_front}}" alt="your image" style="width:25%"/>
                            </div>
                            <div class="form-group">
                                <label for="profile_pic">CNIC User Back</label>
                                <input type="file" name="cnic_back" id="CnicBack" class="form-control-file">
                                <input type="hidden" name="cnic_back_old" value="{{$data->cnic_back}}">
                                <img id="CnicBackImg" src="{{env('CDN_URL')}}/user-cnic/{{$data->cnic_back}}" alt="your image" style="width:25%"/>
                            </div>
                            {{-- IMO END --}}
                            <div class="col-12">

                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>

                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1"
                                    onclick="SavingActivationLead('{{ route('user.edit.update') }}', 'MyRoleForm','{{ route('users') }}')">Submit</button>
                                {{-- <button type="reset" class="btn btn-outline-secondary">Reset</button> --}}
                            </div>
                        </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Existing Users</h4>
        </div>
        <div class="card-body">
          <form class="form form-vertical">
            <div class="row">
              <div class="col-12">
                @foreach ($role as $key => $item)

                <div class="mb-1">
                    <label class="form-label" for="first-name-icon">{{++$key}} - {{$item->name}}</label>
                </div>
                @endforeach
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Vertical form layout section end -->

<!-- Basic multiple Column Form section start -->


@endsection<!-- Basic Floating Label Form section end -->
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/custom.js'))}}"></script>
  <!-- Page js files -->
@endsection
