<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="isotope/jquery.isotope.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	var $container = $('#container');

	$container.isotope({
	    getSortData : {
	    name : function ( $elem ) {
	      return $elem.find('.name').text();
	    },
	    symbol : function ( $elem ) {
	      return $elem.find('.symbol').text();
	    }
	  },
	  // options
	  itemSelector : '.item'
	});


	// filter items when filter link is clicked
	$('#filters a').click(function(){
	 
	  $('#filters li').removeClass('active');
	  $(this).parent().addClass('active');

	  var selector = $(this).attr('data-filter');
	  $container.isotope({ filter: selector });
	  return false;
	});
});


</script>

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<style type="text/css">

.label{
	float:right;
}
.item {
	height:200px;
	width:140px;
	margin-left:10px;
	margin-bottom:10px;
}

.thumbVideo 
{
	background: url('images/video.png') no-repeat center;
}
.thumbBook 
{
	background: url('images/book.gif') no-repeat center;
}
.thumbAudio 
{
	background: url('images/audio.png') no-repeat center;
}
.thumbeBook 
{
	background: url('images/ebook.gif') no-repeat center;
}
.innerthumb{
	text-align:center;

}
#container {
  /* either of these will work for horizontal Isotope layouts */
/*  height: 100%;
	width:600px;*/
}

.nav-panel
{
	width:150px;
	float:left;
}
.content-panel{
	float:left;
	width:600px;
}
.external-link{
    margin-bottom: 4px;
}
/**** Isotope filtering ****/

.isotope-item {
  z-index: 2;
}

.isotope-hidden.isotope-item {
  pointer-events: none;
  z-index: 1;
}

.isotope,
.isotope .isotope-item {
  /* change duration value to whatever you like */
  -webkit-transition-duration: 0.8s;
     -moz-transition-duration: 0.8s;
      -ms-transition-duration: 0.8s;
       -o-transition-duration: 0.8s;
          transition-duration: 0.8s;
}

.isotope {
  -webkit-transition-property: height, width;
     -moz-transition-property: height, width;
      -ms-transition-property: height, width;
       -o-transition-property: height, width;
          transition-property: height, width;
}

.isotope .isotope-item {
  -webkit-transition-property: -webkit-transform, opacity;
     -moz-transition-property:    -moz-transform, opacity;
      -ms-transition-property:     -ms-transform, opacity;
       -o-transition-property:         top, left, opacity;
          transition-property:         transform, opacity;
}

/**** disabling Isotope CSS3 transitions ****/

.isotope.no-transition,
.isotope.no-transition .isotope-item,
.isotope .isotope-item.no-transition {
  -webkit-transition-duration: 0s;
     -moz-transition-duration: 0s;
      -ms-transition-duration: 0s;
       -o-transition-duration: 0s;
          transition-duration: 0s;
}
</style>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="nav-panel">
      <!--Sidebar content-->


<div class="well" id="filters" style="padding: 8px 0;">
        <ul class="nav nav-list">
  	<li class="active"><a href="#" data-filter="*">Show all</a></li>
          <li class="nav-header">Format</li>
 <!--         <li class=" active"><a href="#">Home</a></li>-->
<li>  <a href="#" data-filter=".Book">Books</a></li>
<li>  <a href="#"  data-filter=".eBook">eBooks</a></li>
<li>  <a href="#"  data-filter=".Video">Videos</a></li>
<li>  <a href="#"  data-filter=".Audio">Audio</a></li>
          <li class="nav-header">Category</li>
  <li><a href="#"   data-filter=".000">General</a>
</li><li>
  <a href="#"  data-filter=".100">Psychology</a>
</li><li>
  <a href="#"  data-filter=".200">Religion</a>
</li><li>
  <a href="#"  data-filter=".300">Social Sciences</a>
</li><li>
  <a href="#"  data-filter=".400">Language</a>
</li><li>
  <a href="#"  data-filter=".500">Science</a>
</li><li>
  <a href="#"   data-filter=".600">Applied Sciences</a>
</li><li>
  <a href="#"   data-filter=".700">Arts</a>
</li><li>
  <a href="#"   data-filter=".800">Literature</a>
</li><li>
  <a href="#"   data-filter=".900">Geology</a>
</li>
        </ul>
      </div>
<!--
<div class="btn-toolbar" id="filters">
  <div class="btn-group">
  <a href="#" class="btn"  data-filter="*">Show all</a>
	</div>
  <div class="btn-group">
  <a href="#"  class="btn"  data-filter=".book">Books</a>
  <a href="#"  class="btn"  data-filter=".ebook">eBooks</a>
  <a href="#"  class="btn"  data-filter=".video">Videos</a>
	</div>
  <div class="btn-group">
  <a href="#"  class="btn"  data-filter=".000">General</a>
  <a href="#"  class="btn"  data-filter=".100">Psychology</a>
  <a href="#"  class="btn"  data-filter=".200">Religion</a>
  <a href="#"  class="btn"  data-filter=".300">Social Sciences</a>
  <a href="#"  class="btn"  data-filter=".400">Language</a>
  <a href="#"  class="btn"  data-filter=".500">Sciences</a>
  <a href="#"  class="btn"  data-filter=".600">Technology</a>
  <a href="#"  class="btn"  data-filter=".700">Arts</a>
  <a href="#"  class="btn"  data-filter=".800">Literature</a>
  <a href="#"  class="btn"  data-filter=".900">Geology</a>
  </div>
</div>
-->

    </div>
    <div class="content-panel">
      <!--Body content-->

<div id="container" class="thumbnails">

<?php

	include('inc.php');

?>
</div

    </div>
  </div>
</div>
