
<h2>Inscription</h2>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>
<div class="content">
<form action="create_user" method="post">
    <?= csrf_field() ?>

    <label for="username">Username</label>
    <input type="input" name="username" value="<?= set_value('title') ?>">
    <br>

    <label for="password">Password</label>
    <input type="password" name="password" value="<?= set_value('title') ?>">
    <br>

    <label for="password_verif">Password Verif</label>
    <input type="password" name="password_verif" value="<?= set_value('title') ?>">
    <br>

    <input type="submit" name="submit" value="inscription">
</form>
</div>