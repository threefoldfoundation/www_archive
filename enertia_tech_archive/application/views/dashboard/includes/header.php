<!-- Top Bar Start -->        
<div class="container">            
    <div class="topbar">
        
        <div class="topbar-main dash_menu ">                

                <!-- Navbar -->                    
                <nav class="navbar-custom" style="border-bottom: 1px solid lightgray;">                            
                    <!-- LOGO -->                    
                    <div class="topbar-left position-absolute text-center" style="width: 100%; z-index: 0;">                        
                        <a href="<?php echo base_url(); ?>" class="logo">                            
                            <img src="<?php echo base_url(); ?>assets/images/logo-sm.png" alt="logo-small" class="top-logo">                             
                        </a>                    
                    </div>  
                    <ul class="list-unstyled topbar-nav float-right mb-0">                               
                        <!-- <li class="">                                
                            <a class="nav-link dropdown-toggle  waves-light waves-effect"  href="#">                                    
                                <i class="mdi mdi-gas-station nav-icon"></i>                                    
                            </a>    
                        </li>                                
                        <li class="">                                
                            <a class="nav-link dropdown-toggle  waves-light waves-effect"  href="#">                                    
                                <i class="mdi mdi-account-card-details nav-icon"></i>                                    
                            </a>    
                        </li>                                
                        <li class="">                                
                            <a class="nav-link waves-effect waves-light waves-effect" href="#">                                    
                                <i class="mdi mdi-wallet nav-icon"></i>                          
                            </a>                            
                        </li>      -->                          
                        
                        <li class="">  
                            <span class="text-muted header-language" style="margin-right: -10px;">
                                Language
                            </span>                        
                            <a class="nav-link dropdown-toggle waves-effect waves-light lang_append" data-toggle="dropdown" href="javascript: void(0);" role="button" aria-haspopup="false" aria-expanded="false" style="padding-bottom: 27px;"> 
                                <img src="<?php echo base_url(); ?>assets/images/flags/us_flag.jpg" class="mr-2" height="16" alt=""/> 
                            </a> 
                            <div class="dropdown-menu dropdown-menu-right">                                    
                                
                                <a class="dropdown-item lang-select" href="#googtrans(en|en)" data-lang="en">
                                    English 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/us_flag.jpg" alt="" class="ml-2 float-right" height="14"/>
                                </a>   
                                <a class="dropdown-item lang-select" href="#googtrans(en|hi)" data-lang="hi">
                                    Hindi 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/Hindi_flag.svg" alt="" class="ml-2 float-right" height="14"/>
                                    
                                </a>   
                                <a class="dropdown-item lang-select" href="#googtrans(en|ur)" data-lang="ur">
                                    Urdu 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/Urdu_flag.png" alt="" class="ml-2 float-right" height="14"/>
                                    
                                </a>   
                                <a class="dropdown-item lang-select" href="#googtrans(en|de)" data-lang="de">
                                    German 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/germany_flag.jpg" alt="" class="ml-2 float-right" height="14"/>
                                    
                                </a>   
                                <a class="dropdown-item lang-select" href="#googtrans(en|fr)" data-lang="fr">
                                     French 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/french_flag.jpg" alt="" class="ml-2 float-right" height="14"/>
                                </a>      
                                <a class="dropdown-item lang-select" href="#googtrans(en|es)" data-lang="es">
                                     Spanish 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/spain_flag.jpg" alt="" class="ml-2 float-right" height="14"/>
                                </a>                                    
                                <a class="dropdown-item lang-select" href="#googtrans(en|vi)" data-lang="vi">
                                     Vietnamese 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/Vietnamese_flag.png" alt="" class="ml-2 float-right" height="14"/>
                                </a>                                
                                <a class="dropdown-item lang-select" href="#googtrans(en|pt)" data-lang="pt">
                                     Portuguese 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/Portuguese_flag.png" alt="" class="ml-2 float-right" height="14"/>
                                </a>                                
                                <a class="dropdown-item lang-select" href="#googtrans(en|ar)" data-lang="ar">
                                     Arabic 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/Arabic_Flag.png" alt="" class="ml-2 float-right" height="14"/>
                                </a>                                
                                <a class="dropdown-item lang-select" href="#googtrans(en|zh-CN)" data-lang="zh-CN">
                                     Chinese 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/Chinese_flag.png" alt="" class="ml-2 float-right" height="14"/>
                                </a>                                
                                <a class="dropdown-item lang-select" href="#googtrans(en|ms)" data-lang="ms">
                                     Malay 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/Malay_flag.png" alt="" class="ml-2 float-right" height="14"/>
                                </a>                                
                                <a class="dropdown-item lang-select" href="#googtrans(en|ru)" data-lang="ru">
                                     Russian 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/Russian_flag.png" alt="" class="ml-2 float-right" height="14"/>
                                </a>                                
                                <a class="dropdown-item lang-select" href="#googtrans(en|nl)" data-lang="nl">
                                     Dutch 
                                    <img src="<?php echo base_url(); ?>assets/images/flags/Dutch_flag.png" alt="" class="ml-2 float-right" height="14"/>
                                </a>                                
                            </div>                            
                        </li> 

                        <li class="">  
                            <a class="nav-link waves-effect waves-light waves-effect" href="<?php echo base_url('logout'); ?>" title="Logout">
                                <i class="dripicons-exit mr-2" style="font-size: 20px; color: #007bff;"></i>
                            </a>                              
                            <!-- <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">                                    
                                <i class="mdi mdi-account nav-icon"></i>                                
                            </a> 

                            <div class="dropdown-menu dropdown-menu-right">                                    
                                <a class="dropdown-item" href="#">
                                    <i class="dripicons-user text-muted mr-2"></i> Profile
                                </a>                                    
                                <div class="dropdown-divider"></div>                                    
                                <a class="dropdown-item" href="<?php //echo base_url('logout'); ?>">
                                    <i class="dripicons-exit text-muted mr-2"></i> Logout
                                </a>                                
                            </div> -->                            
                        </li>  
                    </ul>                                    
                </nav>                    
                <!-- end navbar-->                
        </div>       
    </div>
</div>