<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>주소로 장소 표시하기</title>

</head>
<body>
  <?php
    require("gangnamPHP.php");
   ?>

<div id="map" style="width:100%;height:500px;"></div>

<script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=15f14e8ea6ccdce536900236805f090e&libraries=services"></script>
<script>

var name = <?php echo json_encode($name, JSON_UNESCAPED_UNICODE); ?>;
var addr = <?php echo json_encode($addr, JSON_UNESCAPED_UNICODE); ?>;
var area = <?php echo json_encode($area, JSON_UNESCAPED_UNICODE); ?>;
var useDay = <?php echo json_encode($useDay, JSON_UNESCAPED_UNICODE); ?>;

alert(addr[0]);
var mapContainer = document.getElementById('map'), // 지도를 표시할 div
    mapOption = {
        center: new daum.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

// 지도를 생성합니다
var map = new daum.maps.Map(mapContainer, mapOption);

// 주소-좌표 변환 객체를 생성합니다
var geocoder = new daum.maps.services.Geocoder();

// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
var zoomControl = new daum.maps.ZoomControl();
var current_zoom_level = map.getLevel();
map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);
var marker;
// 주소로 좌표를 검색합니다

    geocoder.addr2coord(addr[0], function(status, result) {
      var imageSrc = 'http://localhost/maptest/REST/marker.png', // 마커이미지의 주소입니다
          imageSize = new daum.maps.Size(30, 30), // 마커이미지의 크기입니다
          imageOption = {offset: new daum.maps.Point(15, 69)}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

      // 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
      var markerImage = new daum.maps.MarkerImage(imageSrc, imageSize, imageOption),
          markerPosition = new daum.maps.LatLng(37.54699, 127.09598); // 마커가 표시될 위치입니다


      // 정상적으로 검색이 완료됐으면
       if (status === daum.maps.services.Status.OK) {
          var coords = new daum.maps.LatLng(result.addr[0].lat, result.addr[0].lng);
          // 결과값으로 받은 위치를 마커로 표시합니다
            marker = new daum.maps.Marker({
              map: map,
              title: addr[0],
              position: coords,
              image: markerImage
          });
          marker.setMap(null);
          daum.maps.event.addListener(marker, 'click', function(){
          alert(addr);
        });

      // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
          map.setCenter(coords);
      }
    });
// 지도가 확대 또는 축소되면 마지막 파라미터로 넘어온 함수를 호출하도록 이벤트를 등록합니다
daum.maps.event.addListener(map, 'zoom_changed', function() {
    // 지도의 현재 레벨을 얻어옵니다
    current_zoom_level = map.getLevel();
    if(current_zoom_level == 1) {
    //  map.setLevel(1);
      marker.setMap(map);
    }
    else{
      marker.setMap(null);
    }
    //alert(current_zoom_level);
});
</script>
</body>
</html>
