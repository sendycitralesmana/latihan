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
                <div class="my-3 d-flex justify-content-center">
                    @if( $students->image != '' )
                        <img src="{{asset('storage/image/'.$students->image)}}" alt="" width="200px" height="200px">
                    @else
                        <img src="{{asset('storage/imageDefault/default.png')}}" alt="" width="200px" height="200px">
                    @endif
                </div>
            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Nis</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Ekskul</th>
                            <th>Teacher</th>
                            {{-- <th>Option</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $students->id }}</td>
                            <td>{{ $students->name }}</td>
                            <td>{{ $students->nis }}</td>
                            {{-- <td>{{ $students->gender }}</td> --}}
                            <td>
                                @if($students->gender == 'L')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </td>
                            <td>{{ $students->class->name }}</td>
                            <td>
                                @foreach ($students->ekskuls as $ekskul)
                                - {{ $ekskul->name }} <br>
                                @endforeach
                            </td>
                            <td>{{ $students->class->teachers->name }}</td>
                            {{-- <td>
                                <a class="btn btn-info btn-sm" href="/students/{{ $students->id }}/detail">Detail</a>
                                <a class="btn btn-warning btn-sm" href="/students/{{ $students->id }}/edit">Edit</a>
                                <a class="btn btn-danger btn-sm" href="/students/{{ $students->id }}/delete"
                                    onClick="return confirm('Anda Yakin ?')">Delete</a>
                            </td> --}}
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Nis</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Ekskul</th>
                            <th>Teacher</th>
                            {{-- <th>Option</th> --}}
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
