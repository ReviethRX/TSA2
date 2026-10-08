<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1><?= esc($title) ?></h1>
    <p>Today is <?= esc($today) ?></p>

    <?php if (empty($tasks)): ?>
        <p>No quests for today. Rest at a Site of Grace.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li><?= esc($task['title']) ?> (<?= esc($task['status']) ?>)</li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?= $this->endSection() ?>