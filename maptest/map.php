<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>지도 생성하기</title>

</head>
<body>
<!-- 지도를 표시할 div 입니다 -->
<div id="map" style="width:100%;height:500px;"></div>

<script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=15f14e8ea6ccdce536900236805f090e&libraries=services"></script>
<script>
var numOfRows =10;
var addrName = [numOfRows+1];

addrName=<?php echo json_encode($row, JSON_UNESCAPED_UNICODE); ?>;
addrName=JSON.stringify(addrName);

var mapContainer = document.getElementById('map'), // 지도를 표시할 div
    mapOption = {
        center: new daum.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

// 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
var map = new daum.maps.Map(mapContainer, mapOption);
// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
var zoomControl = new daum.maps.ZoomControl();
map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);

// 주소-좌표 변환 객체를 생성합니다
var geocoder = [numOfRows+1];
var markers = [numOfRows+1];
var index = 0;
for(var i = 0; i < numOfRows; ++i){
	geocoder[i] = new daum.maps.services.Geocoder();
	geocoder[i].addr2coord('제주특별자치도 제주시 첨단로 242', function(status, result) {

    // 정상적으로 검색이 완료됐으면
     if (status === daum.maps.services.Status.OK) {

        var coords = new daum.maps.LatLng(result.addr[0].lat, result.addr[0].lng);
		alert(coords);
        // 결과값으로 받은 위치를 마커로 표시합니다
        var marker = new daum.maps.Marker({
            map: map,
            position: coords
        });

        // 인포윈도우로 장소에 대한 설명을 표시합니다
        var infowindow = new daum.maps.InfoWindow({
            content: '<div style="width:150px;text-align:center;padding:6px 0;">우리회사</div>'
        });
        infowindow.open(map, marker);

        // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
        map.setCenter(coords);
    }
});
}

// 지도가 확대 또는 축소되면 마지막 파라미터로 넘어온 함수를 호출하도록 이벤트를 등록합니다
daum.maps.event.addListener(map, 'zoom_changed', function() {
    // 지도의 현재 레벨을 얻어옵니다
    var level = map.getLevel();
    var message = '현재 지도 레벨은 ' + level + ' 입니다';
});
</script>
</body>
</html>
