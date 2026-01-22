<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'reminder_at',
        'reminder_sent',
        'user_id',
    ];

    protected $casts = [
        'due_date' => 'date',
        'reminder_at' => 'datetime',
        'reminder_sent' => 'boolean',
    ];

    // 🔥 Urgent = due within 24 hours & still pending
    public function isUrgent()
    {
        return $this->status === 'pending'
            && $this->due_date
            && $this->due_date->between(now(), now()->addDay());
    }

    // ⏰ Overdue = past due & still pending
    public function isOverdue()
    {
        return $this->status === 'pending'
            && $this->due_date
            && $this->due_date->isPast();
    }

    // 🔔 Needs reminder now?
    public function needsReminder()
    {
        return $this->reminder_at
            && now()->greaterThanOrEqualTo($this->reminder_at)
            && !$this->reminder_sent
            && $this->status === 'pending';
    }
}
