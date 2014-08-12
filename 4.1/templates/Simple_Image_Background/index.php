<?php
$mess_arr = array();
$mess_arr = get_custom_page_data();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $mess_arr['pageTitle']; ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- Custom font from Google Web Fonts -->
        <link href="//fonts.googleapis.com/css?family=PT+Sans:700,400&subset=cyrillic" rel="stylesheet">

    <!-- JS -->
    <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
    <?php do_action('options_style'); ?>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
        <!-- Bootstrap stylesheets -->
        <?php echo '<link href="' . plugins_url( '../assets/css/bootstrap.min.css' , __FILE__ ) . '" rel="stylesheet" type="text/css"  /> '; ?>
		

        <!-- Template stylesheet -->
        <?php echo '<link href="' . plugins_url( 'css/style.css' , __FILE__ ) . '" rel="stylesheet" type="text/css"  /> '; ?>
	<script>
	
		jQuery(document).ready(function(){
			jQuery("#countdown").countdown({
				date: "<?php echo $mess_arr['day'].' '.$mess_arr['month'].' '.$mess_arr['year'].' '.$mess_arr['hour'].':'.$mess_arr['minute'].':00'; ?>",
				format: "on"
			},
			
			function() {
				// callback function
			});
		});
	
	</script>
		<style type="text/css">	
	.fc_social_part {display:<?php echo $mess_arr['socialpartkey']; ?> }
	#countdown {display:<?php echo $mess_arr['countdownpartkey']; ?> }
	</style>
    </head>

    <body>
        <div class="container">
            <!-- Page heading -->
            <h1 class="page-heading"><?php echo $mess_arr['companyName']; ?></h1>
            <!-- /Page heading -->

            <!-- Description -->
            <p class="description"><?php echo $mess_arr['message']; ?></p>
            <!-- /Description -->

            <!-- Countdown -->
            <div id="countdown" class="countdown">
                <!-- Days -->
				<h3>we will be right back within,</h3>
                <div class="countdown-item">
                    <div class="countdown-number days"></div>
                    <div class="countdown-text">days</div>
                </div>
                <!-- /Days -->

                <!-- Hours -->
                <div class="countdown-item">
                    <div class="countdown-number hours"></div>
                    <div class="countdown-text">hours</div>
                </div>
                <!-- /Hours -->

                <!-- Minutes -->
                <div class="countdown-item">
                    <div class="countdown-number minutes"></div>
                    <div class="countdown-text">minutes</div>
                </div>
                <!-- /Minutes -->

                <!-- Seconds -->
                <div class="countdown-item">
                    <div class="countdown-number seconds"></div>
                    <div class="countdown-text">seconds</div>
                </div>
                <!-- /Seconds -->
            </div>
            <!-- /Countdown -->
        </div>

        <!-- Scripts -->

    </body>
</html>