<div class="">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9 col-xl-9 col-md-12">
                            <button class="btn btn-info btn-lg d-block station-view-back-btn">
                                <a href="<?php echo base_url(); ?>" class="text-white d-block">BACK</a>
                            </button>
                            <h5 class="mt-2" id="staion_name"></h5>
                            <div id="carouselExample1" class="carousel slide z-depth-1-half" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item itemimage h-400">
                                      <img class="d-block h-400 sliderimage" src="<?php echo  base_url('assets/images/No_Image_Available.jpg'); ?>" alt="First slide">
                                    </div>
                                    
                                  </div>
                                <a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                                <button class="btn btn-success btn-lg d-block station-view-back-btn mt-2">Book Now</button>
                        </div>
                        <div class="border-left col-md-12 col-lg-3 col-xl-3">                                        
                            <div class="card mb-0 overview shadow-none">
                                <div class="card-body border-bottom pt-0 station-view-top-r-btn-w">
                                    <div class="">
                                        <div class="row align-items-center">
                                            <div class="col-3">
                                                <a id="staion_edit" href="#" class="btn btn-outline-info station-view-top-r-btn"><i class="fa fa-edit" title="Edit"></i></a>                                                          
                                            </div>

                                            <div class="col-3">
                                                <button type="button" id="staion_delete" class="btn btn-outline-info station-view-top-r-btn" data-toggle="modal" data-target="#exampleModaltab" id="StationRemove"><i class="fa fa-minus-circle" title="Delete"></i></button>
                                            </div> 
                                            <div class="remove_popup">
                                                <p class="text-white text-center">Are you sure, You want to remove this station?</p>
                                                <button class="btn btn-default removeStation">Yes</button>
                                                <button class="btn btn-default remove_no">No</button>
                                            </div>
                                            <div class="remove_warning">
                                                <p class="text-white text-center">This option working only for owner.</p>
                                            </div>
                                            <div class="col-3">
                                                <a href="#" class="btn btn-outline-info station-view-top-r-btn location-btn morezoom" style="padding: 15px 17px;"><i class="fa fa-map-marker" title="Location"></i></a>                                                          
                                            </div> 
                                            <div class="col-3">
                                                <button type="button" class="btn btn-outline-info station-view-top-r-btn" data-toggle="modal" data-target="#exampleModaltab"><i class="fa fa-sign-in"></i></button>
                                            </div>                                                                                                  
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body border-bottom">
                                    <div class="">
                                        <div class="row align-items-center">
                                            <div class="col-3">
                                                <div class="overview-content">
                                                    <i class="mdi mdi-share-variant  text-success"></i>
                                                </div>                                                            
                                            </div> 
                                            <div class="col-9 text-right">
                                                <p class="text-muted font-13 mb-0 font-weight-bold">Distance, Travel Time</p>
                                                <h4 class="mb-0 font-20" id="station_destant">@ 3.9 KM, 25 minutes</h4>
                                            </div>                                                                                                   
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body border-bottom">
                                    <div class="">
                                        <div class="row  align-items-center">
                                            <div class="col-3">
                                                <div class="overview-content">
                                                    <i class="mdi mdi-gesture-double-tap  text-purple"></i>
                                                </div>                                                            
                                            </div> 
                                            <div class="col-9 text-right">
                                                <p class="text-muted font-13 mb-0 font-weight-bold">Connectors / Plug, Power</p>
                                                <h4 class="mb-0 font-20" id="ConnectorsPlugPower">2, Level 3 44KW</h4>
                                            </div>                                                                                                    
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body border-bottom">
                                    <div class="">
                                        <div class="row align-items-center">
                                            <div class="col-3">
                                                <div class="overview-content">
                                                    <i class="mdi mdi-earth text-warning"></i>
                                                </div>                                                            
                                            </div> 
                                            <div class="col-9 text-right">
                                                <p class="text-muted font-13 mb-0 font-weight-bold">Membership, Payment</p>
                                                <h4 class="mb-0 font-20" id="MembershipPayment">Public, DEWA Card</h4>
                                            </div>                             
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="">
                                        <div class="row  align-items-center">
                                            <div class="col-3">
                                                <div class="overview-content">
                                                    <i class="mdi mdi-access-point text-pink"></i>
                                                </div>                                                            
                                            </div> 
                                            <div class="col-9 text-right">
                                                <p class="text-muted font-13 mb-0 font-weight-bold">Status, Community Rating</p>
                                                <!-- <h4 class="mb-0 font-20">4.55%</h4> -->
                                                <button class="btn btn-success status-cummunity-btn">Available</button>
                                                <p class="pt-2">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <span class="text-info"> ( 13 )</span>
                                                </p>
                                            </div>                                
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card-body border-bottom">
                                <div class="">
                                    <div class="row align-items-center">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-lg-1">
                                                    <div class="">
                                                        <i class="fa fa-clock-o station-view-bottom-r-btn"></i>
                                                    </div>                                                            
                                                </div> 
                                                <div class="col-sm-9 col-md-10 col-lg-11">
                                                    <h6 class="mt-0 station-view-bottom-title">Timings</h6>
                                                    <h5 class="text-muted mb-1 status-bottom-center-txt" id="allday">24 / 7, All days of the Week</h5>
                                                    <p class="text-muted font-13 mb-0" id="weekday">8 AM - 9 PM, Monday - Friday</p>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3"></div>  
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-bottom">
                                <div class="">
                                    <div class="row align-items-center">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                          <div class="row">
                                              <div class="col-sm-3 col-md-2 col-lg-1">
                                                  <div class="">
                                                      <i class="fa fa-plug station-view-bottom-r-btn"></i>
                                                  </div>                                                            
                                              </div> 
                                              <div class="col-sm-9 col-md-10 col-lg-11">
                                                  <h6 class="mt-0 station-view-bottom-title">PlugType, Connectors</h6>
                                                  <h5 class="text-muted mb-1 status-bottom-center-txt" id="PlugTypePlugType1">2 Connectors, Mennekes (Type 2, Tethered Connector)</h5>
                                                  <p class="text-muted font-13 mb-0" id="PlugTypePlugType2">Over 2 KW, usually non-domestic socket type, Level 2: Medium (Over 2kW)</p>
                                              </div> 
                                          </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3"></div>  
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-bottom">
                                <div class="">
                                    <div class="row align-items-center">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                          <div class="row">
                                              <div class="col-sm-3 col-md-2 col-lg-1">
                                                  <div class="">
                                                      <i class="fa fa-bank station-view-bottom-r-btn"></i>
                                                  </div>                                                            
                                              </div> 
                                              <div class="col-sm-9 col-md-10 col-lg-11">
                                                  <h6 class="mt-0 station-view-bottom-title">Provider</h6>
                                                  <h5 class="text-muted mb-1 status-bottom-center-txt" id="ProviderTitle">Tesla Motors (Worldwide)</h5>
                                                  <p class="text-muted font-13 mb-0" id="ProviderUrl">http://www.teslamotors.com</p>
                                              </div> 
                                          </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3"></div>  
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-bottom">
                                <div class="">
                                    <div class="row align-items-center">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-lg-1">
                                                    <div class="">
                                                        <i class="fa fa-users station-view-bottom-r-btn"></i>
                                                    </div>                                                            
                                                </div> 
                                                <div class="col-sm-9 col-md-10 col-lg-11">
                                                    <h6 class="mt-0 station-view-bottom-title">Comments by Community</h6>
                                                    <h5 class="text-muted mb-1 status-bottom-center-txt" id="Communitycount">0</h5>
                                                    <br><br>
                                                    <div id="CommunityList">
                                                        
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
</div><!-- container -->
<?php 
    $this->load->view('dashboard/includes/script'); 
