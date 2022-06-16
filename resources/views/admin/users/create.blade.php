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
               <h6 class="m-0 font-weight-bold text-primary">Add New User Form:</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Form Begin -->
                        <form role="form" method="POST" action="{{ route('admin.store.user') }}">
                            @csrf
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Fullname<span class="required">*</span></label>
                              <div class="col-sm-12">
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter Fullname" required maxlength="100">
                                @error('name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-12 control-label">Email<span class="required">*</span></label>
                              <div class="col-sm-12">
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter email" required maxlength="100">
                                @error('email')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-12 control-label">Token<span class="required">*</span></label>
                              <div class="col-sm-12">
                                <input type="text" name="token" class="form-control" id="token" value="{{ $tokenGenerate }}" placeholder="Enter token" required maxlength="25" readonly>
                                @error('token')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-12 control-label">Token Exipre Date (By default set 30 days)</label>
                              <div class="col-sm-12">
                                <input type="date" class="form-control" id="token_exp_date" name="token_exp_date" value="{{ old('token_exp_date') }}" placeholder="Enter token_exp_date">
                                @error('token_exp_date')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect float-right">Submit</button>
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