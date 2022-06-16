@extends('layouts.app')
<title>Add Nes User - {{ config('app.name', 'Import CSV File') }}</title>
@section('css')
<style type="text/css">
.required{
    color: red;
}    
</style>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">User Form</h1>
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-2">
               <h6 class="m-0 font-weight-bold text-primary">Edit User Form:</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Form Begin -->
                        <form role="form" method="POST" action="{{ route('admin.update.user') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ CryptoCode::encrypt($userData->id) }}">
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Fullname<span class="required">*</span></label>
                              <div class="col-sm-12">
                                <input type="text" name="name" class="form-control" id="name" value="{{ $userData->name }}" placeholder="Enter Fullname" required maxlength="100">
                                @error('name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-12 control-label">Email<span class="required">*</span></label>
                              <div class="col-sm-12">
                                <input type="email" name="email" class="form-control" id="email" value="{{ $userData->email }}" placeholder="Enter email" required maxlength="100">
                                @error('email')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-12 control-label">Token<span class="required">*</span></label>
                              <div class="col-sm-12">
                                <input type="text" name="token" class="form-control" id="token" value="@if($userData->token) {{ $userData->token }} @else {{$tokenGenerate}} @endif" placeholder="Enter token" required maxlength="25" readonly>
                                @error('token')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-12 control-label">Token Exipre Date</label>
                              <div class="col-sm-12">
                                <input type="date" class="form-control" name="token_exp_date" id="token_exp_date" value="{{ $userData->token_exp_date }}" placeholder="Enter token_exp_date" required>
                                @error('token_exp_date')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Token Is Active</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="token_is_active" id="token_is_active">
                                    <option value="1" @if($userData->token_is_active == 1) selected @endif>Yes</option>
                                    <option value="0" @if($userData->token_is_active == 0) selected @endif>No</option>
                                </select>
                                @error('token_is_active')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect float-right">Update</button>
                            <a href="{{ url('/admin/users') }}" class="btn btn-danger m-t-15"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('script')
@endsection