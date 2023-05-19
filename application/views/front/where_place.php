<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<style>

.map { width:auto; max-width:580px; margin: 0; padding-bottom:300px; border:1px solid #000;}

</style>

<script>
	window.onload = function () {

	var latlng = new google.maps.LatLng(13.8199552,100.514812);

	var styles = [
		{
			stylers: [
				{ saturation: -70 }
			]
		},
		{
			featureType: "building",
			elementType: "labels"
		},
		{
			featureType: "poi", //points of interest
			stylers: [
				{ hue: '#0044ff' }
			]
		}
	];

	var myOptions = {
		zoom: 15,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
		mapTypeControl: false,
		styles: styles,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL
		}
	};

	map = new google.maps.Map(document.getElementById('map'), myOptions);

	// var image = 'enter path to image here';
	var marker = new google.maps.Marker({
		position: latlng,
		map: map,
		title:"My Site",
	// icon: image // enable if using image for marker
	});

	google.maps.event.addDomListener(window, "resize", function() {
    	var center = map.getCenter();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center);
	});

}
</script>


<div class="col-lg-12">
    <h2>สถานที่จัดงาน</h2>
        <h4 style="text-align: left; line-height: 200%; text-indent: 0.5in; ">
            <p>หอประชุมเบญจรัตน์ และคณะเทคโนโลยีสารสนเทศ อาคารนวมินทรราชินี</p>
            <p>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</p>
            <p>1518 ถ.ประชาราษฎร์ 1 แขวงวงศ์สว่าง เขตบางซื่อ กทม. 10800</p>
            <p>โทร. 02-555-2000 ต่อ 3221, 3201</p>
        </h4>   
    <center><div class="map" id="map"></div></center>

</div>


