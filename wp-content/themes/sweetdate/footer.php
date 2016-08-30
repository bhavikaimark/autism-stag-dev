<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php do_action( 'kleo_after_page' ) ?>

<?php if( is_active_sidebar('footer-level-2') ) : ?>
<!-- TESTIMONIALS SECTION ================================================ -->
<section class="with-top-border">
  	<div class="row">
    	<div class="twelve columns">
        <?php
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-level-2')): 
        endif;
        ?>
      </div>
    </div>
</section>
<!--END TESTIMONIALS SECTION-->
<?php endif; ?>


<?php if( is_active_sidebar('footer-level1-1') || is_active_sidebar('footer-level1-2')  ) : ?>
<!-- SUPPORT & NEWSLETTER SECTION ================================================ -->
<section>
  <div id="support">
    <div class="row">
      <div class="four columns">
        <?php
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-level1-1')): 
        endif;
        ?>
      </div>
      
      <div class="eight columns">
        <?php
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-level1-2')): 
        endif;
        ?>
      </div>
    </div><!--end row-->
  </div><!--end support-->
</section>
<!--END SUPPORT & NEWSLETTER SECTION-->
<?php endif; ?>

<!-- FOOTER SECTION
================================================ -->
<footer>
  <div id="footer">
    <div class="row">
    
        <div class="three columns">
            <div class="widgets-container footer_location">
            <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1')): 
            endif;
            ?>
            </div>
        </div>
        <div class="three columns">
            <div class="widgets-container footer_location">
            <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2')): 
            endif;
            ?>
            </div>
        </div>
        <div class="three columns">
            <div class="widgets-container footer_location">
            <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3')): 
            endif;
            ?>
            </div>
        </div>
        <div class="three columns">
            <div class="widgets-container footer_location">
            <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4')): 
            endif;
            ?>
            </div>
        </div>
        
    	
      <div class="twelve columns">
        <hr>
        <?php do_action('kleo_footer_text');?>
      </div>
    </div>
  </div><!--end footer-->
</footer>
<!--END FOOTER SECTION-->


<!-- POP-UP MODAL FORMS
================================================ -->
<!--Login panel-->
<?php get_template_part('page-parts/general-login-modal');?>
<!--end login panel-->

<!-- Register panel -->
<?php if(get_option('users_can_register')) { ?>
    <?php get_template_part('page-parts/general-register-modal');?>
<?php } ?>
<!-- end register panel -->

<!-- Forgot panel -->
<?php get_template_part('page-parts/general-forgot-modal');?>
<!-- end forgot panel -->

<!-- end login register stuff -->

<p id="btnGoUp"><?php _e("Go up", 'kleo_framework');?></p>

</div><!--end page-->  

<!--END POP-UP MODAL FORMS-->
  
<?php do_action('kleo_after_footer');?>

  <!-- Analytics -->
<?php echo sq_option('analytics'); ?>

<?php wp_footer(); ?>


<script type="text/javascript">
jQuery(document).ready(function() {
    if (jQuery('body').hasClass('logged-in') && !(jQuery('body').hasClass('my-account'))) {

        jQuery("#profile #item-header-avatar").append("<br><br><button id='vouch' class='small button radius secondary' onclick='myfunc()'>Vouch</button>");
    }
    
});

</script>


<script type="text/javascript">
function myfunc() {
        //alert('hii');
        var userName = jQuery('.user-nicename').text();
        //alert(userName);
        jQuery.ajax
        ({ 
            url: 'http://autismdating.stagingdevsite.com/dev/wp-content/themes/sweetdate-child/ajax/vouch.php',
            data: {"userName": userName},
            type: 'post',
            success: function(result)
            {
                //alert(result);
                var res = result;
                jQuery("#profile #item-header-avatar").append("<div style='color: black'>"+res+"</div>");
                jQuery("#vouch").hide();
            }
        });
    }

//jQuery('#vouch').click(function(){
    //alert('hiii');
    //var userName = jQuery('.user-nicename').text();
    //alert(userName);
    /*jQuery.ajax
    ({ 
        url: 'reservebook.php',
        data: {"userName": userName},
        type: 'post',
        success: function(result)
        {
            $('.modal-box').text(result).fadeIn(700, function() 
            {
                setTimeout(function() 
                {
                    $('.modal-box').fadeOut();
                }, 2000);
            });
        }
    });*/
//});
</script>

</body>
</html>
