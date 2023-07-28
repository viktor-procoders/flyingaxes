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
$id = 'quote-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'quote-section' );
wp_enqueue_script( 'quote-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'quote-section';
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

$quote_section = get_field( 'quote_section' );
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="quote-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="splide quotes-slider" data-quotes-slider>
				<div class="splide__track">
					<div class="splide__list">
						<?php foreach ( $quote_section as $quote ): ?>
							<div class="splide__slide quote">
								<h2 class="quote__title h4">
									<?php echo $quote['rating'] ?><?php _e(' Stars','flyingaxes'); ?>
								</h2>
								<div class="quote__rating stars-rating" style="--rating: <?php echo $quote['rating'] ?>;"
								     role="img"
								     aria-label="Google reviews rating: <?php echo $quote['rating'] ?> of 5"></div>
								<?php if ( $quote['text'] ): ?>
									<blockquote class="quote__text">
										<?php echo $quote['text'] ?>
									</blockquote>
								<?php endif ?>
								<div class="quote__rating stars-rating" style="--rating: <?php echo $quote['rating'] ?>;"
								     role="img"
								     aria-label="Google reviews rating: <?php echo $quote['rating'] ?> of 5"></div>
								<?php if ( $quote['author'] ): ?>
									<p class="quote__author">- <?php echo $quote['author'] ?> / Google review</p>
								<?php endif ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
