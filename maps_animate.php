<!DOCTYPE html>
<html>

<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">

    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script>
       

        function initMap() {
            var mapOptions = {
            center: { lat: 16.3629225, lng: 101.906816 },
            zoom: 5
        }

        var maps = new google.maps.Map(document.getElementById("map"), mapOptions);


        var marker, info;

        $.getJSON("maps_php_json.php", function (jsonObj) {
            $.each(jsonObj, function (i, item) {
                marker = new google.maps.Marker({

                    draggable: true,
                    position: new google.maps.LatLng(item.lat, item.lng),
                    map: maps
                });

               
            
                info = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'dblclick', (function (marker, i) {
                    return function () {
                            
                        if (marker.getAnimation() !== null) {
                                marker.setAnimation(null);
                         } else {
                                marker.setAnimation(google.maps.Animation.BOUNCE);
                         }              
                    };
         
                })(marker, i));
            });
        });
        }
    </script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyzrd8O-dAjbZvx1DHRAE39GFxecVHKd8&callback=initMap" async
    defer></script>
</body>

</html>