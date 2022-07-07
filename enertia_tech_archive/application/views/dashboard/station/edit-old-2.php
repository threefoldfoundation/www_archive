
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="https://www.alcyone.in/enertia/assets/js/jquery.steps.min.js"></script>
<!-- Page Content-->
<div class="wrapper">
    <div class="container-fluid">
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12"></div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="success-msg alert alert-success">Station Updated successfully.</div>
                        </div>
                        <form id="AddStation" class="form-horizontal form-wizard-wrapper" enctype="multipart/form-data">
                            <fieldset class="first-slide">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <div class="wizard-form-heading mb-3">Update Station : Name and Address</div>
                                            <label for="txtFirstNameBilling" class="col-lg-12 col-form-label text-left pl-0">Enter Station Name</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <input id="station_Name" name="station_Name" type="text" class="form-control" required="required" autocomplete="off">
                                                    <input id="station_Id" name="station_Id" type="hidden" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="container">
                                            <label for="searchAddress">Enter Station Address</label>
                                            <input type="text" class="form-control searchAddress" name="station_Address" id="searchAddress" required="required">                                            
                                            <input type="hidden" id="lat" name="station_Location_lat">
                                            <input type="hidden" id="long" name="station_Location_long">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="container">
                                            <p class="col-form-label text-info font-12">Alternately, You can move the marker on the MAP to determine the address</p>
                                            <div id="searchAddressMap" style="height: 300px;"> </div>
                                            <div id="infowindow-content">
                                              <img src="" width="16" height="16" id="place-icon">
                                              <span id="place-name"  class="title"></span><br>
                                              <span id="place-address"></span>
                                            </div>  
                                        </div>                                    
                                    </div> 
                                </div>
                                <div class="container">
                                    <button type="button" class="btn btn-info d-block first-next-btn slides-btn">Next</button>
                                </div>
                            </fieldset>

                            <fieldset class="second-slide">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <div class="wizard-form-heading mb-3">Update Station : Provider and Access</div>
                                            <label for="txtFirstNameShipping" class="col-lg-12 col-form-label text-left pl-0">Select Network / Provider</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <select class="form-control" id="provider_name1" name="provider_name" required="required">
                                                        <option value="">Provider</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="container">
                                            <label for="txtCompanyShipping" class="col-lg-12 col-form-label text-left pl-0">Select Timing - From Day</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <select class="form-control" id="from_day_time1" name="from_day_time" required="required">
                                                        <?php
                                                            function weekDays() {
                                                                $weekdays = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
                                                                foreach ($weekdays as $key => $value) {
                                                                    echo "<option value=".$value.">".$value."</option>";
                                                                }
                                                            }
                                                            weekDays();
                                                        ?>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="container">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">Select Timing - To Day</label>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <select class="form-control" id="to_day_time1" name="to_day_time" required="required">
                                                        <?php weekDays(); ?>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="container">
                                            <label for="txtCompanyShipping" class="col-lg-12 col-form-label text-left pl-0">Select Timing - From Time</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <select class="form-control" id="from_time1" name="from_time" required="required">
                                                        <?php 
                                                            function dayTime() {
                                                                for ($i=0; $i <= 23; $i++) { 
                                                                    echo "<option value='".$i.":00'>".$i."</option>";
                                                                }
                                                            }
                                                            dayTime();
                                                        ?>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="container">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">Select Timing - To Time</label>
                                                <div class="col-lg-12" id="Station_Open_Time">
                                                    <div class="form-group">
                                                      <select class="form-control" id="to_time1" name="to_time" required="required">
                                                        <?php  dayTime(); ?>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4 col-md-4 pt-4">
                                        <div class="container">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left pr-0">24 / 7 Open
                                                    <button type="button" class="btn btn-sm btn-toggle focus active" data-toggle="button" aria-pressed="true" autocomplete="off" id="open24">
                                                        <div class="handle"></div>
                                                    </button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-sm-4 col-md-4 pt-4">
                                        <div class="container">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left pr-0 parking-lable" style="padding-left: 40px;">Parking
                                                    <button type="button" class="btn btn-sm btn-toggle float-right focus active" data-toggle="button" aria-pressed="true" autocomplete="off" id="parking">
                                                        <div class="handle"></div>
                                                    </button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 pt-4">
                                        <div class="container">
                                            <div class="form-group row float-right wifi-wraper">
                                                <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">WiFi
                                                    <button type="button" class="btn btn-sm btn-toggle focus active" data-toggle="button" aria-pressed="true" autocomplete="off" id="wifi">
                                                        <div class="handle"></div>
                                                    </button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="container">
                                            <label for="txtCompanyShipping" class="col-lg-12 col-form-label text-left pl-0">Payments</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <select class="form-control" id="payments1" name="payments" required="required">
                                                        <option>Payment Method</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="container">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left ">Price</label>
                                                <div class="col-lg-12">
                                                    <input id="price" name="price" type="text" class="form-control" required="required" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <label for="txtFirstNameShipping" class="col-lg-12 col-form-label text-left pl-0">Access Type</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <select class="form-control" id="access_type1" name="access_type" required="required">
                                                        <option>Access Type</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <button type="button" class="btn btn-info d-block second-back-btn slides-btn">Back</button>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4"></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <button type="button" class="btn btn-info d-block second-next-btn slides-btn">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="third-slide">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <!-- <div class="wizard-form-heading mb-3">Update Station : Connectors and Plug Type</div> -->
                                        </div>
                                    </div>
                                </div>
                                <section class="plugs_multiple">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container">
                                                <label for="txtFirstNameBilling" class="col-lg-12 col-form-label text-left pl-0">Connection | Plug Type</label>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                          <select class="form-control" id="plug_type1" name="plug_type[]" required="required">
                                                            <option value="0">Plug Type</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container">
                                                <label for="txtCompanyShipping" class="col-lg-12 col-form-label text-left pl-0">Chargin Level - Power (KW)</label>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                          <select class="form-control" id="charge_level1" name="charge_level[]" required="required">
                                                            <option value="0">Charging Level</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="container">
                                                <div class="form-group row">
                                                    <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">Supply Type</label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                          <select class="form-control" id="supply_type1" name="supply_type[]" required="required">
                                                            <option value="0">Supply Type</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container">
                                                <label for="txtCompanyShipping" class="col-lg-12 col-form-label text-left pl-0">Max Current and Voltage</label>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                          <select class="form-control" id="max_voltage1" name="max_voltage[]" required="required">
                                                            <option value="0">Current Voltage</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="container">
                                                <div class="form-group row">
                                                    <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">Number of Points</label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                          <select class="form-control" id="no_of_points1" name="no_of_points[]" required="required">
                                                            <option value="0">Points</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="float-right mr-3 add_plug">
                                        <i class="fa fa-plug station-view-bottom-r-btn add_plug_icon" title="Add Plug"></i>
                                    </div>
                                    <div class="float-right mr-2 remove_plug">
                                        <i class="fa fa-minus-circle station-view-bottom-r-btn remove_plug_icon" title="Remove Plug"></i>
                                    </div>  
                                </section>

                                <!-- For append plug sections in this div -->
                                <div class="add_plug_section">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container">
                                                <div class="wizard-form-heading mb-3">Update Station : Connectors and Plug Type</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                          
                                
                                <div class="row" style="margin-top: 80px;">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <label for="txtFirstNameShipping" class="col-lg-12 col-form-label text-left pl-0">General Comments | Description</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <textarea id="general_comments" name="general_comments" class="form-control" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <button type="button" class="btn btn-info d-block third-back-btn slides-btn">Back</button>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4"></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <button type="button" class="btn btn-info d-block third-next-btn slides-btn">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="fourth-slide">
                                <div class="row">
                                    <div class="col-md-12 desktop-view">
                                        <div class="container">
                                            <div class="wizard-form-heading mb-3">Update Station : Photos and Videos</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 desktop-view">
                                        <div class="container">
                                            <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left pl-0">Add Photos</label>
                                            <div class="gallery-icon-wrapper">
                                                <div class="btn btn-file btn-gallery">
                                                    <span class="add_image fa fa-file-image-o"></span>
                                                    <input type="file" name="station_images[]" id="images" multiple="multiple" accept="image/png, image/jpeg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 desktop-view">
                                        <div class="container">
                                            <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left pl-0">Add Video</label>
                                            <div class="gallery-icon-wrapper">
                                                <div class="btn btn-file btn-gallery">
                                                    <span class="add_image mdi mdi-movie"></span>
                                                    <input type="file" name="station_images2[]" id="images2" multiple="multiple" accept="image/png, image/jpeg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4 mobile-camera">
                                        <div class="container">
                                            <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left pl-0">Open Mobile Camera</label>
                                            <div class="gallery-icon-wrapper">
                                                <div class="btn btn-file btn-gallery">
                                                    <span class="mdi mdi-camera"></span>
                                                    <input type="file" name="station_images[]" id="images" multiple="multiple" accept="image/png, image/jpeg" capture="camera">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4 mobile-camera">
                                        <div class="container">
                                            <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left pl-0">Upload</label>
                                            <div class="">
                                                <div class="btn btn-file pl-0" style="background: transparent !important;">
                                                    <span class="fa fa-cloud-upload station-view-bottom-r-btn"></span>
                                                    <input type="file" name="station_images2[]" id="images2" multiple="multiple" accept="image/png, image/jpeg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="container">
                                            <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left pl-0">Files Attached</label>
                                            <div class="image_1_preview mt-3 images-preview"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <button type="button" class="btn btn-info d-block fourth-back-btn slides-btn">Back</button>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4"></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <button type="submit" class="btn btn-info d-block slides-btn">Finish and Update</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12"></div>
        </div><!--end row-->
    </div><!-- container -->
