<?php
$url = get_permalink();
$categories = get_the_terms(get_the_ID(), 'fellow-category');
$category_names = implode(', ', array_map('esc_html', wp_list_pluck($categories, 'name')));
$class = $atts['custom_class'];
$thumbnail_url = get_custom_image('fellows');
$fellow_year = get_field('fellow_year');
$location = get_field('fellow_location');
$fellow_language_preferred_name = get_field('fellow_language_preferred_name');
$marketing_text = get_field('marketing_text');
$thumbnail = '';

if ($thumbnail_url) {
	$thumbnail = '<div class="thumbnail" style="background-image:url('.esc_url($thumbnail_url).');" alt="' . get_the_title() . '"></div><span class="thumbnail-spacer">&nbsp;</span>';
} else {
	$thumbnail = '<div class="no-thumbnail"><p>Thumbnail unavailable</p></div><span class="thumbnail-spacer">&nbsp;</span>';
}

if ($class === "custom fundraiser") {
  echo '<li>';
  echo '<div class="thumbnail" style="background-image:url('.esc_url($thumbnail_url).');" alt="' . get_the_title() . '"></div>';
  echo '<section>';
  echo '<h2>'.$title.'<br>'.$location.'</h2>';
  echo '<p>'.$marketing_text.'</p>';
  echo '</section>';
  echo '</li>';
} else if ($class === "horizontal") {
  $first_name = get_field('first_name');
  $last_name = get_field('last_name');
  $fellow_name = $first_name . ' ' . $last_name;
  $social_links = [
    'email'     => ['url' => get_field('email'), 'icon' => 'fa-brands fa-square-email'],
    'facebook'  => ['url' => get_field('facebook'), 'icon' => 'fa-brands fa-square-facebook'],
    'instagram' => ['url' => get_field('instagram'), 'icon' => 'fa-brands fa-instagram'],
    'linkedin'  => ['url' => get_field('linkedin'), 'icon' => 'fa-brands fa-linkedin'],
    'tiktok'    => ['url' => get_field('tiktok'), 'icon' => 'fa-brands fa-tiktok'],
    'twitter'   => ['url' => get_field('twitter'), 'icon' => 'fa-brands fa-x-twitter'],
    'website'   => ['url' => get_field('website'), 'icon' => 'fa-solid fa-link'],
    'youtube'   => ['url' => get_field('youtube'), 'icon' => 'fa-brands fa-youtube']
  ];
  $page_banner = get_field('fellow_banner');
  $revitalization_fellows_url = home_url('/revitalization/fellows/?fellow_year=', 'relative');
  $revitalization_fellows_url = add_query_arg('fellow_year', $fellow_year, $revitalization_fellows_url);
  ?>
  <div class="wt_fellow__meta">
  <section class="head">
		<div class="image" style="background-image:url('<?php echo esc_html($page_banner['banner_image']['url'])?>'"></div>
		<div class="name">
			<?php
				echo '<h1>' . esc_html($fellow_name) . '</h1>';?>
			<?php if (array_filter(array_column($social_links, 'url'))): ?>
				<article class="wt_fellow__meta--social">
						<ul>
								<?php foreach ($social_links as $platform => $data): ?>
										<?php if ($data['url']): ?>
												<li>
														<a href="<?php echo esc_url($data['url']); ?>">
																<i class="<?php echo esc_attr($data['icon']); ?>"></i>
														</a>
												</li>
										<?php endif; ?>
								<?php endforeach; ?>
						</ul>
				</article>
			<?php endif; ?>
			<section class="info">
				<?php
				echo '<p>' . esc_html($page_banner['banner_copy']) . '</p>';
				echo '<p class="categories">'.$category_names.'</p>';
				if ($fellow_year) {
					echo '<a class="cohort" href="'.$revitalization_fellows_url.'">' . esc_html($fellow_year) . ' cohort</a>';
				}

				// $lang_output = generate_language_links($fellow_language);

				// echo '<span class="languages">'.$lang_output.'</span>';
				?>
			</section>
		</div>
    </section></div>
  <?php
} else {
  echo '<li class="gallery-item">';
  echo '<a href="' . esc_url($url) . '">';
  echo $thumbnail;
  echo '<div><h3>' . $title . '</h3></div>';
  $metadata = '<div class="fellow-metadata"><h3>'.$fellow_language_preferred_name.'</h3>';
  $metadata .= '<p>'.$category_names.'</p><span><p>'.$location.'</p><p>'.$fellow_year.'</p></span></div>';
  echo $metadata;
  echo '</a>';
  echo '</li>';
}