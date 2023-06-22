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
$id = 'experience-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'cta-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'cta-section';
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
	'left_column'  => $left_column,
	'right_column' => $right_column,
] = get_field( 'cta_section' );
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="cta-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container cta-section__container">
			<div class="cta-section__inner">
				<div class="cta-card cta-card--blue">
					<?php if ( $left_column['title'] ): ?>
						<p class="cta-card__title h5">
							<?php starsDisplay(2); ?>
							<span><?php echo $left_column['title'] ?></span>
							<?php starsDisplay(2); ?>
						</p>
					<?php endif ?>
					<?php if ( ! empty( $left_column['image'] ) ): ?>
						<img
							class="cta-card__image"
							loading="lazy"
							width="300"
							height="250"
							src="<?php echo $left_column['image']['sizes']['300_250'] ?>"
							srcset="<?php echo $left_column['image']['sizes']['600_500'] ?> 2x"
							alt="<?php echo $left_column['image']['alt'] ?>">
					<?php endif ?>
					<?php if ( $left_column['location'] ): ?>
						<p class="cta-card__location"><?php echo $left_column['location'] ?></p>
					<?php endif ?>
					<?php if ( ! empty( $left_column['link'] ) ): ?>
						<a class="pc-button cta-card__link pc-button--red"
						   href="<?php echo $left_column['link']['url'] ?>">
							<?php echo $left_column['link']['title'] ?>
						</a>
					<?php endif ?>
				</div>
				<div class="cta-card cta-card--red">
					<?php if ( $right_column['title'] ): ?>
						<p class="cta-card__title h5">
							<?php starsDisplay(2); ?>
							<span><?php echo $right_column['title'] ?></span>
							<?php starsDisplay(2); ?>
						</p>
					<?php endif ?>
					<?php if ( ! empty( $right_column['image'] ) ): ?>
						<img
							class="cta-card__image"
							loading="lazy"
							width="300"
							height="250"
							src="<?php echo $right_column['image']['sizes']['300_250'] ?>"
							srcset="<?php echo $right_column['image']['sizes']['600_500'] ?> 2x"
							alt="<?php echo $right_column['image']['alt'] ?>">
					<?php endif ?>
					<?php if ( $right_column['location'] ): ?>
						<p class="cta-card__location"><?php echo $right_column['location'] ?></p>
					<?php endif ?>
					<?php if ( ! empty( $right_column['link'] ) ): ?>
						<a class="pc-button cta-card__link"
						   href="<?php echo $right_column['link']['url'] ?>">
							<?php echo $right_column['link']['title'] ?>
						</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
