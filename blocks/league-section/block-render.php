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
$id = 'league-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'league-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'league-section-';
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
	'background_image'  => $background_image,
	'logo'              => $logo,
	'description_left'  => $description_left,
	'description_right' => $description_right,
	'bottom_text'       => $bottom_text,
	'cta_left_column'   => $cta_left_column,
	'cta_right_column'  => $cta_right_column,
] = get_field( 'league_section' );
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="league-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?> <?php bg( $background_image ) ?>>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 d-none d-md-block">
					<?php if ( $description_left ): ?>
						<div class="d-flex justify-content-center league-section__stars"><?php starsDisplay( 3 ) ?></div>
						<div class="league-section__description"><?php echo $description_left ?></div>
					<?php endif ?>
				</div>
				<div class="col-lg-4 d-flex justify-content-center">
					<?php if ( ! empty( $logo ) ): ?>
						<img width="295" height="368" loading="lazy" class="league-section__logo" src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
					<?php endif ?>
				</div>
				<div class="col-lg-4">
					<div class="d-flex justify-content-center league-section__stars"><?php starsDisplay( 3 ) ?></div>
					<?php if ( $description_right ): ?>
						<div class="league-section__description"><?php echo $description_right ?></div>
					<?php endif ?>
				</div>
			</div>
			<?php if ( $bottom_text ): ?>
				<div class="league-section__rules"><?php echo $bottom_text ?></div>
			<?php endif ?>
			<div class="league-section__cta-wrapper">
				<div class="league-section__cta league-section__cta--blue">
					<p class="m-0"><?php echo $cta_left_column['location'] ?></p>
					<a class="pc-button pc-button--red" href="<?php echo $cta_left_column['link']['url'] ?>">
						<?php echo $cta_left_column['link']['title'] ?>
					</a>
				</div>
				<div class="league-section__cta league-section__cta--red">
					<p class="m-0"><?php echo $cta_right_column['location'] ?></p>
					<a class="pc-button" href="<?php echo $cta_right_column['link']['url'] ?>">
						<?php echo $cta_right_column['link']['title'] ?>
					</a>
				</div>
			</div>
	</section>
<?php endif; ?>
