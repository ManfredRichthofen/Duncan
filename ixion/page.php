<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ixion
 */

get_header();

//Starting The Loop earlier to take advantage of functions like has_post_thumbnail()
while ( have_posts() ) : the_post();

	if ( has_post_thumbnail() ) : ?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'ixion-featured-image' ); ?>
	</div>

<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

				get_template_part( 'components/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		</main>
	</div>
<?php
endwhile; // End of the loop.

get_sidebar();
get_footer();
