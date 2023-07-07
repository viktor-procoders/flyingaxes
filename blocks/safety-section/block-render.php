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
$id = 'safety-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'safety-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'safety-section';
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
	'image' => $image,
	'title' => $title,
	'text'  => $text,
	'link'  => $link,
] = get_field( 'safety_section' );
?>

<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="safety-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<?php if ( ! empty( $image ) ): ?>
			<img class="d-block d-lg-none safety-section__img" loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
		<?php endif ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<?php if ( ! empty( $image ) ): ?>
						<div class="safety-section__picture d-none d-lg-block" <?php bg( $image ) ?>></div>
					<?php endif ?>
				</div>
				<div class="col-lg-6">
					<?php if ( $title ): ?>
						<h2 class="safety-section__title"><?php echo $title ?></h2>
					<?php endif ?>
					<?php if ( $text ): ?>
						<div class="safety-section__text"><?php echo $text ?></div>
					<?php endif ?>
					<?php if ( ! empty( $link ) ): ?>
						<a class="pc-button pc-button--red safety-section__btn" href="<?php echo $link['url'] ?>">
							<?php echo $link['title'] ?>
						</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
