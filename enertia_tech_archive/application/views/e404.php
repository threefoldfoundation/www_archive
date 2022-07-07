<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title><?php echo isset($title) ? $title : ''; ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta content="ATW EV Charging Platform" name="Decentralized Electric Vehicle Charging Platform" />

        <meta content="ATW" name="author" />

        <link rel="shortcut icon" href="<?php echo base_url('assets/images/footer.png'); ?>">

        <!--Form Wizard-->

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- Page Content-->
        <div class="wrapper">
            <div class="container-fluid">

                <!-- end page title end breadcrumb -->

                <div class="row">

                    <div class="col-md-6 mx-auto">

                        <div class="card">

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-5 p-0 align-self-center">

                                        <img src="<?php echo base_url(); ?>assets/images/error.svg" alt="" class="img-fluid">

                                    </div>

                                    <div class="col-md-7">

                                        <div class="error-content text-center">

                                            <h1 class="">404!</h1>

                                            <h3 class="text-primary">Looks like you've got lost...</h3><br>

                                            <a class="btn btn-primary mb-5 waves-effect waves-light" href="<?php echo $this->agent->referrer(); ?>">Back to page</a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div><!--end row-->



            </div><!-- container -->



            <footer class="footer text-center text-sm-left">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-12">

                                ©2019 - ENERTIA - Dubai <img src="<?php echo base_url('assets/images/footer.png'); ?>" width="30"> by ThreeFold
                        </div>

                    </div>

                </div>

                

            </footer>

        </div>
        <!-- end page-wrapper -->
    </body>
</html>