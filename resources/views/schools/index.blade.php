@extends('backend.layout.main')

@section('title', 'School')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard/backend">Home</a></li>
                        <li class="breadcrumb-item active">School Page</li>
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
                    <a href="/schools/add" class="btn btn-primary">Add Data</a>
                    <a href="/schools/export-pdf" class="btn btn-warning" onClick="return confirm('Anda Yakin ?')">Export PDF</a>
                    <a href="/schools/show_delete" class="btn btn-info">Show Deleted Data</a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <div class="my-3">
                    <form action="" method="GET">
                        <div class="input-group input-group mb-3 col-12 col-sm-8 col-md-6">
                            <input class="form-control" placeholder="Search" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>

            <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            {{-- <th>Student</th> --}}
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schools as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            {{-- <td>
                                @foreach ($data->students as $student)
                                - {{ $student->name }} <br>
                                @endforeach
                            </td> --}}
                            <td>
                                <a class="btn btn-info btn-sm" href="/schools/{{ $data->id }}/detail">Detail</a>
                                @if (Auth::user()->id_role == 1)
                                    <a class="btn btn-warning btn-sm" href="/schools/{{ $data->id }}/edit">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="/schools/{{ $data->id }}/delete"
                                        onClick="return confirm('Anda Yakin ?')">Delete</a>
                                @else
                                -   
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            {{-- <th>Student</th> --}}
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table>
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
