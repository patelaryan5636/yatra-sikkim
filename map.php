<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css"
      rel="stylesheet"
    />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link
      rel="stylesheet"
      href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css"
      type="text/css"
    />
    <title>Gandiv Map</title>
    <style>
      body {
        margin: 0;
      }

      #map {
        height: 100vh;
        width: 100vw;
      }
    </style>
    <script src="script.js" defer></script>
  </head>
  <body>
    <?php 
        include("includes/header.php");
    ?>
    <nav></nav>
    <div id="map"></div>
    <?php
    include("includes/footer.php");
    ?>
  </body>
</html>
