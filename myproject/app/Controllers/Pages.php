<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function index()
    {
        $today = (new \DateTime('now', new \DateTimeZone('Asia/Manila')))->format('Y-m-d');

        $model = new TaskModel();
        $data['title what'] = null;
        unset($data['title what']);
        $data['title severity'] = null;
        unset($data['title severity']);
        $data['title'] = "Today's Tasks";
        $data['today'] = $today;
        $data['tasks'] = $model->where('task_date', $today)
                               ->where('is_archived', 0)
                               ->orderBy('id', 'ASC')
                               ->findAll();

        return view('pages/welcome', $data);
    }

    public function profile()
    {
        $model = new UserModel();
        $data['title'] = 'Profile';
        $data['user']  = $model->first();

        return view('pages/profile', $data);
    }

    public function about()
    {
        return view('pages/about', ['title' => 'About']);
    }
}