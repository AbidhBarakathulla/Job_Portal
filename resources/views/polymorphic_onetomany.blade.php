<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One to Many</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<h3 style="text-align: center;">Polymorphic One to many relationship</h3>
<table class="table table-hover container">

        @foreach ($candidates as $candidate)
        <tr>
        <td>Candidate: {{ $candidate->username }}</td>
        </tr>
        <tr class="table-success">
            <th>Name</th>
            <th>Employee position</th>
            <th>created Job</th>
        </tr>
            @foreach ($candidate->resumes as $resumes)
       
                <tr>
                    <td>{{ $candidate->username  }}</td>
                    <td>{{ $resumes->image }}</td>
                    <td>{{  $resumes->resume }}</td>

                </tr>
            @endforeach
        @endforeach
                    </tbody>
    </table>
</body>
</html>
