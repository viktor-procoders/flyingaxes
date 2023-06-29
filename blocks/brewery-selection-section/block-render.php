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
$id = 'brewery-selection-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'brewery-selection-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'brewery-selection-section';
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
	'title' => $title,
	'logos' => $logos,
	'text'  => $text,
	'image' => $image,
] = get_field( 'brewery_section' );
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="brewery-selection-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<?php if ( $title ): ?>
				<h2 class="brewery-selection-section__title"><?php echo $title ?></h2>
			<?php endif ?>
			<?php if ( ! empty( $logos ) ): ?>
				<div class="d-flex justify-content-center brewery-selection-section__logos">
					<?php foreach ( $logos as $logo ): ?>
						<img class="mx-4" width="165" height="165" loading="lazy" src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
					<?php endforeach ?>
				</div>
			<?php endif ?>
			<?php if ( $text ): ?>
				<div class="brewery-selection-section__text"><?php echo $text ?></div>
			<?php endif ?>
			<?php if ( ! empty( $image ) ): ?>
			<div class="brewery-selection-section__image">
				<img
					width="95"
					height="95"
					loading="lazy"
					class="brewery-selection-section__img"
					src="<?php echo $image['url'] ?>"
					alt="<?php echo $image['alt'] ?>">
				<?php endif ?>
			</div>
		</div>
	</section>
<?php endif; ?>
