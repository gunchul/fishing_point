<?php

$param_fishing_point=$_GET["point"];
if ( count($param_fishing_point) == 0 )
{
    $param_fishing_point="balgowla_height";
}

include 'point_env.php';
include 'point_data.php';

$points = get_points($param_fishing_point, $points_attr_id_idx, $sydney_points);
$points_attr = $points[0];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3><?php echo $points_attr[$points_attr_name_idx]; ?>
  <button type="button" class="btn btn-primary" onclick="window.close()">닫기</button>
  </h3>
  
<?php 
$img_path = $img_dir."/".$points_attr[$points_attr_id_idx];

$d = dir($img_path);

while (($file = $d->read()) !== false){ 
  if ( strlen($file) > 4 )
  {
    echo "<img src='".$img_path."/".$file."' class='img-rounded' width='320' height='240'><BR><BR>";
  }
  
} 
$d->close(); 

?>
</div>

</body>
</html>