<div class="row">

    <div class="col-lg-3 col-md-4 ">

        <div class="card mb-0 shadow-none">

            <div class="card-body">

                <!-- login div -->

                <h3 class="text-center m-0">

                    <a href="<?php echo base_url(); ?>" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/logo-sm.png" width="150" alt="logo" class="my-3"></a>

                </h3>

                <div class="px-1">

                    <h4 class="text-muted font-18 mb-2 text-center">EV Platform</h4>

                    <p class="text-muted text-center ">Lets Charge, Share and Earn</p>

                    <form class="form-horizontal my-2" action="#" id="signup_form" name="signup_form" method="post">

                        <div class="r_success_msg otpsended min-hirght"></div>

                        <div class="tab_wzard">

                            <div class="form-group">

                                <label for="username">Name</label>

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-o"></i></span>

                                    </div>

                                    <input type="text" class="form-control input" id="username" name="username" placeholder="Enter Name" required>

                                </div>                                    

                            </div>

                            <div class="form-group">

                                <label for="username">Email Address</label>

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope-o"></i></span>

                                    </div>

                                    <input type="text" class="form-control input" id="email" name="email" placeholder="Email Address" required>

                                    <span id="email_result" class="result_msg"></span>  

                                </div> 

                            </div>

                            <div class="form-group">

                                <label for="phone">Phone Number (Mobile)</label>

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon3-phone"><i class="fa fa-phone"></i></span>

                                    </div>

                                    <input type="text" class="form-control input" id="phone" name="phone" placeholder="Phone Number" maxlength="10" required>

                                    <span id="phone_result" class="result_msg"></span>               

                                </div>

                            </div>

                        </div>



                        <div class="tab_wzard">

                            <div class="form-group">

                                <label for="userpassword">Make</label>

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon5"><i class="fa fa-car"></i></span>

                                    </div>

                                    <select class="form-control input" name="make"  id="carmake">

                                        <option value="">Select Make</option>

                                    </select>

                                </div>                                

                            </div>

                            <div class="form-group">

                                <label for="userpassword">Models</label>

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon6"><i class="fa fa-car"></i></span>

                                    </div>

                                    <select class="form-control input" name="models" id="carmodels" disabled="">

                                        <option value="">Select Models</option>

                                    </select>

                                </div>                                

                            </div>

                        </div>



                        <div class="tab_wzard">



                            <div class="form-group " id="otp_input">



                                <label for="opt">OTP </label>



                                <div class="input-group mb-1">



                                    <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon4"><i class="fa fa-key"></i></span>



                                    </div>



                                    <input type="text" class="form-control input" value="" id="opt" placeholder="Enter OTP" name="opt">

                                    <span id="otp_result" class="result_msg"></span>                              



                                </div>    

                                <div class="col-md-12 resend p-0">

                                    <a href="#" id="resend" class="" resend=""><i class="fa fa-repeat" aria-hidden="true"></i> Resend</a>

                                </div>





                            </div>



                            <div class="form-group row ">



                                <div class="col-sm-12">



                                    <div class="custom-control custom-checkbox">



                                        <input type="checkbox" class="custom-control-input input" id="customControlInline" required>



                                        <label class="custom-control-label" for="customControlInline">



                                            <span class="font-13 text-muted mb-0">By registering you agree to enertia.tech <a href="#">Terms of Use</a></span>

                                        </label>

                                    </div>





                                </div>                                    



                            </div>



                        </div>



                        <div  class="form-group mb-0 row p-relative">



                            <div class="loader loader_form"><img width="20" src="<?php echo base_url(); ?>assets/images/loading.gif"></div>



                            <div class="col-12 mt-3">



                                <button type="button" class="btn btn-primary btn-block waves-effect waves-light nextBtn_signup" id="nextBtn" >Move Forward ?</button>



                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light hide submit_to_action" id="submit_to_register" name="register" value="Register" > Join to Contribute <i class="fa fa-sign-in ml-1"></i></button>



                                <button type="button" class="btn btn-primary btn-block waves-effect waves-light" id="prevBtn" onclick="nextPrev(-1)">Move Back?</button>

                            </div>



                            <div class="col-md-6 col-sm-6 col-xs-12 mt-3">

                                <a onclick="fbLogin();" class="btn btn-facebook col-md-12">

                                    <i class="fa fa-facebook mr-2"></i> 

                                    Facebook 

                                </a>

                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 mt-3">

                                <button type="button" class="btn btn-googleplus col-md-12">

                                    <i class="fa fa-google-plus mr-2"></i> Google+

                                </button>

                            </div>



                        </div>



                    </form>



                </div>



                <div class="m-3 text-center  p-3 text-primary">

                    <h4 class="" style="color: #0066ff;">Already have an Account ? </h4>

                    <a href="<?php echo base_url();?>login" class="btn btn-primary waves-effect waves-light">Log In</a>                

                </div>



                <div class="mt-3 text-center">



                    <p class="mb-0"> ©2019 - ENERTIA - Dubai <img src="<?php echo base_url('assets/images/footer.png'); ?>" width="50"> by ThreeFold</p>



                </div>

                <!-- login div -->

            </div>

        </div>

    </div>

    <div class="col-lg-9 col-md-8 p-0  d-flex justify-content-center  h-100vh-s" id="map">

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
          // url: "https://api.openchargemap.io/v2/poi/?output=json&latitude=654356&longitude=765765",
          url:"https://api.openchargemap.io/v2/poi/?output=json&latitude="+window.lat+"&longitude="+window.long+"",  
          method:"get",  
          data:form.serialize(),  
          dataType:'json',
          success: function( data ) {
            if (data != null) {
              Api2marker(data);                    
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