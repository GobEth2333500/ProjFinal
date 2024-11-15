<!doctype html>
<html>
<head>
    <title>CodeIgniter Tutorial</title>
</head>
<header>
    <?php
    $session = session();
     if (isset($session->username))
     {
        $user = $session->username;
     } 
     else
     {
        $user= 1;
     }
     ?>

<a href="home">Home</a>
<a href="logout">Logout</a>
<a href="login">Connexion</a>
<a href="inscription">Inscription</a>
<?php echo($user);?>
</header>
<body>
    

