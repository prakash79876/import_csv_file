@extends('layouts.app')
<title>Users - {{ config('app.name', 'Import CSV File') }}</title>
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Users Record</h1>
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <a href="{{ route('admin.create.user') }}" class="btn btn-primary btn-icon-split btn-sm float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add New User</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="8%" class="text-center">Sr.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Create Date</th>
                                @if(Auth::user()->role_id == 1)
                                <th>Token</th>
                                <th>Token Expire Date</th>
                                @endif
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="8%" class="text-center">Sr.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Create Date</th>
                                @if(Auth::user()->role_id == 1)
                                <th>Token Expire Date</th>
                                @endif
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($users as $key => $user)
                            <tr>
                                <td width="8%" class="text-center">{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
                                @if(Auth::user()->role_id == 1)
                                <td>{{$user->token}}</td>
                                <td>@if($user->token_exp_date)
                                    {{ date('d-m-Y',strtotime($user->token_exp_date)) }}
                                    @endif
                                </td>
                                @endif
                                <td width="8%" class="text-center">
                                    <a href="{{ url('admin/edit-user',CryptoCode::encrypt($user->id)) }}" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('script')
 <!-- Page level plugins -->
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
@endsection