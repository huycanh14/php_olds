function initMap() {
  // Map options
  var googleMapOptions = {
    zoom: 16,
    center: { lat: 21.0723936, lng: 105.7738397 }
  }
  // New map
  map = new google.maps.Map(document.getElementById("map"), googleMapOptions);
  // Create the initial InfoWindow.(Nếu ở chế độ Ask (default))
  /*var infoWindow = new google.maps.InfoWindow(
    { content: 'Click "Cho phép" để định vị vị trí của bạn', position: mapCenter });
  infoWindow.open(map);

  //Add sự kiện click để bắt tọa độ
  // Configure the click listener.
  map.addListener('click', function (mapsMouseEvent) {
    // Close the current InfoWindow.
    infoWindow.close();

    //click chuột trái để hiển thị tọa độ
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({ position: mapsMouseEvent.latLng });
    infoWindow.setContent(mapsMouseEvent.latLng.toString());
    infoWindow.open(map);
  });
  // Geolocation. Bắt tọa độ của người dùng
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      // getCurrentPosition: hàm trả về giá trị là vị trí của người dùng
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      infoWindow.setPosition(pos);
      infoWindow.setContent('Vị trí của bạn.');
      infoWindow.open(map);
      map.setCenter(pos);
    }, function () {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  }
  else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
 */




  // Click vào map
  google.maps.event.addListener(map, 'click', function (event) {
    // Add marker
    addMarker({ coords: event.latLng });
  });
  // Array of markers
  var markers = [
    {
      coords: { lat: 21.0755086, lng: 105.7736016 },
      //iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
      content: '<h1>Nem nướng</h1>'
    },
    {
      coords: { lat: 21.0752704, lng: 105.7734919 },
      content: '<h3>Sứa cuốn Ninh Bình</h3><br><h5>36 Lê Văn Hiến</h5><br><h5>lat: 21.0752704, lng: 105.7734919</h5><br><img src="https://i.pinimg.com/originals/b1/9b/93/b19b93f12acc611dd7338491f659dd3d.jpg" style="width:60px; height:60px">'
    },
    {
      coords: { lat: 21.0713982, lng: 105.773805 },
      content: '<h1>Trường giao thông</h1>'
    }
  ];

  // Loop through markers
  for (var i = 0; i < markers.length; i++) {
    // Add marker
    addMarker(markers[i]);
  }

  // Add Marker Function
  function addMarker(props) {
    var marker = new google.maps.Marker({
      position: props.coords,
      map: map,
      //icon:props.iconImage
    });

    // Check for customicon
    if (props.iconImage) {
      // Set icon image
      marker.setIcon(props.iconImage);
    }

    // Check content
    if (props.content) {
      var infoWindow = new google.maps.InfoWindow({
        content: props.content
      });

      marker.addListener('click', function () {
        infoWindow.open(map, marker);
      });
    }
  }

}

