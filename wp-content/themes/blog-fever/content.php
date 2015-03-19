<?php
/**
 * @package Blog Fever
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
    if (has_post_thumbnail()) {
        echo '<div class="single-post-thumbnail clear">';
        echo '<a href="' . get_permalink() . '" title="' . __('Keep Reading', 'blog-fever') . get_the_title() . '" rel="bookmark">';
        echo the_post_thumbnail('index-thumb');
        echo '</a>';
        echo '</div>';
    }
	?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

<!--		--><?php //if ( 'post' == get_post_type() ) : ?>
<!--		<div class="entry-meta">-->
<!--			--><?php //blog_fever_posted_on(); ?>
<!--			--><?php //
//			    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
//			        echo '<span class="comments-link">';
//			        comments_popup_link( __( 'Leave a comment', 'blog-fever' ), __( '1 Comment', 'blog-fever' ), __( '% Comments', 'blog-fever' ) );
//			        echo '</span>';
//			    }
//			?>
<!--			--><?php //blog_fever_entry_footer(); ?>
<!--		</div><!-- .entry-meta -->
<!--		--><?php //endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'blog-fever' ), 
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'blog-fever' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer keep-reading">
        <div class="continue-reading">
	        <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading', 'blog-fever') . get_the_title() . '" rel="bookmark">' . __('Continue Reading', 'blog-fever') . '</a>'; ?>
        </div>
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php blog_fever_posted_on(); ?>
                <?php
                if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
                    echo '<span class="comments-link">';
                    comments_popup_link( __( 'Leave a comment', 'blog-fever' ), __( '1 Comment', 'blog-fever' ), __( '% Comments', 'blog-fever' ) );
                    echo '</span>';
                }
                ?>
                <?php //blog_fever_entry_footer(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
