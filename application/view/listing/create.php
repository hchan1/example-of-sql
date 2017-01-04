

<form  id="create-form" action="<?php echo URL; ?>listing/upload" method="POST" enctype="multipart/form-data">
	<div id="create-listing-page">

	<input name="cookie-Id" value="hello">

	<div class="container" id="create-listing-form">
		
		<div class="row" id="address-input">
			<div class="col-xs-9" id="address-input-left">
				<input type="text" id = "address-input-form" class="form-control form-lg" name="address-full" placeholder="street, city, state, zip" aria-describedby="sizing-addon2" required>
			</div>	


			<div class="col-xs-3" id="address-input-right">
				<input type="text" class="form-control form-lg" name="unit-number" placeholder="#" aria-describedby="sizing-addon2">
			</div>

			<input type="hidden" name="address" value="">
			<input type="hidden" name="city" value="">
			<input type="hidden" name="state" value="">
			<input type="hidden" name="zip" value="">
			<input type="hidden" name="lat" value="">
			<input type="hidden" name="lng" value="">
		</div>
		
		<div class="row">
			<div class="col-xs-12">
				<h1 class="purple-text text-center"> Details </h1>
				<h4 class="purple-text" id="listing-type-h3">Listing Type</h4>	
			</div>
		</div>

		<div class="row" id="housetype-btn-row" data-toggle="buttons">
			<div class="col-xs-6 col-sm-6 col-md-3">
				<button type="button" id="apt-btn" class="btn btn-default btn-lg btn-block listingtype-btn">
					 Apartment	
				</button>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-3">
				<button type="button" id="conodo-btn" class="btn btn-default btn-lg btn-block listingtype-btn">
					 Condo
				</button>
			</div>

			<div class="col-xs-6 col-sm-6 col-md-3">
				<button type="button" id="townh-btn" class="btn btn-default btn-lg btn-block listingtype-btn">
				Townhouse
				</button>
			</div>

			<div class="col-xs-6 col-sm-6 col-md-3">
				<button type="button" id="house-btn" class="btn btn-default btn-lg btn-block listingtype-btn">
				House
				</button>
			</div>
			<input type="hidden" class="hidden-field" name="listing type" value="">
		</div>
		<!-- end listing-type button row -->
		<!-- <div class="container"> -->

		<div class="row" id="create-listing-dropdown-row">
			

		<div class="col-xs-4">
			<h4 class="purple-text">Beds</h4>
			<div class="dropdown clearfix input-dropdown"> 
				<button class="btn dropdown-toggle dropdown-button form-lg" type="button" id="dropdown-beds" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Beds <span class="caret"></span> </button> 
			
				<ul class="dropdown-menu" aria-labelledby="dropdown-beds"> 
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li> 
					<li><a href="#">3</a></li> 
					<li><a href="#">4</a></li>  
				</ul> 
				<input type="hidden" class="hidden-field"  name="bedrooms" value="1">
			</div>	
		</div>

		<div class="col-xs-4">

			<h4 class="purple-text">Bathroom</h4>
			<div class="dropdown clearfix input-dropdown"> 
				<button class="btn dropdown-toggle dropdown-button form-lg" type="button" id="dropdown-baths" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Bath <span class="caret"></span> </button> 
			
				<ul class="dropdown-menu" aria-labelledby="dropdown-baths"> 
					<li><a href="#">1</a></li> 
					<li><a href="#">2</a></li> 
					<li><a href="#">3</a></li> 
					<li><a href="#">4</a></li>  
				</ul>
				<input type="hidden" class="hidden-field" name="bathrooms" value="1">
			</div>	
		</div>

		<div class="col-xs-4">
			<h4 class="purple-text">Area</h4>
			<input type="text" name="area" class="form-control form-lg" placeholder="SQ FT." aria-describedby="sizing-addon2">
		</div>
			
		</div>
	<!-- </div> -->
	<!-- end dropdown row -->

		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-4">
				<h5 class="purple-text"> Rent </h5>
				<input type="text" name="price" class="form-control form-lg" placeholder="$/mo" aria-describedby="sizing-addon1" required>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-4">
				<h5 class="purple-text"> Deposit </h5>
				<input type="text" name="deposit" class="form-control form-lg" placeholder="$" aria-describedby="sizing-addon3" required>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-2">
				<h5 class="purple-text"> Available </h5>
				<input type="text" class="form-control form-lg" placeholder="mm/dd/yy" aria-describedby="sizing-addon3">
			</div>
			<div class="col-xs-6 col-sm-6 col-md-2">
				<h5 class="purple-text"> Lease Legnth </h5>
				<input type="text" class="form-control form-lg" placeholder="12 mos" aria-describedby="sizing-addon3">
			</div>
		</div>

		<div class="dropzone well well-lg" id = "add-photo-well">
	 		<div class="container">
				<h4 class="purple-text">Photos</h4>
				<div id="picture-drop-area"  class="row">
						<!-- <div class="col-xs-4">
							<button type="button" class="btn btn-default">Add Photo</button>
						</div>

						<div class="col-xs-8">
							<p class="text-left">Drag and drop or use button</p>
						</div> -->
				</div>
			</div>
		</div>
	<!-- end photo upload well -->

		<div id="description-container">
			<h2 class="text-left"> Description and Amenities</h2>
			<form>
    			<div class="form-group">
      				<label for="comment">Comment:</label>
      				<textarea name="description" class="form-control" rows="5" id="comment" required></textarea>
    			</div>
  			</form>
		</div>
	<!-- end description area -->
	</div><!-- create-listing-form end -->

	<div class="container" id="listing-last-button-row">
			<div class="pull-right">
				<button type="button" class="btn btn-default btn-lg  listingtype-btn"
				id="save-listing-button">
					Cancel
				</button>
				<input type="submit" name="upload" value="Create" class="btn btn-default btn-lg  listingtype-btn btn-ylw"/>
			</div>
	</div>

