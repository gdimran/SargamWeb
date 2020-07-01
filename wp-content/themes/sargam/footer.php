<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sargam
 */
global $sargam_theme;
?>
<footer>
 <!-- Footer Start-->
	 <div class="footer-main footer-bg">
		 <!-- footer-bottom aera -->
		 <div class="footer-bottom-area footer-bg">
				 <div class="container">
						 <div class="footer-border">
									<div class="row d-flex align-items-center">
											<div class="col-xl-12 ">
													<div class="footer-copy-right text-center">
<!--									<p class="social-icons"><a href=""><i class="ti-facebook"></i></a><a style="padding: 10px 20px" href=""><i class="ti-twitter-alt"></i></a><a href=""><i class="ti-youtube"></i></a></p>-->
																<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $sargam_theme['footer-logo']['url'];?>" alt="" style="width: auto; height:70px"></a>
															<p>&copy;<script>document.write(new Date().getFullYear());</script> | <?php echo $sargam_theme['footer-text'];?> | <a href="<?php echo $sargam_theme['footer-contact-url'];?> " target="_blank"><?php echo $sargam_theme['footer-contact-text'];?> </a></p>
<!--								 <p class="text-center"><img src="assets/img/logo/sargam_logo.png" alt="" style="width: 100px; height: auto"></p>-->
													</div>
											</div>
									</div>
						 </div>
				 </div>
		 </div>
	 </div>
	<!-- Footer End-->


<?php wp_footer(); ?>


<script>

 $(document).ready(function(){
	 $("select").change(function(){
		 $(this).find("option:selected").each(function(){
			 var optionValue = $(this).attr("value");
			 if(optionValue){
				 $(".box").not("." + optionValue).hide();
				 $("." + optionValue).show();
			 } else{
				 $(".box").hide();
			 }
		 });
	 }).change();
 });
</script>

</body>
</html>
