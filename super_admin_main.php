
<?php 
require('db_connect.php');
$user_name= $_GET['current_user'];
?> 

<style type="text/css">
.title_bar{
    position: relative;
    background-color:blue;
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
    font-size: 15px;
    border: 2px 
    solid #708090;
    border-radius: 2px;
    padding:3px;
    margin-top:1px;
     margin-right:20px;

}

</style>


<!doctype html>
<style>* {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
      
        vertical-align: baseline;
        
    }</style>

<html lang="en">
    <head>
    	<div style = "width:100vw;height:20vh;">
	       <div class = "title_bar" > 
                <div class = "title_bar_text">
                    <p id = "user_name" style="font-size: 24px; ">User Name: <?php echo $user_name;?><br><br></p>
                </div>
                <select class = "drop_down" onChange="top.location.href=this.options[this.selectedIndex].value;"">
                    <option selected="selected" value = "super_admin_main.php">Select Action</option>
                    <option value="super_admin_muni.php">Edit Municipality</option>
                    <option value="super_admin_edit_employees.php">Edit Super Users</option>
                    <option value="super_admin_edit_bin_types.php">Edit Bin Types</option>
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
            width: 100vw;
            height: 80vh;
        }
        </style>
        <title></title>
    </head>
    <body>	
        <div id="map">
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
        <script src="data/sample_1.js"></script>
        <script>
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[32.12545528948175,34.819644190593806],[32.14941400661273,34.87602330613151]]);
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
        function pop_sample_1(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['id'] !== null ? Autolinker.link(String(feature.properties['id'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_sample_1_0() {
            return {
                pane: 'pane_sample_1',
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
        map.createPane('pane_sample_1');
        map.getPane('pane_sample_1').style.zIndex = 401;
        map.getPane('pane_sample_1').style['mix-blend-mode'] = 'normal';
        var layer_sample_1 = new L.geoJson(json_sample_1, {
            attribution: '',
            pane: 'pane_sample_1',
            onEachFeature: pop_sample_1,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_sample_1_0(feature));
            },
        });
        bounds_group.addLayer(layer_sample_1);
        map.addLayer(layer_sample_1);
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
        L.control.layers(baseMaps,{'<img src="legend/sample_1.png" /> sample': layer_sample_1,"OSM Standard": layer_OSMStandard_0,}).addTo(map);
        setBounds();
        </script>
    </body>
</html>
