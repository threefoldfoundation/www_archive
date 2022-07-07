
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/waves.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>        
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>    
<script src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/pages/jquery.form-validation.init-.js"></script>        
<script src="<?php echo base_url(); ?>assets/plugins/rating/jquery.barrating.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/pages/jquery.rating.js"></script>  
<script src="<?php echo base_url(); ?>assets/plugins/dropify/js/dropify.min.js"></script>  
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>         
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" defer=""></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.steps.min.js"></script>

<script type="text/javascript" defer="">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
  }
  function triggerHtmlEvent(element, eventName) {
    var event;
    if (document.createEvent) {
    event = document.createEvent('HTMLEvents');
    event.initEvent(eventName, true, true);
    element.dispatchEvent(event);
    } else {
    event = document.createEventObject();
    event.eventType = eventName;
    element.fireEvent('on' + event.eventType, event);
    }
  }

  jQuery('.lang-select').click(function() {
    var theLang = jQuery(this).attr('data-lang');
    jQuery('.goog-te-combo').val(theLang);
    sessionStorage.setItem("theLang", theLang);
    window.location = jQuery(this).attr('href');
    location.reload();
  });
  if (sessionStorage.getItem("theLang")=='en') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/us_flag.jpg" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='hi') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/Hindi_flag.svg" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='ur') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/Urdu_flag.png" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='de') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/germany_flag.jpg" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='fr') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/french_flag.jpg" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='es') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/spain_flag.jpg" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='vi') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/Vietnamese_flag.png" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='pt') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/Portuguese_flag.png" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='ar') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/Arabic_Flag.svg" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='zh-CN') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/Chinese_flag.png" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='ms') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/Malay_flag.png" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='ru') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/Russian_flag.png" class="ml-2" height="16" alt=""/>   ');
  }
  if (sessionStorage.getItem("theLang")=='nl') {
    $('.lang_append').html('<img src="<?php echo base_url(); ?>assets/images/flags/Dutch_flag.png" class="ml-2" height="16" alt=""/>   ');
  }
