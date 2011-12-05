<?php
/**
 * Attachment Template
 *
 * This is the default attachment template.  It is used when visiting the singular view of a post attachment 
 * page (images, videos, audio, etc.).
 *
 * @package MyLife
 * @subpackage Template
 * @since 0.1.0
 * @author Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2011, Justin Tadlock
 * @link http://themehybrid.com/themes/my-life
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // my-life_before_content ?>

	<div id="content">

		<?php do_atomic( 'open_content' ); // my-life_open_content ?>

		<div class="hfeed">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // my-life_before_entry ?>

					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // my-life_open_entry ?>

						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

						<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . sprintf( __( 'Sizes: %s', 'my-life' ), my_life_get_image_size_links() ) . '</div>' ); ?>

						<div class="entry-content">

							<?php if ( has_excerpt() ) {
								$src = wp_get_attachment_image_src( get_the_ID(), 'full' );
								echo do_shortcode( '[caption align="aligncenter" width="' . esc_attr( $src[1] ) . '" caption="' . get_the_excerpt() . '"]' . wp_get_attachment_image( get_the_ID(), 'full', false ) . '[/caption]' );
							} else {
								echo wp_get_attachment_image( get_the_ID(), 'full', false, array( 'class' => 'aligncenter' ) );
							} ?>

							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'my-life' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'my-life' ), 'after' => '</p>' ) ); ?>

							<?php $gallery = do_shortcode( sprintf( '[gallery id="%1$s" exclude="%2$s" columns="8" numberposts="16" orderby="rand"]', $post->post_parent, get_the_ID() ) ); ?>

							<?php if ( !empty( $gallery ) ) { ?>
								<div class="image-gallery">
									<h3><?php _e( 'Gallery', 'my-life' ); ?></h3>
									<?php echo $gallery; ?>
								</div>
							<?php } ?>

						</div><!-- .entry-content -->

						<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( 'Published on [entry-published] [entry-edit-link before="| "]', 'my-life' ) . '</div>' ); ?>

						<?php do_atomic( 'close_entry' ); // my-life_close_entry ?>

					</div><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // my-life_after_entry ?>

					<?php do_atomic( 'after_singular' ); // my-life_after_singular ?>

					<?php comments_template( '/comments.php', true ); // Loads the comments.php template. ?>

				<?php endwhile; ?>

			<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // my-life_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // my-life_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>