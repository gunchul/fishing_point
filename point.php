<?php
$this_file="point.php";
$param_fishing_poing=$_GET["point"];
if ( count($param_fishing_poing) == 0 )
{
    $param_fishing_poing="balgowla_height";
}
// regions
$regions_attr_id_idx   = 0;
$regions_attr_name_idx = 1;

// points
$points_attr_id_idx   = 0;
$points_attr_name_idx = 1;

// point
$point_name_idx = 0;
$point_pos_idx  = 1;

$sydney_points = array
(
    array(                     // regions
		array("inner", "내만"), // regions_attr = regions[0]
		array(                 // points
			 array("balgowla_height", "Balgowla Height"), // points_attr: points[0]
			 array("3",   "-33.811535, 151.274265"),      // point: points[1]
			 array("1",   "-33.806645, 151.273743"),      // point: points[2]
			 array(".5", "-33.809536, 151.275096"),
			 array("2",   "-33.810428, 151.274785"),
			 array("4",   "-33.811868, 151.274131"),
			 array("5",   "-33.812037, 151.273857"),
			 array("6",   "-33.812307, 151.273881"),
			 array("P",  "-33.805701, 151.270166"),
		),
		array(
			 array("akuna_bay", "Akuna Bay"),
			 array("1", "-33.634954, 151.222128"),
		),
		array(
			 array("browns_rock", "Browns Rock"),
			 array("1", "-33.995006,151.238045"),
		),
		array(
			 array("cape_banks", "Cape Banks"),
			 array("1", "-33.998874,151.249367"),
		),
		array(
			 array("chowder_bay", "Chowder Bay"),
			 array("1", "-33.839917, 151.253719"),
		),
		array(
			 array("laperouse", "Laperouse"),
			 array("1", "-33.992719,151.231758"),
			 array("P", "-33.989861,151.231984"),
		),
		array(
			 array("little_manly", "Little Manly"),
			 array("1", "-33.808873, 151.286789"),
			 array("2", "-33.808577, 151.288366"),
		),
		array(
			 array("narrabeen", "Narrabeen"),
			 array("1", "-33.696438, 151.314107"),
		),
		array(
			 array("watsons_bay", "Watsons Bay"),
			 array("1", "-33.838281,151.278688"),
		),
		array(
			 array("south_curl_curl", "South Curl Curl"),
			 array("1", "-33.776321, 151.293818"),
		),
    ),

    array (
		array("north", "North"),
		array(
			 array("whale_beach", "Whale Beach"),
			 array("1", "-33.607552, 151.335050"),
		),
		array(
			 array("catherin_hill", "Catherin Hill"),
			 array("1", "-33.164425, 151.636498"),
		),
		array(
			 array("kill_care", "Kill Care"),
			 array("1", "-33.531278,151.374033"),
		),
		array(
			 array("norah_head", "Norah Head"),
			 array("1", "-33.284143, 151.575399"),
			 array("2", "-33.282483, 151.578179"),
			 array("3", "-33.280450, 151.577679"),
		),
		array(
			 array("scar", "스카"),
			 array("1", "-33.191655, 151.623770"),
		),
		array(
			 array("snapper", "Snapper"),
			 array("1", "-33.187712,151.627978"),
		),
		array(
			 array("snapper_side", "Snapper 옆"),
			 array("1", "-33.181748, 151.628970"),
		),
		array(
			 array("winney_bay", "Winney Bay"),
			 array("1", "-33.482590,151.443454"),
		),
		array(
			 array("wybung", "Wybung"),
			 array("1", "-33.197436, 151.623493"),
		),
		array(
			 array("newcastle", "Newcastle"),
			 array("1", "-32.925393, 151.766924"),
		),
		array(
			 array("swansea", "Swansea"),
			 array("1", "-33.087752, 151.659984"),
		),
    ),

    array(
        array("south", "South"),
        array(
			 array("bass_point", "Bass Point"),
			 array("1", "-34.598338,150.901011"),
		),

		array(
			 array("coalcliff", "Coalcliff"),
			 array("1", "-34.249368, 150.977193"),
		),

		array(
			 array("kiama", "Kiama"),
			 array("1", "-34.671652, 150.865757"),
		),
    ),
);	  

function get_points($points_id, $points_attr_id_idx, $sydney_points)
{
    for ( $x = 0 ; $x < count($sydney_points) ; $x++ )
	{
		$regions = $sydney_points[$x];

        // $regions[0] --> regions attribute
		for ( $y = 1; $y < count($regions) ; $y++ )
		{
			$points = $regions[$y];
			$points_attr = $points[0];

			if ( $points_attr[$points_attr_id_idx] == $points_id )
			{
			    return $points;
			}
        }
	}
	return null;
}

$points = get_points($param_fishing_poing, $points_attr_id_idx, $sydney_points);
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
      var mapProp = { center:map_center, zoom:17, mapTypeId:google.maps.MapTypeId.HYBRID };
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
	  var pos = [];
	  var marker = [];
	  <?php
      for ( $x = 0; $x < count($points)-1 ; $x++ )
      {
          $point = $points[$x+1]; //points[0]: points attribute
		  echo "pos[".$x."] = new google.maps.LatLng(".$point[$point_pos_idx].");\n";
		  echo "marker[".$x."] = new google.maps.Marker({position:pos[".$x."], label: \"".$point[$point_name_idx]."\"});\n";
		  echo "marker[".$x."].setMap(map);\n";         
	  }
      ?>	  
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
 </head>

 <body>
   <div class="container">
    <h3><?php echo $points_attr[$points_attr_name_idx]; ?></h3>
    <ul class="nav nav-tabs">
      <li class="active"><a href="<?php echo $this_file;?>">Home</a></li>
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
    </ul>
  </div>
  <div id="googleMap" style="position: absolute; width:100%; height:90%;"></div>
  
 </body>
</html>