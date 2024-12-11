<!doctype html>
<head>

    <title>CodeIgniter Tutorial</title>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<html>


<style> header{
   background-color:black;
}
a{
   color:white;
   text-decoration:none;
}
a{
   color:white;
}
</style>
<header>
    <?php
    $session = session();
     if (isset($session->username))
     {
        $user = $session->username;
        $b = "<br><h3> Bienvenue" . $user."</h3>";
        $id = $session->role_id;
        if ($user != "" or null)
        {
         if ($id == "1")
         {
            $menu= "<a href='home'>Home</a>
            <a href='ajax'>Jeu</a>
            <a href='logout'>Logout</a>
            <a href='admin'>Admin</a>
            <a href='latestInput'>LatestInput</a>
             <a href='scores'>Scores</a><br>" . $b;
         }
         else{
            $menu= "<a href='home'>Home</a>
            <a href='ajax'>Jeu</a>
            <a href='logout'>Logout</a>
            <a href='latestInput'>latestInput</a>
            <a href='scores'>Scores</a><br>" . $b;
         }


        }
        else{
        $menu="<a href='home'>Home</a>
         <a href='login'>Login</a>
         <a href='inscription'>inscription</a>";
        }
     } 
     else
     {
      $menu="<a href='home'>Home</a>
      <a href='login'>Login</a>
      <a href='inscription'>inscription</a>"
      ;
     }
     ?>


<?php echo($menu);?>
</header>

    

