<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1><?= esc($title) ?></h1>

    <table border="1" cellpadding="6">
        <tr>
            <th>Date</th>
            <th>Task</th>
            <th>Status</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['task_date']) ?></td>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?= $this->endSection() ?>