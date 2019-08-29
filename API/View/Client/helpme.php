<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  text-align: center;
  padding: 2%;
  color: #ff3300;
}
.footer
{
    width: 100%;
    height: 130px;
    position: fixed;
    bottom: 0;
    left: 0;
	background: linear-gradient(to right, #ff3300 0%, #ff9900 100%);
    overflow-x: hidden;
    text-align: center;
    padding-top: 10px;
	color: white;
}
.top-row
{
    width: 100%;
    height: auto;
    left: 0;
    background: transparent;
    text-align: center;
    padding-top: 10px;
        
}
.image-row
{
    width: 100%;
    height: auto;
    left: 0;
    background: transparent;
    text-align: center;
    padding-top: 10px;
}
.bottom-row
{
    width: 100%;
    height: auto;
    left: 0;
    background: transparent;
    text-align: center;
    padding: 10px 0;
}
.line
{
    background-color: silver;
	background: linear-gradient(to left,white, #ff3300, white);
    height: 2px;
    width: 40%;
    margin: 0 auto;
    text-align: center;
}
.tab {
  list-style: none;
  background-color: #484A4D;
  background: linear-gradient(to bottom,gray, silver);
  width: 10%;
  height: 50px;
  font-weight: 300;
  font-size: x-small;
  display: block;
  position: fixed;
  border-radius: 20px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}
.left-tab{
    background: transparent;
    width: 20%;
    height: 100%;
    float: left;
}
.right-tab{
    background: transparent;
    width: 80%;
    height: 100%;
    float: right;
}

.tab-group:after {
  content: "";
  display: table;
  clear: both;
  height: 50px;
}
.tab li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: transparent;
  color: #000;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  transition: .5s ease;
  height: 50px;
}
.tab li a:hover {
  background: #484A4D;
  color: #fff;
  background: linear-gradient(to bottom, silver , #E3E5E5);
  border-radius: 20px;
}
.tab .active a {
  background: transparent;
  color: #000;
}

.tab-content > div:last-child {
  display: none;
}
.button
{
  background: linear-gradient(to right, #ff3300 0%);
  color: black;
  border: 1px solid silver;
  height: 60px;
  width: 300px;
  border-radius: 10px;
  font-weight: 600;
  font-size: x-large;
}
.button:hover
{
  background: none;
  background-image: none;
   background-color: #ff9900;
   background: linear-gradient(to right, #ff3300 0%, #ff9900 100%);
   color: whitesmoke;
   border: none;
   font-weight: 600;
}
.home-tab
{
  list-style: none;
  padding: 0;
  margin: 0 0 10px 0;
  background-color: silver;
  width: 3%;
  height: 40px;
  font-weight: 300;
  font-size: x-small;
  display: block;
  position: fixed;
  z-index: 3;
  top: -5;
  right: 10;
  border-radius: 10px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

</style>
<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var today = new Date();
var date = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
document.getElementById('cdate').innerHTML = date;
document.getElementById('ctime').innerHTML = time;
display_c();
 }
</script>
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script>
function showPosition(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showMap, showError);
    } else{
        alert("Sorry, your browser does not support HTML5 geolocation.");
    }
}
 
// Define callback function for successful attempt
function showMap(position){
    // Get location data
    lat = position.coords.latitude;
    long = position.coords.longitude;
    var latlong = new google.maps.LatLng(lat, long);
    var loc = document.getElementById("clocation");
    loc.innerHTML = latlong;
    var myOptions = {
        center: latlong,
        zoom: 16,
        mapTypeControl: true,
        navigationControlOptions: {style:google.maps.NavigationControlStyle.SMALL}
    }
    
    var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
    var marker = new google.maps.Marker({position:latlong, map:map, title:"You are here!"});
}
 
// Define callback function for failed attempt
function showError(error){
    if(error.code == 1){
        result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
    } else if(error.code == 2){
        result.innerHTML = "The network is down or the positioning service can't be reached.";
    } else if(error.code == 3){
        result.innerHTML = "The attempt timed out before it could get the location data.";
    } else{
        result.innerHTML = "Geolocation failed due to unknown error.";
    }
}
</script>
<title>MY AURA APP</title>
</head>
<body onload=display_ct();showPosition();>

<div class="body">
        <div class="home-tab">
		    <img src="LIB/aura.PNG" alt="aura" height="60" width="100" style="border-radius: 20px;"><strong></strong>
    <label id="cdate" name="cdate"></label>
    <label id="ctime" name="ctime"></label> 
        </div>
    <div class="top-row">
	
        <header ><h1><strong>AURA<br></h1></header ></strong>
                    <strong><p>Help Me App<br><p></strong>
    </div>
    <div class="line"></div> <br><br><br><br><br><br>

    <form action="" method="post">
         <input type="submit" value="Help Me !" name = "btn_helpme" class="button">
         
                       <div id="embedMap" style="width: 250px; height: 200px;left: -10px;top: -20px;z-index: 0px;margin-top: 0px;">
        <!--Google map will be embedded here-->
    </div>
      </form>
    <br><br>

<p id="clocation" name="clocation"></p>
</div>
    <div class="footer">
    <br><strong>version 0.1, 2019 Edition</strong>
</div>
   
</body>
</html> 