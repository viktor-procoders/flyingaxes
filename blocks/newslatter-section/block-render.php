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
$id = 'newsletter-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'newsletter-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'newsletter-section';
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
	'form'  => $form,
] = get_field( 'newsletter_section' );
?>

<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="newsletter-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<?php if ( ! empty( $image ) ): ?>
			<img class="d-block d-lg-none newsletter-section__img" loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
		<?php endif ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<?php if ( ! empty( $image ) ): ?>
						<div class="newsletter-section__picture d-none d-lg-block" <?php bg( $image ) ?>></div>
					<?php endif ?>
				</div>
				<div class="col-lg-6">
					<?php if ( $title ): ?>
						<h2 class="newsletter-section__title"><?php echo $title ?></h2>
					<?php endif ?>
					<?php if ( $text ): ?>
						<div class="newsletter-section__text"><?php echo $text ?></div>
					<?php endif ?>
					<?php if ( $form ): ?>
						<?php echo $form ?>
						<div class="text-center thank-you-message" data-message>
							<p>Thank you for signing up for our newsletter.</p>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>


