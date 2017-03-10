<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>다음 지도 API</title>
</head>
<body>
	<div id="map" style="width:750px;height:350px;"></div>

	<script src="//apis.daum.net/maps/maps3.js?apikey=a1c3ef261a11c1c6fecd8fb8c8549222"></script>
	<script>
		var mapContainer = document.getElementById('map'), // 지도를 표시할 div
		    mapOption = {
		        center: new daum.maps.LatLng(37.57051, 126.98517), // 지도의 중심좌표
		        level: 4, // 지도의 확대 레벨
		        mapTypeId : daum.maps.MapTypeId.ROADMAP // 지도종류
		    };

		// 지도를 생성한다
		var map = new daum.maps.Map(mapContainer, mapOption);

		// 지도 클릭 이벤트를 등록한다 (좌클릭 : click, 우클릭 : rightclick, 더블클릭 : dblclick)
		daum.maps.event.addListener(map, 'click', function (mouseEvent) {
			console.log('지도에서 클릭한 위치의 좌표는 ' + mouseEvent.latLng.toString() + ' 입니다.');
      alert(mouseEvent.latLng.toString());
    });

	</script>
</body>
</html>
