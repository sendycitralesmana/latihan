@extends('backend.layout.main')

@section('title', 'Change Password')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Change Password Page</li>
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
                @if(session('success'))
                <div class="alert alert-success">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    <h4 class="message-head">{{ session('success') }}</h4>
                </div>
                @endif
                <div class="card-tools">
                    <a href="/class/add" class="btn btn-primary">Add Data</a>
                    <a href="/class/show_delete" class="btn btn-info">Show Deleted Data</a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="/users/process-change-password" method="POST">
                    {{ csrf_field() }}
                    @if(session('status'))
                      <div class="alert alert-success">
                          <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                          <h4 class="message-head">{{ session('status') }}</h4>
                      </div>
                    @elseif(session('error'))
                      <div class="alert alert-danger">
                        <button type="button" class="btn btn-danger close" data-dismiss="alert" sty>&times;</button>
                        <h4 class="message-head">{{ session('error') }}</h4>
                      </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" name="old_password" class="form-control" placeholder="Old Password" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" name="new_password" class="form-control" placeholder="New Password" >
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                          </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" name="repeat_password" class="form-control" placeholder="Repeat New Password" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block" style="color: aliceblue">Update</button>
                        </div>
                        <!-- /.col -->
                    </div>
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
