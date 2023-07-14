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
$id = 'seo-block-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'seo-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'seo-block-section';
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
	'view'         => $view,
	'title'        => $title,
	'subtitle'     => $subtitle,
	'left_column'  => $left_column,
	'right_column' => $right_column,
	'button'       => $button,
] = get_field( 'seo_section' );
?>

<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="seo-block-section seo-block-section--<?php echo $view ?>" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<?php if ( $title ): ?>
				<h2 class="seo-block-section__title h3"><?php echo $title ?></h2>
			<?php endif ?>
			<?php if ( $subtitle ): ?>
				<p class="text-center seo-block-section__subtitle"><?php echo $subtitle ?></p>
			<?php endif ?>
			<div class="row justify-content-between">
				<div class="col-md-6">
					<?php if ( $left_column ): ?>
						<div class="seo-block-section__text"><?php echo $left_column ?></div>
					<?php endif ?>
				</div>
				<div class="col-md-6">
					<?php if ( $right_column ): ?>
						<div class="seo-block-section__text"><?php echo $right_column ?></div>
					<?php endif ?>
				</div>
			</div>
			<?php if ( $button ): ?>
				<div class="text-center">
					<button class="pc-button pc-button--red seo-block-section__link" data-lightbox-btn="booking-form">
						<?php echo $button ?>
					</button>
				</div>
			<?php endif ?>
		</div>
	</section>
<?php endif; ?>
