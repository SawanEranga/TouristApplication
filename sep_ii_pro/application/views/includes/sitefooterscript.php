.<!-- Essential jQuery Plugins
================================================== -->

<!-- Main jQuery -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/jquery-1.11.1.min.js"></script>
<!-- Single Page Nav -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/jquery.singlePageNav.min.js"></script>
<!-- Twitter Bootstrap -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/bootstrap.min.js"></script>
<!-- jquery.fancybox.pack -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/jquery.fancybox.pack.js"></script>
<!-- jquery.mixitup.min -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/jquery.mixitup.min.js"></script>
<!-- jquery.parallax -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/jquery.parallax-1.1.3.js"></script>
<!-- jquery.countTo -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/jquery-countTo.js"></script>
<!-- jquery.appear -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/jquery.appear.js"></script>
<!-- Contact form validation -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
<!-- Google Map -->
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsAQASjLDim87C0ojgFxIY3rB2ZHMwq5M&libraries=geometry"></script>-->
<!-- jquery easing -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/jquery.easing.min.js"></script>
<!-- jquery easing -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/wow.min.js"></script>
    
    
    <!--Load absolute js-->
        <?php if (isset($absolute_js_to_load)){ ?>
            <?php 
            foreach ($absolute_js_to_load as $row){ 
               echo "<script type='text/javascript' src='" . $row . "'></script>";
            }
         }?>
    
    <!--Load js custom-->
        <?php if (isset($js_to_load)){ ?>
            <?php foreach ($js_to_load as $row){ 
               echo "<script type='text/javascript' src='" . base_url() . "assets/" . $row . "'></script>";
            }
         }?> 
    
    
<script>
  var wow = new WOW ({
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       120,          // distance to the element when triggering the animation (default is 0)
    mobile:       false,       // trigger animations on mobile devices (default is true)
    live:         true        // act on asynchronously loaded content (default is true)
    }
  );
  wow.init();
</script>
<!-- Custom Functions -->
    <script src="<?php echo base_url() ?>assets/pavithra/js/custom.js"></script>


<!-- pavithra's javascript -->
<script src="<?php echo base_url() ?>assets/pavithra/pavithrajs.js"></script>
<script src="<?php echo base_url() ?>assets/pavithra/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<!--end of pavithra's code-->



<!-- <script type="text/javascript">
  $(function(){
    /* ========================================================================= */
    /*	Contact Form
    /* ========================================================================= */

    $('#contact-form').validate({
      rules: {
        name: {
          required: true,
          minlength: 2
        },
        email: {
          required: true,
          email: true
        },
        message: {
          required: true
        }
      },
      messages: {
        name: {
          required: "come on, you have a name don't you?",
          minlength: "your name must consist of at least 2 characters"
        },
        email: {
          required: "no email, no message"
        },
        message: {
          required: "um...yea, you have to write something to send this form.",
          minlength: "thats all? really?"
        }
      },
      submitHandler: function(form) {
        $(form).ajaxSubmit({
          type:"POST",
          data: $(form).serialize(),
          url:"process.php",
          success: function() {
            $('#contact-form :input').attr('disabled', 'disabled');
            $('#contact-form').fadeTo( "slow", 0.15, function() {
              $(this).find(':input').attr('disabled', 'disabled');
              $(this).find('label').css('cursor','default');
              $('#success').fadeIn();
            });
          },
          error: function() {
            $('#contact-form').fadeTo( "slow", 0.15, function() {
              $('#error').fadeIn();
            });
          }
        });
      }
    });
  });
</script> -->
</body>
</html>
