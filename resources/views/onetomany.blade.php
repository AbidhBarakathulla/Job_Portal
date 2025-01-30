<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One to Many</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<h3 style="text-align: center;">One to many relationship</h3>
<table class="table table-hover container">

        @foreach ($employees as $employee)
        <tr>
        <td>Employee: {{ $employee->emp_name }} Position : {{ $employee->position }}</td>
        </tr>
        <tr class="table-success">
            <th>Employee Name</th>
            <th>created Job</th>
            <th>created At</th>
        </tr>
            @foreach ($employee->jobApplications as $jobapplication)
       
                <tr>
                    <td>{{ $employee->emp_name }}</td>
                    <td>{{  $jobapplication->jobLists->title}}</td>
                    <td>{{  $jobapplication->created_at }}</td>

                </tr>
            @endforeach
        @endforeach
                    </tbody>
    </table>
</body>
</html>
