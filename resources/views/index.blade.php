<!DOCTYPE html>
<html>
<head>
    <title>Job Board</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Available Jobs</h1>
    <ul class="list-group">
        @foreach($jobs as $job)
            <li class="list-group-item">
                <strong>{{ $job['title'] }}</strong> - {{ $job['location'] }} ({{ $job['type'] }})
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>

