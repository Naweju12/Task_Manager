<!DOCTYPE html>
<html>
<head>
<title>Edit Task</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">
<h2 class="mb-4">Edit Task</h2>

<form method="POST" action="/tasks/{{ $task->id }}/update">

@csrf
<div class="mb-3">
<label class="form-label">Title</label>
<input type="text" name="title" value="{{ $task->title }}" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control">{{ $task->description }}</textarea>
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" class="form-control">
<option value="pending" {{ $task->status=='pending' ? 'selected' : '' }}>Pending</option>
<option value="completed" {{ $task->status=='completed' ? 'selected' : '' }}>Completed</option>
</select>
</div>

<button type="submit" class="btn btn-success">Update Task</button>
<a href="/tasks" class="btn btn-secondary">Back</a>

</form>
</div>

</body>
</html>