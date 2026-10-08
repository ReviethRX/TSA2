<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<form action="<?= base_url('login') ?>" method="post">
    <?= csrf_field() ?>
    <p>
        <label>Username<br>
        <input type="text" name="username" value="<?= esc(old('username')) ?>"></label>
    </p>
    <p>
        <label>Password<br>
        <input type="password" name="password"></label>
    </p>
    <button type="submit">Log In</button>
</form>
<?= $this->endSection() ?>