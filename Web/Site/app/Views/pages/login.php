<h2>Connexion</h2>

<?= session()->getFlashdata('error') ?>

<form action="loginAuth" method="post">

    <label for="username">Username</label>
    <input type="input" name="username">
    <br>

    <label for="password">Password</label>
    <input type="password" name="password">
    <br>


    <input type="submit" name="submit" value="login">
</form>