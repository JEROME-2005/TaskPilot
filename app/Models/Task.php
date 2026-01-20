<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = [
      'user_id',
      'title',
      'description',
      'status',
      'due_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isOverdue()
    {
        return $this->due_date &&
           Carbon::parse($this->due_date)->isPast() &&
           $this->status !== 'completed';
    }

    public function isUrgent()
    {
        return $this->due_date &&
           Carbon::parse($this->due_date)->isToday();
    }
}

