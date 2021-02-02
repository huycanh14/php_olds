<!DOCTYPE html>
<html>
<head>
<title>Vị trí công an giao thông</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAEh62sBH1Lr4_9cpLecHynrjqrzCGjrJc&sensor=false"></script>

<script type="text/javascript">
$(document).ready(function() {
var mapCenter = new google.maps.LatLng(21.002533, 105.641449); //Google map Coordinates
var map;
map_initialize(); // initialize google map
//############### Google Map Initialize ##############
function map_initialize()
{
var googleMapOptions = 
{ 
center: mapCenter, // map center
zoom: 5, //zoom level, 0 = earth view to higher value
maxZoom: 20,
minZoom: 4,
zoomControlOptions: {
style: google.maps.ZoomControlStyle.SMALL //zoom control size
},
scaleControl: true, // enable scale control
mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
};

map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);			   		
// Create the initial InfoWindow.(Nếu ở chế độ Ask (default))
var infoWindow = new google.maps.InfoWindow(
{content: 'Click "Cho phép" để định vị vị trí của bạn', position: mapCenter});
infoWindow.open(map);

//Add sự kiện click để bắt tọa độ
// Configure the click listener.
map.addListener('click', function(mapsMouseEvent) {
	// Close the current InfoWindow.
infoWindow.close();

	//click chuột trái để hiển thị tọa độ
	// Create a new InfoWindow.
	infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
	infoWindow.setContent(mapsMouseEvent.latLng.toString());
	infoWindow.open(map);
});


	// Geolocation. Bắt tọa độ của người dùng
if (navigator.geolocation) 
{
	navigator.geolocation.getCurrentPosition(function(position) {
	// getCurrentPosition: hàm trả về giá trị là vị trí của người dùng
	var pos = {
		lat: position.coords.latitude,
		lng: position.coords.longitude
	};

	infoWindow.setPosition(pos);
	infoWindow.setContent('Vị trí của bạn.');
	infoWindow.open(map);
	map.setCenter(pos);
	}, function() {
	handleLocationError(true, infoWindow, map.getCenter());
	});
} 
else 
{
	// Browser doesn't support Geolocation
	handleLocationError(false, infoWindow, map.getCenter());
}


// CenterMap - Create the DIV to hold the control and call the CenterControl()
// constructor passing in this DIV.
var centerControlDiv = document.createElement('div');
var centerControl = new CenterControl(centerControlDiv, map);

centerControlDiv.index = 1;
map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);

//click để quay về vị trí center map
function CenterControl(controlDiv, map) {

// Set CSS for the control border centermap.
var controlUI = document.createElement('div');
controlUI.style.backgroundColor = '#fff';
controlUI.style.border = '2px solid #fff';
controlUI.style.borderRadius = '3px';
controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
controlUI.style.cursor = 'pointer';
controlUI.style.marginBottom = '22px';
controlUI.style.textAlign = 'center';
controlUI.title = 'Click to recenter the map';
controlDiv.appendChild(controlUI);

// Set CSS for the control interior.
var controlText = document.createElement('div');
controlText.style.color = 'rgb(25,25,25)';
controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
controlText.style.fontSize = '16px';
controlText.style.lineHeight = '38px';
controlText.style.paddingLeft = '5px';
controlText.style.paddingRight = '5px';
controlText.innerHTML = 'Center Map';
controlUI.appendChild(controlText);

// Setup the click event listeners: simply set the map.
controlUI.addEventListener('click', function() {
map.setCenter(mapCenter);
});

}


var cluster = [];
var infowindow = new google.maps.InfoWindow();

	// Change this depending on the name of your PHP file
	downloadUrl('map_process.php', function(data) {
	var xml = data.responseXML;
	var markers = xml.documentElement.getElementsByTagName("marker");
	for (var i = 0; i < markers.length; i++) {
		var team = markers[i].getAttribute("team");
		var address = markers[i].getAttribute("address");
		var mistake = markers[i].getAttribute("mistake");
		var timedate = markers[i].getAttribute("timedate");
		var type = markers[i].getAttribute("type");
		var point = new google.maps.LatLng(
			parseFloat(markers[i].getAttribute("lat")),
			parseFloat(markers[i].getAttribute("lng")));

		var icon =  markers[i].getAttribute("type");
				if(markers[i].getAttribute("type")=="on")icon="image/pin_green.png";
				else icon="image/pin_blue.png"


		var html= "<b>" + 
		markers[i].getAttribute("team") + 
		"</b> <br/>" + 
		markers[i].getAttribute("address")+ 
		"</b> <br/>" + 
		markers[i].getAttribute("timedate");

		var marker = new google.maps.Marker({
		map: map,
		position: point,
		icon: icon,
		});

		google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						// infowindow.setContent("<b>" + markers[i].getAttribute("team") + "</b> <br/>" + markers[i].getAttribute("address")+ "</b> <br/>" + markers[i].getAttribute("timedate")
						// );
						infowindow.setContent('<div class="marker-info-win">'+
						'<div class="marker-inner-win"><span class="info-content">'+
						'<h1 class="marker-heading">'+markers[i].getAttribute("address")+'<br/></h1>'+
						markers[i].getAttribute("timedate")+'<br/><div class="marker-inner-win">'+markers[i].getAttribute("mistake")+'<br/><div class="marker-inner-win">'+markers[i].getAttribute("team")+
						'</span>'+
						'</div></div>');
						infowindow.open(map, marker);

						//This sends information from the clicked icon back to the serverside code
						// document.getElementById("setlatlng").innerHTML = markers[i].getAttribute("address");
					}
				})(marker, i));
		cluster.push(marker);
		}

	var options = {
			// imagePath: '/location-of-cluster-icons/m'
			imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
			
		};

	var mc = new MarkerClusterer(map,cluster,options);
	});




