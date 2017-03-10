<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>건축물 대장 주소로 장소 표시하기</title>

</head>
<body>
<div id="map" style="width:100%;height:500px;"></div>

<script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=15f14e8ea6ccdce536900236805f090e&libraries=services"></script>
<script>
  var mapContainer = document.getElementById('map'), // 지도를 표시할 div
      mapOption = {
          center: new daum.maps.LatLng(37.5173319259, 127.0473774084), // 지도의 중심좌표
          level: 3 // 지도의 확대 레벨
      };

  // 지도를 생성합니다
  var map = new daum.maps.Map(mapContainer, mapOption);
  // 주소-좌표 변환 객체를 생성합니다
  var geocoder = new daum.maps.services.Geocoder();
  // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
  var zoomControl = new daum.maps.ZoomControl();
  map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);
  // 결과값으로 받은 위치를 마커로 표시합니다

//////////////////////////여기가 너가 바꿔야될부분!)/////////////////////////////////////////
  var numOfRows = 2;
//////////////////////////////////////////////////////////////////////////////////////////

  var addrName = ["서울특별시 강남구 개포동 173번지", "서울특별시 강남구 개포동 1239-12번지"];
  var marker = [numOfRows+1];
  var ind = 0;
  for(var i = 0; i < numOfRows; ++i){
    geocoder.addr2coord(addrName[i], function(status, result) {      // 정상적으로 검색이 완료됐으면
      if (status === daum.maps.services.Status.OK) {
        var coords = new daum.maps.LatLng(result.addr[0].lat, result.addr[0].lng);;
        marker[ind] = new daum.maps.Marker({
            //map: map,
            position: coords,
            title: addrName[ind]
          });

          //marker.setTitle(addrName[i]);
          daum.maps.event.addListener(marker[ind], 'click', function(){
            alert(this.getTitle());
            //////////////////////////////////////////////////////
            /* 여기 부분이 정보 표시해 줘야 하는 부분 */
            ///////////////////////////////////////////////////////
          });
          // map.setCenter(coords);
          ind++;
        }
      else{
        alert("검색 대상을 찾을 수 없습니다");
        }
    });
  }
  // 지도가 확대 또는 축소되면 마지막 파라미터로 넘어온 함수를 호출하도록 이벤트를 등록합니다
  daum.maps.event.addListener(map, 'zoom_changed', function() {
      // 지도의 현재 레벨을 얻어옵니다
      var level = map.getLevel();

      if(level == 1 || level == 2) {
        //marker.setMap(map);
        //alert("i'm in 1");
        showOnMap();
      }
      else{
        for(var i = 0; i < numOfRows; ++i){
          marker[i].setMap(null);
        }
      }
  });

  function showOnMap(){
    // 주소로 좌표를 검색합니다
    for(var i = 0 ; i < numOfRows; ++i){
      marker[i].setMap(map);
    }
  }
</script>
</body>
</html>
