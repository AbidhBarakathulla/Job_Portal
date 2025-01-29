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
    <table class="table table-hover container">
        <thead>
            <tr class="table-success">
                <th>Username</th>
                <th>Email</th>
                <th>Resume</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
        @foreach($candidates as $candidate)
    <tr>
        <td>{{ $candidate->username }}</td>
        <td>{{ $candidate->email }}</td>
        <td>{{ $candidate->resume->resume ?? '' }}</td>
        <td>{{ $candidate->resume->image ?? '' }}</td>
    </tr>
@endforeach


                    </tbody>
    </table>
</body>

</html> 