<?php

//load.php

// $connect = new PDO('mysql:host=127.0.0.1:3300;dbname=stadia-new', 'root', '');
$connect = new PDO('mysql:host=localhost;dbname=stadia-new', 'root', '');

$data = array();

$query = "SELECT * FROM slots_tennis WHERE status = 1 ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"],
  'email' => $row['email']
 );
}

echo json_encode($data);

?>