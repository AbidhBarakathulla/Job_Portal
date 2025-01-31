<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Creation Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Create a Job Posting</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        
        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title" >
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" ></textarea>
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" >
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" >
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" >
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" >
        </div>

        <div class="mb-3">
            <label for="job_type" class="form-label">Job Type</label>
            <select class="form-select" id="job_type" name="job_type" >
                <option value="full_time">Full-Time</option>
                <option value="part_time">Part-Time</option>
                <option value="contract">internship</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Job Posting</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
