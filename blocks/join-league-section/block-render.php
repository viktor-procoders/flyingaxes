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
$id = 'join-league-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'join-league-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'join-league-section';
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

[ 'text' => $text, 'join_block' => $join_block ] = get_field( 'join_league_section' );
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="join-league-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<?php if ( $text ): ?>
						<div class="join-league-section__text"><?php echo $text ?></div>
					<?php endif ?>
				</div>
				<div class="col-lg-6">
					<?php if ( ! empty( $join_block ) ): ?>
						<div class="join-block">
							<?php if ( $join_block['subtitle'] ): ?>
								<p class="join-block__subtitle"><?php echo $join_block['subtitle'] ?></p>
							<?php endif ?>
							<?php if ( $join_block['title'] ): ?>
								<h3 class="join-block__title"><?php echo $join_block['title'] ?></h3>
							<?php endif ?>
							<?php if ( $join_block['text'] ): ?>
								<p class="join-block__text"><?php echo $join_block['text'] ?></p>
							<?php endif ?>
							<?php if ( $join_block['button'] ): ?>
								<button class="pc-button pc-button--outline"><?php echo $join_block['button'] ?></button>
							<?php endif ?>
							<?php if ( $join_block['tip'] ): ?>
								<p class="join-block__tip"><?php echo $join_block['tip'] ?></p>
							<?php endif ?>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
