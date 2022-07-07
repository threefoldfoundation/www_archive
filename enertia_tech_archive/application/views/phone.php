<div class="row">

    <div class="col-lg-3 col-md-4">

        <div class="card mb-0 shadow-none">

            <div class="card-body">

                <!-- login div -->

                <h3 class="text-center m-0">



                    <a href="<?php echo base_url(); ?>" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/logo-sm.png" width="150" alt="logo" class="my-3"></a>



                </h3>



                <div class="px-3">



                    <h4 class="text-muted font-18 mb-2 text-center">EV Platform</h4>



                    <p class="text-muted text-center ">We need your Phone Number to proceed</p>



                   



                    <form class="form-horizontal my-2" action="#" method="post">



                        <div class="r_success_msg otpsended min-hirght"></div>



                        <div class="form-group">



                            <label for="login_phone">Phone Number (Mobile)</label>



                            <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                    <span class="input-group-text" id="basic-addon3-phone"><i class="fa fa-phone"></i></span>



                                </div>



                                <input type="text" class="form-control input phone" required="" id="phone" name="phone" placeholder="Phone Number">

                                <span id="phone_result" class="result_msg"></span>                                 



                            </div>     





                        </div>



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

                        <div class="form-group mb-0 row">

                            <div class="col-12 mt-3">

                                <button class="btn btn-primary btn-block waves-effect waves-light submit_to_phone" type="button" name="submit_to_phone" id="submit_to_phone">Move Forward ? <i class="fa fa-sign-in ml-1"></i></button>

                                <button type="button" class="btn btn-primary btn-block waves-effect waves-light hide" id="prevBtn" onclick="nextPrev(-1)">Move Back ?</button>

                            </div>

                        </div>

                    </form>

                </div>

                <div class="mt-3 text-center">

                    <p class="mb-0"> ©2019 - ENERTIA - Dubai <img src="<?php echo base_url('assets/images/footer.png'); ?>" width="50"> by ThreeFold</p>

                </div>

                <!-- login div -->

            </div>

        </div>

    </div>

    <div class="col-lg-9 col-md-8 p-0  d-flex justify-content-center h-100vh-s" id="map">

    </div>
</div>