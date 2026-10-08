<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<p>Date today: <?= esc($today) ?></p>
<?php if (empty($tasks)): ?>
    <p>No tasks scheduled for today.</p>
<?php else: ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr><th>Title</th><th>Status</th><th>Date</th></tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?= $this->endSection() ?>