</script>
<!-- App js -->        
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>  
<script>    
  /*For click on station to redirect on map*/
  $(document).ready(function() {    
    $('.dropify').dropify();
    $('#dropdown-toggle1').click(function() {
      $('#dropdown-toggle1-menu').toggleClass('show').fadeIn("slow");
      $('#dropdown-toggle1-menu').toggleClass('hide').fadeIn("slow");
      $('#dropdown-toggle1 i').toggleClass('mdi-close');
      $('#dropdown-toggle1 i').toggleClass('mdi-menu');
    });

    // $(".sorting_1").click(function () {           
    //   if( screen.width <= 768 ) {     
    //       window.open('https://www.google.com/maps', '_blank');
    //   } else{
    //     $("html, body").animate({scrollTop: 140}, 800);
    //   }
    // });   
    $('.station-list-btn').click(function() {
      $('.mapDashboard').fadeOut('slow');
      $('.stations-list-view').slideDown('slow');
    });

    $('.stations-list-view .close-btn').click(function() {
      $('.stations-list-view').slideUp('slow');
      $('.mapDashboard').fadeIn('slow');
    }); 
  });

  window.map;
  window.lat;
  window.long;
  apiJson1 = [];
  apiJson2 = [];
  
  function maploadbeforecall(){
    $.ajax({  
      url:"//jsonip.com",  
      method:"get",  
      dataType: 'jsonp',
      crossDomain: true,
      success:function(res){ 
        $.ajax({
          url: '<?php echo  base_url("getlatlong/"); ?>'+res.ip,
          type: 'get',
          dataType: 'json',
          success: function(data) {
            location.latitude=data.geoplugin_latitude;
            location.longitude=data.geoplugin_longitude;
            if ( $('.searchAddress')[0] ) {
              autoComplete(location);
            }
            pointmap(location);
            initMap();
          }
        });
      }
    });
  }

  function pointmap(location) {
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
      position: new google.maps.LatLng(location.latitude, location.longitude),
      map: window.map,
      icon: '<?php echo base_url("/assets/images/user.png"); ?>',
      title: 'You',
      animation: google.maps.Animation.BOUNCE
    });

    // For legend
    // var legend = document.createElement('div');
    // legend.id = 'legend';
    // var content = [];
    // content.push('<h5>Starting Point</h5>');
    // legend.innerHTML = content.join('');
    // legend.index = 1;
    // map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);

    var infowindow = new google.maps.InfoWindow( { content:  'You' } );
    infowindow.close();
    infowindow.open( marker1.get('map'), marker1 );
  
    window.map.setCenter({
      lat : location.latitude,
      lng : location.longitude
    });
  }

  function setcentermap(location) {

    if ( $('.searchAddress')[0] ) {
      autoComplete(location);
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
    localStorage.setItem('start_lat', window.lat);
    localStorage.setItem('start_long', window.long);
    
    // onFilter();
    $.ajax({
      url : '<?php echo base_url(); ?>api/0',
      method : 'POST',
      data: $('#filtter_form').serialize(),
      dataType:'json',                 
      success: function(data) {
        // console.log(data);
        if (data.status == "true") {
          Apimarker(data.data);
        }
      },
      error: function(data){}
    });

    $.ajax({
      // url: "https://api.openchargemap.io/v2/poi/?output=json&latitude=654356&longitude=765765",
      url : "https://api.openchargemap.io/v2/poi/?output=json&latitude="+window.lat+"&longitude="+window.long+"",
      method : 'get',
      dataType:'json',                
      success: function(data) {
        apiJson2 = data;
        // console.log(window.lat);
        if(data != null) {
          Api2marker(data);
        } 
      },
      error: function(data){}
    });
  }

  function initMap() {
    var latitudeAndLongitude=document.getElementById("latitudeAndLongitude"),
    location={ latitude:'', longitude:''};
    if (navigator.geolocation){
      var options = {};
      navigator.geolocation.getCurrentPosition(
      function success(position) {
        location.latitude=position.coords.latitude;
        location.longitude=position.coords.longitude;
        setcentermap(location);
      },
      function error(error_message) {
        $.ajax({  
          url:"//jsonip.com",  
          method:"get",  
          dataType: 'jsonp',
          crossDomain: true,
          success:function(res){ 
            $.ajax({
              url: '<?php echo base_url("getlatlong/"); ?>'+res.ip,
              type: 'get',
              dataType: 'json',
              success: function(data) {
                location.latitude=data.geoplugin_latitude;
                location.longitude=data.geoplugin_longitude;
                setcentermap(location);
              }
            });
          }
        });
      },options);
    }else{ latitudeAndLongitude.innerHTML="Geolocation is not supported by this browser.";}
  }

  // function initMap2() {
  //   var latitudeAndLongitude=document.getElementById("latitudeAndLongitude"),
  //   location={ latitude:'', longitude:''};
  //   if (navigator.geolocation){
  //     var options = {};
  //     navigator.geolocation.getCurrentPosition(
  //     function success(position) {
  //       location.latitude=position.coords.latitude;
  //       location.longitude=position.coords.longitude;
  //       setcentermap(location);
  //     },
  //     function error(error_message) {
  //       $.ajax({  
  //         url:"//jsonip.com",  
  //         method:"get",  
  //         dataType: 'jsonp',
  //         crossDomain: true,
  //         success:function(res){ 
  //           $.ajax({
  //             url: '<?php echo base_url("getlatlong/"); ?>'+res.ip,
  //             type: 'get',
  //             dataType: 'json',
  //             success: function(data) {
  //               location.latitude=data.geoplugin_latitude;
  //               location.longitude=data.geoplugin_longitude;
  //               setcentermap(location);
  //             }
  //           });
  //         }
  //       });
  //     },options);
  //   }else{ latitudeAndLongitude.innerHTML="Geolocation is not supported by this browser.";}
  // }

  function geocodeLatLng(geocoder, map, infowindow) {
    var input = document.getElementById('latlng').value;
    var latlngStr = input.split(',', 2);
    var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
    geocoder.geocode({'location': latlng}, function(results, status) {
      if (status === 'OK') {
        if (results[0]) {
          map.setZoom(11);
          var marker = new google.maps.Marker({
            position: latlng,
            map: map
          });
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map, marker);
        } else {
          window.alert('No results found');
        }
      } else {
        window.alert('Geocoder failed due to: ' + status);
      }
    });
  }

  window.station_count = 0;
  window.srNumber = 1;
  function Apimarker(jsondata) {
    srNumber = 1;
    $('#station_list1').empty('');
    window.station_count = 0;
    window.station_count = jsondata.length;
    $('#station_count').text(window.station_count);
    $.each(jsondata, function (index, value) {
      var markeicon = "<?php echo base_url('./assets/images/marke.png'); ?>";
      if ("<?php echo $this->session->userdata('UserID'); ?>" == value.user_id) {
        // var markeicon = "<?php //echo base_url('./assets/images/usermarker.png'); ?>";
        var markeicon = "<?php echo base_url('./assets/images/owner-marker.png'); ?>";
      }
      marker =  new google.maps.Marker({
                position: new google.maps.LatLng(value.station_lat, value.station_long),
                map: window.map,
                icon: markeicon,
                animation: google.maps.Animation.DROP,
                title: value.station_Address
              });
      openinfimodal(marker, value);
      
      var distanceService = new google.maps.DistanceMatrixService();
          distanceService.getDistanceMatrix({
            origins: [new google.maps.LatLng(window.lat, window.long)],
            destinations: [new google.maps.LatLng(value.station_lat, value.station_long)],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            durationInTraffic: true,
            avoidHighways: false,
            avoidTolls: false
          },

      function (response, status) {
          if(status !== google.maps.DistanceMatrixStatus.OK) {
            console.log('Error:', status);
          } else {
              $("#distance").text(response.rows[0].elements[0].distance.text).show();
              $("#duration").text(response.rows[0].elements[0].duration.text).show();
              
              value.author = 'website';
              value.is_auther =  "<?php echo $this->session->userdata('UserID'); ?>" == value.user_id ? true : false;

              value.distance = response.rows[0].elements[0].distance.text;
              value.time = response.rows[0].elements[0].duration.text;
              var obj = JSON.parse(value.station_attachment);
              $('#station_list1').append(
                    '<div class="activity row station_list_stations" >'+
                        '<div class="col-sm-3"><span style="font-size:14px; margin-right: 10px;">'+(srNumber++)+' )</span><img src="'+(obj != null && obj != '' ? obj[0].url : 'assets/images/No_Image_Available.jpg')+'" style="border-radius: 10px;border: 3px solid #c7c7c7;width: 70px;height: 60px;"></div>'+
                        '<div class="col-sm-7 station_list_text_box">'+
                            '<h5 class="mt-0 mb-0 morezoom" style="cursor:pointer;" onclick="morezoom('+value.station_lat+','+value.station_long+');"><strong>'+value.station_Address+'</strong></h5>'+
                            '<p class="text-muted font-13 mb-0"><b>@ '+value.distance+' with '+value.time+' of estimated travel time</b></p>'+
                            '<p mb-0 style="height: 26px;overflow: hidden;">'+value.station_general_comment+'</p>'+
                        '</div>'+
                        '<div class="col-sm-2 text-center">'+
                          '<div class="">'+
                              '<select id="rating_filtter" name="rating" class="rating_filtter">'+
                                  '<option value="1">1</option>'+
                                  '<option value="2">2</option>'+
                                  '<option value="3">3</option>'+
                                  '<option value="4">4</option>'+
                                  '<option value="5" selected="">5</option>'+
                              '</select>'+
                          '</div>'+
                          '<div class="font-10 pb-1" style="">'+
                              '<button class="btn btn-success btn-block">Available</button>'+
                          '</div>'+
                          '<hr style="background:gray; height:2px;" class="station_devider">'+
                      '</div>'+
                      '<div class="dropdown-divider"></div>'+
                    '</div>');
              $('.rating_filtter').barrating({
                theme: 'fontawesome-stars',
                showSelectedRating: false
              });
            }
        });
    });
  }

  var nearByStations=[];
  function Api2marker(data) {
    console.log(data);
    nearByStations=[]
    $('#station_list2').empty('');
    var datalen = data.length;
    var station_2_count = (window.station_count + datalen);
    $('#station_count').html(datalen+ window.station_count);
    var markeicon = "<?php echo base_url('./assets/images/marke.png'); ?>";

    var nearestStations = [];
    var allStations = [];
    $.each(data, function (index, value) {

      marker =  new google.maps.Marker({      
                  position: new google.maps.LatLng(value.AddressInfo.Latitude, value.AddressInfo.Longitude),
                  map: window.map,
                  icon: markeicon,
                  animation: google.maps.Animation.DROP,
                  title: value.AddressInfo.Title
                });
      
      openinfimodal(marker, value);

      var distanceService = new google.maps.DistanceMatrixService();
          distanceService.getDistanceMatrix({
            origins: [new google.maps.LatLng(window.lat, window.long)],
            destinations: [new google.maps.LatLng(value.AddressInfo.Latitude, value.AddressInfo.Longitude)],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            durationInTraffic: true,
            avoidHighways: false,
            avoidTolls: false
          },
          function (response, status) {
            if (status !== google.maps.DistanceMatrixStatus.OK) {
              console.log('Error:', status);
            } else {

              value.author = 'api';
              value.is_auther =  "<?php echo $this->session->userdata('UserID'); ?>" == value.user_id ? true : false;
              value.distance = (response.rows[0].elements[0].distance != null && response.rows[0].elements[0].distance != '' ? response.rows[0].elements[0].distance.text : '0');
              value.time = (response.rows[0].elements[0].duration != null && response.rows[0].elements[0].duration != '' ? response.rows[0].elements[0].duration.text : '0');
                
              var isAuthor= "<?php echo $this->session->userdata('UserID'); ?>" == value.user_id ? true : false;
              var distance = (response.rows[0].elements[0].distance != null && response.rows[0].elements[0].distance != '' ? response.rows[0].elements[0].distance.text : '0');
              var time = (response.rows[0].elements[0].duration != null && response.rows[0].elements[0].duration != '' ? response.rows[0].elements[0].duration.text : '0');
              nearByStations.push({'author':'api','is_auther':isAuthor,'distance' : distance,'onlyDistance' : parseFloat(distance.replace(' km','')),'time':time,'mediaItems':value.MediaItems,'addressInfo':value.AddressInfo,'generalComments':value.GeneralComments})
            }
          });
    });
    loadNearByStations()
  }

  function loadNearByStations(){
    window.setTimeout(function() {
      nearByStations=nearByStations.sort(function(obj1, obj2) {
        // Ascending: first age less than the previous
        return obj1.onlyDistance - obj2.onlyDistance;
      });
      // console.log(nearByStations);

      $.each(nearByStations,function(index,value){
       $('#station_list2').append(
                      '<div class="activity row mb-5" >'+
                          '<div class="col-sm-3"><span style="font-size:14px; margin-right: 10px;">'+(srNumber++)+' )</span><img src="'+(value.mediaItems != null && value.mediaItems != '' ? value.mediaItems[0].ItemThumbnailURL : 'assets/images/No_Image_Available.jpg')+'" style="border-radius: 10px;border: 3px solid #c7c7c7;width: 70px;height: 60px;"></div>'+
                          '<div class="col-sm-7 station_list_text_box">'+
                              '<h5 class="mt-0 mb-0 morezoom" style="cursor:pointer;" onclick="morezoom('+value.addressInfo.Latitude+','+value.addressInfo.Longitude+');"><strong>'+value.addressInfo.AddressLine1+'</strong></h5>'+
                              '<p class="text-muted font-13 mb-0"><b>@ '+value.distance+' with '+value.time+' of estimated travel time</b></p>'+
                              '<p mb-0 style="height: 26px;overflow: hidden;">'+(value.generalComments != null ? value.generalComments : '')+'</p>'+
                          '</div>'+
                          '<div class="col-sm-2 text-center">'+
                            '<div class="">'+
                                '<select id="rating_filtter" name="rating" class="rating_filtter">'+
                                    '<option value="1">1</option>'+
                                    '<option value="2">2</option>'+
                                    '<option value="3">3</option>'+
                                    '<option value="4">4</option>'+
                                    '<option value="5" selected="">5</option>'+
                                '</select>'+
                            '</div>'+
                            '<div class="font-10 pb-1" style="">'+
                                '<button class="btn btn-success btn-block">Available</button>'+
                            '</div>'+
                            '<hr style="background:gray; height:2px;" class="station_devider">'+
                        '</div>'+
                        '<div class="dropdown-divider"></div>'+
                      '</div>');
      });
      $('.rating_filtter').barrating({
          theme: 'fontawesome-stars',
          showSelectedRating: false
      });
    }, 1000);
  }

  /*open popup click on mark */
  function openinfimodal(marker, jsondata) {
    marker.addListener('click', function() {
      sessionStorage.setItem("clickmarkedata", JSON.stringify(jsondata));
      window.location.href = "<?php echo base_url(); ?>station";
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
    geocoder = new google.maps.Geocoder();
    google.maps.event.addListener(automap, 'click', function( event ){
      // console( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() ); 
      geocoder.geocode ({
            'latLng': event.latLng
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if(results[1]) {
                $("#searchAddress").val(results[1].formatted_address);
                $('#lat').val(event.latLng.lat());
                $('#long').val(event.latLng.lng());
              } else {
                alert('No results found');
              }
            } else {
              alert('Geocoder failed due to: ' + status);
            }
        });
    });

    // Fill current address in address field automatic.
    // setTimeout(function() {
    //   var lat = parseFloat(document.getElementById("lat").value);
    //   var lng = parseFloat(document.getElementById("long").value);
    //   var latlng = new google.maps.LatLng(lat, lng);
    //   var geocoder = geocoder = new google.maps.Geocoder();
    //   geocoder.geocode({ 'latLng': latlng }, function (results, status) {
    //       if (status == google.maps.GeocoderStatus.OK) {
    //           if (results[1]) {
    //               $(".autoAddress").val(results[1].formatted_address);
    //           }
    //       }
    //   });
    // }, 1000);

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
        ].join('');
      }
      var addressLength = place.address_components.length;
      if(addressLength <= 5){
        $("#countryCode").val(place.address_components[addressLength-1].short_name);
        $("#filterContryCode").val(place.address_components[addressLength-1].short_name);
      } else{
        $("#countryCode").val(place.address_components[addressLength-2].short_name);
        $("#filterContryCode").val(place.address_components[addressLength-2].short_name);
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
    
    if(localStorage.getItem("opencharge") == 'true') {
      localStorage.setItem("opencharge", false);
      var start = localStorage.getItem("start_latitude")+','+ localStorage.getItem("start_longitude");
    } else{
      var start = window.lat+','+ window.long;
    }
    var end = station_lat+', '+station_long;
    var request = {
      origin:start, 
      destination:end,
      travelMode: google.maps.DirectionsTravelMode.DRIVING,
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionDisplay.setDirections(response);
        var myRoute = response.routes[0];
        // console.log(response);
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

  /*get power*/
  function get_power() {
    $.ajax({  
      url:"<?php echo base_url(); ?>power/get",  
      method:"get",  
      dataType: "json",
      success:function(data){ 
        var html = '';
        if (data.status) {
          $.each(data.data, function( index, value ) {
            html += '<div class="checkbox my-2">'+
                        '<div class="custom-control custom-checkbox">'+
                            '<input type="checkbox" class="custom-control-input" value="'+value.power_id+'" name="power_filtter[]" id="power_check_'+value.power_id+'" data-parsley-multiple="groups" data-parsley-mincheck="2">'+
                            '<label class="custom-control-label" for="power_check_'+value.power_id+'"> '+value.power+' </label>'+
                        '</div>'+
                    '</div>';
          });
        }
        $('#power_checkboxs').html(html);
      },
      error: function(data){}
    });  
  }

  /*get Plug Type*/
  function get_plugtype() {
    $.ajax({  
      url:"<?php echo base_url(); ?>plugtype/get",  
      method:"get",  
      dataType: "json",
      success:function(data){ 
        var html = '';
        if (data.status) {
          $.each(data.data, function( index, value ) {
            html += '<div class="checkbox my-2">'+
                        '<div class="custom-control custom-checkbox">'+
                            '<input type="checkbox" class="custom-control-input" value="'+value.plugtype_id+'" name="plug_type_filtter[]" id="plug_type_'+value.plugtype_id+'" data-parsley-multiple="groups" data-parsley-mincheck="2">'+
                            '<label class="custom-control-label" for="plug_type_'+value.plugtype_id+'"> '+value.plug_type+' </label>'+
                        '</div>'+
                    '</div>';
          });
        }
        $('#plug_type_checkboxs').html(html);
      },
      error: function(data){}
    });  
  }

  // Set selectbox fields in form
  var plugOption = '';
  var powerOption = '';
  var supplyOption = '';
  var currentOption = '';
  var pointsOption = '';
  var fields = [];
  var html = '';
  function SetAddFormFields() {
    
    // Get fields for add station
    $.ajax({
      url: '<?php echo base_url(); ?>station/GetFeilds',
      dataType: 'json',
      method: 'get',
      success: function(response) {
        fields.push(response);
        $.each(response.plug_type, function(index, val){
          var jsonObj=JSON.parse(JSON.stringify(val))
          plugOption += '<option value='+jsonObj.plugtype_id+'>'+jsonObj.plug_type+'</option>';
        });
        $.each(response.power, function(index, val){
          var jsonObj=JSON.parse(JSON.stringify(val))
          powerOption += '<option value='+jsonObj.power_id+'>'+jsonObj.power+'</option>';
        });
        $.each(response.supply_type, function(index, val){
          var jsonObj=JSON.parse(JSON.stringify(val))
          supplyOption += '<option value='+jsonObj.supply_id+'>'+jsonObj.supplytype+'</option>';
        });
        $.each(response.current_voltage, function(index, val){
          var jsonObj=JSON.parse(JSON.stringify(val))
          currentOption += '<option value='+jsonObj.voltage_id+'>'+jsonObj.voltage+'</option>';
        });
        $.each(response.points, function(index, val){
          var jsonObj=JSON.parse(JSON.stringify(val))
          pointsOption += '<option value='+jsonObj.point_id+'>'+jsonObj.point+'</option>';
        });
        $.each(response.provider, function(key, value) {
          $("#provider_name").append('<option value='+value.provider_id+'>'+value.provider_name+'</option>');
          $("#provider_name1").append('<option value='+value.provider_id+'>'+value.provider_name+'</option>');
        });
        $.each(response.payment, function(key, value) {
          $("#payments").append('<option value='+value.payment_id+'>'+value.payment_method+'</option>');
          $("#payments1 ").append('<option value='+value.payment_id+'>'+value.payment_method+'</option>');
        });
        $.each(response.access_type, function(key, value) {
          $("#access_type").append('<option value='+value.accesstype_id+'>'+value.access_name+'</option>');
          $("#access_type1").append('<option value='+value.accesstype_id+'>'+value.access_name+'</option>');
        });
      }
    });
  }

  var stationViewStatus = localStorage.getItem("reloading");
  setTimeout(function() {
    if (stationViewStatus == 'true') {
      localStorage.setItem("reloading", false);
      $(".end_location").show();
      var lat = localStorage.getItem("lat");
      var long = localStorage.getItem("long");
      morezoom(lat, long);
    }
  }, 2000);

  $(document).on('click', '.morezoom', function() {
    $(".end_location").show();
  });
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=<?php echo mapkey; ?>&libraries=places&callback=maploadbeforecall" async defer></script>
<!-- https://maps.googleapis.com/maps/api/js?key=AIzaSyCFHMMm7nRgHGvyqs33H2EXmx92fa6EBWE -->
