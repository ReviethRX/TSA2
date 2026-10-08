<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    // Welcome page (/): only today's tasks
    public function welcome()
    {
        $taskModel = new TaskModel();

        $data = [
            'title' => 'Welcome, Tarnished',
            'today' => date('F j, Y'),
            'tasks' => $taskModel->getTodayTasks(),
        ];

        return view('welcome', $data);
    }

    // Task List page (/tasks): every task, ordered by date
    public function tasks()
    {
        $taskModel = new TaskModel();

        $data = [
            'title' => 'Quest Log',
            'tasks' => $taskModel->getAllTasks(),
        ];

        return view('tasks', $data);
    }

    // Profile page (/profile): the single user
    public function profile()
    {
        $userModel = new UserModel();

        $data = [
            'title' => 'Profile',
            'user'  => $userModel->getDemoUser(),
        ];

        return view('profile', $data);
    }

    // About page (/about): static
    public function about()
    {
        return view('about', ['title' => 'About']);
    }
}