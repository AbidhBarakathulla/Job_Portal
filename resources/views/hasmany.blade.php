<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One to Many</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <h3 style="text-align: center;">Has Many Through relationship</h3>
    <table class="table table-hover container">
    <tr class="table-success">
            <th>Candidate Name</th>
            <th>Applied Job</th>
            <th>Salary</th>
            <th>Location</th>
        </tr>

        @foreach ($candidates as $candidate)
        @foreach ($candidate->jobLists as $job)
        <tr>
            <td>{{ $candidate->username }}</td>
            <td>{{ $job->title }}</td>
            <td>{{ $job->salary }}</td>
            <td>{{ $job->location }}</td>
        </tr>
        @endforeach
        @endforeach
        </tbody>
    </table>

    </table>
</body>

</html>