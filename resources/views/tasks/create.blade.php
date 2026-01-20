<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h2 class="text-xl font-bold mb-4">Create New Task</h2>

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block">Title</label>
                <input type="text" name="title" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Description</label>
                <textarea name="description" class="w-full border rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block">Priority</label>
                <select name="priority" class="w-full border rounded p-2">
                    <option value="low">Low</option>
                    <option value="medium" selected>Medium</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block">Due Date</label>
                <input type="datetime-local" name="due_date" class="w-full border rounded p-2">
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Save Task
            </button>
        </form>
    </div>
</x-app-layout>
