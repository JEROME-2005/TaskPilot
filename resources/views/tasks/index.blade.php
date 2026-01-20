<x-app-layout>
    <div class="p-6">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ New Task</a>

        <table class="mt-4 w-full border">
            <tr class="bg-gray-100">
                <th>Title</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ ucfirst($task->priority) }}</td>
                <td>{{ ucfirst($task->status) }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline">
                        @csrf @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
