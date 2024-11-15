<?php 

$db = db_connect();



$query   = $db->query('SELECT * FROM utilisateur');
$results = $query->getResult();

foreach ($results as $row) {
    echo "$row->username"." --> Permission Id "." <input type='number' id='id' name='id' value ='$row->role_id'>
    <br>";

}

echo 'Total Results: ' . count($results);

echo "<form action='/pages/EditRoles' method='post'>

    <label for='username'>Username</label>
    <input type='input' name='username'>
    <br>

    <label for='password'>Password</label>
    <input type='password' name='password'>
    <br>


    <input type='submit' name='submit' value='login'>
</form>";