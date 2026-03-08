<!DOCTYPE html>
<html>
<head>

<title>Add Task</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:linear-gradient(120deg,#667eea,#764ba2);
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
}

.card{
width:500px;
border-radius:15px;
box-shadow:0 15px 35px rgba(0,0,0,0.3);
}

</style>

</head>

<body>

<div class="card p-4">

<h3 class="text-center mb-4">Add New Task</h3>

<form method="POST" action="/tasks">

@csrf

<div class="mb-3">

<label class="form-label">Title</label>

<input type="text" name="title" class="form-control">

</div>

<div class="mb-3">

<label class="form-label">Description</label>

<textarea name="description" class="form-control"></textarea>

</div>

<div class="mb-3">

<label class="form-label">Status</label>

<select name="status" class="form-select">

<option value="pending">Pending</option>
<option value="completed">Completed</option>

</select>

</div>

<div class="text-center">

<button type="submit" class="btn btn-success">Add Task</button>

<a href="/tasks" class="btn btn-secondary">Back</a>

</div>

</form>

</div>

</body>
</html>