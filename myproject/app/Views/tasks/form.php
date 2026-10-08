<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<form action="<?= $action ?>" method="post">
    <?= csrf_field() ?>
    <p>
        <label>Title<br>
        <input type="text" name="title" value="<?= esc(old('title', $task['title'] ?? '')) ?>"></label>
    </p>
    <p>
        <label>Task Date<br>
        <input type="date" name="task_date" value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>"></label>
    </p>
    <p>
        <label>Status<br>
        <?php $status = old('status', $task['status'] ?? 'pending'); ?>
        <select name="status">
            <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>pending</option>
            <option value="done" <?= $status === 'done' ? 'selected' : '' ?>>done</option>
        </select></label>
    </p>
    <button type="submit"><?= $task ? 'Update Task' : 'Save Task' ?></button>
    <a href="<?= base_url('tasks') ?>">Cancel</a>
</form>
<?= $this->endSection() ?>