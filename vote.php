<?php
$currentid="1";
if(isset($_POST['submit'])){

$sql = "SELECT * from TABLENAME WHERE id='$currentid'  LIMIT 1";
$result = $conn->query($sql);
?>
 <form action='' method='POST'>
               <input type="submit" name="button" id="buttonid" value="test" onclick="<?php $currentid=$currentid+1;?>" />
     </form>
<?php echo $currentid;?>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"].  "<br>";
        //$currentid=$row["id"];
        $currentid=$currentid+1;
        echo "$currentid";
    }
} else {
    echo "0 results";
}
}
?>