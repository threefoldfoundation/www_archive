<div class="row">
    <div class="col-lg-3 col-md-4 h-100vh">
        <div class="card mb-0 shadow-none h-100vh">
            <div class="card-body">
                <!-- login div -->
                <h3 class="text-center m-0">
                    <a href="<?php echo base_url(); ?>" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/logo-sm.png" width="150" alt="logo" class="my-3"></a>
                </h3>
                <div class="px-1">
                    <h4 class="text-muted font-18 mb-2 text-center">EV PLatform</h4>
                    <p class="text-muted text-center">Login with your Mobile or Facebook below</p>
                    <form class="form-horizontal my-2" action="#" method="post">
                        <div class="r_success_msg otpsended min-hirght"></div>
                        <div class="tab_wzard">
                            <div class="form-group">
                                <label for="login_phone">Phone Number (Mobile)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3-phone"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control input" id="login_phone" name="login_phone" placeholder="Phone Number">
                                    <span id="login_phone_result" class="result_msg"></span>                                 
                                </div>     
                            </div>
                        </div>
                        <div class="tab_wzard">
                            <div class="form-group">
                                <label for="opt">OTP (One Time Password) </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="text" class="form-control input" value="" id="opt" placeholder="Enter OTP sent via SMS" name="opt">
                                    <span id="otp_result" class="result_msg"></span>                               
                                </div> 
                                <div class="col-md-12 resend p-0">
                                    <a href="#" id="resend" class="resend" resend=""><i class="fa fa-repeat" aria-hidden="true"></i> Resend</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 row">
                            <div class="col-12 mt-3">
                                <button class="btn btn-primary btn-block waves-effect waves-light nextBtn_login" type="button" id="nextBtn"  name="get_otp">Phone Login<i class="fa fa-arrow-right ml-1"></i></button>
                                <button class="btn btn-primary btn-block waves-effect waves-light hide submit_to_action" type="button" name="submit_to_login" id="submit_to_login">Got the Code? Lets Login now <i class="fa fa-sign-in ml-1"></i></button>
                                <button type="button" class="btn btn-primary btn-block waves-effect waves-light hide" id="prevBtn" onclick="nextPrev(-1)">Move Back?</button>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 mt-3">
                                <a onclick="fbLogin();" class="btn btn-facebook col-md-12">
                                    <i class="fa fa-facebook mr-2"></i> 
                                    Facebook 
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 mt-3">
                                <button type="button" class="btn btn-googleplus col-md-12 googleplus" >
                                    <i class="fa fa-google-plus mr-2"></i> Google+
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="m-3 text-center  p-3 text-primary">
                    <h4 class="" style="color: #0066ff;">Don't have an Account ?</h4>
                    <a href="<?php echo base_url('signup'); ?>" class="btn btn-primary waves-effect waves-light">Sign Up</a>                
                </div>
                <div class="mt-3 text-center">
                    <?php $this->view('form_footer'); ?>
                </div>
                <!-- login div -->
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8 p-0 d-flex h-100vh justify-content-center" id="map">
    </div>
</div>
<script type="text/javascript">
    function onFilter() {
        var form = $('#filtter_form');
        $.ajax({  
             url:"<?php echo base_url(); ?>api/2",  
             method:"post",  
             data:{lat: window.lat, long: window.long},  
             dataType:'Json',
             success: function(data) {
                if (data.status == "true") {
                    Apimarker(data.data);
                }
             },
             error: function(data) {
                console.log(data);
             }
        });
        $.ajax({  
             url:"<?php echo base_url(); ?>api2",  
             method:"post",  
             data:form.serialize(),  
             dataType:'json',
             success: function( data ) {
                // console.log(data);
                if (data.status == "true") {
                    Api2marker(data.data);                    
                }
             },
             error: function( ) {

             }
        });
    }
    function clearfiltter() {
        $("#nearestby").attr("checked", true);
        $("#plug_type_checkboxs input:checkbox").attr("checked", false);
        $("#power_checkboxs input:checkbox").attr("checked", false);
        onFilter();
    }

    /*morezoom*/
  function morezoom(station_lat, station_long) {
     
      var directionDisplay;
      var directionsService = new google.maps.DirectionsService();

      directionDisplay = new google.maps.DirectionsRenderer();
      directionDisplay.setMap(window.map);

      var start = window.lat+','+ window.long;
      var end = station_lat+', '+station_long;
      var request = {
        origin:start, 
        destination:end,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
      };
      directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          directionDisplay.setDirections(response);
          var myRoute = response.routes[0];
        }
      });
      window.map.setZoom(20);
      window.map.setCenter(new google.maps.LatLng(station_lat, station_long));
      $('.stations-list-view').slideUp('slow');
      $('.mapDashboard').fadeIn('slow');
  }

   var stationViewStatus = localStorage.getItem("reloading");
  setTimeout(function() {
    if (stationViewStatus == 'true') {
      localStorage.setItem("reloading", false);
      var lat = localStorage.getItem("lat");
      var long = localStorage.getItem("long");
      morezoom(lat, long);
    }
  }, 3000);
 
</script>