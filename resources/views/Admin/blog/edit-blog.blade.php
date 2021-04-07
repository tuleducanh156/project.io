@extends('Admin.layouts.app')
@section('content')
 <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Create Country</h4>
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
                                <h4 class="card-title">Title(*)</h4>
                                <h6 class="card-subtitle">
                                <div class="table-responsive">
                               
                                  <form  method="post"  enctype="multipart/form-data">
                                    @csrf

                                    <input type="text" name="create_blog"  value="{{$Blogs->title}}"class="form-control form-control-line">
                                    <br>
                                    <h4>Images</h4>
                                    <input type="file" name="file_blog"  >
                                    
                                    <br>
                                    <h4>Description</h4>
                                    <textarea name="description"  cols="50" rows="10" >{{$Blogs->description}}</textarea>
                                    <div class="form-group col-md-12">
                                    <br>
                                    <h4>Content</h4>
                                    <textarea name="txtContent" id="demo" cols="30" rows="10" >{{$Blogs->content}}</textarea>
                                    
                                    </div>
                                    <button type="submit"class="btn btn-success" >update Blog</button>
                                  </form>
                                 
                                </div>
                                
                            </div>
                           
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace( 'demo', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    });
</script>

@endsection