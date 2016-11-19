<?php
	include 'myconnect.php';
  session_start("session2");
  if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "select * from theme";
    $query = mysqli_query($conn, $sql);
    $data = array();
		if($query){
      while($row = mysqli_fetch_array($query)){
        $data[] = array('start_date' => $row['start_dt'], 'end_date' => $row['end_dt'], 'title' => $row['th_title'], 'id' => $row['th_id']);
      }
    } else {
      echo mysql_error();
    }
    header('Content-Type: application/json');
    echo json_encode($data);
  }
?>
