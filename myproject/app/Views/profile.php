<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1><?= esc($title) ?></h1>

    <?php if ($user): ?>
        <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
        <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <p><strong>Member Since:</strong> <?= esc($user['created_at']) ?></p>
    <?php else: ?>
        <p>No user record found.</p>
    <?php endif; ?>
<?= $this->endSection() ?>