@extends('backend.layout.main')

@section('title', 'Student')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Students Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard/backend">Home</a></li>
                        <li class="breadcrumb-item active">Students Page</li>
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
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="/students/create">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('nis') ? 'has-error' : '' }}">
                            <label for="exampleInputEmail1">NIS</label>
                            <input type="text" name="nis" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter NIS" value="{{ old('nis') }}">
                            @if($errors->has('nis'))
                            <span class="help-block">{{ $errors->first('nis') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gender</label>
                            <select name="gender" class="form-control">
                                <option>option 1</option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Class</label>
                            <select name="id_class" class="form-control">
                                <option value="">option 1</option>
                                @foreach($class as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
