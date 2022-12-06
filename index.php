<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - distance between two points</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="map" id="map"></div>

<div class="wrapper">
    <form action="!" id="formDestination">
        <div class="form-group">
            <label>Origin: </label>
            <input type="text" id="fromPlaces" class="form-control" placeholder="Enter a location" value="" />
        </div>

        <div class="form-group">
            <label>Destination: </label>
            <input type="text" id="toPlaces" class="form-control" placeholder="Enter a location" value="" />
        </div>

        <input type="submit" value="Calculation" class="btn btn-primary" id="submitDestination">
    </form>

    <div class="data-box">
        <div id="resultDistance" class="box"></div>
        <div id="resultDuration" class="box"></div>
        <div id="result" class="box" style="color: #ff7e7e"></div>
    </div>
</div>
<!-- partial -->
  <script src='https://maps.googleapis.com/maps/api/js?libraries=places&amp;language=en&amp;key=AIzaSyD61CGRsenVDXkRMrBzxQnVTtL7EZz0k_c'></script><script  src="./script.js"></script>

</body>
</html>
