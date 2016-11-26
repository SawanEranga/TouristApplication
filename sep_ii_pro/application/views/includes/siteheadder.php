<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
    	<!-- meta charec set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- Page Title -->
        <title>Home</title>
		<!-- Meta Description -->
        <meta name="description" content="Blue One Page Creative HTML5 Template">
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <meta name="author" content="Muhammad Morshed">
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Google Font -->

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/pavithra/css/font-awesome.min.css">
		<!-- Twitter Bootstrap css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/pavithra/css/bootstrap.min.css">
		<!-- jquery.fancybox  -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/pavithra/css/jquery.fancybox.css">
		<!-- animate -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/pavithra/css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/pavithra/css/main.css">
		<!-- media-queries -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/pavithra/css/media-queries.css">

        
        <!--Load css custom-->
        <?php if (isset($css_to_load)){ ?>
            <?php foreach ($css_to_load as $row){ 
               echo "<link rel='stylesheet' href='" . base_url() . "assets/" . $row . "'></link>";
            }
         }?>
        
        <!--Set base URL for javascript-->
        <input type="hidden" id="url" name="url" value="<?php echo base_url(); ?>"/>
        <script>
            var Base_url = document.getElementById("url").value;
        </script>
        
        
		<!-- Modernizer Script for old Browsers -->
        <script src="<?php echo base_url() ?>assets/pavithra/js/modernizr-2.6.2.min.js"></script>



        <!-- pavithra's code -->
        		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets\pavithra\pavithrastyle.css" />
            <!-- add these page only if you are using slick slider -->
            <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pavithra/slick/slick.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/pavithra/slick/slick-theme.css">
              <style type="text/css">
                html, body {
                  margin: 0;
                  padding: 0;
                }

                * {
                  box-sizing: border-box;
                }

                .slider {
                    width: 100%;

                }

                .slick-slide {
                  /*margin: 0px 20px;*/
                }

                .slick-slide img {
                  width: 100%;
                }

                .slick-prev:before,
                .slick-next:before {
                    color: black;

                    display: none;
                }

                .slick-next{
                    right: 67px;
                }
                .slick-dots li button {

                  font-size: 12px;
                }
              </style>


<!--end pavithra's code->




    </head>

    <body id="body" style="overflow-x: hidden;">

		<!-- preloader -->
		<div id="preloader">
			<img src="<?php echo base_url() ?>assets/pavithra/img/preloader.gif" alt="Preloader">
		</div>
		<!-- end preloader -->
