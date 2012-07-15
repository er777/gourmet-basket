<?php
?>


<style type="text/css">

#easyTooltip {
	padding: 15px 25px;
	border: 1px solid #fff;
	background: #195fa4 url(http://test.gourmet-basket.com/app/webroot/img/map-bg.gif) repeat-x;
	color: #fff;
	font-size:130%;
	max-width:300px;
	-webkit-border-radius: 36px; /* Saf3-4, iOS 1-3.2, Android ≤1.6 */
    border-radius: 36px; /* Opera 10.5, IE9, Saf5, Chrome, FF4+, iOS 4, Android 2.1+ */
	position: relative;
	z-index:10000;
	
	
}

</style>

</head>

      <map id="head" name="head">
         
         <!--All coordinates are neatly coded into an external javascript file --> 
         
         <script style="text/javascript" src="/app/webroot/js/headworld.js"></script>
      </map>
      
<div id="middle-out-top"> <img id="worldmap" class="map" style="border-style: none;" src="/app/webroot/img/world-map-2.png" alt="" width="900" height="460" usemap="#worldmap" />

      <map name="worldmap">
         <!--All coordinates are neatly coded into an external javascript file --> 
         
         <script type="text/javascript" src="/app/webroot/js/worldmap.js"></script> 
        
      </map>
</div>