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
        if ($user != "" or null)
        {
         
          $menu= "<a href='home'>Home</a>
         <a href='logout'>Logout</a>" . "Bienvenue" . $user;
        }
        else{
        $menu="<a href='home'>Home</a>
         <a href='login'>Login</a>
         <a href='inscription'>Inscription</a>";
        }
     } 
     else
     {
      $menu="<a href='home'>Home</a>
      <a href='login'>Login</a>
      <a href='inscription'>Inscription</a>";
     }
     ?>


<?php echo($menu);?>
</header>
<body>
    

