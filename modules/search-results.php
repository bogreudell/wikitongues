<!-- possible to sort results by language first, then video? -->
<main class="wt_search-results">
	<header class="wt_search-results__title">
		<span>Showing results for '<?php echo get_search_query(); ?>'</span>
	</header>	
	<section class="wt_search-results__results">
	<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
		<article class="wt_search-results__thumbnail">
			<?php include('search-results__thumbnail.php'); ?>
		</article>
	<?php endwhile; else: ?>
		<article class="wt_search-results__none">
			<span>No results for '<?php echo get_search_query(); ?>'. If you think this is an error, please let us know at <a href="mailto:<?php the_field('wikitongues_email', 'options'); ?>"><?php the_field('wikitongues_email', 'options'); ?></a>.</span><!-- down the line: "did you mean?" or recommend something -->
		</article>
	</section>
<?php endif; ?>
</main>

