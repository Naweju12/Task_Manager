<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->search;

        if($search)
        {
            $tasks = Task::where('title','LIKE',"%$search%")->get();
        }
        else
        {
            $tasks = Task::all();
        }

        $total = Task::count();
        $completed = Task::where('status','completed')->count();
        $pending = Task::where('status','pending')->count();

        return view('tasks.index',compact('tasks','total','completed','pending'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect('/tasks')->with('success','Task Added Successfully');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect('/tasks')->with('success','Task Updated Successfully');
    }

    public function destroy($id)
    {
        Task::destroy($id);

        return redirect('/tasks')->with('success','Task Deleted Successfully');
    }

    public function complete($id)
    {

        $task = Task::find($id);

        $task->update([
        'status' => 'completed'
        ]);

        return redirect('/tasks')->with('success','Task Marked Completed');

    }

}