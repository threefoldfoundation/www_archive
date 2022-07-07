<div class="modal fade" id="exampleModalform" tabindex="-1" role="dialog" style="display: none; " aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title align-self-center mt-0">Charge Point Information</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

            </div>

            <div class="modal-body infomap">

                <div id="mappopuinfohtml">

                </div>

            </div>   

        </div>

    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php 
    // $this->load->view('dashboard/includes/script'); 
?>
<script>
    var client_id = '839737356370775';
    var redirect_uri = 'https://enertia.tech/facebook';
    window.fbAsyncInit = function() {
        // FB JavaScript SDK configuration and setup
        FB.init({
          appId      : client_id, // FB App ID
          // appId      : '591300247949299', // FB App ID
          cookie     : true,  // enable cookies to allow the server to access the session
          xfbml      : true,  // parse social plugins on this page
          version    : 'v2.10' // use graph api version 2.10
        });

        // Check whether the user already logged in
        FB.getLoginStatus(function(response) {
            // console.log(response);
            if (response.status === 'connected') {
            //     //display user data
                if (getHashValue('state') == "fblogin") {
                    getFbUserData();
                }
            }
        });
    };

    // Load the JavaScript SDK asynchronously

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function getHashValue(key) {
        var matches = location.hash.match(new RegExp(key+'=([^&]*)'));
        return matches ? matches[1] : null;
    }
    // Facebook login with JavaScript SDK
    function fbLogin() {
        window.location = encodeURI("https://www.facebook.com/dialog/oauth?client_id="+client_id+"&redirect_uri="+redirect_uri+"&response_type=token&scope=email,public_profile&state=fblogin");
    }

    // Fetch the user profile data from facebook
    function getFbUserData(){
        FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,cover,name,about,age_range,birthday,education,devices,gender,picture'},
        function (response) {
            // Save user data
            saveUserData(response);
        });
    }

    // Save user data to the database
    function saveUserData(userData){
        // console.log(userData);
        if (userData.email != 'undefined' && userData.email != null) {
            $.ajax({  
                 url:"<?php echo base_url(); ?>signup/facebook",  
                 method:"post",  
                 data:{social:'Social', userData: JSON.stringify(userData)},  
                 dataType:'json',
                 success:function(data){  
                    if (data.status=='success') {
                        if (data.UserPhone == '') {
                            window.location.href = "<?php echo base_url('phone'); ?>";
                        }else{
                            window.location.href = "<?php echo base_url('dashboard'); ?>";
                        }
                    }else{
                        alert(data.msg);
                    }
                 },
                 error: function(){
                 }
            });
        }else{
            $('.facebook_not_geting_email').html('<p>We were unable to retrieve your email with Facebook. Please check your privacy settings and use the regular SignUp option to join us</p><a href="<?php echo base_url('signup'); ?>" class="btn btn-primary waves-effect waves-light">Sign Up</a>');
        }
    }

    // Logout from facebook
    function fbLogout() {
        FB.logout(function() {
            document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
            document.getElementById('fbLink').innerHTML = '<img src="<?php echo base_url('assets/images/fblogin.png'); ?>"/>';
            document.getElementById('userData').innerHTML = '';
            document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
        });
    }
