<x-app-layout>
    <x-slot name="header">Edit Task</x-slot>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Due Date</label>
            <input type="date" name="due_date" value="{{ $task->due_date }}" class="form-control">
        </div>

        <button class="btn btn-primary">Update Task</button>
    </form>
</x-app-layout>
