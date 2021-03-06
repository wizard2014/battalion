<?php
/**
 * The template for displaying all single posts.
 *
 * @package Blog Fever
 */

get_header(); ?>

	<div id="primary" class="content-area">
        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            <?php if ( function_exists('bcn_display') ) {
                bcn_display();
            } ?>
        </div>
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php blog_fever_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