</script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waves.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script src="<?php echo base_url(); ?>assets/js/data.js"></script>
<script>
    var country_code = '';
    $( document ).ready(function() {
        $.ajax({  
             url:"//jsonip.com",  
             method:"get",  
             dataType: 'jsonp',
             crossDomain: true,
             success:function(data){ 
                $.ajax({  
                     url:"<?php echo base_url(); ?>getcuntrycode/"+data.ip, 
                     method:"get",  
                     dataType: "json",
                     success:function(data){
                        var cccode = $(cuntryjson)
                            .filter(function (i,n){
                                return n.code===data;
                            });
                            country_code = cccode[0].phoneCode;
                        $('#basic-addon3-phone').html(cccode[0].phoneCode);
                     }
                 });
             }  
        });  
    });

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab
    function showTab(n) {
        if ( $('.tab_wzard').length > 0) {
          var x = document.getElementsByClassName("tab_wzard");
          x[n].style.display = "block";
          if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
          } else {
            document.getElementById("prevBtn").style.display = "inline";
          }
          if (n == (x.length - 1)) {
            $('.submit_to_action').removeClass('hide');
            $('#nextBtn').addClass('hide');
          } else {
            $('.submit_to_action').addClass('hide');
            $('#nextBtn').removeClass('hide');
          }
        }
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab_wzard");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        // document.getElementById("eventform").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab_wzard");
      y = x[currentTab].getElementsByClassName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      return valid; // return the valid status
    }

    $(document).ready(function(){  
        $('.googleplus').click(function(){
            $('.r_success_msg').html('<div class="alert alert-danger mb-0 alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i>Error ! Google+ plus method not available. please continue to facebook.</div>');
        });
        /*check email*/
        $('#email').change(function(){  
           var email = $('#email').val(); 
           if(email != ''){  
                $.ajax({  
                     url:"<?php echo base_url(); ?>ajax/email",  
                     method:"post",  
                     data:{email:email},  
                     success:function(data){  
                      $('#email_result').show().html(data);  
                     }  
                });  
                checkstep1button();
           }  
        });

        /*check degists only*/
        $("#phone, #login_phone").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#phone_result").show().html("Digits Only").show();
                return false;
            }
        });

        /*check phone number*/      
        $('#phone').change(function(){  
           var phone = $('#phone').val(); 
           if(phone != ''){  
                $.ajax({  
                     url:"<?php echo base_url(); ?>ajax/phone",  
                     method:"post",  
                     data:{phone:country_code+phone},  
                     success:function(data){  
                      $('#phone_result').show().html(data);  
                     }  
                }); 
                checkstep1button(); 
           }  
        });

        /*check phone number*/      
        $('#login_phone').change(function(){  
           var phone = $('#login_phone').val(); 
           if(phone != ''){  
                $.ajax({  
                     url:"<?php echo base_url(); ?>ajax/loginphone",  
                     method:"post",  
                     data:{phone:country_code+phone},  
                     success:function(data){ 
                        if (data.status=='false') {
                            $('#login_phone_result').show().html('<label class="text-danger"><i class="fa fa-times"></i></label>');  
                        }
                     }  
                }); 
           }  
        });

        /*check otp*/
        $("#opt").keyup(function (e) {
            var otp = $(this).val(); 
            if(otp != '' && otp.length >= 4){  
                $.ajax({  
                     url:"<?php echo base_url(); ?>ajax/otp",  
                     method:"post",  
                     data:{otp:otp},  
                     dataType:'json',
                     success:function(data){  
                        if (data.status == 'true') {
                            $('#otp_result').show().html('<label class="text-success"><i class="fa fa-check"></i></label>');  
                        }else{
                            $('#otp_result').show().html('<label class="text-danger"><i class="fa fa-times"></i></label>');  
                        }
                     }  
                });
            }  
        });

        /*submit first and second setp for signup*/
        $('.nextBtn_signup').click(function() {
            if (currentTab==0) {
                var username = $('#username').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                validateForm();
                if (username != '' && email != '' && phone != '') {
                    $('#resend').attr('resend',phone);
                    send_otp(phone);
                    nextPrev(1);
                    carmake();
                }
            }else if (currentTab==1) {
                var make = $('#carmake').val();
                var models = $('#carmodels').val();
                var userid = $('#userid').val();
                validateForm();
                if (make != '' && models != '' && userid != '') {
                nextPrev(1);
                }
            }
        });

        /*submit last setp fo signup*/
        $("#signup_form").submit(function(e) {
        // $('#submit_to_register').click(function() {
            e.preventDefault();
            var otp = $('#opt').val();
            var form = $(this);
            validateForm();
            $.ajax({  
                 url:"<?php echo base_url(); ?>ajax/otp",  
                 method:"post",  
                 data:{otp:otp},  
                 dataType:'json',
                 success:function(data){  
                    if (data.status == 'true') {
                        $('#otp_result').show().html('<label class="text-success"><i class="fa fa-check"></i></label>');  
                        if (otp != '') {
                            $('.loader_form').show();
                            // console.log(form.serialize());
                            $.ajax({  
                                 url:"<?php echo base_url(); ?>signup/post",  
                                 method:"post",  
                                 dataType: "json",
                                 data:form.serialize(),  
                                 success:function(data){ 
                                    $('.loader_form').hide(); 
                                    if (data.status == 'success') {
                                        $(".r_success_msg").html(data.msg).show();
                                        window.location.href='<?php echo base_url("/dashboard"); ?>';
                                    }else{
                                        $(".r_success_msg").html(data.msg).show();
                                    }
                                 },
                                 error: function(){
                                    $('.loader_form').hide(); 
                                 }
                            });  
                        }
                    }else{
                        $('#otp_result').show().html('<label class="text-danger"><i class="fa fa-times"></i></label>');  
                        $('.r_success_msg').html('<div class="alert alert-danger mb-0 alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i>Error ! Phone number has been already taken.</div>').show();  
                    }
                 }  
            });
        });

        /*make on change then get model*/
        $('#carmake').change(function(){
            var make = $(this).val();
            if (make != '') {
                $.ajax({  
                     url:"<?php echo base_url(); ?>carmodelget/"+make,  
                     method:"get",  
                     dataType: "json",
                     success:function(data){ 
                        var modeloption = '<option value="">Select Model</option>';
                        $.each(data, function( index, value ) {
                          modeloption += '<option value="'+value.modelID+'">'+value.modelName+' ('+value.modelYear+')</option>';
                        });
                        $('#carmodels').html(modeloption);
                        $('#carmodels').removeAttr('disabled');
                     },
                     error: function(data){
                     }
                });  
            }else{
                $('#carmodels').attr('disabled','disabled');
            }
        });

        /*login steps*/
        $('.nextBtn_login').click(function(){
            var phone = $('#login_phone').val();
            validateForm();
            if (phone != '') {
                $('.loader_form').show();
                $.ajax({  
                     url:"<?php echo base_url(); ?>ajax/loginphone",  
                     method:"post",  
                     dataType: "json",
                     data:{phone:country_code+phone},  
                     success:function(data){ 
                        $('.loader_form').hide(); 
                        if (data.status == 'true') {
                            $('#resend').attr('resend',data.userdata.UserPhone);
                            send_otp(data.userdata.UserPhone);
                            nextPrev(1);
                        }else{
                            $('#login_phone_result').html('<label class="text-danger"><i class="fa fa-times"></i></label>').show();  
                            $('.r_success_msg').html('<div class="alert alert-danger mb-0 alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i>Error ! Phone number not available.</div>').show();  
                        }
                     },
                     error: function(){
                        $('.loader_form').hide(); 
                     }
                });  
            }
        });

        /*for resend otp*/
        $('#resend').click(function(){
            var userid = $('#resend').attr('resend');
            send_otp(userid);
        });
        $('#submit_to_login').click(function(){
            var otp = $('#opt').val();
            var phone = $('#login_phone').val();
            validateForm();
            if (otp != '') {
                $.ajax({  
                     url:"<?php echo base_url(); ?>login/phone",  
                     method:"post",  
                     data:{otp:otp,phone:country_code+phone},  
                     dataType:'json',
                     success:function(data){  
                        if (data.status == 'true') {
                            window.location.href='<?php echo base_url("/dashboard"); ?>';
                        }else{
                            $('#otp_result').show().html('<label class="text-danger"><i class="fa fa-times"></i></label>');  
                        }
                     }  
                });
            }
        });
        /*login steps*/

        /*empty phone number facebook time submit form*/
        $('#submit_to_phone').click(function(){
            var phone = $('#phone').val();
            var make = $('#carmake').val();
            var models = $('#carmodels').val();
            if (validateFormCheck()) {
                $.ajax({  
                     url:"<?php echo base_url(); ?>ajax/loginphone",  
                     method:"post",  
                     data:{phone:country_code+phone,make:make,models:models},  
                     dataType:'json',
                     success:function(data){  
                        if (data.status=='true') {
                            $('#phone_result').show().html('<label class="text-danger"><i class="fa fa-times"></i></label>');
                            $('.r_success_msg').html('<div class="alert alert-danger mb-0 alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i>Error ! Phone number has been already taken.</div>').show();  
                        }else{
                            $.ajax({  
                                 url:"<?php echo base_url(); ?>phone/post",  
                                 method:"post",  
                                 data:{empty_phone:country_code+phone,make:make,models:models},  
                                 dataType:'json',
                                 success:function(data){  
                                    if (data.status == 'success') {
                                        window.location.href='<?php echo base_url("/dashboard"); ?>';
                                    }else{
                                        $('#r_success_msg').show().html('<label class="text-danger"><span class="glyphicon glyphicon-ok"></span>'+data.msg+'</label>');  
                                    }
                                 }  
                            });
                        }
                     }  
                }); 
            }else{
                $('#phone').addClass('invalid');
            }
        });
        /*empty phone number facebook time submit form*/
    });  

    function checkstep1button() {
        // $('#nextBtn').attr('disabled','disabled');
        if ($('#username').val() != '' && $('#email').val() != '' && $('#phone').val() != '') {
            // $('#nextBtn').removeAttr('disabled');
        }
    }

    function send_otp(phone) {
        $.ajax({  
             url:"<?php echo base_url(); ?>otp/send/"+phone,  
             method:"get",  
             dataType: "json",
             success:function(data){ 
                if (data==200) {
                    $('.otpsended').html('<div class="alert mb-0 alert-success alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i>Success ! OTP successfully Send.</div>');
                }
             },
             error: function(data){
                $('.otpsended').html('<div class="alert mb-0 alert-danger alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i>Error ! OTP not send. resend again.</div>');
             }
        });  
    }

    function is_opt_check(otp){
        $.ajax({  
             url:"<?php echo base_url(); ?>ajax/otp",  
             method:"post",  
             data:{otp:otp},  
             dataType:'json',
             success:function(data){  
                if (data.status == true) {
                    rturndata =  true;
                }else{
                    rturndata = false;
                }
             }  
        });
    }

    function carmake() {
        $.ajax({  
             url:"<?php echo base_url(); ?>carmakeget",  
             method:"get",  
             dataType: "json",
             success:function(data){ 
                var makeption = '<option value="">Select Make</option>';
                $.each(data, function( index, value ) {
                  makeption += '<option value="'+value.makeID+'">'+value.makeName+'</option>';
                });
                $('#carmake').html(makeption);
             },
             error: function(data){
             }
        });  
    }
    carmake();

    function validateFormCheck() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      y = document.getElementsByClassName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
                   // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      return valid; // return the valid status
    }
    /*<!-- google map with opencharge api -->*/

    /*showPosition*/
    var location_check = true;
    function showPosition(position){ 
        location.latitude=position.coords.latitude;
        location.longitude=position.coords.longitude;
         $.ajax({
            url : 'https://api.openchargemap.io/v2/poi/?output=json&latitude='+location.latitude+'&longitude='+location.longitude,
            method : 'get',
            dataType: 'json',
            contentType: "application/json",                 
            success: function(data) {
                pointmap(data,location);
            }
        });
    } 

     function setcentermap(location) {
    if ( $('.searchAddress')[0] ) {
      autoComplete(location)
    }
    var zoomm = 13;
    window.map = new  google.maps.Map(document.getElementById('map'), {
                      center: {lat: location.latitude, lng: location.longitude},
                      zoom: zoomm,
                      scrollwheel: true,
                      mapTypeId: google.maps.MapTypeId.ROADMAP,
                      mapTypeControl: true,
                      mapTypeControlOptions: {
                          style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                          position: google.maps.ControlPosition.TOP_RIGHT,
                      },
                      scaleControl: true,
                      streetViewControl: true,
                      fullscreenControl: true,
                    });
    var marker1 = new google.maps.Marker({
                      position: new google.maps.LatLng( location.latitude, location.longitude ),
                      map: window.map,
                      icon: '<?php echo base_url("/assets/images/user.png"); ?>',
                      title: 'You',
                      animation: google.maps.Animation.BOUNCE
                  });
    var infowindow = new google.maps.InfoWindow( { content:  'You' } );
        infowindow.close();
        infowindow.open( marker1.get('map'), marker1 );
    window.map.setCenter({
        lat : location.latitude,
        lng : location.longitude
    });
    window.lat = location.latitude;
    window.long = location.longitude;
    onFilter();
  }
  

    function initMap() {
        $(".ajax_loder").show();
        $(".ajax_loder .status").show();
        var latitudeAndLongitude=document.getElementById("latitudeAndLongitude"),
        location={ latitude:'', longitude:''};
        if (navigator.geolocation){
            var options = {};
            navigator.geolocation.getCurrentPosition(
            function success(position) {
                location_check = true;
                console.log(position);
                showPosition(position);
            },
            function error(error_message) {
                location_check = false;
                $.ajax({  
                     url:"//jsonip.com",  
                     method:"get",  
                     dataType: 'jsonp',
                     crossDomain: true,
                     success:function(res){ 
                        console.log(res);
                        $.ajax({
                            url: 'getlatlong/'+res.ip,
                            type: 'get',
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                location.latitude=data.geoplugin_latitude;
                                location.longitude=data.geoplugin_longitude;
                                $.ajax({
                                    url : 'https://api.openchargemap.io/v2/poi/?output=json&latitude='+location.latitude+'&longitude='+location.longitude,
                                    method : 'get',
                                    dataType: 'json',
                                    contentType: "application/json",                 
                                    success: function(data) {
                                        pointmap(data,location);
                                    }
                                });
                            }
                        });
                     }  
                });  
            },options);
        }else{ latitudeAndLongitude.innerHTML="Geolocation is not supported by this browser."; }
    }

    function maploadbeforecall(){
        $.ajax({  
             url:"//jsonip.com",  
             method:"get",  
             dataType: 'jsonp',
             crossDomain: true,
             success:function(res){ 
                 $.ajax({
                    url: 'getlatlong/'+res.ip,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        location.latitude=data.geoplugin_latitude;
                        location.longitude=data.geoplugin_longitude;
                        pointmap('',location);
                        initMap();
                    }
                });
              }
        });
    }

    function pointmap(jsondata,location) {
        var zoomm = 13;
        if (location_check==false) {
            zoomm = 11;
        }
        var map = new google.maps.Map(document.getElementById('map'), {
                      center: {lat: location.latitude, lng: location.longitude},
                      zoom: zoomm,
                      scrollwheel: false,
                      mapTypeId: 'roadmap',
                      gestureHandling: 'greedy',
                      mapTypeId: google.maps.MapTypeId.ROADMAP,
                      // styles: [{elementType: 'geometry', stylers: [{color: '#242f3e'}]},{elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},{elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},{  featureType: 'administrative.locality',  elementType: 'labels.text.fill',  stylers: [{color: '#d59563'}]},{  featureType: 'poi',  elementType: 'labels.text.fill',  stylers: [{color: '#d59563'}]},{  featureType: 'poi.park',  elementType: 'geometry',  stylers: [{color: '#263c3f'}]},{  featureType: 'poi.park',  elementType: 'labels.text.fill',  stylers: [{color: '#6b9a76'}]},{  featureType: 'road',  elementType: 'geometry',  stylers: [{color: '#38414e'}]},{  featureType: 'road',  elementType: 'geometry.stroke',  stylers: [{color: '#212a37'}]},{  featureType: 'road',  elementType: 'labels.text.fill',  stylers: [{color: '#9ca5b3'}]},{  featureType: 'road.highway',  elementType: 'geometry',  stylers: [{color: '#746855'}]},{  featureType: 'road.highway',  elementType: 'geometry.stroke',  stylers: [{color: '#1f2835'}]},{  featureType: 'road.highway',  elementType: 'labels.text.fill',  stylers: [{color: '#f3d19c'}]},{  featureType: 'transit',  elementType: 'geometry',  stylers: [{color: '#2f3948'}]},{  featureType: 'transit.station',  elementType: 'labels.text.fill',  stylers: [{color: '#d59563'}]},{  featureType: 'water',  elementType: 'geometry',  stylers: [{color: '#17263c'}]},{  featureType: 'water',  elementType: 'labels.text.fill',  stylers: [{color: '#515c6d'}]},{  featureType: 'water',  elementType: 'labels.text.stroke',  stylers: [{color: '#17263c'}]}]

        });
        var marker1 = new google.maps.Marker({
            position: new google.maps.LatLng(location.latitude, location.longitude),
            map: map,
            icon: '<?php echo base_url("/assets/home/images/user.png"); ?>',
            title: 'You',
            animation: google.maps.Animation.BOUNCE
        });
        var infowindow = new google.maps.InfoWindow({
            content:  'You'
        });
            infowindow.open(marker1.get('map'), marker1);
            /*icon marke*/
            var markeicon = "<?php echo base_url('./assets/home/images/marke.png'); ?>";
            /*check lengh*/
            if(jsondata.length > 0){
                for (i = 0; i < jsondata.length; i++) {
                    /*set marker*/
                    marker =  new google.maps.Marker({      
                                  position: new google.maps.LatLng(jsondata[i].AddressInfo.Latitude, jsondata[i].AddressInfo.Longitude),
                                  map: map,
                                  icon: markeicon,
                                  animation: google.maps.Animation.DROP,
                                  title: jsondata[i].AddressInfo.Title
                              });
                    openinfimodal(marker, jsondata[i]);
                }
            }
            $(".ajax_loder").hide();
            $(".ajax_loder .status").hide();
    }

    /*open popup click on mark */
    function openinfimodal(marker, jsondatasingal) {
        marker.addListener('click', function() {
            $('#mappopuinfohtml').html('<div class="mb-4">'+
                            '<h5 class="grrn-text">Provider</h5>'+
                            '<p class="DataProvider m-0">'+ (jsondatasingal.OperatorInfo ? jsondatasingal.OperatorInfo.Title : '' )+' - '+ (jsondatasingal.StatusType ? jsondatasingal.StatusType.Title : jsondatasingal.StatusType) +'</p>'+
                            '<p class="m-0">Verified = '+((jsondatasingal.IsRecentlyVerified == false) ? "No" : "Yes")+', Last Verified = '+((jsondatasingal.DateLastVerified == null) ? 'Not Available': jsondatasingal.DateLastVerified)+'</p>'+
                        '</div>'+
                        '<div class="mb-4">'+
                            '<h5 class="grrn-text">Addres</h5>'+
                            '<p class="m-0">'+jsondatasingal.AddressInfo.AddressLine1+', '+jsondatasingal.AddressInfo.Title+'</p>'+
                            '<p class="m-0">Longitude '+jsondatasingal.AddressInfo.Longitude+', Latitude '+jsondatasingal.AddressInfo.Latitude+'</p>'+
                        '</div>'+
                        '<div class="mb-4">'+
                            '<h5 class="grrn-text">Usage</h5>'+
                            '<p class="m-0">Membership Required = '+ ( jsondatasingal.UsageType ? jsondatasingal.UsageType.Title : 'Null' )+'</p>'+
                        '</div>'+
                        '<div class="mb-4">'+
                            '<h5 class="grrn-text">Plug Type and Capacity</h5>'+
                            '<p class="m-0">Power = '+ ( jsondatasingal.Connections ? jsondatasingal.Connections[0].PowerKW : '' )+'</p>'+
                            '<p class="m-0">Chargin Point = '+jsondatasingal.NumberOfPoints+', '+((jsondatasingal.GeneralComments == null) ? 'Not Available' : jsondatasingal.GeneralComments)+'</p>'+
                        '</div>'+
                        "<a href='<?php echo base_url("/login"); ?>' class='btn btn-block  btn-outline-primary' >Need more information? Let's Log In</a>");
            $('#exampleModalform').modal('show');
        });
    }

    var staion_count = 0;
  function Apimarker(jsondata) {
    $('#station_list1').html('');
    staion_count = staion_count+jsondata.length;
                    $('.station_count').text( staion_count );
    $.each(jsondata, function (index, value) {
      var markeicon = "<?php echo base_url('./assets/images/marke.png'); ?>";
      if (value.is_auther) {
          var markeicon = "<?php echo base_url('./assets/images/usermarker.png'); ?>";
      }
      marker =  new google.maps.Marker({      
                    position: new google.maps.LatLng(value.station_lat, value.station_long),
                    map: window.map,
                    icon: markeicon,
                    animation: google.maps.Animation.DROP,
                    title: value.station_Address
                });
      openinfimodal(marker, value);
      var obj = JSON.parse(JSON.stringify(value.station_attachment));
      // console.log(obj.urls.url);

      // $.each(JSON.parse(JSON.stringify(obj))[], function(index, value){
      //   console.log(value);
      // });
      $('#station_list1').append(
                            '<div class="activity row" >'+
                                '<div class="col-sm-2"><img src="'+(obj[0].url != null ? obj[0].url : 'assets/images/no-image-available-icon-6.jpg')+'" style="border-radius: 10px;border: 3px solid #c7c7c7;width: 70px;height: 60px;"></div>'+
                                '<div class="col-sm-8">'+
                                    '<h5 class="mt-0 mb-0" onclick="morezoom('+value.station_lat+','+value.station_long+');"><strong>'+value.station_Address+'</strong></h5>'+
                                    '<p class="text-muted font-13 mb-0"><b>@ '+value.distance+' with '+value.time+' of estimated travel time</b></p>'+
                                    '<p mb-0 style="height: 27px;overflow: hidden; line-height:25px;">'+value.station_general_comment+'</p>'+
                                '</div>'+
                                '<div class="col-sm-2">'+
                                  '<div class="text-center">'+
                                      '<select id="rating_filtter" name="rating" class="rating_filtter">'+
                                          '<option value="1">1</option>'+
                                          '<option value="2">2</option>'+
                                          '<option value="3">3</option>'+
                                          '<option value="4">4</option>'+
                                          '<option value="5" selected="">5</option>'+
                                      '</select>'+
                                  '</div>'+
                                  '<div class="font-10" style="">'+
                                      '<button class="btn btn-success btn-block">Available</button>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="dropdown-divider"></div>'+
                            '</div>'
                        );
      $('.rating_filtter').barrating({
            theme: 'fontawesome-stars',
            showSelectedRating: false
        });
    });
  }
  function Api2marker(jsondata) {
    $('#station_list2').html('');
    staion_count = staion_count+jsondata.length;
                    $('.station_count').text( staion_count );

    var markeicon = "<?php echo base_url('./assets/images/marke.png'); ?>";
    $.each(jsondata, function (index, value) {
      marker =  new google.maps.Marker({      
                    position: new google.maps.LatLng(value.AddressInfo.Latitude, value.AddressInfo.Longitude),
                    map: window.map,
                    icon: markeicon,
                    animation: google.maps.Animation.DROP,
                    title: value.AddressInfo.Title
                });
      openinfimodal(marker, value);
      $('#station_list2').append(
                            '<div class="activity row">'+
                                '<div class="col-sm-2"><img src="'+(value.MediaItems != null ? value.MediaItems[0].ItemThumbnailURL : '')+'" style="border-radius: 10px;border: 3px solid #c7c7c7;width: 70px;height: 60px;"></div>'+
                                '<div class="col-sm-8">'+
                                    '<h5 class="mt-0 mb-0"><strong>'+value.AddressInfo.Title+'</strong></h5>'+
                                    '<p class="text-muted font-13 mb-0"><b>@ '+value.distance+' with '+value.time+' of estimated travel time</b></p>'+
                                    '<p mb-0 style="height: 27px;overflow: hidden;">'+value.NumberOfPoints+', '+((value.GeneralComments == null) ? 'Not Available' : value.GeneralComments)+'</p>'+
                                '</div>'+
                                '<div class="col-sm-2">'+
                                  '<div class="">'+
                                      '<select id="rating_filtter" name="rating" class="rating_filtter">'+
                                          '<option value="1">1</option>'+
                                          '<option value="2">2</option>'+
                                          '<option value="3">3</option>'+
                                          '<option value="4">4</option>'+
                                          '<option value="5" selected="">5</option>'+
                                      '</select>'+
                                  '</div>'+
                                  '<div class="font-10" style="">'+
                                      '<button class="btn btn-success btn-block">Available</button>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="dropdown-divider"></div>'+
                            '</div>'
                        );
      $('.rating_filtter').barrating({
            theme: 'fontawesome-stars',
            showSelectedRating: false
        });
    });
  }
  function autoComplete(location) {
    var automap = new google.maps.Map(document.getElementById('searchAddressMap'), {
          center: {lat: location.latitude, lng: location.longitude},
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          scrollwheel: true,
          disableDefaultUI: false,
        });
    
    var input = document.getElementById('searchAddress');
    
    var autocomplete = new google.maps.places.Autocomplete(input);
    
    autocomplete.bindTo('bounds', automap);
    
    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);

    var marker = new google.maps.Marker({
      map: automap,
      anchorPoint: new google.maps.Point(0, -29),
      position: new google.maps.LatLng(location.latitude, location.longitude),
    });
    $('#lat').val(location.latitude);
    $('#long').val(location.longitude);
    autocomplete.addListener('place_changed', function() {
      
      infowindow.close();

      marker.setVisible(false);

      var place = autocomplete.getPlace();
      
      if (!place.geometry) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }
      
      if (place.geometry.viewport) {
        automap.fitBounds(place.geometry.viewport);
      } else {
        automap.setCenter(place.geometry.location);
        automap.setZoom(17);  // Why 17? Because it looks good.
      }
      
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
      
      var address = '';
      
      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }
      
      infowindowContent.children['place-icon'].src = place.icon;
      infowindowContent.children['place-name'].textContent = place.name;
      infowindowContent.children['place-address'].textContent = address;
      
      $('#lat').val(place.geometry.location.lat());
      $('#long').val(place.geometry.location.lng());

      location            = { latitude:'', longitude:''};
      location.latitude   = place.geometry.location.lat();
      location.longitude  = place.geometry.location.lng();
      
      setcentermap(location);
      
      infowindow.open(automap, marker);

    });
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
          console.log(response);
          // var txtDir = '';
          // for (var i=0; i<myRoute.legs[0].steps.length; i++) {
          //   txtDir += myRoute.legs[0].steps[i].instructions+"<br />";
          // }
          // document.getElementById('directions').innerHTML = txtDir;
        }
      });
      window.map.setZoom(20);
      window.map.setCenter(new google.maps.LatLng(station_lat, station_long));
      $('.stations-list-view').slideUp('slow');
      $('.mapDashboard').fadeIn('slow');
  }

  function onFilter() {
        var form = $('#filtter_form');
        $.ajax({  
             url:"<?php echo base_url(); ?>api",  
             method:"post",  
             data:form.serialize(),  
             dataType:'json',
             success: function( data ) {
                console.log(data);
                if (data.status == "true") {
                    Apimarker(data.data);
                }
             },
             error: function(  ) {

             }
        });
         // // // // // // // //
        $.ajax({  
             url:"<?php echo base_url(); ?>distanceTime",  
             method:"post",  
             data:form.serialize(),  
             dataType:'json',
             success: function( data ) {
                console.log(data);
                if (data.status == "true") {
                    Apimarker(data.data);
                }
             },
             error: function(  ) {

             }
        });
        $.ajax({  
             url:"<?php echo base_url(); ?>api2",  
             method:"post",  
             data:form.serialize(),  
             dataType:'json',
             success: function( data ) {
                console.log(data);
                if (data.status == "true") {
                    Api2marker(data.data);                    
                }
             },
             error: function(  ) {

             }
        });
    }
    function clearfiltter() {
        $("#nearestby").attr("checked", true);
        $("#plug_type_checkboxs input:checkbox").attr("checked", false);
        $("#power_checkboxs input:checkbox").attr("checked", false);
        onFilter();
    }
</script>
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&key=<?php echo mapkey; ?>&callback=maploadbeforecall" async=""></script>

<?php 
    // $this->load->view('dashboard/includes/script'); 
?>