<?php
include('dbcontroller.php');

 if(!empty($_POST["cid"])) 
{
 $id=intval($_POST['cid']);
 $stmt = $DB_con->prepare("SELECT * FROM subject WHERE cshort = :id");
 $stmt->execute(array(':id' => $id));

 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
 
 echo strtoupper($row['sub1']."+".$row['sub2']."+ ".$row['sub3']); 

 }
 
 }

?>