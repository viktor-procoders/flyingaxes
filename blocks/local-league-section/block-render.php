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
$id = 'local-league-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'local-league-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'local-league-section';
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
	'background_image' => $bg,
	'logo'             => $logo,
	'link'             => $link,
	'text'             => $text,
] = get_field( 'local_league_section' );
?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="local-league-section" id="<?php echo esc_attr( $id ); ?>" <?php bg( $bg ) ?> <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 d-flex flex-column align-items-center mb-lg-0 mb-5">
					<?php if ( ! empty( $logo ) ): ?>
						<img width="295" height="368" loading="lazy" class="league-section__logo mb-4" src="<?php echo $logo['url'] ?>"
						     alt="<?php echo $logo['alt'] ?>">
					<?php endif ?>
					<?php if ( ! empty( $link ) ): ?>
						<a class="pc-button pc-button--red" href="<?php echo $link['url'] ?>">
							<?php echo $link['title'] ?>
						</a>
					<?php endif ?>
				</div>
				<div class="col-lg-7 offset-lg-1">
					<?php if ( $text ): ?>
						<div class="local-league-section__text"><?php echo $text ?></div>
					<?php endif ?>
				</div>
			</div>
		</div>
		<img class="local-league-section__photo" width="400" height="280" loading="lazy"
		     src="<?php echo get_template_directory_uri() . '/dist/assets/images/throwing_axes.png' ?>" alt="Man throwing axe">
	</section>
<?php endif; ?>
