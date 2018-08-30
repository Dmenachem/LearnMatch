
	<!-- Footer -->

	<footer class="footer fixed-bottom">
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="copyright_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
							<div class="cr"> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Dor Menachem, Chen Cohen & Iris Spivak</div>
							<div class="cr_right ml-md-auto">
								<div class="footer_social">
									<span class="cr_social_title">follow us</span>
									<ul>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../js/custom.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArcdtxZOTzC0dK3Q9467iDtUC1cv7NtH4&libraries=places&callback=initAutocomplete" async defer></script>
<script>
	var placeSearch, autocomplete, geocoder;

	function initAutocomplete() {
	  geocoder = new google.maps.Geocoder();
	  autocomplete = new google.maps.places.Autocomplete(
		  (document.getElementById('autocomplete'))/*,
		  {types: ['(cities)']}*/);

	  autocomplete.addListener('place_changed', fillInAddress);
	}

	function codeAddress(address) {
		geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == 'OK') {
			alert(results[0].geometry.location);
		  } else {
			alert('Geocode was not successful for the following reason: ' + status);
		  }
		});
	  }

	function fillInAddress() {
	  var place = autocomplete.getPlace();
	  alert(place.place_id);
	  //   codeAddress(document.getElementById('autocomplete').value);
	}
</script>

</body>
</html>