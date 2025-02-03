<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h3 style="text-align: center;">Job lists</h3>
    <table class="table table-hover container">
        <thead>
            <tr class="table-success">
                <th>ID</th>
                <th>Job Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Salary</th>
                <th>Posted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($joblists as $joblist)
                <tr>
                    <td>{{$joblist->id}}</td>
                    <td>{{$joblist->title }}</td>
                    <td>{{$joblist->description }}</td>
                    <td>{{$joblist->location}}</td>
                    <td>{{$joblist->salary}}</td>
                    <td>{{$joblist->created_at}}</td>
                </tr>
                @endforeach
                    </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $joblists->links('pagination::bootstrap-5') !!}
    </div>
</body>

</html> 