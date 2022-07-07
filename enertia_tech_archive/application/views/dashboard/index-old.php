<style>
    .footer {
        display: none;
    }
</style>
<div class="container-fluid" >
    <div class="row">
        <div class="col-xl-12 map-area p-0">
            <section class="position-relative mapDashboard">
                <div class="position-absolute dashboard-map-icon">
                    <a href="<?php echo base_url();?>station/add"><i class="mdi mdi-plus" title="Add Station"></i></a>
                    <i class="mdi mdi-format-list-bulleted station-list-btn" title="Station List"></i>
                    <i class="mdi mdi-account-outline" title="Profile"></i>
                </div>
                <div id="map" class="map-hieght"></div> 
            </section>
            <div class="user_legend">
                Legend: <i class="green mdi mdi-map-marker"></i> public | <i class="orange mdi mdi-map-marker"></i> Your
            </div>  

            <form class="form-horizontal col-md-4 col-sm-12 col-xs-12" role="form" id="filtter_form">
                <div class="form-group m-0">
                    <div class="input-group">
                        <div class="input-group-prepend show">
                            <button type="button" class="btn btn-primary dropdown-toggle" id="dropdown-toggle1" style="z-index: 0;">
                                <i class="mdi mdi-menu"></i>
                            </button>
                            <div class="dropdown-menu hide p-0" id="dropdown-toggle1-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);">
                                <h5 class="fltter-heading"> <i class="mdi mdi-filter"></i> Filter Options <a href="#" class="float-right" onclick="clearfiltter();">Clear</a></h5>
                                <div class="accordion" id="accordionExample2">

                                    <div class="card mb-0">
                                        <div class="card-header" id="headingOne1">
                                            <h5 class="my-0">
                                                <button class="btn btn-link  none-link  w-100 t-left" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                                    Distance
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1" data-parent="#accordionExample2" style="">
                                            <div class=" font-13">
                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked="" id="nearestby" name="nearest_distance" value="1" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                        <label class="custom-control-label" for="nearestby">Nearest</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="card mb-0">
                                        <div class="card-header" id="headingOne2">
                                            <h5 class="my-0">
                                                <button class="btn btn-link  none-link collapsed w-100 t-left" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                                                    Plug Type
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionExample2" style="">
                                            <div class="font-13" id="plug_type_checkboxs">
                                                
                                            </div>
                                        </div>
                                    </div>
                                     <div class="card mb-0">
                                        <div class="card-header" id="headingOne3">
                                            <h5 class="my-0">
                                                <button class="btn btn-link  none-link collapsed w-100 t-left" type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3">
                                                    Power KWH
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne3" class="collapse" aria-labelledby="headingOne3" data-parent="#accordionExample2" style="">
                                            <div class=" font-13" id="power_checkboxs">
                                               
                                            </div>
                                        </div>
                                    </div>
                                     <div class="card mb-0">
                                        <div class="card-header" id="headingOne5">
                                            <h5 class="my-0">
                                                <button class="btn btn-link  none-link collapsed w-100 t-left" type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="false" aria-controls="collapseOne5">
                                                    Min Rating
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne5" class="collapse" aria-labelledby="headingOne5" data-parent="#accordionExample2" style="">
                                            <div class=" font-13">
                                                <div class="p-2">
                                                    <select id="rating_filtter" name="rating" class="rating_filtter">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5" selected="">5</option>
                                                    </select>                                                              
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="text" id="searchAddress" name="searchaddress" class="form-control searchAddress" placeholder="Search for a Charging Location">
                        <div id="searchAddressMap" style="display: none;"></div>
                        <div id="infowindow-content" style="display: none;">
                          <img src="" width="16" height="16" id="place-icon">
                          <span id="place-name"  class="title"></span><br>
                          <span id="place-address"></span>
                        </div>  
                        <input type="hidden" id="lat" name="lat" value="">
                        <input type="hidden" id="long" name="long" value="">
                        <input id="filterContryCode" type="hidden" name="station_contry_code">
                        <div class="input-group-append" onclick="onFilter();" style="cursor: pointer;">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div> <!--end row--> 
            </form>                                  
        </div>    
    </div>
    <section class="stations-list-view">
        <i class="mdi mdi-close-circle-outline close-btn"></i>
        <div class="row justify-content-md-center" style="margin-top: 4.4rem !important;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 p-0">
                <div class="card mb-0">                                       
                    <div class="card-body stations-list"> 
                        <h5 class="mt-3" style="margin-left: 30px;"><span class="station_count" id="station_count">0</span> Stations Nearby</h5>
                        <div id="station_list1"></div>
                        <div id="station_list2"></div>
                        <!-- <div class="activity row">
                            <div class="col-sm-2">
                                <img src="assets/images/footer.png" style="border-radius: 10px;border: 3px solid #c7c7c7;width: 70px;">
                            </div>
                            <div class="col-sm-8">
                                    <h5 class="mt-0 mb-0"><strong>Marsa Street Dubai Mrina, Rove Dubai Marina</strong></h5>
                                    <p class="text-muted font-13 mb-0"><b>@ 3.4 KM with 20 minutes of estimated travel time</b></p>
                                    <p mb-0>1 Tesla connector up to 13 KW available for customers, sell pack.</p>
                            </div>
                            <div class="col-sm-2">
                                <div class="p-2">
                                    <select id="rating_filtter" name="rating" class="rating_filtter">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5" selected="">5</option>
                                    </select>                                                              
                                </div>
                                <div class="font-10" style="">
                                    <button class="btn btn-danger btn-block">Booked</button>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                        </div> -->
                    </div>                                       
                </div>
            </div>
        </div>   
    </section>
</div>
<?php 
    $this->load->view('dashboard/includes/script');
?>
<script type="text/javascript">
    get_power();
    get_plugtype();
    function onFilter() {
        var form = $('#filtter_form');
        $.ajax({  
             url:"<?php echo base_url(); ?>api/1",  
             method:"post",  
             data:form.serialize(),  
             dataType:'json',
             success: function( data ) {
                if (data.status == "true") {
                    Apimarker(data.data);
                }
             },
             error: function() {}
        });
        // $.ajax({  
        //      url:"<?php echo base_url(); ?>api2",  
        //      method:"post",  
        //      data:form.serialize(),  
        //      dataType:'json',
        //      success: function( data ) {
        //         if (data.status == "true") {
        //             Api2marker(data.data);                    
        //         }
        //      },
        //      error: function() {}
        // });
        $.ajax({
          // url: "https://api.openchargemap.io/v2/poi/?output=json&latitude=654356&longitude=765765",
          url : "https://api.openchargemap.io/v2/poi/?output=json&latitude="+window.lat+"&longitude="+window.long+"",
          method : 'get',
          dataType:'json',                
          success: function(data) {
                apiJson2 = data;
                console.log(data);
                if(data != null) {
                  Api2marker(data);
                } 
            },
            error: function(data){}
        });
    }
    function clearfiltter() {
        $("#nearestby").attr("checked", true);
        $("#plug_type_checkboxs input:checkbox").attr("checked", false);
        $("#power_checkboxs input:checkbox").attr("checked", false);
        onFilter();
    }
</script>
