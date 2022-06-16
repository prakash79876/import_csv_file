@extends('layouts.app')
<title>Countries - {{ config('app.name', 'Import CSV File') }}</title>
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Countries Record</h1>
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                
               <form action="{{ route('admin.countries.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button  type="submit" class="btn btn-primary btn-sm">Import Countries Data</button>
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
                                <th>Continent Code</th>
                                <th>Currency Code</th>
                                <th>iso2 Code</th>
                                <th>iso3 Code</th>
                                <th>iso Numeric Code</th>
                                <th>Fips Code</th>
                                <th>Calling Code</th>
                                <th>Common Name</th>
                                <th>Official Name</th>
                                <th>Endonym</th>
                                <th>Demonym</th>
                                <th>Create Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="8%" class="text-center">Sr.No</th>
                                <th>Continent Code</th>
                                <th>Currency Code</th>
                                <th>iso2 Code</th>
                                <th>iso3 Code</th>
                                <th>iso Numeric Code</th>
                                <th>Fips Code</th>
                                <th>Calling Code</th>
                                <th>Common Name</th>
                                <th>Official Name</th>
                                <th>Endonym</th>
                                <th>Demonym</th>
                                <th>Create Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($countries as $key => $data)
                            <tr>
                                <td width="8%" class="text-center">{{$key+1}}</td>
                                <td>{{ $data->continent_code }}</td>
                                <td>{{ $data->currency_code }}</td>
                                <td>{{ $data->iso2_code }}</td>
                                <td>{{ $data->iso3_code }}</td>
                                <td>{{ $data->iso_numeric_code }}</td>
                                <td>{{ $data->fips_code }}</td>
                                <td>{{ $data->calling_code }}</td>
                                <td>{{ $data->common_name }}</td>
                                <td>{{ $data->official_name }}</td>
                                <td>{{ $data->endonym }}</td>
                                <td>{{ $data->demonym }}</td>
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