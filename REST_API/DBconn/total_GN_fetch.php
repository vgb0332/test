<?php
  require("config/config.php");
  require("lib/db.php");
  $conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);

  mysqli_set_charset($conn,"utf8");
        $sql = "SELECT * FROM total_Gangnam";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result))
        {
           echo '<li>'.$row[7].'</li>'."\n";
        }


?>
