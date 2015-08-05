<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cupcake
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php /*Query*/
			$limit = array( 'showposts' => 6);
			$custom_query= new WP_Query($limit)
			 ?>
	<?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); /*Loop Start*/ ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				if ( has_post_thumbnail() ) {
				the_post_thumbnail(medium);
				} ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'codediva' ),
				'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</article><!-- #post-## -->
	<?php endwhile; ?>
	<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>
	
		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>