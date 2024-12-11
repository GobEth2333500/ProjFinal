<head>

</head>
<style>
.page{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
   height:80vh;

}
.content2{
    justify-content:center;
    align-items:center;

}
.lb{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    background-color:gray;
    padding:2vh;
    border-radius:5vh;
}
h2,h3{
    margin:0.1vh;
  
}

.h3{
    display:flex;
   justify-content:center;
   align-items:center;
   background-color:lightgray;
    border-radius:0.5vh;
    width:10vh;
}
</style>
<div class = "page">
<div class = "content">

<?php
$db = db_connect();
$query   = $db->query('SELECT id_user,score FROM score  ORDER BY score DESC LIMIT 10');

$arrayScore = array();
$arrayUsers = array();

    $results = $query->getResult();
    foreach ($results as $row) 
    {
        array_push($arrayScore , $row);
    }

    $joe = count($arrayScore);
    foreach ($arrayScore as $c)
    {
        (int)$int = $c->id_user;
        $query  = $db->query("SELECT username FROM utilisateur where id = '$int'LIMIT 10" );
        $results = $query->getResult();
        foreach($results as $row)
        {
            array_push($arrayUsers , $row);
        }
 
    }
    echo "<div class = 'lb'>";
    echo "<h1>SCORE LEADERBOARD";

        for ($i = 0; $i< count($arrayUsers);$i++){

            echo "<h2>USERNAME: </h2><div class = 'h3'><h3>".$arrayUsers[$i]->username."</h3></div>";
            echo "<h2>SCORE: </h2><div class = 'h3'><h3>".$arrayScore[$i]->score."</h3></div>";
        }

        
        $session = session();

        $query  = $db->query("SELECT * FROM score where id_user = '$session->id'LIMIT 1" );
        $results = $query->getResult();?>
     
        <?php 
        
        foreach ($results as $row)
        {
            echo"<h2>Your Best Score: </h2><div class = 'h3'><h3>".$row->score . "</h3></div><div class = 'content2'>up input: <div class = 'h3'><h3>".$row->up_input."</h3></div>down input: <div class = 'h3'><h3>".$row->down_input."</h3></div>left Input: <div class = 'h3'><h3>". $row->left_input. "</h3></div>right input: <div class = 'h3'><h3>".
            $row->right_input. "</h3></div>pressed input: <div class = 'h3'><h3>".$row->pressed_input."</h3></div>";
        }


        
?>
  </div>
    </div>
    </div>
    </div>


