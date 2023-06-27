<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <h2>Student List</h2>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Nis</th>
                <th>Gender</th>
                {{-- <th>Class</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->gender }}</td>
                {{-- <td>{{ $data->class['name'] }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
