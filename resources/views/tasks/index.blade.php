<x-app-layout>
    <x-slot name="header">My Tasks</x-slot>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">
        ➕ Create Task
    </a>

    @forelse($tasks as $task)
        <div class="card mb-2 p-3">
            <strong>{{ $task->title }}</strong>
            <p>{{ $task->description }}</p>
            <small>Due: {{ $task->due_date }}</small>
        </div>
    @empty
        <p>No tasks yet.</p>
    @endforelse
</x-app-layout>