</div>
<!-- end page-wrapper -->       

<script>
    $(document).ready(function() {
        SetAddFormFields();
        var finalUrl = [];
        $('#AddStation').submit(function(e){
            e.preventDefault();
            var open24 = $('#open24').attr('aria-pressed');
            var parking = $('#parking').attr('aria-pressed');
            var wifi = $('#wifi').attr('aria-pressed');
            var stationPhotos = finalUrl;
            $.ajax({
                url: '<?php echo base_url(); ?>station/AddStation',
                method: 'post',
                dataType: 'json', 
                data: $('#AddStation').serialize()+'&station_Photos='+JSON.stringify(finalUrl)+'&open24='+open24+'&parking='+parking+'&wifi='+wifi,
                success: function(response) {
                    if(response == 1) {
                        $('.success-msg').slideDown().delay(2000).slideUp();
                    }
                    if(response == 2) {
                        $('.success-msg').text('Station updated successfully');
                        $('.success-msg').slideDown().delay(2000).slideUp();
                    }
                }
            });
        });

        // For show image in front
        var url = [];
        var flag = 0;
        $('#images').on('change', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>station/ImagesUpload',
                method: 'post',
                data: new FormData($("#AddStation")[0]),
                contentType: false,
                processData:false,
                success: function(response) {
                    // console.log(response);
                    $.each($.parseJSON(response), function(key, value) {
                        url.push({key : key,value:value});
                        
                        function getExtension(value) {
                            var parts = value.split('.');
                            return parts[parts.length - 1];
                        }
                        if(getExtension(value) == 'mp4' || getExtension(value) == 'ogg' || getExtension(value) == 'video') {
                            $('.images-preview').append("<span class='pip'>" +
                            "<img class='imageThumb' src='<?php echo base_url(); ?>assets/images/v1.jpg' title="+(key+flag++)+">" +
                            "<span class='remove mdi mdi-close'></span></span>"); 
                        } else{
                            $('.images-preview').append("<span class='pip'>" +
                            "<img class='imageThumb' src="+value+ " title="+(key+flag++)+">" +
                            "<span class='remove mdi mdi-close'></span></span>");
                        }
                    });
                    $.each(url, function(index, value) {
                        finalUrl.push({url:value.value});
                    });
                    $(".remove").click(function(){
                        var current_image = $(this).parent(".pip").find('img').attr('title');
                        $(this).parent(".pip").remove();
                        $('#images').val('');
                        var rowIndex=-1;
                        $.each(url, function(index, value) {
                            if(value.key==current_image){
                                rowIndex=index;
                            }
                        });
                        if(rowIndex >= 0){
                            url.splice(rowIndex,1);
                        }
                        finalUrl.length = 0;
                        $.each(url, function(index, value) {
                            finalUrl.push(value.value);
                        });
                    });
                }
            });
        });

        // Update station
        var pageURL = window.location.href;
        var stationId = pageURL.substr(pageURL.lastIndexOf('/') + 1);
        var flag2 = 0;
        $.ajax({
            url: "<?php echo base_url(); ?>station/GetStationInfo/"+stationId,
            method: 'get',
            dataType: 'json',
            success: function(response) {
                var plugArray = response.data.station_plugtype.split(',');
                var powerArray = response.data.station_power.split(',');
                var supplyTypeArray = response.data.station_supplytype.split(',');
                var voltageArray = response.data.station_voltage.split(',');
                var pointArray = response.data.station_point.split(',');
                $('.plugs_multiple').empty();
                var plugs = [];
                $.each(JSON.parse(JSON.stringify(plugArray)), function(key,value){
                    var plug = {
                                plugType : JSON.parse(JSON.stringify(plugArray))[key],
                                power : JSON.parse(JSON.stringify(powerArray))[key],
                                supplyType : JSON.parse(JSON.stringify(supplyTypeArray))[key],
                                voltage : JSON.parse(JSON.stringify(voltageArray))[key],
                                point : JSON.parse(JSON.stringify(pointArray))[key],
                            };
                    plugs.push(plug);
                });

                $.each(plugs, function(key, value) {
                    
                    var html =  '<section style="margin-top:80px;" class="connector-section connector-section-edit">'+
                            '<div class="row">'+
                              '<div class="col-md-12">'+
                                  '<div class="container">'+
                                      '<label for="txtFirstNameBilling" class="col-lg-12 col-form-label text-left pl-0">Connection | Plug Type</label>'+
                                      '<div class="form-group row">'+
                                          '<div class="col-lg-12">'+
                                              '<div class="form-group">'+
                                                '<select class="form-control plug_type" id="plug_type'+key+'" name="plug_type[]" required="required">'+
                                                  '<option value="0">Plug Type</option>'+plugOption+'</select>'+
                                              '</div>'+
                                          '</div>'+
                                      '</div>'+
                                  '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-md-6">'+
                                  '<div class="container">'+
                                      '<label for="txtCompanyShipping" class="col-lg-12 col-form-label text-left pl-0">Chargin Level - Power (KW)</label>'+
                                      '<div class="form-group row">'+
                                          '<div class="col-lg-12">'+
                                              '<div class="form-group">'+
                                                '<select class="form-control charge_level" id="charge_level'+key+'" name="charge_level[]" required="required">'+
                                                  '<option value="0">Charging Level</option>'+powerOption+'</select>'+
                                              '</div>'+
                                          '</div>'+
                                      '</div>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                  '<div class="container">'+
                                      '<div class="form-group row">'+
                                          '<label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">Supply Type</label>'+
                                          '<div class="col-lg-12">'+
                                            '<div class="form-group">'+
                                              '<select class="form-control" id="supply_type'+key+'" name="supply_type[]" required="required">'+
                                                '<option value="0">Supply Type</option>'+supplyOption+'</select>'+
                                            '</div>'+
                                          '</div>'+
                                      '</div>'+
                                  '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                              '<div class="col-md-6">'+
                                  '<div class="container">'+
                                      '<label for="txtCompanyShipping" class="col-lg-12 col-form-label text-left pl-0">Max Current and Voltage</label>'+
                                      '<div class="form-group row">'+
                                          '<div class="col-lg-12">'+
                                            '<div class="form-group">'+
                                                '<select class="form-control" id="max_voltage'+key+'" name="max_voltage[]" required="required">'+
                                                  '<option value="0">Current Voltage</option>'+currentOption+'</select>'+
                                              '</div>'+
                                          '</div>'+
                                      '</div>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="col-md-6">'+
                                  '<div class="container">'+
                                      '<div class="form-group row">'+
                                          '<label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">Number of Points</label>'+
                                            '<div class="col-lg-12">'+
                                                '<div class="form-group">'+
                                                  '<select class="form-control" id="no_of_points'+key+'" name="no_of_points[]" required="required">'+
                                                    '<option value="0">Points</option>'+pointsOption+'</select>'+
                                                '</div>'+
                                          '</div>'+
                                      '</div>'+
                                  '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="float-right mr-3 add_plug add_plug_this">'+
                                '<i class="fa fa-plug station-view-bottom-r-btn add_plug_icon" title="Add Plug"></i>'+
                            '</div>'+
                            '<div class="float-right mr-2 remove_plug remove_plug_this" title="Remove Plug">'+
                                '<i class="fa fa-minus-circle station-view-bottom-r-btn remove_plug_icon"></i>'+
                            '</div>'+
                        '</section>';

                    $('.add_plug_section').append(html);

                    $(".remove_plug_this").click(function() {
                        $(this).closest('.connector-section').remove();
                    });
                    $('.add_plug_this').click(function() {
                        $('.add_plug_section').append(editPlug);
                    });

                    $("#plug_type"+key+" option[value="+value.plugType+"]").attr('selected', 'selected');
                    $("#charge_level"+key+" option[value="+value.power+"]").attr('selected', 'selected');
                    $("#supply_type"+key+" option[value="+value.supplyType+"]").attr('selected', 'selected');
                    $("#max_voltage"+key+" option[value="+value.voltage+"]").attr('selected', 'selected');
                    $("#no_of_points"+key+" option[value="+value.point+"]").attr('selected', 'selected');
                });      
                $("#station_Name").val(response.data.station_Name);
                $("#station_Id").val(response.data.station_ID);
                $("#searchAddress").val(response.data.station_Address);
                $("#lat").val(response.data.station_lat);
                $("#long").val(response.data.station_long);
                $("#provider_name1 option[value="+response.data.station_Provider+"]").attr('selected', 'selected');
                $("#from_day_time1 option[value="+response.data.station_from_day+"]").attr('selected', 'selected');
                $("#to_day_time1 option[value="+response.data.station_to_day+"]").attr('selected', 'selected');
                $("#from_time1 option[value='"+response.data.station_from_time+"']").attr('selected', 'selected');
                $("#to_time1 option[value='"+response.data.station_to_time+"']").attr('selected', 'selected');
                if(response.data.station_open_time == 0) {
                    $("#open24").addClass("focus active").attr("aria-pressed", "true");
                } else{
                    $("#open24").removeClass("focus active").attr("aria-pressed", "false");
                }
                if(response.data.station_parking == 0) {
                    $("#parking").addClass("focus active").attr("aria-pressed", "true");
                } else{
                    $("#parking").removeClass("focus active").attr("aria-pressed", "false");
                }
                if(response.data.station_wifi == 0) {
                    $("#wifi").addClass("focus active").attr("aria-pressed", "true");
                } else{
                    $("#wifi").removeClass("focus active").attr("aria-pressed", "false");
                }
                $("#payments1 option[value="+response.data.station_payment+"]").attr('selected', 'selected');
                $("#price").val(response.data.station_price);
                $("#access_type1 option[value="+response.data.station_accesstype+"]").attr('selected', 'selected');
                $("#general_comments").val(response.data.station_general_comment);
                var attachments = response.data.station_attachment;
                var files = JSON.parse(attachments);

                $.each(files, function(key, value) {
                    var val = 
                    finalUrl.push({url:(value.url != null ? value.url : '')});
                    function getExtension(value) {
                        var parts = (value).split('.');
                        return parts[parts.length - 1];
                    }
                    if(value.url != null && value.url != ''){
                        if(getExtension(value.url) == 'mp4' || getExtension(value.url) == 'ogg' || getExtension(value.url) == 'video') {
                            $('.images-preview').append("<span class='pip'>" +
                            "<img class='imageThumb' src='<?php echo base_url(); ?>assets/images/v1.jpg' title=image_"+(flag2++)+">" +
                            "<span class='remove mdi mdi-close'></span></span>"); 
                        } else{
                            $('.images-preview').append("<span class='pip'>" +
                            "<img class='imageThumb' src="+value.url+ " title=image_"+(flag2++)+">" +
                            "<span class='remove mdi mdi-close'></span></span>");
                        }
                    }
                    $(".remove").click(function(){
                        var current_image = $(this).parent(".pip").find('img').attr('title');
                        $(this).parent(".pip").remove();
                        $('#images').val('');
                        var rowIndex=-1;
                        $.each(url, function(index, value) {
                            console.log(value);
                            if(value.key==current_image){
                                rowIndex=index;
                            }
                        });
                        if(rowIndex >= 0){
                            url.splice(rowIndex,1);
                        }
                        finalUrl.length = 0;
                        $.each(url, function(index, value) {
                            finalUrl.push(value.value);
                        });
                    });
                });
            }
        });  

        window.setTimeout(function(){
            var editPlug = '<section style="margin-top:80px;" class="connector-section">'+
                                '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        '<div class="container">'+
                                            '<label for="txtFirstNameBilling" class="col-lg-12v col-form-label text-left pl-0">Connection | Plug Type</label>'+
                                            '<div class="form-group row">'+
                                                '<div class="col-lg-12">'+
                                                    '<div class="form-group">'+
                                                      '<select class="form-control plug_type" id="plug_type" name="plug_type[]" required="required">'+
                                                        '<option value="0">Plug Type</option>'+plugOption+'</select>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-md-6">'+
                                        '<div class="container">'+
                                            '<label for="txtCompanyShipping" class="col-lg-12 col-form-label text-left pl-0">Chargin Level - Power (KW)</label>'+
                                            '<div class="form-group row">'+
                                                '<div class="col-lg-12">'+
                                                    '<div class="form-group">'+
                                                      '<select class="form-control" id="charge_level" name="charge_level[]" required="required">'+
                                                        '<option value="0">Charging Level</option>'+powerOption+'</select>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-6">'+
                                        '<div class="container">'+
                                            '<div class="form-group row">'+
                                                '<label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">Supply Type</label>'+
                                                '<div class="col-lg-12">'+
                                                  '<div class="form-group">'+
                                                    '<select class="form-control" id="supply_type" name="supply_type[]" required="required">'+
                                                      '<option value="0">Supply Type</option>'+supplyOption+'</select>'+
                                                  '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-md-6">'+
                                        '<div class="container">'+
                                            '<label for="txtCompanyShipping" class="col-lg-12 col-form-label text-left pl-0">Max Current and Voltage</label>'+
                                            '<div class="form-group row">'+
                                                '<div class="col-lg-12">'+
                                                  '<div class="form-group">'+
                                                      '<select class="form-control" id="max_voltage" name="max_voltage[]" required="required">'+
                                                        '<option value="0">Current Voltage</option>'+currentOption+'</select>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-6">'+
                                        '<div class="container">'+
                                            '<div class="form-group row">'+
                                                '<label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">Number of Points</label>'+
                                                  '<div class="col-lg-12">'+
                                                      '<div class="form-group">'+
                                                        '<select class="form-control" id="no_of_points" name="no_of_points[]" required="required">'+
                                                          '<option value="0">Points</option>'+pointsOption+'</select>'+
                                                      '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                 '<div class="float-right mr-3 add_plug add_plug_this">'+
                                      '<i class="fa fa-plug station-view-bottom-r-btn add_plug_icon" title="Add Plug"></i>'+
                                  '</div>'+
                                '<div class="float-right mr-2 remove_plug remove_plug_this" title="Remove Plug">'+
                                    '<i class="fa fa-minus-circle station-view-bottom-r-btn remove_plug_icon"></i>'+
                                '</div>'+
                            '</section>';

            $(document).on('click', '.add_plug_this', function() {
                $('.add_plug_section').append(editPlug);
            });

            $(document).on('click', '.remove_plug_this', function() {
                $(this).closest('.connector-section').remove();
            });   
            $(".connector-section-edit").first().css('margin-top', '0px');
        } ,1000);
    });
</script>
<?php 
    $this->load->view('dashboard/includes/script'); 
?>