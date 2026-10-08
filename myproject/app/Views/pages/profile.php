<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php if ($user): ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>Username</th><td><?= esc($user['username']) ?></td></tr>
        <tr><th>Full Name</th><td><?= esc($user['full_name']) ?></td></tr>
        <tr><th>Email</th><td><?= esc($user['email']) ?></td></tr>
        <tr><th>Created At</th><td><?= esc($user['created_at']) ?></td></tr>
    </table>
<?php else: ?>
    <p>No user record found.</p>
<?php endif; ?>
<?= $this->endSection() ?>