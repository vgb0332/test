<?php
//mysqli_fetch_fields
require("config/config.php");
require("lib/db.php");
$conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
?>
<?php
  mysqli_set_charset($conn,"utf8");
  $sql1 = "SELECT * FROM GN_SS";
  $result1 = mysqli_query($conn,$sql1);
  $row1=mysqli_fetch_all($result1);
  //while($row=mysqli_fetch_all($result1))
  //{
    //echo '<li>'.$row[1][7].'</li>'."\n";
  //}
  /*
  for($i =0; $i < mysqli_num_rows($result1); $i++){
  	echo $row[$i][7]."<br/>";
  }
*/
  echo $row1;
?>
