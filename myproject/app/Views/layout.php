<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Tasks for Today') ?></title>
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Welcome</a> |
        <a href="<?= base_url('tasks') ?>">Task List</a> |
        <a href="<?= base_url('profile') ?>">Profile</a> |
        <a href="<?= base_url('about') ?>">About</a> |
        <?php if (session()->get('isLoggedIn')): ?>
            <a href="<?= base_url('tasks/new') ?>">+ New Task</a> |
            <a href="<?= base_url('logout') ?>">Logout (<?= esc(session()->get('username')) ?>)</a>
        <?php else: ?>
            <a href="<?= base_url('login') ?>">Login</a>
        <?php endif; ?>
    </nav>
    <hr>
    <h1><?= esc($title ?? 'Tasks for Today') ?></h1>

    <?php if (session()->getFlashdata('message')): ?>
        <p style="color:green;"><?= esc(session()->getFlashdata('message')) ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= esc(session()->getFlashdata('error')) ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <ul style="color:red;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
</body>
</html>