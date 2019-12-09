<?php 
require('db_connect.php');
$user_name= $_GET['current_user'];
$sql = "SELECT * FROM Employees where user_name = '$user_name'";
$result = $conn->query($sql);
$count  = $result->num_rows;
if($count>0)
{
     while($row = mysqli_fetch_array($result))
    {
        $municipality = $row['Muni_ID'];
    }

}
else
{
  echo "DATABASE ERROR!";
}  
?> 

<style type="text/css">
.title_bar{
    position: relative;
    background-color:green;
    position:relative;
    width: 100%;
    content: "";
    clear: both;
    display: table;
}
.title_bar_text{
    float: left;
    float:top;
}
.drop_down{
    float: right;
    float:top;
}
</style>

<!doctype html>
<html lang="en">
    <head>
    	<div style = "width:100%;height:100%;">
	       <div class = "title_bar" > 
                <div class = "title_bar_text">
                    <p id = "user_name" style="font-size: 24px; ">User Name: <?php echo $user_name;?><br>Municipality #: <?php echo $municipality;?></p>
                </div>
                <select class = "drop_down" onChange="top.location.href=this.options[this.selectedIndex].value;"">
                    <option selected="selected" value = "super_admin_main.php">Select Action</option>
                    <option value="edit_users.php"  >Add Delete Registerd User</option>
                    <option value="edit_bins.php">Edit Bin Location</option>
                    <option value="super_admin_add_delete_users.php">Get Efficient Bin Distribution</option>
                    <option value="super_admin_edit_users.php"  >Edit Building Data</option>
                    <option value="view_full_bin_notifications.php">Full Bin Notifications</option>
                    <option value="super_admin_add_delete_users.php">Bin Location Suggestions</option>
                </select>
              </div>
            <div id="map"  ></div>
        </div>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="css/leaflet.css"><link rel="stylesheet" href="css/L.Control.Locate.min.css">
        <link rel="stylesheet" href="css/qgis2web.css"><link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/leaflet-control-geocoder.Geocoder.css">
        <style>
        #map {
            width: 1520px;
            height: 720px;
            z-index: 1;
        }
		#overlay {
		  position: absolute;
		  display: none;
		  width: 100%;
		  height: 100%;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: rgba(0,0,0,0.5);
		  z-index: 2;
		  cursor: pointer;
          justify-content: center;
          align-items: center;
		}
        .popupContainer {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(5, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
            }

            .div1 { 
                grid-area: 1 / 1 / 2 / 6; 
                text-align: center; 
            }
            .div2 { 
                grid-area: 2 / 1 / 2 / 3; 
            }
            .div3 { grid-area: 4 / 1 / 5 / 4; }
            .div4 {
                 grid-area: 2 / 3 / 5 / 6;
                height: 130px;     
            }
            .div5 { grid-area: 5 / 1 / 6 / 6; }
        </style>
        <title></title>
    </head>
    <body>	
        <div id="map">
        </div>
        <div id="overlay" onclick="off()">
            <img id='overlayImage' src='http://www.tmir.org.il/download/pictures/where-pachim.jpg' />
        </div>
        <script src="js/qgis2web_expressions.js"></script>
        <script src="js/leaflet.js"></script><script src="js/L.Control.Locate.min.js"></script>
        <script src="js/leaflet.rotatedMarker.js"></script>
        <script src="js/leaflet.pattern.js"></script>
        <script src="js/leaflet-hash.js"></script>
        <script src="js/Autolinker.min.js"></script>
        <script src="js/rbush.min.js"></script>
        <script src="js/labelgun.min.js"></script>
        <script src="js/labels.js"></script>
        <script src="js/leaflet-control-geocoder.Geocoder.js"></script>
        <script src="data/Purple_1.js"></script>
        <script src="data/Orange_2.js"></script>
        <script src="data/Carton_3.js"></script>
        <script src="data/Blue_4.js"></script>
        <script src="data/green_5.js"></script>
        <script>
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[32.12241093903362,34.80333346349234],[32.15868211894375,34.8886889040238]]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a>');
        L.control.locate({locateOptions: {maxZoom: 19}}).addTo(map);
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
        }
        var layer_OSMStandard_0 = L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            opacity: 1.0,
            attribution: '<a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors, CC-BY-SA</a>',
        });
        layer_OSMStandard_0;
        map.addLayer(layer_OSMStandard_0);
        function pop_Purple_1(feature, layer) {
                var popupContent = '<div class="-Container">' +
                                        '<div class="div1"> <strong>כתובת </strong>' + (feature.properties['כתובת'] !== null ? Autolinker.link(String(feature.properties['כתובת'])) : '') + ' </div>' +
                                        '<div class="div2"> <strong>:סוג</strong>'+(feature.properties['סוג'] !== null ? Autolinker.link(String(feature.properties['סוג'])) : '')+' </div>' +
                                        '<img class="div4" src="https://i.ibb.co/CBSmTBn/purple2.png" alt="purple2" border="0"/>' +
                                        '<div class="div5"><button onclick="on()">מה עליי לזרוק בפח זה?</button> </div>' +
                                    '</div>'
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Purple_1_0() {
            return {
                pane: 'pane_Purple_1',
                radius: 8.0,
                opacity: 1,
                color: 'rgba(61,128,53,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 2.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(176,74,171,1.0)',
            }
        }
        map.createPane('pane_Purple_1');
        map.getPane('pane_Purple_1').style.zIndex = 401;
        map.getPane('pane_Purple_1').style['mix-blend-mode'] = 'normal';
        var layer_Purple_1 = new L.geoJson(json_Purple_1, {
            attribution: '',
            pane: 'pane_Purple_1',
            onEachFeature: pop_Purple_1,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_Purple_1_0(feature));
            },
        });
        bounds_group.addLayer(layer_Purple_1);
        map.addLayer(layer_Purple_1);	
        function pop_Orange_2(feature, layer) {
			var popupContent = '<div class="-Container">' +
                                        '<div class="div1"> <strong>:כתובת </strong>' + (feature.properties['כתובת'] !== null ? Autolinker.link(String(feature.properties['כתובת'])) : '') + ' </div>' +
                                        '<div class="div2"> <strong>:סוג</strong>' + (feature.properties['סוג'] !== null ? Autolinker.link(String(feature.properties['סוג'])) : '') + ' </div>' +
                                        '<img class="div4" src="https://i.ibb.co/CmXztRT/3.png" alt="purple2" border="0"/>' +
                                        '<div class="div5"><button onclick="on()">מה עליי לזרוק בפח זה?</button> </div>' +
                                    '</div>'
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Orange_2_0() {
            return {
                pane: 'pane_Orange_2',
                radius: 8.0,
                opacity: 1,
                color: 'rgba(61,128,53,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 2.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,166,1,1.0)',
            }
        }
        map.createPane('pane_Orange_2');
        map.getPane('pane_Orange_2').style.zIndex = 402;
        map.getPane('pane_Orange_2').style['mix-blend-mode'] = 'normal';
        var layer_Orange_2 = new L.geoJson(json_Orange_2, {
            attribution: '',
            pane: 'pane_Orange_2',
            onEachFeature: pop_Orange_2,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_Orange_2_0(feature));
            },
        });
        bounds_group.addLayer(layer_Orange_2);
        map.addLayer(layer_Orange_2);
        function pop_Carton_3(feature, layer) {
			var popupContent = '<div class="-Container">' +
									'<div class="div1"> <strong>:כתובת </strong>' + (feature.properties['כתובת'] !== null ? Autolinker.link(String(feature.properties['כתובת'])) : '') + ' </div>' +
									'<div class="div2"> <strong>:סוג</strong>' + (feature.properties['סוג'] !== null ? Autolinker.link(String(feature.properties['סוג'])) : '') + ' </div>' +
									'<img class="div4" src="https://i.ibb.co/LYyYkHy/6.png" alt="purple2" border="0"/>' +
									'<div class="div5"><button onclick="on()">מה עליי לזרוק בפח זה?</button> </div>' +
								'</div>'
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Carton_3_0() {
            return {
                pane: 'pane_Carton_3',
                radius: 8.0,
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(243,255,1,1.0)',
            }
        }
        map.createPane('pane_Carton_3');
        map.getPane('pane_Carton_3').style.zIndex = 403;
        map.getPane('pane_Carton_3').style['mix-blend-mode'] = 'normal';
        var layer_Carton_3 = new L.geoJson(json_Carton_3, {
            attribution: '',
            pane: 'pane_Carton_3',
            onEachFeature: pop_Carton_3,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_Carton_3_0(feature));
            },
        });
        bounds_group.addLayer(layer_Carton_3);
        map.addLayer(layer_Carton_3);
        function pop_Blue_4(feature, layer) {
			var popupContent = '<div class="-Container">' +
                                        '<div class="div1"> <strong>:כתובת </strong>' + (feature.properties['כתובת'] !== null ? Autolinker.link(String(feature.properties['כתובת'])) : '') + ' </div>' +
                                        '<div class="div2"> <strong>:סוג</strong>' + (feature.properties['סוג'] !== null ? Autolinker.link(String(feature.properties['סוג'])) : '') + ' </div>' +
                                        '<img class="div4" src="https://i.ibb.co/8cvwLzy/1.png" alt="purple2" border="0"/>' +
                                        '<div class="div5"><button onclick="on()">מה עליי לזרוק בפח זה?</button> </div>' +
                                    '</div>'
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Blue_4_0() {
            return {
                pane: 'pane_Blue_4',
                radius: 8.0,
                opacity: 1,
                color: 'rgba(50,87,128,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 2.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(72,123,182,1.0)',
            }
        }
        map.createPane('pane_Blue_4');
        map.getPane('pane_Blue_4').style.zIndex = 404;
        map.getPane('pane_Blue_4').style['mix-blend-mode'] = 'normal';
        var layer_Blue_4 = new L.geoJson(json_Blue_4, {
            attribution: '',
            pane: 'pane_Blue_4',
            onEachFeature: pop_Blue_4,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_Blue_4_0(feature));
            },
        });
        bounds_group.addLayer(layer_Blue_4);
        map.addLayer(layer_Blue_4);
        function pop_green_5(feature, layer) {
			var popupContent = '<div class="-Container">' +
                                        '<div class="div1"> <strong>:כתובת </strong>' + (feature.properties['כתובת'] !== null ? Autolinker.link(String(feature.properties['כתובת'])) : '') + ' </div>' +
                                        '<div class="div2"> <strong>:סוג</strong>' + (feature.properties['סוג'] !== null ? Autolinker.link(String(feature.properties['סוג'])) : '') + ' </div>' +
                                        '<img class="div4" src="https://i.ibb.co/Hpkjzsd/2.png" alt="purple2" border="0"/>' +
                                        '<div class="div5"><button onclick="on()">מה עליי לזרוק בפח זה?</button> </div>' +
                                    '</div>'
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_green_5_0() {
            return {
                pane: 'pane_green_5',
                radius: 8.0,
                opacity: 1,
                color: 'rgba(61,128,53,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 2.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(84,176,74,1.0)',
            }
        }
        map.createPane('pane_green_5');
        map.getPane('pane_green_5').style.zIndex = 405;
        map.getPane('pane_green_5').style['mix-blend-mode'] = 'normal';
        var layer_green_5 = new L.geoJson(json_green_5, {
            attribution: '',
            pane: 'pane_green_5',
            onEachFeature: pop_green_5,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_green_5_0(feature));
            },
        });
        bounds_group.addLayer(layer_green_5);
        map.addLayer(layer_green_5);
        var osmGeocoder = new L.Control.Geocoder({
            collapsed: true,
            position: 'topleft',
            text: 'Search',
            title: 'Testing'
        }).addTo(map);
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .className += ' fa fa-search';
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .title += 'Search for a place';
        var baseMaps = {};
        L.control.layers(baseMaps,{'<img src="legend/green_5.png" /> Green': layer_green_5,
            '<img src="legend/Blue_4.png" /> Blue': layer_Blue_4,
            '<img src="legend/Carton_3.png" /> Carton': layer_Carton_3,
            '<img src="legend/Orange_2.png" /> Orange': layer_Orange_2,
            '<img src="legend/Purple_1.png" /> Purple': layer_Purple_1,
                "OSM Standard": layer_OSMStandard_0,}).addTo(map);
        setBounds();
		function on() {
		  document.getElementById("overlay").style.display = "flex";
		}

		function off() {
		  document.getElementById("overlay").style.display = "none";
		}
        </script>
    </body>
</html>
