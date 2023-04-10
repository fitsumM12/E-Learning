<?php
include("partials/header.par.php");
include("partials/nav.par.php");
?>
<h1>Our Location Google Map</h1>

<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(2.329940,102.247254),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

<?php
include("partials/footerbrk.php");
include("partials/footer.par.php");
include("partials/script.par.php");
?>