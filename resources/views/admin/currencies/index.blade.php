@extends('layouts.app')
<title>Currencies - {{ config('app.name', 'Import CSV File') }}</title>
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Currencies Record</h1>
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                
               <form action="{{ route('admin.currencies.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button  type="submit" class="btn btn-primary btn-sm">Import Currencies Data</button>
                    </div>
                </div>
            </form>
            </div>
             
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="8%" class="text-center">Sr.No</th>
                                <th>Iso code</th>
                                <th>Iso Numeric Code</th>
                                <th>Common Name</th>
                                <th>Official Name</th>
                                <th>Symbol</th>
                                <th>Create Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="8%" class="text-center">Sr.No</th>
                                <th>Iso code</th>
                                <th>Iso Numeric Code</th>
                                <th>Common Name</th>
                                <th>Official Name</th>
                                <th>Symbol</th>
                                <th>Create Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($currencies as $key => $data)
                            <tr>
                                <td width="8%" class="text-center">{{$key+1}}</td>
                                <td>{{$data->iso_code}}</td>
                                <td>{{$data->iso_numeric_code}}</td>
                                <td>{{$data->common_name}}</td>
                                <td>{{$data->official_name}}</td>
                                <td>{{$data->symbol}}</td>
                                <td>{{ date('d-m-Y',strtotime($data->created_at)) }}</td>
                                <td width="8%" class="text-center">
                                    <a href="#" class="btn btn-primary btn-circle btn-sm">
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