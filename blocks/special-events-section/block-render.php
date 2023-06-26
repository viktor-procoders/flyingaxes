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
$id = 'special-events-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'special-events-section' );
wp_enqueue_script( 'special-events-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'special-events-section';
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
	'title'            => $title,
	'subtitle'         => $subtitle,
	'gallery'          => $gallery,
	'links_top'        => $links_top,
	'links_bottom'     => $links_bottom,
	'description'      => $description,
	'cta_left_column'  => $cta_left,
	'cta_right_column' => $cta_right,
] = get_field( 'special_events_section' );

?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="special-events-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="special-events-section__intro">
				<?php if ( $subtitle ): ?>
					<p class="special-events-section__subtitle"><?php echo $subtitle ?></p>
				<?php endif ?>
				<?php if ( $title ): ?>
					<h2 class="h1 special-events-section__title"><?php echo $title ?></h2>
				<?php endif ?>
				<div class="special-events-section__decor">
					<?php starsDisplay( 2 ); ?>
					<img loading="lazy" width="60" height="60" src="<?php echo get_template_directory_uri() . '/dist/assets/images/target.png' ?>"
					     alt="target image">
					<?php starsDisplay( 2 ); ?>
				</div>
			</div>
		</div>
		<div class="container-fluid px-0">
			<?php if ( ! empty( $gallery ) ): ?>
				<div class="special-events-section__gallery">
					<?php foreach ( $gallery as $photo ): ?>
						<picture>
							<img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['alt'] ?>">
						</picture>
					<?php endforeach ?>
				</div>
			<?php endif ?>


			<div class="splide" data-links-ticker-1>
				<div class="splide__track">
					<div class="splide__list special-events-section__links">
						<?php foreach ( $links_top as $link ): ?>
							<div class="splide__slide">
								<a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
								</a>
							</div>
						<?php endforeach ?>
						<?php foreach ( $links_top as $link ): ?>
							<div class="splide__slide">
								<a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>

			<div class="splide" data-links-ticker-2>
				<div class="splide__track">
					<div class="splide__list special-events-section__links">
						<?php foreach ( $links_bottom as $link ): ?>
							<div class="splide__slide">
								<a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
								</a>
							</div>
						<?php endforeach ?>
						<?php foreach ( $links_bottom as $link ): ?>
							<div class="splide__slide">
								<a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>


		</div>
		<div class="container">
			<?php if ( $description ): ?>
				<div class="special-events-section__description">
					<?php echo $description ?>
				</div>
			<?php endif ?>
		</div>
		<div class="cta-section">
			<div class="container cta-section__container">
				<div class="cta-section__inner">
					<div class="cta-card cta-card--blue">
						<?php if ( $cta_left['title'] ): ?>
							<p class="cta-card__title">
								<?php starsDisplay( 2 ); ?>
								<span><?php echo $cta_left['title'] ?></span>
								<?php starsDisplay( 2 ); ?>
							</p>
						<?php endif ?>
						<?php if ( $cta_left['location'] ): ?>
							<p class="cta-card__location"><?php echo $cta_left['location'] ?></p>
						<?php endif ?>
						<?php if ( ! empty( $cta_left['link'] ) ): ?>
							<a class="pc-button cta-card__link pc-button--red"
							   href="<?php echo $cta_left['link']['url'] ?>">
								<?php echo $cta_left['link']['title'] ?>
							</a>
						<?php endif ?>
					</div>
					<div class="cta-card cta-card--red">
						<?php if ( $cta_right['title'] ): ?>
							<p class="cta-card__title">
								<?php starsDisplay( 2 ); ?>
								<span><?php echo $cta_right['title'] ?></span>
								<?php starsDisplay( 2 ); ?>
							</p>
						<?php endif ?>
						<?php if ( $cta_right['location'] ): ?>
							<p class="cta-card__location"><?php echo $cta_right['location'] ?></p>
						<?php endif ?>
						<?php if ( ! empty( $cta_right['link'] ) ): ?>
							<a class="pc-button cta-card__link"
							   href="<?php echo $cta_right['link']['url'] ?>">
								<?php echo $cta_right['link']['title'] ?>
							</a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
