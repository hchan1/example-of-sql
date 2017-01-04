<br>
<br><br>
<body>

<?php $address = str_replace(' ', '+',  htmlspecialchars($detail->address, ENT_QUOTES, 'UTF-8'));
$city = str_replace(' ', '+',  htmlspecialchars($detail->city, ENT_QUOTES, 'UTF-8'));
?>
<div class="container">
    <div id="mycarousel" class="carousel slide col-lg-6" data-ride="carousel" data-interval="3000" style="max-height: 730px; overflow: hidden;">
        <ol class="carousel-indicators">
            <li data-target="#mycarousel" data-slide-to="0" class="active"> </li>
            <?php for( $index = 1; $index< count(glob($detail->image."*")); $index++ ) { ?>
                <li data-target="#myCarousel" data-slide-to=<?php echo $index ?>></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner" style="width: 100%; height: auto;">
            <div class="item active">
                <?php echo '<img style="margin: 0 auto; max-height: 500px; min-height: 500px;" src="data:image/png;base64,'. base64_encode(file_get_contents(glob($detail->image."*")[0])) .'" />'; ?>
            </div>
            <?php for( $index = 1; $index< count(glob($detail->image."*")); $index++ ) { ?>
                <div class="item">
                    <?php echo '<img style="margin: 0 auto; max-height: 500px; min-height: 500px;" src="data:image/png;base64,'. base64_encode(file_get_contents(glob($detail->image."*")[$index])) .'" />'; ?>
                </div>
            <?php } ?>
        </div>
        <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev" style="background-image: none; width: 15%;">
            <span class="glyphicon glyphicon-chevron-left" style="color: white;"></span>
        </a>
        <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next" style="background-image: none; width: 15%;">
            <span class="glyphicon glyphicon-chevron-right" style="color: white;"></span>
        </a>
    </div>
    <div style="height: 500px;" id="map" class="col-lg-6 column">
    </div>
    <div class="media col-md-12">
        <div class="descript1" style="border: 1px solid black; background-color: rgb(50,2,50); ">
            <h1 class="media-heading pull-left"  style="margin-right: 5%; color: rgb(254,203,69);"><?php echo htmlspecialchars($detail->bedroom, ENT_QUOTES, 'UTF-8'); ?> Bedroom</h1>
            <h1 class="media-heading pull-left"  style="margin-right: 36%; color: rgb(254,203,69);"><?php echo htmlspecialchars($detail->bathroom, ENT_QUOTES, 'UTF-8'); ?> Bathroom</h1>
            <h1 class="media-heading pull-left" style="padding-right: 2%; color: rgb(254,203,69);">Monthly Rent: $<?php echo htmlspecialchars($detail->price, ENT_QUOTES, 'UTF-8'); ?></h1>
            <h1 class="media-heading" style="margin-right: 10%; color: rgb(254,203,69);">Security Deposit: $1000</h1>
            <button type="button" style="width: 25%; color: gold; background-color: rgb(50,2,50);" data-toggle="modal" data-target="#apply-listing-modal" class="apply-btn">Apply</button>
            <h3 class="media-heading" style="color: rgb(254,203,69);">Rental Type: <?php echo htmlspecialchars($detail->type, ENT_QUOTES, 'UTF-8'); ?></h3>
            <h3 class="media-heading" style="color: rgb(254,203,69);">Walking time to SFSU: <?php echo htmlspecialchars($detail->walk, ENT_QUOTES, 'UTF-8'); ?>m</h3>
            <h3 class="media-heading" style="color: rgb(254,203,69);">Drive time to SFSU: <?php echo htmlspecialchars($detail->car, ENT_QUOTES, 'UTF-8'); ?>m</h3>
            <h3 class="media-heading" style="color: rgb(254,203,69);">Biking time to SFSU: <?php echo htmlspecialchars($detail->bike, ENT_QUOTES, 'UTF-8'); ?>m</h3>
            <h3 class="media-heading" style="color: rgb(254,203,69);">Bus Fair Amount to SFSU: $<?php echo htmlspecialchars($detail->bus, ENT_QUOTES, 'UTF-8'); ?></h3>
            
        </div>
        <div class="descript2" style="border: 1px solid black;">
            <h1 style="padding: 2px; text-decoration: underline;">Description</h1>
            <p1 style="font-size: 20px; padding: 5px;"><?php echo htmlspecialchars($detail->description, ENT_QUOTES, 'UTF-8'); ?></p1>
        </div>

    </div>
</div>


<script>
      function initMap() {
          var geocoder = new google.maps.Geocoder();
          var address = "<?php echo $detail->address.", ".$detail->city.", USA"; ?>";

          geocoder.geocode({'address': address}, function (results, status) {

              if (status == google.maps.GeocoderStatus.OK) {
                  var latitude = results[0].geometry.location.lat();
                  var longitude = results[0].geometry.location.lng();
                  var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 14,
                      center: {lat: latitude, lng: longitude},
                      mapTypeId: 'roadmap'
                  });

                  var cityCircle = new google.maps.Circle({
                      strokeColor: '#4B0082',
                      strokeOpacity: 0.8,
                      strokeWeight: 2,
                      fillColor: '#4B0082',
                      fillOpacity: 0.35,
                      map: map,
                      center: {lat: latitude, lng: longitude},
                      radius: 500
                  });
              }
          });
      }
</script>

    <script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3ERbYbR3Bca3FnjBzF3W6UwdkyuUlMpE&callback=initMap" type="text/javascript">
    </script>

</body>