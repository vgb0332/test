<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  </head>
<body>
  <p>THIS IS FOR TEST</p>

  <?php
    /* PHP 샘플 코드 */
    $ch = curl_init();
    $url = 'http://apis.data.go.kr/1611000/BldRgstService/getBrRecapTitleInfo'; /*URL*/
    $queryParams = '?' . urlencode('ServiceKey') . '=oGtUrVlMjVSHd81jyy%2BVZ1WhUbIlI4ZIJQromneMKUaymmZjRFePLqq0vD7D4gJd43cC%2BFTEoeWTYf9BXTkFtw%3D%3D'; /*Service Key*/
    $queryParams .= '&' . urlencode('bjdongCd') . '=' . urlencode('10300'); /*행정표준코드*/
    $queryParams .= '&' . urlencode('platGbCd') . '=' . urlencode('0'); /*0:대지 1:산 2:블록*/
    $queryParams .= '&' . urlencode('bun') . '=' . urlencode('0012'); /*번*/
    $queryParams .= '&' . urlencode('ji') . '=' . urlencode('0000'); /*지*/
    $queryParams .= '&' . urlencode('startDate') . '=' . urlencode(''); /*YYYYMMDD*/
    $queryParams .= '&' . urlencode('endDate') . '=' . urlencode(''); /*YYYYMMDD*/
    $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /*페이지당 목록 수*/
    $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /*페이지번호*/
    $queryParams .= '&' . urlencode('sigunguCd') . '=' . urlencode('11680'); /*행정표준코드*/

    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($ch);

    curl_close($ch);
    //echo $response;
    $json = json_encode(new SimpleXMLElement($response), JSON_UNESCAPED_UNICODE);
    //var_dump($json);
    $result = json_decode($json, true);
  //  var_dump($result);
    //var_dump($result);
    var_dump($result);
    //echo("길이: ". count($result["body"]["items"]));
    //echo("주소: ".$result["body"]["items"]["item"]["platPlc"]);
    //echo("  연면적: ".$result["body"]["items"]["item"]["totArea"]);
    //echo("  사용승인일: ".$result["body"]["items"]["item"]["useAprDay"][0]);

    //$addr = $result["body"]["items"]["item"]["platPlc"];
    //var_dump($addr);

//    var_dump($result["body"]["items"]["item"]["useAprDay"][0]);
    //echo($result["header"]["resultCode"]);
    ?>

  <p>it's about script testing...  </p>
  <script type="text/javascript">
    var addr = <?php echo $addr; ?>;
  </script>
</body>
</html>
