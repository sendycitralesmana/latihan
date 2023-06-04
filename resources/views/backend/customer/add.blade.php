@extends('backend.layout.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/customer/create">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Gender</label>
                        <select name="gender" class="form-control" id="exampleFormControlSelect1">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Religion</label>
                        <select name="religion" class="form-control" id="exampleFormControlSelect1">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="buddha">Buddha</option>
                            <option value="hindu">Hindu</option>
                            <option value="ateis">Ateis</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone</label>
                        <input name="phone" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter your number">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Social Media</label>
                        <input name="social_media" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Example email/instagram/twitter/facebook">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Username</label>
                        <input name="username" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"></label>
                        <a href="#" class="addSocial_media btn btn-info">Add Social Media</a>
                    </div>

                    <div class="social_media"></div>

                    
                    <button type="submit" class="btn btn-success" style="float:right">Create Data</button>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection
