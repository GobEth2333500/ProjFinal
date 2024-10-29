<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/news" method="post">
    <?= csrf_field() ?>

    <label for="username">Username</label>
    <input type="input" name="username" value="<?= set_value('title') ?>" required>
    <br>

    <label for="password">Password</label>
    <input type="password" name="password" value="<?= set_value('title') ?>" required>
    <br>

    <input type="submit" name="submit" value="Create news item">
</form>