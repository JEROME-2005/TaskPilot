<x-app-layout>
    <div class="p-6 space-y-6">
        @if($reminderTasks->count())
           <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded shadow">
              <h3 class="font-semibold text-blue-700 text-lg">🔔 Reminders</h3>

              @foreach($reminderTasks as $task)
                  <p>• {{ $task->title }} (Due {{ $task->due_date }})</p>
              @endforeach
            </div>
        @endif


        <h2 class="text-2xl font-bold">Welcome back 👋</h2>

        {{-- Today --}}
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg">📅 Today’s Tasks</h3>
            @forelse($todayTasks as $task)
                <p>• {{ $task->title }}</p>
            @empty
                <p class="text-gray-500">No tasks for today</p>
            @endforelse
        </div>

        {{-- Urgent --}}
        <div class="bg-red-50 p-4 rounded shadow">
            <h3 class="font-semibold text-lg text-red-600">🔥 Urgent Tasks</h3>
            @forelse($urgentTasks as $task)
                <p>• {{ $task->title }}</p>
            @empty
                <p class="text-gray-500">No urgent tasks</p>
            @endforelse
        </div>

        {{-- Overdue --}}
        <div class="bg-yellow-50 p-4 rounded shadow">
            <h3 class="font-semibold text-lg text-yellow-700">⏰ Overdue Tasks</h3>
            @forelse($overdueTasks as $task)
                <p>• {{ $task->title }}</p>
            @empty
                <p class="text-gray-500">No overdue tasks</p>
            @endforelse
       
</x-app-layout>
