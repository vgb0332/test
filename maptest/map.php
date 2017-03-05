<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>여러개 마커 표시하기</title>
    <style>
    .wrap {position: absolute;left: 0;bottom: 40px;width: 288px;height: 132px;margin-left: -144px;text-align: left;overflow: hidden;font-size: 12px;font-family: 'Malgun Gothic', dotum, '돋움', sans-serif;line-height: 1.5;}
    .wrap * {padding: 0;margin: 0;}
    .wrap .info {width: 286px;height: 120px;border-radius: 5px;border-bottom: 2px solid #ccc;border-right: 1px solid #ccc;overflow: hidden;background: #fff;}
    .wrap .info:nth-child(1) {border: 0;box-shadow: 0px 1px 2px #888;}
    .info .title {padding: 5px 0 0 10px;height: 30px;background: #eee;border-bottom: 1px solid #ddd;font-size: 18px;font-weight: bold;}
    .info .close {position: absolute;top: 10px;right: 10px;color: #888;width: 17px;height: 17px;background: url('http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/overlay_close.png');}
    .info .close:hover {cursor: pointer;}
    .info .body {position: relative;overflow: hidden;}
    .info .desc {position: relative;margin: 13px 0 0 90px;height: 75px;}
    .desc .ellipsis {overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
    .desc .jibun {font-size: 11px;color: #888;margin-top: -2px;}
    .info .img {position: absolute;top: 6px;left: 5px;width: 73px;height: 71px;border: 1px solid #ddd;color: #888;overflow: hidden;}
    .info:after {content: '';position: absolute;margin-left: -12px;left: 50%;bottom: 0;width: 22px;height: 12px;background: url('http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/vertex_white.png')}
    .info .link {color: #5085BB;}
</style>
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

<div id="map" style="width:100%;height:800px;"></div>

<script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=15f14e8ea6ccdce536900236805f090e"></script>
<script>

//document.write("HI there:  ");
//length = <?php echo $lastRow-2 ?>;
//document.write(length);

var parkName = <?php echo json_encode($parkName); ?>;
var parkLat = <?php echo json_encode($parkLat); ?>;
var parkLong = <?php echo json_encode($parkLong); ?>;

//for(var i = 0; i < parkName.length; ++i)  document.write(parkName[i]);

var mapContainer = document.getElementById('map'), // 지도를 표시할 div
    mapOption = {
        center: new daum.maps.LatLng(37.4914910, 126.8883000), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

var map = new daum.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

// 마커를 표시할 위치와 title 객체 배열입니다
var positions = [];
for(var i = 0; i < parkName.length; ++i){
  positions.push(
    {
    title:parkName[i],
    latlng: new daum.maps.LatLng(Number(parkLat[i]), Number(parkLong[i]))
    }
  )
}
/*
var positions = [
    {
        title: parkName[0],
        latlng: new daum.maps.LatLng(Number(parkLat[0]), Number(parkLong[0]))
    },
    {
        title: parkName[1],
        latlng: new daum.maps.LatLng(Number(parkLat[1]), Number(parkLong[1]))
    },
];
*/
// 마커 이미지의 이미지 주소입니다
var imageSrc = "http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png";

// 마커 이미지의 이미지 크기 입니다
var imageSize = new daum.maps.Size(24, 35);

// 마커 이미지를 생성합니다
var markerImage = new daum.maps.MarkerImage(imageSrc, imageSize);

    // 마커를 생성합니다
    /*
    var marker = [];
    marker.push(new daum.maps.Marker({
      map: map, // 마커를 표시할 지도
      position: positions[0].latlng, // 마커를 표시할 위치
      title : positions[0].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
      image : markerImage // 마커 이미지
    });
    */
        var marker = [parkName.length+1];
        var overlay = [parkName.legnth+1];
        var i = 0;
    marker[i] = new daum.maps.Marker({
        map: map, // 마커를 표시할 지도
        position: positions[i].latlng, // 마커를 표시할 위치
        title : positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
        image : markerImage // 마커 이미지
    });

    marker[i+1] = new daum.maps.Marker({
        map: map, // 마커를 표시할 지도
        position: positions[i+1].latlng, // 마커를 표시할 위치
        title : positions[i+1].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
        image : markerImage // 마커 이미지
    });
    var content = '<div class="wrap">' +
            '    <div class="info">' +
            '        <div class="title">' +
            '            카카오 스페이스닷원' +
            '            <div class="close" onclick="closeOverlay()" title="닫기"></div>' +
            '        </div>' +
            '        <div class="body">' +
            '            <div class="img">' +
            '                <img src="http://cfile181.uf.daum.net/image/250649365602043421936D" width="73" height="70">' +
            '           </div>' +
            '            <div class="desc">' +
            '                <div class="ellipsis">제주특별자치도 제주시 첨단로 242</div>' +
            '                <div class="jibun ellipsis">(우) 63309 (지번) 영평동 2181</div>' +
            '                <div><a href="http://www.kakaocorp.com/main" target="_blank" class="link">홈페이지</a></div>' +
            '            </div>' +
            '        </div>' +
            '    </div>' +
            '</div>';

            // 마커 위에 커스텀오버레이를 표시합니다
            // 마커를 중심으로 커스텀 오버레이를 표시하기위해 CSS를 이용해 위치를 설정했습니다
    var overlay = new daum.maps.CustomOverlay({
          content: content,
          map: map,
          position: marker[i].getPosition()
      });

      var overlay2 = new daum.maps.CustomOverlay({
            content: content,
            map: map,
            position: marker[i+1].getPosition()
        });

    daum.maps.event.addListener(marker[i], 'click', function() {
        overlay.setMap(map);
    });

    daum.maps.event.addListener(marker[i+1], 'click', function() {
        overlay2.setMap(map);
    });
    // 커스텀 오버레이를 닫기 위해 호출되는 함수입니다
    function closeOverlay() {
    overlay.setMap(null);
    }


</script>

</body>
</html>
