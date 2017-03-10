<?php
    require_once "Classes/PHPExcel.php";
    $tmpfname = "total_Gangnam.xlsx";
    $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
    $excelObj = $excelReader->load($tmpfname);
    $worksheet = $excelObj->getActiveSheet();
    $lastRow = $worksheet->getHighestRow();
    $name = array();
    $addr = array();
    $area = array();
    $useDay = array();

    /*echo "<table>";*/
    for($row = 2; $row <= $lastRow; $row++){
      /*
      echo "<tr><td>";
      echo $worksheet->getCell('B'.$row)->getValue();
      */
      array_push($name, $worksheet->getCell('J'.$row)->getValue());

      /*
      echo "<tr><td>";
      echo $worksheet->getCell('AG'.$row)->getValue();
      */
      array_push($addr, $worksheet->getCell('H'.$row)->getValue());

      /*
      echo "<tr><td>";
      echo $worksheet->getCell('AH'.$row)->getValue();
      */
      array_push($area, $worksheet->getCell('AB'.$row)->getValue());
      /*echo "<tr><td>";*/

      array_push($useDay, $worksheet->getCell('AX'.$row)->getValue());
    }

    /*echo "</table>";

    for($i = 0; $i <= $lastRow-2; $i++){
      echo $parkName[$i]."    ".$parkLat[$i]."      ".$parkLong[$i]."\r\n";
    }
    */
?>
