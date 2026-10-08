<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['title', 'status', 'task_date', 'created_at'];

    // Only tasks scheduled for today
    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))->findAll();
    }

    // Every task, ordered by date
    public function getAllTasks()
    {
        return $this->orderBy('task_date', 'ASC')->findAll();
    }
}