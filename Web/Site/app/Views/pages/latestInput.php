<head>
     <meta http-equiv="refresh" content="222">
<head>
<style>

td {
    
  border-bottom: 1px solid #ddd;
}
td:hover {background-color: #D3D3D3;}
#content{
    display:flex;
    flex-direction:column;
    align-content:center;
}
#table{
width: 100%;
}
</style>

<div id="content">
<h1> Latest 10 inputs </h1>
<div id = "table">
<table>
<tr>
    <th>Inputs</th>
</tr>
    

<?php
$db = db_connect();
$query   = $db->query('SELECT * FROM input  ORDER BY input DESC LIMIT 10');


    $results = $query->getResult();
    foreach ($results as $row) 
    {
        echo("<tr><td>$row->input</td></tr>");
    }


?>
</table>
</div>
</div>