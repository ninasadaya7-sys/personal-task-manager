<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::orderByDesc('id')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'required|date',
        ]);

        Task::create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(
        Request $request,
        Task $task
    ): RedirectResponse {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'required|date',
        ]);

        $task->update($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function updateStatus(
        Request $request,
        Task $task
    ): RedirectResponse {
        $validated = $request->validate([
            'status' => 'required|in:Pending,Completed',
        ]);

        $task->update([
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task status updated successfully.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}