<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?> | Tasks for Today</title>
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Welcome</a> |
        <a href="<?= base_url('tasks') ?>">Task List</a> |
        <a href="<?= base_url('profile') ?>">Profile</a> |
        <a href="<?= base_url('about') ?>">About</a>
    </nav>
    <hr>

    <?= $this->renderSection('content') ?>
</body>
</html>