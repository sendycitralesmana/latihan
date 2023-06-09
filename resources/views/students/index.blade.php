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
                    <a href="/students/add" class="btn btn-primary">Add Data</a>
                    <a href="/students/show_delete" class="btn btn-info">Show Deleted Data</a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                {{-- <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Nis</th>
                            <th>Gender</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="/students/{{ $data->id }}/detail">Detail</a>
                                <a class="btn btn-warning btn-sm" href="/students/{{ $data->id }}/edit">Edit</a>
                                <a class="btn btn-danger btn-sm" href="/students/{{ $data->id }}/delete"
                                    onClick="return confirm('Anda Yakin ?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Nis</th>
                            <th>Gender</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table> --}}

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

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Nis</th>
                            <th>Gender</th>
                            <th>Class</th>
                            {{-- <th>Ekskul</th>
                            <th>Teacher</th> --}}
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ $data->class['name'] }}</td>
                            {{-- <td>
                                @foreach ($data->ekskuls as $ekskul)
                                - {{ $ekskul->name }} <br>
                                @endforeach
                            </td>
                            <td>{{ $data->class->teachers->name }}</td> --}}
                            <td>
                                @if (Auth::user()->id_role != 1 && Auth::user()->id_role != 2)
                                -                                
                                @else
                                    <a class="btn btn-info btn-sm" href="/students/{{ $data->slug }}/detail">Detail</a>
                                    <a class="btn btn-warning btn-sm" href="/students/{{ $data->slug }}/edit">Edit</a>
                                @endif
                                @if (Auth::user()->id_role == 1)
                                    <a class="btn btn-danger btn-sm" href="/students/{{ $data->slug }}/delete"
                                    onClick="return confirm('Anda Yakin ?')">Delete</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Nis</th>
                            <th>Gender</th>
                            <th>Class</th>
                            {{-- <th>Ekskul</th>
                            <th>Teacher</th> --}}
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table>

                <div class="my-3">
                    {{ $students->withQueryString()->links() }}
                </div>

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
