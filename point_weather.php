<?php

function get_weather($region_id)
{
    switch($region_id)
    {
								case "inner":
								    return array(
																				array("날씨", "http://www.willyweather.com.au/nsw/sydney/south-head.html"  ),
						              array("파도", "http://swell.willyweather.com.au/nsw/sydney/south-head.html"),
						              array("바람", "http://wind.willyweather.com.au/nsw/sydney/south-head.html" ),
						              array("조수", "http://tides.willyweather.com.au/nsw/sydney/south-head.html") );
        case "north":
												return array(
																				array("날씨", "http://www.willyweather.com.au/nsw/central-coast/norah-head.html"  ),
																				array("파도", "http://swell.willyweather.com.au/nsw/central-coast/norah-head.html"),
																				array("바람", "http://wind.willyweather.com.au/nsw/central-coast/norah-head.html" ),
																				array("조수", "http://tides.willyweather.com.au/nsw/central-coast/norah-head.html") );
        case "south":
												return array(
																				array("날씨", "http://www.willyweather.com.au/nsw/illawarra/bass-point.html"   ),
						              array("파도", "http://swell.willyweather.com.au/nsw/illawarra/bass-point.html" ),
						              array("바람", "http://wind.willyweather.com.au/nsw/illawarra/bass-point.html"  ),
						              array("조수", "http://tides.willyweather.com.au/nsw/illawarra/bass-point.html" ) );
    }
    return null;
}
  
?>