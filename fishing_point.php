<?php
  $fishing_point=$_GET["fishing_point"];
  $latlng="-33.811856, 151.274123";
  $map_width="320";
  $map_height=400;
  switch ($fishing_point) {
      case "balgowla_height":
	      $latlng="-33.811856, 151.274123";
		  break;
	  case "browns_rock":
		  $latlng="-33.995006,151.238045";
	      break;
	  case "cape_banks":
		  $latlng="-33.998874,151.249367";
	      break;
	  case "chowder_bay":
		  $latlng="-33.839917, 151.253719";
	      break;
	  case "laperouse":
		  $latlng="-33.992719,151.231758";
	      break;  
	  case "little_manly":
		  $latlng="-33.808873, 151.286789";
	      break;
      case "watsons_bay":
	      $latlng="-33.838281,151.278688";
		  break;
	
	  case "catherin_hill":
		  $latlng="-33.164425, 151.636498";
	      break;
	  case "killcare":
		  $latlng="-33.998874,151.249367";
	      break;
	  case "norah_head":
	      $latlng="-33.284709,151.575018";
		  break;
	  case "scar":
		  $latlng="-33.191655, 151.623770";
	      break;
      case "snapper":
		  $latlng="-33.187712,151.627978";
	      break;
	  case "snapper_side":
		  $latlng="-33.181748, 151.628970";
	      break;	
	  case "winney_bay":
	      $latlng="-33.482590,151.443454";
		  break;
	  case "wybung":
          $latlng="-33.197436, 151.623493";
	      break;
	  case "newcastle":
          $latlng="-32.925393, 151.766924";
	      break;
	  case "swansea":
          $latlng="-33.087752, 151.659984";
	      break;

      case "bass_point":
          $latlng="-34.598338,150.901011";
	      break;
	  case "kiama":
          $latlng="-34.671652, 150.865757";
	      break;
  }
?>

<!DOCTYPE html>
<html lang="ko">
 <head>
  <title>Sydney Fishing Point</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js"></script>

  <script>
    var my_marker;
    var my_center=new google.maps.LatLng(<?php echo $latlng;?>);
    function initialize() {
      var mapProp = {
        center:my_center,
        zoom:16,
        mapTypeId:google.maps.MapTypeId.HYBRID };
      var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
	  var marker=new google.maps.Marker({position:my_center});
	  marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
 </script>

 </head>
 <body>
   <div class="container">
    <h3>Sydney Fishing Point</h3>
    <ul class="nav nav-tabs">
      <li class="active"><a href="fishing_point.php?fishing_point">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">내만<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="fishing_point.php?fishing_point=balgowla_height">Balgowla Height</a></li>
          <li><a href="fishing_point.php?fishing_point=browns_rock">Browns Rock</a></li>
		  <li><a href="fishing_point.php?fishing_point=cape_banks">Cape Banks</a></li>
		  <li><a href="fishing_point.php?fishing_point=chowder_bay">Chowder Bay</a></li>
		  <li><a href="fishing_point.php?fishing_point=laperouse">Laperouse</a></li>
		  <li><a href="fishing_point.php?fishing_point=little_manly">Little Manly</a></li>
		  <li><a href="fishing_point.php?fishing_point=watsons_bay">Watsons Bay</a></li>
        </ul>
      </li>
	  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">North<span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li><a href="fishing_point.php?fishing_point=catherin_hill">Catherin Hill</a></li>
          <li><a href="fishing_point.php?fishing_point=scar">스카</a></li>
		  <li><a href="fishing_point.php?fishing_point=snapper">snapper</a></li>
		  <li><a href="fishing_point.php?fishing_point=snapper_side">snapper 옆</a></li>
          <li><a href="fishing_point.php?fishing_point=norah_head">Norah Head</a></li>
		  <li><a href="fishing_point.php?fishing_point=kill_care">Killcare</a></li>
		  <li><a href="fishing_point.php?fishing_point=winney_bay">Winney Bay</a></li>
		  <li><a href="fishing_point.php?fishing_point=wybung">Wybung</a></li>
          <li><a href="fishing_point.php?fishing_point=newcastle">Newcastle</a></li>
		  <li><a href="fishing_point.php?fishing_point=swansea">Swansea</a></li>
        </ul>
      </li>
	  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">South<span class="caret"></span></a>
		<ul class="dropdown-menu">
		  <li><a href="fishing_point.php?fishing_point=bass_point">Bass Point</a></li>
		  <li><a href="fishing_point.php?fishing_point=kiama">Kiama</a></li>
		</ul>
      </li>
    </ul>
  </div>
  <div id="googleMap" style="height:400px;"></div>
 </body>
</html>
