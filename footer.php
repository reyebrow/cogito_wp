<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="footer" role="contentinfo" class="row">
	
    <?php cogito_get_footers(); //see functions.php?>

	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>