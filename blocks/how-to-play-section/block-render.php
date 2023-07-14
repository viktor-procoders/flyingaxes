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
$id = 'how-to-play-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'how-to-play-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'how-to-play-section';
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
	'title'  => $title,
	'text'   => $text,
	'points' => $points,
] = get_field( 'how_to_play_section' );
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="how-to-play-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<?php if ( $title ): ?>
						<h2 class="how-to-play-section__title"><?php echo $title ?></h2>
					<?php endif ?>
					<?php if ( $text ): ?>
						<div class="how-to-play-section__text"><?php echo $text ?></div>
					<?php endif ?>
				</div>
			</div>
			<div class="d-flex justify-content-center flex-wrap flex-lg-nowrap how-to-play-section__points">
				<?php $i = 1;
				foreach ( $points as $point ): ?>
					<div class="d-flex flex-column align-items-center m-4">
						<img loading="lazy" src="<?php echo $point['image']['url'] ?>" alt="<?php echo $point['points'] ?>">
						<?php if ( $point['points'] ): ?>
							<p class="how-to-play-section__point">
								<?php echo $i === 1 ? 'Point ' : 'Points ' ?><?php echo $point['points'] ?>
							</p>
						<?php endif ?>
						<?php if ( $point['placement'] ): ?>
							<p class="how-to-play-section__placement how-to-play-section__placement--<?php echo $i; ?>">
								<?php echo $point['placement'] ?>
							</p>
						<?php endif ?>
					</div>
					<?php $i ++; ?>
				<?php endforeach ?>
			</div>
		</div>
	</section>
<?php endif; ?>
