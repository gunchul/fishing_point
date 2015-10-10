<?php
$this_file="point.php";
$param_fishing_point=$_GET["point"];
if ( count($param_fishing_point) == 0 )
{
    $param_fishing_point="balgowla_height";
}

include 'point_data.php';

// zoom level
$zoom_level_default = 17;
$zoom_level_zoom_in = 20;

$points = get_points($param_fishing_point, $points_attr_id_idx, $sydney_points);
$points_attr = $points[0];
$point_first = $points[1];
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
    function initialize() {
      var map_center = new google.maps.LatLng(<?php echo $point_first[$point_pos_idx]; ?>);
      var mapProp = { center:map_center, zoom:<?php echo $zoom_level_default ?>, mapTypeId:google.maps.MapTypeId.HYBRID, disableDefaultUI:true };
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

      map.addListener('click', function() {map.setZoom(<?php echo $zoom_level_default ?>);});
  
      var pos = [];
      var marker = [];
      <?php
      for ( $x = 0; $x < count($points)-1 ; $x++ )
      {
          $point = $points[$x+1]; //points[0]: points attribute
          echo "pos[".$x."] = new google.maps.LatLng(".$point[$point_pos_idx].");\n";
          echo "marker[".$x."] = new google.maps.Marker({position:pos[".$x."], label: \"".$point[$point_name_idx]."\"});\n";
          echo "marker[".$x."].addListener('click', function(){map.setZoom(".$zoom_level_zoom_in."); map.setCenter(marker[".$x."].getPosition()); });";
          echo "marker[".$x."].setMap(map);\n";         
      }
      ?>	  
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
 </head>

 <body>
   <div class="container">
    <h3>
      <?php echo $points_attr[$points_attr_name_idx]; ?> 
      <?php 
				    if ( $points_attr[$points_attr_detail_idx] == "detail" )
				    {
				        ;//echo "<a href='point_detail?point=".$points_attr[$points_attr_id_idx]."' class='btn btn-info' role='button' target='_blank'> 포인트 소개 </a>";
				    }
      ?>
				</h3>
    
    <ul class="nav nav-tabs">
<?php
for ( $x = 0 ; $x < count($sydney_points) ; $x++ )
{
    $regions = $sydney_points[$x];
    $regions_attr = $regions[0];
    
    echo "<li class='dropdown'>";
    echo "  <a class='dropdown-toggle' data-toggle='dropdown' href='#'>".$regions_attr[$regions_attr_name_idx]."<span class='caret'></span></a>\n";
    echo "  <ul class='dropdown-menu'>\n";
    
    for ( $y = 1; $y < count($regions) ; $y++ )
    {
        $points = $regions[$y];
        $points_attr = $points[0];
        echo "<li><a href='".$this_file."?point=".$points_attr[$points_attr_id_idx]."'>".$points_attr[$points_attr_name_idx]."</a></li>\n";
        for ( $z = 1; $z < count($points) ; $z++ )
        {
            $points_attr = $points[$z];
        }
    }
    echo "  </ul>\n";
    echo "</li>\n";     
}
?>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">날씨<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="http://www.willyweather.com.au/nsw/sydney/south-head.html" target='_blank'>내만:날씨</a></li>
          <li><a href="http://swell.willyweather.com.au/nsw/sydney/south-head.html" target='_blank'>내만:파도</a></li>
          <li><a href="http://wind.willyweather.com.au/nsw/sydney/south-head.html" target='_blank'>내만:바람</a></li>
          <li><a href="http://tides.willyweather.com.au/nsw/sydney/south-head.html" target='_blank'>내만:조수</a></li> 
          <li><a href="http://www.willyweather.com.au/nsw/central-coast/norah-head.html" target='_blank'>북쪽:날씨</a></li>
          <li><a href="http://swell.willyweather.com.au/nsw/central-coast/norah-head.html" target='_blank'>북쪽:파도</a></li>
          <li><a href="http://wind.willyweather.com.au/nsw/central-coast/norah-head.html" target='_blank'>북쪽:바람</a></li>
          <li><a href="http://tides.willyweather.com.au/nsw/central-coast/norah-head.html" target='_blank'>북쪽:조수</a></li> 
          <li><a href="http://www.willyweather.com.au/nsw/illawarra/bass-point.html" target='_blank'>남쪽:날씨</a></li>
          <li><a href="http://swell.willyweather.com.au/nsw/illawarra/bass-point.html" target='_blank'>남쪽:파도</a></li>
          <li><a href="http://wind.willyweather.com.au/nsw/illawarra/bass-point.html" target='_blank'>남쪽:바람</a></li>
          <li><a href="http://tides.willyweather.com.au/nsw/illawarra/bass-point.html" target='_blank'>남쪽:조수</a></li> 
        </ul>
      </li>
    </ul>
  </div>
  <div id="googleMap" style="position: absolute; width:100%; height:90%;"></div>
</body>
</html>