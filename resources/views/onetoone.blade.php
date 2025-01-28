<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h3 style="text-align: center;">One to one relationship</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>gender</th>
                <th>Phone No</th>
                <th>age</th>
            </tr>
        </thead>
        <tbody>
            @foreach($candidates as $candidate)
                <tr>
                    <td>{{$candidate->username }}</td>
                    <td>{{$candidate->email }}</td>
                    <td>{{$candidate->profile->gender}}</td>
                    <td>{{$candidate->profile->phone_number}}</td>
                    <td>{{$candidate->profile->age}}</td>
                </tr>
                @endforeach
                    </tbody>
    </table>
</body>

</html> 