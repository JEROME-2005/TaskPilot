<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">My Tasks</h2>
    </x-slot>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">
        ➕ Create Task
    </a>

    @forelse($tasks as $task)
        <div class="card mb-3 p-3">
            <strong>{{ $task->title }}</strong>

            <p class="text-gray-600">{{ $task->description }}</p>

            <small>Due: {{ $task->due_date }}</small>

            <div class="mt-2 flex gap-2">

                {{-- STATUS --}}
                @if($task->status === 'completed')
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-secondary">Pending</span>
                @endif

                {{-- COMPLETE BUTTON --}}
                @if($task->status === 'pending')
                <form method="POST" action="{{ route('tasks.complete', $task->id) }}">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success btn-sm">
                        ✔ Complete
                    </button>
                </form>
                @endif

            </div>
        </div>
    @empty
        <p>No tasks yet.</p>
    @endforelse
</x-app-layout>
