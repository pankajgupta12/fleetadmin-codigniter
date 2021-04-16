<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<!--<link rel="icon" type="<?php echo base_url(); ?>files/assets/image/png" href="assets/img/favicon.ico">-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php  echo $title; ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    

        <script src="<?php echo base_url() ?>files/assets/js/jquery.min.js"></script>
        
        <link href="<?php echo base_url() ?>files/assets/css/calendar.css" rel="stylesheet" />
        
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>files/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <!--<link href="<?php echo base_url() ?>files/assets/css/animate.min.css" rel="stylesheet"/>-->

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url() ?>files/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!--<link href="<?php echo base_url() ?>files/assets/css/demo.css" rel="stylesheet" />-->


    <!--     Fonts and icons     -->
    <link href="<?php echo base_url() ?>files/assets/css/pe-icon-7-stroke.css" rel="stylesheet" /> 
    
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php //echo base_url() ?>files/assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                   Ram Kripa Pty Ltd
                </a>
            </div>

            <ul class="nav">
                <li <?php if($this->uri->segment(2) == 'dashboard'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/dashboard'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
				 <li <?php if($this->uri->segment(2) == 'driver_list'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/driver_list'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Driver List</p>
                    </a>
                </li>
                 <li <?php if($this->uri->segment(2) == 'shiftlist'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/shiftlist'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Shift List</p>
                    </a>
                </li>
                
                <li <?php if($this->uri->segment(2) == 'vehicle_list'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/vehicle_list'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Vehicle list</p>
                    </a>
                </li>
                
                             
                <li <?php if($this->uri->segment(2) == 'invoice_list'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/invoice_list'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Invoice list</p>
                    </a>
                </li>
                
                <li <?php if($this->uri->segment(2) == 'logout'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/logout'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>logout</p>
                    </a>
                </li>
				
               
            </ul>
    	</div>
    </div>
 
    <div class="main-panel">
   