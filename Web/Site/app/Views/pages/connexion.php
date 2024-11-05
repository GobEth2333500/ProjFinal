<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="loginAuth" method="post">
    <?= csrf_field() ?>

    <label for="username">Username</label>
    <input type="input" name="username">
    <br>

    <label for="password">Password</label>
    <input type="password" name="password">
    <br>

    <input type="submit" name="submit" value="inscription">
</form>