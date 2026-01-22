<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $todayTasks = $user->tasks()
            ->whereDate('due_date', Carbon::today())
            ->where('status', '!=', 'completed')
            ->get();

        $urgentTasks = $user->tasks()
            ->where('priority', 'urgent')
            ->where('status', '!=', 'completed')
            ->get();

        $overdueTasks = $user->tasks()
            ->where('due_date', '<', Carbon::now())
            ->where('status', '!=', 'completed')
            ->get();

        $reminderTasks = Task::whereNotNull('reminder_at')
            ->where('reminder_at', '<=', now())
            ->where('status', 'pending')
            ->get();

        return view('dashboard', compact(
            'todayTasks',
            'urgentTasks',
            'overdueTasks',
            'reminderTasks'
        ));
    }
}
