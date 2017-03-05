<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> TEST </title>
  </head>
  <body>
    <?php
        require_once "Classes/PHPExcel.php";
        $tmpfname = "park.xlsx";
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getActiveSheet();
        $lastRow = $worksheet->getHighestRow();
        $parkName = array();
        $parkLat = array();
        $parkLong = array();

        /*echo "<table>";*/
        for($row = 2; $row <= $lastRow; $row++){
          /*
          echo "<tr><td>";
          echo $worksheet->getCell('B'.$row)->getValue();
          */
          array_push($parkName, $worksheet->getCell('B'.$row)->getValue());

          /*
          echo "<tr><td>";
          echo $worksheet->getCell('AG'.$row)->getValue();
          */
          array_push($parkLat, $worksheet->getCell('AG'.$row)->getValue());

          /*
          echo "<tr><td>";
          echo $worksheet->getCell('AH'.$row)->getValue();
          */
          array_push($parkLong, $worksheet->getCell('AH'.$row)->getValue());
          /*echo "<tr><td>";*/
        }

        /*echo "</table>";

        for($i = 0; $i <= $lastRow-2; $i++){
          echo $parkName[$i]."    ".$parkLat[$i]."      ".$parkLong[$i]."\r\n";
        }
        */
    ?>
    <script>
        document.write("HI there:  ");
        length = <?php echo $lastRow-2 ?>;
        document.write(length);

        var parkName = <?php echo json_encode($parkName); ?>;
        var parkLat = <?php echo json_encode($parkLat); ?>;
        var parkLong = <?php echo json_encode($parkLong); ?>;

        document.write(typeof(parkName[0] ));
        parkLat[0] = Number(parkLat[0]);
        document.write(typeof(parkLat[0]));
    </script>
  </body>
</html>
