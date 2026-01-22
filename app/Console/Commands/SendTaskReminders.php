<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class SendTaskReminders extends Command
{
    protected $signature = 'task:send-reminders';

    protected $description = 'Send reminders for pending tasks';

    public function handle()
    {
        $tasks = Task::where('status', 'pending')
            ->whereNotNull('reminder_at')
            ->where('reminder_sent', false)
            ->where('reminder_at', '<=', now())
            ->get();

        foreach ($tasks as $task) {
            \Log::info('Reminder triggered for task: ' . $task->title);

            $task->update(['reminder_sent' => true]);
        }

        $this->info('Task reminders checked successfully.');
    }
}