?>
<script type="text/javascript">
    var stations = JSON.parse(sessionStorage.getItem("clickmarkedata"));
    if (stations != null) {
        if (stations.author == "website") {
            if (stations.is_auther) {
                $('#staion_edit').attr('href', '<?php echo base_url('station/edit/'); ?>'+stations.station_ID);
                $('#staion_delete').click(function(){
                    console.log(stations.station_ID);
                });
            }
            $('#staion_name').text((stations.station_Name ? stations.station_Name : 'No Title' ));

            if (stations.station_attachment != null) {
                var obj = JSON.parse(stations.station_attachment);
                var images = '<div class="carousel-inner">';
                $.each(obj, function (index, value) {
                    if (value.extention == 'mp4') {

                     images += '<div class="carousel-item itemimage h-400">'+
                                        '<video class="d-block h-400 sliderimage" muted controls>'+
                                         '<source src="'+value.url+'" type="video/mp4">'+
                                        '</video>'+
                                    '</div>';
                    }else{

                    images += '<div class="carousel-item itemimage h-400">'+
                                      '<img class="h-400 sliderimage" src="'+value.url+'" alt="Second slide">'+
                                    '</div>';
                    }

                });
                images += '</div>';
                $('#carouselExample1').html(images+
                                '<a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">'+
                                    '<span class="carousel-control-prev-icon" aria-hidden="true"></span>'+
                                    '<span class="sr-only">Previous</span>'+
                                '</a>'+
                                '<a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">'+
                                    '<span class="carousel-control-next-icon" aria-hidden="true"></span>'+
                                    '<span class="sr-only">Next</span>'+
                                '</a>');
                $('.carousel-item').first().addClass('active');
                $('#carouselExample1').carousel();
            }
            console.log(stations);
            $('#station_destant').text('@ '+stations.distance+',  '+stations.time);
            $('#allday').text(stations.station_open_time==0 ? '24 / 7, All days of the Week' : '');
            $('#weekday').text(stations.station_from_time+' AM - '+stations.station_to_time+' PM, '+stations.station_from_day+' - '+stations.station_to_day);
            $.ajax({  
                 url:"<?php echo base_url(); ?>station/get/"+stations.station_ID,  
                 method:"get",  
                 dataType:'json',
                 success: function( data ) {
                    // console.log(data);
                    if (data.status == "true") {
                        var staions = data.data;
                        $('#ConnectorsPlugPower').text(staions.conecterscount+', '+ staions.station_power);
                        $('#MembershipPayment').text(staions.access_name+', '+staions.payment_method);
                        $('#PlugTypePlugType1').text(staions.conecterscount+' Connectors,'+staions.station_plugtype+' '+staions.station_voltage);
                        $('#PlugTypePlugTyp2').text( staions.station_general_comment);
                        $('#ProviderTitle').text(staions.provider_name);
                        $('#ProviderUrl').text('');
                    }
                 },
                 error: function(  ) {

                 }
            });
            
        }else{
            $('#staion_name').text((stations.OperatorInfo ? stations.OperatorInfo.Title : 'No Title' ));
            if (stations.MediaItems != null) {
                var images = '<div class="carousel-inner">';
                $.each(stations.MediaItems, function (index, value) {
                    images += '<div class="carousel-item itemimage h-400">'+
                                      '<img class="h-400 sliderimage" src="'+value.ItemURL+'" alt="Second slide">'+
                                    '</div>';
                });
                images += '</div>';
                $('#carouselExample1').html(images);
                $('.carousel-item').first().addClass('active');
                $('#carouselExample1').carousel();
            }
            // $('#station_destant').text('@ '+stations.distance+',  '+stations.time);
            if(stations.distance != undefined && stations.time != undefined) {
                $('#station_destant').text('@ '+stations.distance+',  '+stations.time);
            } else{
                $('#station_destant').text('Distance and time not availabe.');
            }
            $('#ConnectorsPlugPower').text(stations.Connections != null ? stations.NumberOfPoints+', '+ (stations.Connections[0].Level != null ? stations.Connections[0].Level.Title : '')+', '+stations.Connections[0].PowerKW+'KW' : '');
            $('#MembershipPayment').text(stations.UsageType != null ? stations.UsageType.Title : '');
            $('#PlugTypePlugType1').text((stations.Connections != null ? stations.NumberOfPoints+' Connectors,'+stations.Connections[0].ConnectionType.Title+' '+(stations.Connections[0].CurrentType != null ? stations.Connections[0].CurrentType.Title : '') : ''));
            $('#PlugTypePlugTyp2').text((stations.Connections != null ? (stations.Connections[0].Level != null ? stations.Connections[0].Level.Title : '') : ''));
            $('#ProviderTitle').text(stations.OperatorInfo != null ? stations.OperatorInfo.Title : '');
            $('#ProviderUrl').text(stations.OperatorInfo != null ? stations.OperatorInfo.WebsiteURL : '');
            $('#allday').text("Not Available, Please call Contact Number");
            $('#weekday').text('');
            if (stations.UserComments != null) {
                $('#Communitycount').text(stations.UserComments.length);

                $.each(stations.UserComments, function (index, value) {
                    var newDate = value.DateCreated;
                    $('#CommunityList').append('<p class="text-muted font-13 mb-0">'+
                                                       value.Comment+' - by'+
                                                       ' <a href="#"> <u>'+value.UserName+' on '+newDate+'</u></a>'+
                                                       ' <span>'+
                                                      '      <select disable id="rating_filtter" name="rating" class="rating_filtter">'+
                                                                '<option value="1" '+(value.Rating == 1 ? 'selected' : '')+'>1</option>'+
                                                               ' <option value="2" '+(value.Rating == 2 ? 'selected' : '')+'>2</option>'+
                                                                '<option value="3" '+(value.Rating == 3 ? 'selected' : '')+'>3</option>'+
                                                                '<option value="4" '+(value.Rating == 4 ? 'selected' : '')+'>4</option>'+
                                                               ' <option value="5" '+(value.Rating == 5 ? 'selected' : '')+'>5</option>'+
                                                           ' </select>'+
                                                      '  </span>'+
                                                  '  </p>   ');
                });
            }
        }
        $('.carousel-item').first().addClass('active');
        $('#carouselExample1').carousel();
    }
    console.log(stations);
    $(document).ready(function() {
        $('#staion_delete').click(function() {
            if(stations.station_ID != null && stations.station_ID != undefined){
                $('.remove_popup').slideDown('slow');
            } else{
                $(".remove_warning").slideDown('slow').delay(1000).slideUp('slow');
            }
        });
        $(".remove_no").click(function() {
            $('.remove_popup').slideUp('slow');
        });

        $("#staion_edit").click(function() {
            if(stations.station_ID != null && stations.station_ID != undefined){
                // $("#staion_edit").attr("href", "<?php echo base_url(); ?>station/edit/"+stations.station_ID+"");
                window.location.href = "<?php echo base_url(); ?>station/edit/"+stations.station_ID;
            } else{
                $(".remove_warning").slideDown('slow').delay(1000).slideUp('slow');
            }
        });

        // For remove station
        $(".removeStation").click(function(e) {
              e.preventDefault();

                $.ajax({
                  url: '<?php echo base_url(); ?>station/RemoveStation/'+stations.station_ID+'',
                  data: '',
                  method: 'post',
                  success: function(response) {
                    if(response == 1){
                      window.location.href = '<?php echo base_url(); ?>';
                    }
                  }
                });
        });
        // For click location button zoom dashboard map
        $(".location-btn").click(function() {
            if(stations.station_lat != null && stations.station_lat != undefined){
                localStorage.setItem("reloading", true);
                localStorage.setItem("lat", stations.station_lat);
                localStorage.setItem("long", stations.station_long);
                window.location = '<?php echo base_url(); ?>';
            } else{
                localStorage.setItem('start_latitude',(localStorage.getItem('start_lat')));
                localStorage.setItem('start_longitude',(localStorage.getItem('start_long')));

                localStorage.setItem("reloading", true);
                localStorage.setItem("opencharge", true);
                localStorage.setItem("lat", stations.AddressInfo.Latitude);
                localStorage.setItem("long", stations.AddressInfo.Longitude);
                window.location = '<?php echo base_url(); ?>';
            }
        });
    });
</script>
