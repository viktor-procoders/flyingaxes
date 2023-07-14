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
$id = 'intro-booking-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'intro-booking-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'intro-booking-section';
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
	'title_top'    => $title_top,
	'title_bottom' => $title_bottom,
	'image'        => $image,
	'button'       => $button,
] = get_field( 'intro_booking_section' );
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="intro-booking-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="intro-booking-section__top text-center" <?php bg( $image ) ?>>
			<?php if ( $title_top && $title_bottom ): ?>
				<h2 class="intro-booking-section__title">
					<span><?php echo $title_top ?></span>
					<span><?php echo $title_bottom ?></span>
				</h2>
			<?php endif ?>
			<?php if ( $button ): ?>
				<button data-lightbox-btn="booking-form" class="intro-booking-section__button pc-button pc-button--red"><?php echo $button ?></button>
			<?php endif ?>
		</div>
	</section>
<?php endif; ?>
