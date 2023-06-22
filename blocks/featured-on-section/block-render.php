<?php
/**
 * Block template file: block-render.php
 *
 * @var   array $block The block settings and attributes.
 * @var   string $content The block inner HTML (empty).
 * @var   bool $is_preview True during AJAX preview.
 * @var   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-on-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'featured-on-section' );
wp_enqueue_script( 'featured-on-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'featured-on-section';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}

$wrapper_attributes = get_block_wrapper_attributes( [
	'class' => $classes
] );

// reset attributes for editor
if ( $is_preview ) {
	$wrapper_attributes = '';
}


[
	'google_reviews' => $google_reviews,
	'global_score'   => $global_score,
	'global_rating'  => $global_rating,
	'title'          => $title,
	'view_all'       => $view_all,
	'featured'       => $featured,
] = get_field( 'featured_on_section' );

?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="featured-on-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="row justify-content-lg-between justify-content-center">
				<div class="col-lg-9 col-md-8 col-10">
					<div class="splide" data-reviews-slider>
						<div class="splide__arrows">
							<button class="splide__arrow splide__arrow--prev">
								<svg width="65" height="65">
									<use xlink:href="#slider-arrow-prev"/>
								</svg>
							</button>
							<button class="splide__arrow splide__arrow--next">
								<svg width="65" height="65">
									<use xlink:href="#slider-arrow-next"/>
								</svg>
							</button>
						</div>
						<div class="splide__track">
							<div class="splide__list">
								<?php foreach ( $google_reviews as $google_review ): ?>
									<div class="splide__slide google-review-card">
										<svg class="google-review-card__icon" width="64" height="63">
											<use xlink:href="#google-icon"></use>
										</svg>
										<div class="google-review-card__rating stars-rating" style="--rating: <?php echo $google_review['rating'] ?>;"
										     role="img"
										     aria-label="Average rating based on Google reviews: <?php echo $google_review['rating'] ?> of 5"></div>
										<?php if ( $google_review['text'] ): ?>
											<div class="google-review-card__text"><?php echo $google_review['text'] ?></div>
										<?php endif ?>
										<?php if ( $google_review['author'] ): ?>
											<p class="google-review-card__author"><?php _e( 'From:', 'flyingaxes' ) ?><?php echo $google_review['author'] ?></p>
										<?php endif ?>
										<?php if ( $google_review['link'] ): ?>
											<a class="google-review-card__link" href="<?php echo $google_review['link'] ?>">
												<?php _e( 'See it on Google', 'flyingaxes' ) ?>
											</a>
										<?php endif ?>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-4 d-none d-md-block">
					<div class="global-score-card">
						<div class="global-score-card__score">
							<svg width="87" height="87">
								<use xlink:href="#google-circle"/>
							</svg>
							<span><?php echo $global_score ?></span>
						</div>
						<div class="global-score-card__rating stars-rating" style="--rating: <?php echo $global_rating ?>;"
						     role="img" aria-label="Global rating based on Google reviews: <?php echo $global_score ?> of 5">
						</div>
						<a class="global-score-card__button" href="<?php echo $view_all ?>"><?php _e( 'See all reviews', 'flyingaxes' ) ?></a>
					</div>
				</div>
			</div>
			<div class="row align-items-center featured-on">
				<div class="col-lg-3">
					<?php if ( $title ): ?>
						<h2 class="featured-on__title"><?php echo $title ?></h2>
					<?php endif ?>
				</div>
				<?php if ( ! empty( $featured ) ): ?>
					<?php foreach ( $featured as $item ): ?>
						<div class="col-lg-3 col-md-4 col-6">
							<a class="featured-on__item" href="<?php echo $item['link'] ?>"
							   aria-label="Link to <?php echo $item['image']['title'] ?>">
								<img loading="lazy" src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['image']['alt'] ?>">
							</a>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</section>
<?php endif; ?>
