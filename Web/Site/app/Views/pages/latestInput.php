<head>
     <meta http-equiv="refresh" content="222">
<head>
<style>
.page{
    display:flex;
    flex-direction:column;

   height:80vh;

}
.content{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

</style>
<div class="page">
<div class="content">



<h1> Latest 10 inputs </h1>
<div id = "table">
<table>
<tr>
    <th>Inputs</th>
</tr>
    

<?php
$db = db_connect();
$query   = $db->query('SELECT * FROM input  ORDER BY inputName DESC LIMIT 10');


    $results = $query->getResult();
    foreach ($results as $row) 
    {
        echo("<tr><td>$row->inputName</td></tr>");
    }


?>
</table>
</div>
</div>
</div>