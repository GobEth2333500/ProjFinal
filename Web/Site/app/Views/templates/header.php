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
        $id = $session->role_id;
        if ($user != "" or null)
        {
         if ($id == "1")
         {
            $menu= "<a href='home'>Home</a>
            <a href='logout'>Logout</a>
            <a href='admin'>Admin</a>" . "<h3> Bienvenue" . $user."</h3>";
         }
         else{
            $menu= "<a href='home'>Home</a>
            <a href='logout'>Logout</a>" . "<h3> Bienvenue" . $user."</h3>";
         }


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
    

