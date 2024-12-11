<head>

</head>
<style>
.page{
    display:flex;
    flex-direction:column;

   height:80vh;

}
.content{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
</style>
<div class = "page">

<div class="content">
<h2>Connexion</h2>
<?= session()->getFlashdata('error') ?>

<form action="/pages/loginAuth" method="post">

    <label for="username">Username</label>
    <input type="input" name="username">
    <br>

    <label for="password">Password</label>
    <input type="password" name="password">
    <br>


    <input type="submit" name="submit" value="login">
</form>

</div></div>