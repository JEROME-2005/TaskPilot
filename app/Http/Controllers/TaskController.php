<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
          'title' => 'required|string|max:255',
          'description' => 'nullable|string',
          'due_date' => 'nullable|date',
       ]);

        Task::create([
           'user_id' => Auth::id(), // 🔥 THIS IS THE FIX
           'title' => $request->title,
           'description' => $request->description,
           'status' => 'pending',
           'due_date' => $request->due_date,
       ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function complete(Task $task)
    {
      $task->update([
        'status' => 'completed'
      ]);

      return redirect()->back()->with('success', 'Task completed');
    }

    public function edit(Task $task)
    {
      return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
     $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'required|date',
     ]);

     $task->update($request->all());

     return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }
    
    public function destroy(Task $task)
    {
     // Optional security (recommended)
     //$this->authorize('delete', $task);

     $task->delete();

     return redirect()
        ->route('tasks.index')
        ->with('success', 'Task deleted successfully');
    }


}

