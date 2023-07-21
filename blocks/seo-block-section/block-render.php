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
$id = 'seo-block-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'seo-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'seo-block-section';
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
	'background_color' => $bg_color,
	'wood_pattern'     => $wood_pattern,
	'title'            => $title,
	'subtitle'         => $subtitle,
	'columns'          => $columns,
	'left_column'      => $left_column,
	'right_column'     => $right_column,
	'text'             => $text,
	'type'             => $type,
	'button_style'     => $button_style,
	'button_text'      => $button_text,
	'button_type'      => $button_type,
	'link'             => $link,
	'notice'           => $notice,
] = get_field( 'seo_section' );
?>

<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ) );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section
		class="seo-block-section seo-block-section--<?php echo $bg_color ?> <?php echo $wood_pattern ? 'seo-block-section--pattern' : null ?>"
		id="<?php echo esc_attr( $id ); ?>"
		<?php echo $wrapper_attributes; ?>>
		<div class="container">
			<?php if ( $title ): ?>
				<h2 class="seo-block-section__title"><?php echo $title ?></h2>
			<?php endif ?>
			<?php if ( $subtitle ): ?>
				<p class="text-center seo-block-section__subtitle"><?php echo $subtitle ?></p>
			<?php endif ?>
			<div class="row justify-content-center">
				<?php if ( $columns === 'two' ): ?>
					<div class="col-md-6">
						<?php if ( $left_column ): ?>
							<div class="seo-block-section__text"><?php echo $left_column ?></div>
						<?php endif ?>
					</div>
					<div class="col-md-6">
						<?php if ( $right_column ): ?>
							<div class="seo-block-section__text"><?php echo $right_column ?></div>
						<?php endif ?>
					</div>
				<?php else : ?>
					<?php if ( $text ): ?>
						<div class="col-md-7">
							<div class="text-center"><?php echo $text ?></div>
						</div>
					<?php endif ?>
				<?php endif ?>
			</div>
			<?php if ( $type === 'button' && $button_text ): ?>
				<div class="text-center">
					<button class="pc-button <?php echo $button_style ?> seo-block-section__link" data-lightbox-btn="<?php echo $button_type ?>">
						<?php echo $button_text ?>
					</button>
				</div>
			<?php else : ?>
				<?php if ( ! empty( $link ) ): ?>
					<div class="text-center">
						<a class="pc-button <?php echo $button_style ?> seo-block-section__link"
						   href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>">
							<?php echo $link['title'] ?>
						</a>
					</div>
				<?php endif ?>
			<?php endif ?>
			<?php if ( $notice ): ?>
				<p class="text-center seo-block-section__notice">
					<i><?php echo $notice ?></i>
				</p>
			<?php endif ?>
		</div>
	</section>
<?php endif; ?>
