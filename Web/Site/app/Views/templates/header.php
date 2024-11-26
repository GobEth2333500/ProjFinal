<!doctype html>
<html>
<head>
    <title>CodeIgniter Tutorial</title>
</head>
<style>
header{
   display:flex;
   justify-content:center;
   position:Sticky;
   top:0px;
}
a{
   padding-right: 30px;
   padding-left: 30px;
  
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
            <a href='logout'>Logout</a>
            <a href='admin'>Admin</a>
            <a href='latestInput'>latestInput</a>" . $b;
         }
         else{
            $menu= "<a href='home'>Home</a>
            <a href='logout'>Logout</a>
            <a href='latestInput'>latestInput</a>" . $b;
         }


        }
        else{
        $menu="<a href='home'>Home</a>
         <a href='login'>Login</a>
         <a href='inscription'>inscription</a>
         <a href='latestInput'>latestInput</a>";
        }
     } 
     else
     {
      $menu="<a href='home'>Home</a>
      <a href='login'>Login</a>
      <a href='inscription'>inscription</a>
      <a href='latestInput'>latestInput</a>"
      ;
     }
     ?>


<?php echo($menu);?>
</header>

    

