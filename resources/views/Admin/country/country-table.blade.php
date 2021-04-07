@extends('Admin.layouts.app')
@section('content')

 <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Basic Table</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">CountryTable</h4>
                                <h6 class="card-subtitle">
                                <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Table With Outside Padding</h6>
                                <div class="table-responsive">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                        {{session('success')}}
                                    </div>
                                @endif
                            
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO.</th>
                                                <th scope="col">NameCountry</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        @foreach($listCountry as $row)
                                        <tbody>
                                        
                                            <tr>
                                                <th scope="row">{{$row->id}}</th>
                                                <td>{{$row->country}}</td>
                                                <td>
                                                    <form method="POST" action="/Admin/country/delete/{{$row->id}}" onsubmit="return ConfirmDelete( this )">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                       
                                           
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <a class="btn btn-success" href="{{ url('/country/add') }}">ADD</a>
                                </div>
                                
                            </div>
                           
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->

@endsection