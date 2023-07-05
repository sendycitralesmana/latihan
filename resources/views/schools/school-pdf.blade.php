<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2 style="text-align: center">Data sekolah</h2>
    <table border style="margin: auto">
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
</body>

</html>
