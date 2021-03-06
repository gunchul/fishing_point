<?php

// regions
$regions_attr_id_idx   = 0;
$regions_attr_name_idx = 1;

// points
$points_attr_id_idx   = 0;
$points_attr_name_idx = 1;
$points_attr_detail_idx = 2;

// point
$point_name_idx = 0;
$point_pos_idx  = 1;

$sydney_points = array
(
    array(                     // regions
        array("inner", "내만"), // regions_attr = regions[0]
        array(                 // points
             array("balgowla_height", "Balgowla Height", "detail"), // points_attr: points[0]
             array("3",   "-33.811535, 151.274265"),      // point: points[1]
             array("1",   "-33.806645, 151.273743"),      // point: points[2]
             array(".5", "-33.809536, 151.275096"),
             array("2",   "-33.810428, 151.274785"),
             array("4",   "-33.811868, 151.274131"),
             array("5",   "-33.812037, 151.273857"),
             array("6",   "-33.812307, 151.273881"),
             array("7",   "-33.811738, 151.271700"),             
             array("P",  "-33.805701, 151.270166"),
        ),
        array(
             array("akuna_bay", "Akuna Bay", "no_detail"),
             array("1", "-33.634954, 151.222128"),
        ),
        array(
             array("browns_rock", "Browns Rock", "no_detail"),
             array("1", "-33.995006,151.238045"),
             array("P", "-33.992050, 151.239990"),
        ),
        array(
             array("cape_banks", "Cape Banks", "no_detail"),
             array("1", "-33.998874,151.249367"),
        ),
        array(
             array("chowder_bay", "Chowder Bay", "no_detail"),
             array("1", "-33.839917, 151.253719"),
             array("P1", "-33.839124, 151.251782"),
             array("P2", "-33.839177, 151.250946"),
             array("P2", "-33.839164, 151.250680"),
        ),
        array(
             array("laperouse", "Laperouse", "no_detail"),
             array("1", "-33.992719,151.231758"),
             array("P", "-33.989861,151.231984"),
        ),
        array(
             array("little_manly", "Little Manly", "no_detail"),
             array("1", "-33.808873, 151.286789"),
             array("2", "-33.808577, 151.288366"),
        ),
        array(
             array("narrabeen", "Narrabeen", "no_detail"),
             array("1", "-33.696438, 151.314107"),
        ),
        array(
             array("watsons_bay", "Watsons Bay", "no_detail"),
             array("1", "-33.838281,151.278688"),
             array("P", "-33.839494, 151.280280"),
        ),
        array(
             array("parsley_bay", "Parsley Bay", "no_detail"),
             array("1", "-33.849229, 151.277097"),
             array("P", "-33.849807, 151.277892"),
        ),
        array(
             array("south_curl_curl", "South Curl Curl", "no_detail"),
             array("1", "-33.776321, 151.293818"),
        ),
    ),

    array (
        array("north", "북쪽"),
        array(
             array("whale_beach", "Whale Beach", "no_detail"),
             array("1", "-33.607552, 151.335050"),
             array("P", "-33.606874, 151.331666"),
        ),       
        array(
             array("catherin_hill", "Catherin Hill", "no_detail"),
             array("1", "-33.164425, 151.636498"),
             array("P1", "-33.161997, 151.628963"),
             array("P2", "-33.160376, 151.627195"),
             
        ),
        array(
             array("kill_care", "Kill Care", "no_detail"),
             array("1", "-33.531278,151.374033"),
             array("P", "-33.528387, 151.373808"),
        ),
        array(
             array("norah_head", "Norah Head", "no_detail"),
             array("1", "-33.284143, 151.575399"),
             array("2", "-33.282483, 151.578179"),
             array("3", "-33.280450, 151.577679"),
             array("P", "-33.282277, 151.573887"),
        ),
        array(
             array("scar", "스카", "no_detail"),
             array("1", "-33.191655, 151.623770"),
             array("2", "-33.193309, 151.623924"),
             array("3", "-33.194270, 151.623518"),
             array("4", "-33.194654, 151.622845"),
             array("P", "-33.187790, 151.621471"),
        ),
        array(
             array("snapper", "Snapper", "no_detail"),
             array("1", "-33.187712,151.627978"),
             array("P", "-33.186112, 151.627974"),
        ),
        array(
             array("snapper_side", "오야봉", "no_detail"),
             array("1", "-33.181748, 151.628970"),
             array("P", "-33.183166, 151.627101"),
        ),

        array(
             array("winney_bay", "Winney Bay", "no_detail"),
             array("1", "-33.482590,151.443454"),
             array("P", "-33.477249, 151.437232"),
        ),

        array(
             array("wybung", "Wybung", "no_detail"),
             array("1", "-33.197436, 151.623493"),
             array("P", "-33.196184, 151.621171"),
        ),
        array(
             array("newcastle", "Newcastle", "no_detail"),
             array("1", "-32.925393, 151.766924"),
        ),
        array(
             array("swansea", "Swansea", "no_detail"),
             array("1", "-33.087752, 151.659984"),
        ),
        array(
             array("entrance", "Entrance", "no_detail"),
             array("P", "-33.339538, 151.498199"),
             array("1", "-33.339075, 151.499306"),
             array("2", "-33.337775, 151.500471"),
        ),
        array(
             array("nude_beach", "누드비치", "no_detail"),
             array("P", "-33.204143, 151.606193"),
             array("1", "-33.202296,151.616472"),
        ),
        array(
             array("catherine_hill_1", "귀신골", "no_detail"),
             array("P", "-33.147757,151.632137"),
             array("1", "-33.143244,151.640544"),
        ),
        
    ),

    array(
        array("south", "남쪽"),
        array(
             array("bass_point", "Bass Point", "no_detail"),
             array("1", "-34.598338,150.901011"),
        ),

        array(
             array("coalcliff", "Coalcliff", "no_detail"),
             array("1", "-34.249368, 150.977193"),
        ),

        array(
             array("kiama", "Kiama", "no_detail"),
             array("1", "-34.671652, 150.865757"),
        ),
        array(
             array("gymea_bay", "Gymea Bay", "no_detail"),
             array("P", "-34.050523, 151.091743"),
             array("1", "-34.049790, 151.093132"),
        ),     
        array(
             array("warumbul", "Warumbul", "no_detail"),
             array("P", "-34.076174, 151.103253"),
        ),     
        array(
             array("lilli_pilli", "Lilli Pilli", "no_detail"),
             array("P", "-34.069791, 151.111291"),
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
  
?>