</div>
<!-- end listing page -->
</form>

<script type="text/javascript">
	$('html').bind('keypress', function(e)
{
   if(e.keyCode == 13)
   {
      return false;
   }
});

	$(document).ready(function() {
		console.log(docCookies.keys());
		console.log(docCookies.getItem("PHPSESSID"));
		$( "input[name='cookie-Id']").val(docCookies.getItem("PHPSESSID"));
		Dropzone.options.addPhotoWell = {
			url: "<?php echo URL; ?>home/upload_image",
			addRemoveLinks: true,
			success: function(file, response){
                console.log(response);
            }, 
            sending: function(file, xhr, formData){
            	formData.append('cookieId', docCookies.getItem("PHPSESSID"));
            }
		}
		
		var defaultBounds = new google.maps.LatLngBounds(
  			new google.maps.LatLng(37.789639,  -122.450998),
  			new google.maps.LatLng(37.789639, -122.450998));

			var input = document.getElementById('address-input-form');
			var options = { 
  				 bounds: defaultBounds,
  				// types: ['(cities)'],
  				componentRestrictions: {country: 'us'}
			};

		autocomplete = new google.maps.places.Autocomplete(input, options);
		var lat = 0;
		var lng = 0;
		autocomplete.addListener('place_changed', function(){
			var place = autocomplete.getPlace();
			lat = place.geometry.location.lat()
			lng = place.geometry.location.lng()
			console.log(autocomplete.getPlace());
			console.log(place.geometry.location.lat());
			console.log(place.geometry.location.lng());
			$('[name=lat]').val(place.geometry.location.lat());
			$('[name=lng]').val(place.geometry.location.lng());
			$('[name=address-input-form]').val(autocomplete.getPlace().formatted_address);
			var x = autocomplete.getPlace().formatted_address.split(',');
			$('[name=address]').val(x[0]	);
			$('[name=city]').val(x[1]);
			var y = x[2].split(' ');
			console.log(y);
			$('[name=state]').val(y[1]);
			$('[name=zip]').val(y[2]);
			computeDistanceFromSchool(place.formatted_address);

		});

  		var service = new google.maps.DistanceMatrixService();
  		function computeDistanceFromSchool(address) {
  			var sfsu_loc = new google.maps.LatLng(37.7211776, -122.47696229999997);
  			console.log(address);
  			var travelModes = ['WALKING', 'BICYCLING', 'TRANSIT', 'DRIVING']
  			for (let mode of travelModes) {
  				service.getDistanceMatrix({
		     	origins: [sfsu_loc],
				destinations: [address],
				travelMode: mode,
			// transitOptions: TransitOptions,
			// drivingOptions: DrivingOptions,
			// unitSystem: UnitSystem,
			// avoidHighways: Boolean,
			// avoidTolls: Boolean,
			}, function(response, status){
				console.log(JSON.stringify(response));
				var elem = response.rows[0].elements[0]
				$('#create-form').append(mode + "in seconds")
				var input = $("<input>")
					 .attr("type", "hidden")
					.attr("name", mode.toLowerCase()).val(elem.duration.value);
					$('#create-form').append($(input));

				if(mode==='TRANSIT') {
					var input = $("<input>")
					// .attr("type", "hidden")
					.attr("name", mode.toLowerCase()).val(elem.fare.text);
					$('#create-form').append($(input));


					console.log('it is transit boy');
				}
			});	

  			}

  			
  		}
	});
</script>


