<?php
$db = db_connect();
$query   = $db->query('SELECT id_user,score FROM score  ORDER BY id_user LIMIT 10');

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


        for ($i = 0; $i< count($arrayUsers);$i++){
            echo $arrayUsers[$i]->username;
            echo $arrayScore[$i]->score;
        }



?>