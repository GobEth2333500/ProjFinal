<style>

</style>
<div class="content">
<?php 

$db = db_connect();



$query   = $db->query('SELECT * FROM utilisateur');
$results = $query->getResult();
echo "<form action='/pages/EditRoles' method='post'>";
$nb = 0;
echo "<h3>1 = Admin<br>
      2 = visiteur<br>
      3 = Utilisateur</h3>";
foreach ($results as $row) 
{
   
    echo " <input type='hidden' name='user[$nb]' value='$row->username'/>"."$row->username"
    ." --> Permission Id "." <input type='number' name='id[$nb]' value ='' placeholder = '$row->role_id'>
    <br>";
    $nb ++;
}
echo "<input type='hidden' name='nb' value='$nb'/>"."Total Results: " . count($results);
echo " <input type='submit' name='submit' value='login'>
</form>";

?>

</div>

