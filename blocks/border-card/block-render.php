<?php if ( get_field( 'disable_temporary' ) === true ) {
	return;
}
/**
 * Block template file: block-render.php
 *
 * @var   array $block The block settings and attributes.
 * @var   string $content The block inner HTML (empty).
 * @var   bool $is_preview True during AJAX preview.
 * @var   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'border-card-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'block-border-card' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'border-card-section builder-section';
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

$border_card = get_field( 'border_card' );
[ 'title' => $title, 'image' => $image, 'description' => $description, 'link' => $link ] = $border_card;
?>



<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	var_dump($fileUrl);
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="border-card">
			<?php if ( $title ): ?>
				<h2><?php echo $title ?></h2>
			<?php endif ?>
			<?php if ( $description ): ?>
				<p><?php echo $description ?></p>
			<?php endif ?>
			<?php if ( !empty($link['url']) && !empty($link['title']) ): ?>
				<a class="pc-button" href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
			<?php endif ?>
		</div>
	</section>
<?php endif; ?>
