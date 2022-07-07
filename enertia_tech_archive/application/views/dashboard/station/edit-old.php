<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Page Content-->
<div class="wrapper">
    <div class="container-fluid">
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12"></div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h3 class="pl-2">Add Staion:</h3> -->
                        <div class="container">
                            <div class="success-msg alert alert-success">Station updated successfully.</div>
                        </div>
                        <form id="UpdateStation" class="form-horizontal form-wizard-wrapper" enctype="multipart/form-data">
                            <fieldset class="first-slide">
                                <div class="wizard-form-heading mb-3">Add Station : Name and Address</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <label for="txtFirstNameBilling" class="col-lg-12 col-form-label text-left pl-0">Enter Station Name</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <input id="station_Name" name="station_Name" type="text" class="form-control" required="required" autocomplete="off" value="<?php echo !empty($data['station_Name'])?$data['station_Name']:''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="container">
                                            <label for="searchAddress">Enter Station Address</label>
                                            <input type="text" class="form-control searchAddress" name="station_Address" id="searchAddress" required="required" value="<?php echo !empty($data['station_Address'])?$data['station_Address']:''; ?>">
                                            <input type="hidden" id="lat" name="station_Location_lat" value="<?php echo !empty($data['station_lat'])?$data['station_lat']:''; ?>">
                                            <input type="hidden" id="long" name="station_Location_long" value="<?php echo !empty($data['station_long'])?$data['station_long']:''; ?>">
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
                                <div class="wizard-form-heading mb-3">Add Station : Provider and Access</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <label for="txtFirstNameShipping" class="col-lg-12 col-form-label text-left pl-0">Select Network / Provider</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <select class="form-control" id="provider_name" name="provider_name" required="required">
                                                        <option>Provider</option>
                                                        <?php
                                                            if(!empty($fields[0]->provider_name)){
                                                                $provider = json_decode($fields[0]->provider_name);
                                                                foreach ($provider as $key => $value) {
                                                                    if($data['station_Provider'] == $value){
                                                                    echo '<option selected="selected">'.$value.'</option>';
                                                                    } else{
                                                                        echo '<option>'.$value.'</option>';
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                      </select>
                                                    </div>
                                                    <!-- <input id="provider_name" name="provider_name" type="text" class="form-control" required="required" autocomplete="off"> -->
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
                                                      <select class="form-control" id="from_day_time" name="from_day_time" required="required">
                                                        <option>From</option>
                                                        <option <?php echo ($data['from_day_time'] == 'Monday'? 'selected': ''); ?>>Monday</option>
                                                        <option <?php echo ($data['from_day_time'] == 'Tuesday'? 'selected': ''); ?>>Tuesday</option>
                                                        <option <?php echo ($data['from_day_time'] == 'Wednesday'? 'selected': ''); ?>>Wednesday</option>
                                                        <option <?php echo ($data['from_day_time'] == 'Thursday'? 'selected': ''); ?>>Thursday</option>
                                                        <option <?php echo ($data['from_day_time'] == 'Friday'? 'selected': ''); ?>>Friday</option>
                                                        <option <?php echo ($data['from_day_time'] == 'Saturday'? 'selected': ''); ?>>Saturday</option>
                                                        <option <?php echo ($data['from_day_time'] == 'Sunday'? 'selected': ''); ?>>Sunday</option>
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
                                                    <!-- <input id="to_day_time" name="to_day_time" type="text" class="form-control"> -->
                                                    <div class="form-group">
                                                      <select class="form-control" id="to_day_time" name="to_day_time" required="required">
                                                        <option>To</option>
                                                        <option <?php echo ($data['to_day_time'] == 'Monday'? 'selected': ''); ?>>Monday</option>
                                                        <option <?php echo ($data['to_day_time'] == 'Tuesday'? 'selected': ''); ?>>Tuesday</option>
                                                        <option <?php echo ($data['to_day_time'] == 'Wednesday'? 'selected': ''); ?>>Wednesday</option>
                                                        <option <?php echo ($data['to_day_time'] == 'Thursday'? 'selected': ''); ?>>Thursday</option>
                                                        <option <?php echo ($data['to_day_time'] == 'Friday'? 'selected': ''); ?>>Friday</option>
                                                        <option <?php echo ($data['to_day_time'] == 'Saturday'? 'selected': ''); ?>>Saturday</option>
                                                        <option <?php echo ($data['to_day_time'] == 'Sunday'? 'selected': ''); ?>>Sunday</option>
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
                                                    <!-- <input id="from_time" name="from_time" type="text" class="form-control datetimepicker3"> -->
                                                    <div class="form-group">
                                                      <select class="form-control" id="from_time" name="from_time" required="required">
                                                        <option <?php echo ($data['station_FromTimings'] == '00:00:00'? 'selected': ''); ?>>0</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '01:00:00'? 'selected': ''); ?>>1</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '02:00:00'? 'selected': ''); ?>>2</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '03:00:00'? 'selected': ''); ?>>3</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '04:00:00'? 'selected': ''); ?>>4</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '05:00:00'? 'selected': ''); ?>>5</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '06:00:00'? 'selected': ''); ?>>6</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '07:00:00'? 'selected': ''); ?>>7</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '08:00:00'? 'selected': ''); ?>>8</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '09:00:00'? 'selected': ''); ?>>9</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '10:00:00'? 'selected': ''); ?>>10</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '11:00:00'? 'selected': ''); ?>>11</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '12:00:00'? 'selected': ''); ?>>12</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '13:00:00'? 'selected': ''); ?>>13</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '14:00:00'? 'selected': ''); ?>>14</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '15:00:00'? 'selected': ''); ?>>15</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '16:00:00'? 'selected': ''); ?>>16</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '17:00:00'? 'selected': ''); ?>>17</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '18:00:00'? 'selected': ''); ?>>18</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '19:00:00'? 'selected': ''); ?>>19</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '20:00:00'? 'selected': ''); ?>>20</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '21:00:00'? 'selected': ''); ?>>21</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '22:00:00'? 'selected': ''); ?>>22</option>
                                                        <option <?php echo ($data['station_FromTimings'] == '23:00:00'? 'selected': ''); ?>>23</option>
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
                                                    <!-- <input id="to_time" name="to_time" type="text" class="form-control datetimepicker3"> -->
                                                    <div class="form-group">
                                                      <select class="form-control" id="to_time" name="to_time" required="required">
                                                        <option <?php echo ($data['station_ToTimings'] == '00:00:00'? 'selected': ''); ?>>0</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '01:00:00'? 'selected': ''); ?>>1</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '02:00:00'? 'selected': ''); ?>>2</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '03:00:00'? 'selected': ''); ?>>3</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '04:00:00'? 'selected': ''); ?>>4</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '05:00:00'? 'selected': ''); ?>>5</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '06:00:00'? 'selected': ''); ?>>6</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '07:00:00'? 'selected': ''); ?>>7</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '08:00:00'? 'selected': ''); ?>>8</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '09:00:00'? 'selected': ''); ?>>9</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '10:00:00'? 'selected': ''); ?>>10</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '11:00:00'? 'selected': ''); ?>>11</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '12:00:00'? 'selected': ''); ?>>12</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '13:00:00'? 'selected': ''); ?>>13</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '14:00:00'? 'selected': ''); ?>>14</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '15:00:00'? 'selected': ''); ?>>15</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '16:00:00'? 'selected': ''); ?>>16</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '17:00:00'? 'selected': ''); ?>>17</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '18:00:00'? 'selected': ''); ?>>18</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '19:00:00'? 'selected': ''); ?>>19</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '20:00:00'? 'selected': ''); ?>>20</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '21:00:00'? 'selected': ''); ?>>21</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '22:00:00'? 'selected': ''); ?>>22</option>
                                                        <option <?php echo ($data['station_ToTimings'] == '23:00:00'? 'selected': ''); ?>>23</option>
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
                                                    <button type="button" class="btn btn-sm btn-toggle focus <?php echo ($data['open_24_7'] == 'no' ? '': 'active'); ?>" data-toggle="button" aria-pressed="<?php echo !empty($data['station_open_time'])? ($data['station_open_time'] == 'yes' ? 'true': 'false'): ($data['station_open_time'] == 'no' ? 'false': 'true'); ?>" autocomplete="off" id="open24">
                                                        <div class="handle"></div>
                                                    </button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-sm-4 col-md-4 pt-4">
                                        <div class="container">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left pr-0" style="padding-left: 40px;">Parking
                                                    <button type="button" class="btn btn-sm btn-toggle float-right focus active" data-toggle="button" aria-pressed="<?php echo !empty($data['station_parking'])? ($data['station_parking'] == 'yes' ? 'true': 'false'): ($data['station_parking'] == 'no' ? 'false': 'true'); ?>" autocomplete="off" id="parking">
                                                        <div class="handle"></div>
                                                    </button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 pt-4">
                                        <div class="container">
                                            <div class="form-group row float-right">
                                                <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left">WiFi
                                                    <button type="button" class="btn btn-sm btn-toggle focus active" data-toggle="button" aria-pressed="<?php echo !empty($data['station_wifi'])? ($data['station_wifi'] == 'yes' ? 'true': 'false'): ($data['station_wifi'] == 'no' ? 'false': 'true'); ?>" autocomplete="off" id="wifi">
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
                                                      <select class="form-control" id="payments" name="payments" required="required">
                                                        <option>Payment Method</option>
                                                        <?php
                                                            if(!empty($fields[0]->payment_method)){
                                                                $payment = json_decode($fields[0]->payment_method);
                                                                foreach ($payment as $key => $value) {
                                                                    if($data['payments'] == $value){
                                                                        echo '<option selected="selected">'.$value.'</option>';
                                                                    } else{
                                                                        echo '<option>'.$value.'</option>';
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                      </select>
                                                    </div>
                                                    <!-- <input name="payments" id="payments" type="text" class="form-control" required="required" autocomplete="off"> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="container">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressShipping" class="col-lg-12 col-form-label text-left ">Price</label>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <select class="form-control" id="price" name="price" required="required">
                                                        <option>Price</option>
                                                        <?php
                                                            if(!empty($fields[0]->price)){
                                                                $price = json_decode($fields[0]->price);
                                                                foreach ($price as $key => $value) {
                                                                    if($data['price'] == $value){
                                                                        echo '<option selected="selected">'.$value.'</option>';
                                                                    } else{
                                                                        echo '<option>'.$value.'</option>';
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                      </select>
                                                    </div>
                                                    <!-- <input id="price" name="price" type="text" class="form-control" required="required" autocomplete="off"> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <label for="txtFirstNameShipping" class="col-lg-3 col-form-label text-left pl-0">Access Type</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <select class="form-control" id="access_type" name="access_type" required="required">
                                                        <option>Payment Method</option>
                                                        <?php
                                                            if(!empty($fields[0]->access_type)){
                                                                $access_type = json_decode($fields[0]->access_type);
                                                                foreach ($access_type as $key => $value) {
                                                                    if($data['access_type'] == $value) {
                                                                        echo '<option selected="selected">'.$value.'</option>';
                                                                    } else{
                                                                        echo '<option>'.$value.'</option>';
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                      </select>
                                                    </div>
                                                    <!-- <input id="access_type" name="access_type" type="text" class="form-control" required="required" autocomplete="off"> -->
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
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <!-- <button type="button" class="btn btn-info d-block second-skip-btn slides-btn">Skip</button> -->
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <button type="button" class="btn btn-info d-block second-next-btn slides-btn">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="third-slide">
                                <div class="wizard-form-heading mb-3">Add Station : Connectors and Plug Type</div>
                                <section>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container">
                                                <label for="txtFirstNameBilling" class="col-lg-12 col-form-label text-left pl-0">Connection | Plug Type</label>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                          <select class="form-control" id="plug_type" name="plug_type[]" required="required">
                                                            <option>Plug Type</option>
                                                            <?php
                                                                $plugs = json_decode($data['plugs']);
                                                                if(!empty($fields[0]->plug_type)){
                                                                    $plug = json_decode($fields[0]->plug_type);
                                                                    foreach ($plug as $key => $value) {
                                                                        if($plugs[0]->plug_type == $value){
                                                                            echo '<option selected="selected">'.$value.'</option>';
                                                                        } else{
                                                                            echo '<option>'.$value.'</option>';
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                          </select>

                                                        </div>
                                                        <!-- <input id="plug_type" name="plug_type[]" type="text" class="form-control plug_type" required="required"> -->
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
                                                          <select class="form-control" id="charge_level" name="charge_level[]" required="required">
                                                            <option>Charging Level</option>
                                                            <?php
                                                                if(!empty($fields[0]->charging_level)){
                                                                    $charge = json_decode($fields[0]->charging_level);
                                                                    foreach ($charge as $key => $value) {
                                                                        if($plugs[0]->charge_level == $value){
                                                                            echo '<option selected="selected">'.$value.'</option>';
                                                                        } else {
                                                                            echo '<option>'.$value.'</option>';
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                          </select>
                                                        </div>
                                                        <!-- <input id="charge_level" name="charge_level[]" type="text" class="form-control charge_level" required="required"> -->
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
                                                          <select class="form-control" id="supply_type" name="supply_type[]" required="required">
                                                            <option>Supply Type</option>
                                                            <?php
                                                                if(!empty($fields[0]->supply_type)){
                                                                    $supply = json_decode($fields[0]->supply_type);
                                                                    foreach ($supply as $key => $value) {
                                                                        if($plugs[0]->supply_type == $value){
                                                                            echo '<option selected="selected">'.$value.'</option>';
                                                                        } else{
                                                                            echo '<option>'.$value.'</option>';
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                          </select>
                                                        </div>
                                                        <!-- <input id="supply_type" name="supply_type[]" type="text" class="form-control supply_type" required="required"> -->
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
                                                          <select class="form-control" id="max_voltage" name="max_voltage[]" required="required">
                                                            <option>Current Voltage</option>
                                                            <?php
                                                                if(!empty($fields[0]->voltage)){
                                                                    $voltage = json_decode($fields[0]->voltage);
                                                                    foreach ($voltage as $key => $value) {
                                                                        if($plugs[0]->max_voltage == $value){
                                                                            echo '<option selected="selected">'.$value.'</option>';
                                                                        } else{
                                                                            echo '<option>'.$value.'</option>';
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                          </select>
                                                        </div>
                                                        <!-- <input id="max_voltage" name="max_voltage[]" type="text" class="form-control max_voltage" required="required"> -->
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
                                                          <select class="form-control" id="no_of_points" name="no_of_points[]" required="required">
                                                            <option>Points</option>
                                                            <?php
                                                                if(!empty($fields[0]->number_of_points)){
                                                                    $points = json_decode($fields[0]->number_of_points);
                                                                    foreach ($points as $key => $value) {
                                                                        if($plugs[0]->no_of_points == $value){
                                                                            echo '<option selected="selected">'.$value.'</option>';
                                                                        } else{
                                                                            echo '<option>'.$value.'</option>';
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                          </select>
                                                        </div>
                                                        <!-- <input id="no_of_points" name="no_of_points[]" type="text" class="form-control no_of_points" required="required"> -->
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
                                <div class="add_plug_section"></div>                                                          
                                
                                <div class="row" style="margin-top: 80px;">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <label for="txtFirstNameShipping" class="col-lg-12 col-form-label text-left pl-0">General Comments | Description</label>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <textarea id="general_comments" name="general_comments" class="form-control" rows="4"><?php echo (!empty($data['general_comments'])?$data['general_comments']:''); ?></textarea>
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
                                <div class="wizard-form-heading mb-3">Add Station : Photos and Videos</div>
                                <div class="row">
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
                                            <div class="image_1_preview mt-3 images-preview">
                                                <?php
                                                    if(!empty($data['station_Photos'])){
                                                        $images = json_decode($data['station_Photos']);
                                                        $image = json_decode($images);
                                                        // print_r($image);
                                                        foreach ($image as $key => $value) {
                                                            echo "<span class='pip'>
                                                                <img class='imageThumb' src='".$value."' title='".$key."'>
                                                                <span class='remove mdi mdi-close'></span>
                                                            </span>";
                                                        }
                                                    }
                                                ?>
                                            </div>
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
<?php //print_r($data); ?>
