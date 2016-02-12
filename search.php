<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h1>Search Results</h1>

		<?php while (have_posts()) : the_post(); ?>

			<h3 id="post-<?php the_ID(); ?>">
				<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
				<?php the_title(); ?>
				</a>
			</h3>

		<?php endwhile; ?>

		<?php next_post_link('&laquo; Older Entries') ?>
		<?php previous_post_link('Newer Entries &raquo;') ?>

	<?php else : ?>

		<h2>No posts found. Try a different search?</h2>

	<?php endif; ?>

<?php get_footer(); ?>