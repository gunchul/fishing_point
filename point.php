<?php
$this_file="point.php";
$param_region=$_GET["region"];
$param_fishing_point=$_GET["point"];
if ( count($param_fishing_point) == 0 )
{
    $param_region="inner";
    $param_fishing_point="balgowla_height";
}

include 'point_data.php';
include 'point_weather.php';

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

				if ( $regions_attr[$regions_attr_id_idx] == $param_region )
				{
								echo "<li class='dropdown active'>";
				}
				else
				{
								echo "<li class='dropdown'>";
				}
    
    echo "  <a class='dropdown-toggle' data-toggle='dropdown' href='#'>".$regions_attr[$regions_attr_name_idx]."<span class='caret'></span></a>\n";
    echo "  <ul class='dropdown-menu'>\n";
    
    for ( $y = 1; $y < count($regions) ; $y++ )
    {
        $points = $regions[$y];
        $points_attr = $points[0];
        echo "<li><a href='".$this_file."?point=".$points_attr[$points_attr_id_idx]."&region=".$regions_attr[$regions_attr_id_idx]."'>".$points_attr[$points_attr_name_idx]."</a></li>\n";
        for ( $z = 1; $z < count($points) ; $z++ )
        {
            $points_attr = $points[$z];
        }
    }
    echo "  </ul>\n";
    echo "</li>\n";     
}
?>
      <li class="dropdown nab-right">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">날씨<span class="caret"></span></a>
        <ul class="dropdown-menu">       
<?php
								  $weather_region=get_weather($param_region);
								  for ( $x = 0 ; $x < count($weather_region) ; $x++)
								  {
								      $weather_region_type = $weather_region[$x];
								      echo "<li><a href=".$weather_region_type[1]." target='_blank'>".$weather_region_type[0]."</a></li>\n";
								  }
?>                  
        </ul>
      </li>
    </ul>
  </div>
  <div id="googleMap" style="position: absolute; width:100%; height:90%;"></div>
</body>
</html>