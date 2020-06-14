<?php
/**
 * The template for displaying all single posts and attachments.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

get_header();

do_action( 'hestia_before_single_post_wrapper' );
?>

<div class="<?php echo hestia_layout(); ?>">
	<div class="blog-post blog-post-wrapper">
		<div class="container">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<div class="row"><div class="col-md-8 col-md-offset-2"><p style="margin-top:5px;" id="breadcrumbs">','</p></div></div>' );
			}
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'single' );
				endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
			endif;
				?>
		</div>
	</div>
</div>

<?php
if ( ! is_singular( 'elementor_library' ) ) {
	do_action( 'hestia_blog_related_posts' );
}
?>
<div class="footer-wrapper">
	<?php get_footer(); ?>
