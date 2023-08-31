<main class="wt_single-videos__content">
<!-- define height in js for responsive iframe -->

<?php if ( $public_status === 'Public' ): ?>

	<div class="wt_single-videos__video">

	<?php if ( $youtube_id ): ?>

		<iframe width="100%" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
		
	<?php elseif ( $dropbox_link ): ?>

		<!-- need to make sure the right link is generated -->
		<iframe width="100%" src="<?php echo $dropbox_link; ?>?raw=1" frameborder="0" allowfullscreen></iframe>

	<?php else: ?>

		<p class="wt_text--bold">Sorry, there was an error loading video.</p>

	<?php endif; ?>

	</div><!-- __video wrap -->

<?php elseif ( $public_status === 'Processing' ): ?>

	<div class="wt_single-videos__no-video">		
		<p class="wt_text--bold">We're still processing this video. Please check back soon for the file.</p><!-- future protocol: ensure live by a certain date -->
	</div>

<?php elseif ( $public_status === 'Private' ): ?>

	<div class="wt_single-videos__no-video">		
		<p class="wt_text--bold">The creator of this video has chosen to make this video private.</p>
	</div>

<?php endif; ?>