<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    private function now(): string
    {
        return (new \DateTime('now', new \DateTimeZone('Asia/Manila')))->format('Y-m-d H:i:s');
    }

    private function rules(): array
    {
        return [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'permit_empty|in_list[pending,done]',
        ];
    }

    public function index()
    {
        $model = new TaskModel();
        $data['title'] = 'Task List';
        $data['tasks'] = $model->where('is_archived', 0)
                               ->orderBy('task_date', 'ASC')
                               ->orderBy('id', 'ASC')
                               ->findAll();

        return view('tasks/index', $data);
    }

    public function new()
    {
        return view('tasks/form', [
            'title'  => 'New Task',
            'task'   => null,
            'action' => base_url('tasks/create'),
        ]);
    }

    public function create()
    {
        if (! $this->validate($this->rules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new TaskModel();
        $model->insert([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status') ?: 'pending',
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0,
            'created_at'  => $this->now(),
        ]);

        return redirect()->to('/tasks')->with('message', 'Task added.');
    }

    public function edit($id)
    {
        $model = new TaskModel();
        $task  = $model->find($id);

        if ($task === null || (int) $task['is_archived'] === 1) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('tasks/form', [
            'title'  => 'Edit Task',
            'task'   => $task,
            'action' => base_url('tasks/update/' . $task['id']),
        ]);
    }

    public function update($id)
    {
        $model = new TaskModel();
        $task  = $model->find($id);

        if ($task === null || (int) $task['is_archived'] === 1) {
            throw PageNotFoundException::forPageNotFound();
        }

        if (! $this->validate($this->rules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')->with('message', 'Task updated.');
    }

    public function delete($id)
    {
        $model = new TaskModel();

        if ($model->find($id) === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        // Soft delete: archive instead of removing the row
        $model->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('message', 'Task deleted (archived).');
    }
}