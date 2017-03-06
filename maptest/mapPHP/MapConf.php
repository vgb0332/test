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
    $parkAddr = array();

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

      array_push($parkAddr, $worksheet->getCell('E'.$row)->getValue());
    }

    /*echo "</table>";

    for($i = 0; $i <= $lastRow-2; $i++){
      echo $parkName[$i]."    ".$parkLat[$i]."      ".$parkLong[$i]."\r\n";
    }
    */
?>