//Right Click to Drop a New Marker
google.maps.event.addListener(map, 'rightclick', function(event) {
//Edit form to be displayed with new marker
var EditForm = '<p><div class="marker-edit"'+
'<form action="ajax-save.php" method="POST" name="SaveMarker" id="SaveMarker">'+

'<label for="pDesc"><span>Địa chỉ :</span><textarea name="pDesc" class="save-desc" placeholder="Nhập địa chỉ" maxlength="150"></textarea></label>'+

'<label for="pMistake"><span>Lỗi :</span><input type="text" name="pMistake" class="save-mistake" placeholder="Nhập lỗi vi phạm" maxlength="40" /></label>'+

'<label for="pTeam"><span>Tổ/đội CAGT :</span><input type="text" name="pTeam" class="save-team" placeholder="Nhập tổ/đội CAGT" maxlength="40" /></label>'+


'<label for="pTimedate"><span>Ngày giờ :</span><input type="datetime" name="pTimedate" class="save-timedate" placeholder="2020/04/05 12:05:03" maxlength="40" /></label>'+

'<label for="pType"><span>Trạng thái :</span> <select name="pType" class="save-type"><option value="on">Đang hoạt động</option>'+
'<option value="off">Đã hoạt động</option></select></label>'+

'</form>'+
'</div></p><button name="save-marker" class="save-marker">Lưu thông tin CAGT</button>';

//Drop a new Marker with our Edit Form
create_marker(event.latLng, 'Cập nhật vị trí CAGT mới', EditForm, true, true, true, "image/pin_green.png");
});				
}

// end map_initialize()


//############### Create Marker Function ##############
function create_marker(MapPos, MapTitle, MapDesc, MapTimedate, InfoOpenDefault, DragAble, Removable, iconPath)
{	  	  		  

//new marker
var marker = new google.maps.Marker({
position: MapPos,
map: map,
draggable:DragAble,
animation: google.maps.Animation.DROP,
//title:"Hello World!",
icon: iconPath
});

//Content structure of info Window for the Markers
var contentString = $('<div class="marker-info-win">'+
'<div class="marker-inner-win"><span class="info-content">'+
'<h1 class="marker-heading">'+MapTitle+'</h1>'+
MapDesc+'<br/><div class="marker-inner-win">'+MapTimedate+
'</span>'+
'</div></div>');	


//Create an infoWindow
var infowindow = new google.maps.InfoWindow();
//set the content of infoWindow
infowindow.setContent(contentString[0]);

//Find remove button in infoWindow		
var saveBtn 	= contentString.find('button.save-marker')[0];

if(typeof saveBtn !== 'undefined') //continue only when save button is present
{
//add click listner to save marker button
google.maps.event.addDomListener(saveBtn, "click", function(event) {
var mReplace = contentString.find('span.info-content'); //html to be replaced after success
var mMistake = contentString.find('input.save-mistake')[0].value; //name input field value
var mDesc  = contentString.find('textarea.save-desc')[0].value; //description input field value
var mType = contentString.find('select.save-type')[0].value; //type of marker
var mTimedate = contentString.find('input.save-timedate')[0].value; //name input field value
var mTeam = contentString.find('input.save-team')[0].value; //name input field value



if(mTimedate =='' || mDesc =='')
{
	alert("Vui lòng nhập đầy đủ địa chỉ và thời gian!");
}else{
	save_marker(marker, mMistake, mDesc, mType,mTeam, mReplace,mTimedate); //call save marker function
}
});
}

//add click listner to save marker button		 
google.maps.event.addListener(marker, 'click', function() {
infowindow.open(map,marker); // click on marker opens info window 
});

if(InfoOpenDefault) //whether info window should be open by default
{
infowindow.open(map,marker);
}
}

