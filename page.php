<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flyingaxes
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="grid text-center">
				<div class="g-col-6 g-col-md-4">.g-col-6 g-col-md-4</div>
				<div class="g-col-6 g-col-md-4">.g-col-6 g-col-md-4</div>
				<div class="g-col-6 g-col-md-4">.g-col-6 g-col-md-4</div>
			</div>
		</div>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
