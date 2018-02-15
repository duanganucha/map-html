<!DOCTYPE html>
<html>

<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
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
            center: { lat: 15.1148059, lng: 104.3268268 },
            zoom: 6
        }

        var maps = new google.maps.Map(document.getElementById("map"), mapOptions);


        var marker, info;

        $.getJSON("maps_php_json.php", function (jsonObj) {
            $.each(jsonObj, function (i, item) {
                marker = new google.maps.Marker({
                    
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(item.lat, item.lng),
                    map: maps
                });

                info = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        
                        info.setContent(item.name);
                        info.open(maps, marker);
                        
                    }
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