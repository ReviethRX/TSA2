<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php $loggedIn = (bool) session()->get('isLoggedIn'); ?>
<?php if ($loggedIn): ?>
    <p><a href="<?= base_url('tasks/new') ?>">+ Add New Task</a></p>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Status</th>
            <?php if ($loggedIn): ?><th>Actions</th><?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['task_date']) ?></td>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <?php if ($loggedIn): ?>
                    <td>
                        <a href="<?= base_url('tasks/edit/' . $task['id']) ?>">Edit</a>
                        <form action="<?= base_url('tasks/delete/' . $task['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Delete this task?');">
                            <?= csrf_field() ?>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>