<x-app-layout>
    <x-slot name="header">Create Task</x-slot>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div>
            <label>Title</label>
            <input type="text" name="title" required>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>

        <div>
            <label>Due Date</label>
            <input type="date" name="due_date">
        </div>

        <button type="submit">Save Task</button>
    </form>
</x-app-layout>
