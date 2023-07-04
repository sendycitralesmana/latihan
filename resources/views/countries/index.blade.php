
@extends('backend.layout.main')

@section('title', 'Country')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Country Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Country Page</li>
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
                    <a href="/countries/add" class="btn btn-primary">Add Data</a>
                    <a href="/countries/show_delete" class="btn btn-info">Show Deleted Data</a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Capital City</th>
                            <th>Currency</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($country as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->capital_city }}</td>
                            <td>{{ $data->currency }}</td>
                            <td>
                                @if (Auth::user()->id_role == 1)
                                    <a class="btn btn-info btn-sm" href="/countries/{{ $data->slug }}/detail">Detail</a>
                                    <a class="btn btn-warning btn-sm" href="/countries/{{ $data->slug }}/edit">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="/countries/{{ $data->slug }}/delete"
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
                            <th>Capital City</th>
                            <th>Currency</th>
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