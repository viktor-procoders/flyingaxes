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
$id = 'schedule-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'schedule-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'schedule-section';
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
	'logo'     => $logo,
	'button'   => $button,
	'title'    => $title,
	'schedule' => $schedule,
] = get_field( 'schedule_section' );
?>

<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="schedule-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 d-flex flex-column align-items-center order-1 order-lg-0">
					<?php if ( ! empty( $logo ) ): ?>
						<img width="295" height="368" loading="lazy" class="schedule-section__logo mb-4" src="<?php echo $logo['url'] ?>"
						     alt="<?php echo $logo['alt'] ?>">
					<?php endif ?>
					<?php if ( $button ): ?>
						<a class="pc-button pc-button--red">
							<?php echo $button ?>
						</a>
					<?php endif ?>
				</div>
				<div class="col-lg-7 order-0 order-lg-1 mb-lg-0 mb-5">
					<?php if ( $title ): ?>
						<h2 class="schedule-section__title h3">
							<?php echo $title ?>
						</h2>
					<?php endif ?>
					<?php if ( ! empty( $schedule ) ): ?>
						<ul class="seasons-schedule">
							<?php foreach ( $schedule as $item ): ?>
								<li class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
									<div class="d-flex align-items-center">
										<span class="seasons-schedule__season"><?php echo $item['season'] ?></span>
										<span class="seasons-schedule__status"><?php echo $item['status'] ?></span>
									</div>
									<time class="seasons-schedule__date"><?php echo $item['date'] ?></time>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
