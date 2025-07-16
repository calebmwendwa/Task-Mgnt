<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $guarded = ['id'];

    protected $table = 'task_to_do';
    public static function getTaskStatus()
    {
        $statuses = [
            'new' => __('New'),
            'in_progress' => __('In Progress'),
            'on_hold' => __('On Hold'),
            'completed' => __('Completed'),
        ];

        return $statuses;
    }

    public static function getTaskPriorities()
    {
        $priorities = [
            'low' => __('Low'),
            'medium' => __('Medium'),
            'high' => __('High'),
            'urgent' => __('Urgent'),
        ];

        return $priorities;
    }

}
