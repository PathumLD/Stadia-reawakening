<?php

//load.php

$connect = new PDO('mysql:host=127.0.0.1:3300;dbname=stadia-new', 'root', '');

$data = array();

$query = "SELECT * FROM adminslottennis ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'day'   => $row["day"],
  'start_time'   => $row["start_time"],
  'end_time'   => $row["end_time"]
 );
}

echo json_encode($data);

?>