<style>
.page{ 

   height:80vh;


}
.content{
    display:flex;
   flex-direction:column;
   justify-content:center;
   align-items:center;
}
h3{
    margin:0;
}
form{
    display:Flex;
    flex-direction:column;
    justify-self:center;
    align-self:center;
}

</style>

<head>

</head>

<div class="page">
<div class="content">
<?php 

$db = db_connect();



$query   = $db->query('SELECT * FROM utilisateur');
$results = $query->getResult();
echo "<form action='/pages/EditRoles' method='post'>";
$nb = 0;
echo "<h3>1 = Admin
      2 = visiteur
      3 = Utilisateur</h3><br>";
foreach ($results as $row) 
{
   
    echo " <input type='hidden' name='user[$nb]' value='$row->username'/>"."<h3>$row->username"
    ." --> Permission Id </h3>"." <input type='number' name='id[$nb]' value ='' placeholder = '$row->role_id'>
    ";
    $nb ++;
}
echo "<input type='hidden' name='nb' value='$nb'/>"."<h3>Total Results: " . count($results)."</h3>";
echo " <input type='submit' name='submit' value='Submit Changes'>
</form>";

?>

</div>
</div>
