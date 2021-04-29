

    <script src="jquery-1.10.1.min.js"></script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAboqNjvuni2gbyl5sTVqIwNYfkisS5pxU">
</script>

<script>    
    var marker;
    function initialize() {  
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        } 

         var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);      
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        // Pengambilan data dari database
        <?php
        $query = mysql_query("SELECT * FROM kulinerr");
            while ($data = mysql_fetch_array($query)) {
                $nama    =$data['namatTempat'];
                $lat    =$data['latitude'];
                $lon    =$data['longitude'];
                echo ("addMarker($lat, $lon, '$nama');\n");                        
            }    
        ?> 


              function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }  

         </script>
<div id="map-canvas" class="col-sm-12" style="height:380px;"></div>


