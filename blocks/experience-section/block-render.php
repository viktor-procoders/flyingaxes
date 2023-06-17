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

wp_enqueue_style( 'experience-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'experience-section';
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

$intro_section = get_field( 'experience_section' );
[ 'image' => $image, 'text' => $text ] = $intro_section;
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="experience-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="grid">
				<div class="g-col-12 g-col-md-6">
					<?php if ( ! empty( $image ) ): ?>
						<img
							src="<?php echo $image['sizes']['460_310'] ?>"
							srcset="<?php echo $image['sizes']['920_620'] ?> 2x"
							alt="<?php echo $image['alt'] ?>">
					<?php endif ?>
				</div>
				<div class="g-col-12 g-col-md-6 g-start-lg-7">
					<?php if ( $text ): ?>
						<div><?php echo $text ?></div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
