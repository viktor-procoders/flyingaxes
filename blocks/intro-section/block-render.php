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
$id = 'intro-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'intro-section' );
wp_enqueue_script( 'intro-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'intro-section';
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

$intro_section = get_field( 'intro_slider' );
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="intro-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="splide" aria-label="Banner" data-intro-slider>
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
					<?php foreach ( $intro_section as $slide ): ?>
						<div class="splide__slide">
							<picture class="d-block" style="text-align: center">
								<source
									srcset="<?php echo $slide['image']['url'] ?>"
									media="(min-width: 1024px)">

								<img class=""
								     loading="lazy"
								     src="<?php echo $slide['mobile_image']['url'] ?>"
								     alt="<?php echo $slide['image']['alt'] ?>">
							</picture>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