//############### Save Marker Function ##############
function save_marker(Marker, mMistake, mAddress, mType, mTeam, replaceWin, mTimedate)
{
//Save new marker using jQuery Ajax
var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
var myData = {mistake : mMistake, address : mAddress, latlang : mLatLang, type : mType,team: mTeam, timedate: mTimedate }; //post variables
console.log(replaceWin);		
$.ajax({
type: "POST",
url: "map_process.php",
data: myData,
success:function(data){
replaceWin.html(data); //replace info window with new html
Marker.setDraggable(false); //set marker to fixed
if(mType=="on")Marker.setIcon('image/pin_green.png'); //replace icon
else Marker.setIcon('image/pin_blue.png');
},
error:function (xhr, ajaxOptions, thrownError){
alert(thrownError); //throw any errors
}
});
}


function bindInfoWindow(marker, map, infoWindow, html) {
google.maps.event.addListener(marker, 'click', function() {
infoWindow.setContent(html);
infoWindow.open(map, marker);

});
}

function downloadUrl(url, callback) {
var request = window.ActiveXObject ?
new ActiveXObject('map_process.php') :
new XMLHttpRequest;

request.onreadystatechange = function() {
if (request.readyState == 4) {
request.onreadystatechange = doNothing;
callback(request, request.status);
}
};

request.open('GET', url, true);
request.send(null);
}

function doNothing() {}





});
</script>

<style type="text/css">
/*Add marker vào database*/
h1.heading{padding:0px;margin: 0px 0px 10px 0px;text-align:center;font: 18px Georgia, "Times New Roman", Times, serif;}

/* width and height of google map */
#google_map {width: 90%; height: 500px;margin-top:0px;margin-left:auto;margin-right:auto;}

.marker_edit {height: 100px; width: 200px;	}
.marker-edit label{display:block;margin-bottom: 5px;}
.marker-edit label span {width: 100px;float: left;}
.marker-edit label input, .marker-edit label select{height: 24px;}
.marker-edit label textarea{height: 60px;}
.marker-edit label input, .marker-edit label select, .marker-edit label textarea {width: 60%;margin:0px;padding-left: 5px;border: 1px solid #DDD;border-radius: 3px;}

/* Marker Info Window */
h1.marker-heading{color: #585858;margin: 0px;padding: 0px;font: 18px "Trebuchet MS", Arial;border-bottom: 1px dotted #D8D8D8;}
div.marker-info-win {max-width: 300px;}
div.marker-info-win p{padding: 0px;margin: 10px 0px 10px 0;}
div.marker-inner-win{padding: 5px;}
button.save-marker, button.remove-marker{border: none;background: rgba(0, 0, 0, 0);color: #00F;padding: 0px;text-decoration: underline;margin-right: 10px;cursor: pointer;
}


</style>
</head>
<body>             
<h1 class="heading">VỊ TRÍ CÔNG AN GIAO THÔNG</h1>
<div style="margin-left: 70px;" align="left">
<p>Click chuột phải để thêm 1 vị trí - Click chuột trái để hiển thị tọa độ</p>
<p>Trạng thái hoặc động của cảnh sát giao thông tại 1 thời điểm cố định:
<img src="image/pin_green.png"> Đang hoạt động  - 
<img src="image/pin_blue.png"> Đã hoạt động
</p>
</div>
<input style="margin-left: 67px; width: 55%;" class="controls" type="text" placeholder="Nhập địa chỉ hoặc khu vực cần tìm kiếm">
<div id="google_map"></div>

<div style="margin: 10px 70px;">
<p id="demo">Click vào button để lấy tọa độ của bạn: </p>
<button onclick="getLocation()">Lấy tọa độ</button>
</div>




<script src="js/markerclustererplus.min.js"></script>

<script type="text/javascript">

//Hiển thị tọa độ người dùng
var x=document.getElementById("demo");
function getLocation()
{
if(navigator.geolocation)
navigator.geolocation.
// getCurrentPosition: hàm trả về tọa độ của người dùng
getCurrentPosition
(showPosition,showError);
else
x.innerHTML="Trình duyệt này không hỗ trợ Geolocation";
}
// showPosition(): Hiển thị kinh độ (longitude) và vĩ độ (latitude) của vị trí người dùng
function showPosition(position)
{
x.innerHTML="Tọa độ của bạn:&nbsp Vĩ độ: "+position.coords.latitude + "&nbsp - &nbsp Kinh độ: " + position.coords.longitude;
}
// showError(): Xử lý lỗi và xử lý tình huống bị người dùng từ chối
function showError(error){
switch(error.code){
case error.PERMISSION_DENIED:
x.innerHTML="Người dùng đã từ chối yêu cầu định vị.";
break;
case error.POSITION_UNAVAILABLE:
x.innerHTML="Không thể lấy được thông tin về vị trí.";
break;
case error.TIMEOUT:
x.innerHTML="Hết thời gian yêu cầu lấy thông tin về vị trí người dùng."
break;
case error.UNKNOWN_ERROR:
x.innerHTML="Không rõ lỗi.";
break;
}
}


</script>

</body>
</html>