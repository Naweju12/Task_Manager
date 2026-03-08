<!DOCTYPE html>
<html>
<head>

<title>Task Manager</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:linear-gradient(120deg,#667eea,#764ba2);
min-height:100vh;
}

.main-card{
border-radius:15px;
box-shadow:0 15px 35px rgba(0,0,0,0.2);
background:white;
}

.stat-card{
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark"
style="background:linear-gradient(90deg,#5f72bd,#9b23ea);">

<div class="container">

<span class="navbar-brand fw-bold"> Task Manager</span>

<a href="/tasks/create" class="btn btn-light">Add Task</a>

</div>

</nav>


<div class="container mt-5">

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

{{ session('success') }}

<button type="button" class="btn-close" data-bs-dismiss="alert"></button>

</div>

@endif
<div class="row mb-4 text-center">

<div class="col-md-4">

<div class="card stat-card bg-primary text-white p-3">

<h5>Total Tasks</h5>
<h3>{{ $total }}</h3>

</div>

</div>


<div class="col-md-4">

<div class="card stat-card bg-success text-white p-3">

<h5>Completed</h5>
<h3>{{ $completed }}</h3>

</div>

</div>

<div class="col-md-4">

<div class="card stat-card bg-warning text-dark p-3">

<h5>Pending</h5>
<h3>{{ $pending }}</h3>

</div>

</div>

</div>


<div class="card main-card p-4">

<h4 class="text-center mb-4">Task List</h4>

<form method="GET" action="/tasks" class="mb-3">

<div class="input-group">

<input type="text"
name="search"
class="form-control"
placeholder="Search task...">

<button class="btn btn-dark">Search</button>

</div>

</form>


<table class="table table-striped table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Title</th>
<th>Description</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($tasks as $task)

<tr>

<td>{{ $task->id }}</td>
<td>{{ $task->title }}</td>
<td>{{ $task->description }}</td>

<td>

@if($task->status=='completed')

<span class="badge bg-success">Completed</span>

@else

<span class="badge bg-warning text-dark">Pending</span>

<a href="/tasks/{{ $task->id }}/complete"
class="btn btn-success btn-sm ms-2">
Mark Complete
</a>

@endif

</td>

<td>

<a href="/tasks/{{ $task->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

<a href="/tasks/{{ $task->id }}/delete"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this task?')">

Delete

</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>