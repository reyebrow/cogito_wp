<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 */
?>

	</div><?php // #main (opened in header.php) ?>

	<footer id="footer" role="contentinfo" class="row outer bottom">
	 <?php cogito_action_footer_top(); ?>
      <?php cogito_get_footers(); //see functions.php?>
	 <?php cogito_action_footer_bottom(); ?>
	</footer>

  <?php cogito_action_container_bottom(); ?>
  </div><?php // .container #page (opened in header.php) ?>
  <?php cogito_action_below_container(); ?>


	<!-- Fallback to local copy of jQuery if Google's CDN Fails --> 
	<script type="text/javascript">!window.jQuery && document.write('<script src="<?php bloginfo ("template_url"); ?>/js/jquery.min.js"><\/script>')</script>
	
	<?php  //  Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6. Chromium.org/developers/how-tos/chrome-frame-getting-started ?>
	<!--[if lt IE 7 ]>
    	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->


<?php wp_footer(); ?>


</body>
</html>