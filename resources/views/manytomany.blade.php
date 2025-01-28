<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One to Many</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<h3 style="text-align: center;">many to many relationship</h3>
<table class="table table-hover">
  
        @foreach ($candidates as $candidate)
        <tr>
        <td>Candidate name:{{ $candidate->username }}</td>
        </tr>
        <tr class="table">
            <th>Candidate Name</th>
            <th>Candidate Email</th>
            <th>Job Title</th>
            <th>Application Status</th>
            <th>Created At</th>
        </tr>
            @foreach ($candidate->jobApplications as $jobapplication)
                <tr>
                    <td>{{ $candidate->username }}</td>
                    <td>{{ $candidate->email }}</td>
                    <td>{{ $jobapplication->job->title }}</td>
                    <td>{{ $jobapplication->status }}</td>
                    <td>{{ $jobapplication->created_at }}</td>

                </tr>
            @endforeach
        @endforeach
</table>
</body>
</html>