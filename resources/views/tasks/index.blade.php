<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">My Tasks</h2>
    </x-slot>

    {{-- Create Task Button --}}
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">
        ➕ Create Task
    </a>

    @forelse($tasks as $task)
        <div class="card mb-3 p-3 shadow-sm">

            {{-- Title --}}
            <strong class="text-lg">{{ $task->title }}</strong>

            {{-- Description --}}
            <p class="text-gray-600">{{ $task->description }}</p>

            {{-- Due Date --}}
            <small class="text-gray-500">
                Due: {{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}
            </small>

            {{-- Buttons Row --}}
            <div class="mt-3 flex gap-2 items-center">

                {{-- STATUS BADGE --}}
                @if($task->status === 'completed')
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-secondary">Pending</span>
                @endif

                {{-- COMPLETE BUTTON --}}
                @if($task->status === 'pending')
                    <form method="POST" action="{{ route('tasks.complete', $task) }}">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success btn-sm">
                            ✔ Complete
                        </button>
                    </form>
                @endif

                {{-- EDIT BUTTON --}}
                <a href="{{ route('tasks.edit', $task) }}"
                   class="btn btn-warning btn-sm">
                    ✏️ Edit
                </a>

                {{-- DELETE BUTTON --}}
                <form method="POST"
                      action="{{ route('tasks.destroy', $task) }}"
                      onsubmit="return confirm('Are you sure you want to delete this task?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        🗑️ Delete
                    </button>
                </form>

            </div>
        </div>
    @empty
        <p class="text-gray-500">No tasks yet.</p>
    @endforelse
</x-app-layout>
