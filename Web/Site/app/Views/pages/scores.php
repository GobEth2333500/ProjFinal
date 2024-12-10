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
    echo "<h1>SCORE LEADERBOARD<BR>";
    echo "USER, SCORE</h1><BR>";

        for ($i = 0; $i< count($arrayUsers);$i++){

            echo "<h3>USERNAME: ".$arrayUsers[$i]->username;
            echo "  SCORE:".$arrayScore[$i]->score."</h3>";
        }

        
        $session = session();

        $query  = $db->query("SELECT * FROM score where id_user = '$session->id'LIMIT 1" );
        $results = $query->getResult();
        foreach ($results as $row)
        {
            echo"<h3>Your Best Score: ".$row->score . "<br>up input".$row->up_input."<br>down input".$row->down_input."<br>left Input". $row->left_input. "<br>right input".
            $row->right_input. "<br>pressed input".$row->pressed_input."</h3>";
        }


        
?>


    </div>

    <style> 
    .content {
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
    </style>