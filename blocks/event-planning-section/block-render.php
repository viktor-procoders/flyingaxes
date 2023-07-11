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
$id = 'event-planning-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'event-planning-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'event-planning-section';
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
	'title'            => $title,
	'subtitle'         => $subtitle,
	'text'             => $text,
	'event_options'    => $event_options,
	'subheading'       => $subheading,
	'button'           => $button,
	'description'      => $description,
	'background_image' => $bg,
] = get_field( 'event_planning_section' );

?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="event-planning-section" id="<?php echo esc_attr( $id ); ?>" <?php bg( $bg ) ?> <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-9">
					<div class="event-planning-section__intro">
						<?php if ( $title ): ?>
							<h2 class="event-planning-section__title"><?php echo $title ?></h2>
						<?php endif ?>
						<?php if ( $subtitle ): ?>
							<p class="event-planning-section__subtitle"><?php echo $subtitle ?></p>
						<?php endif ?>
						<div class="event-planning-section__decor">
							<?php starsDisplay( 2 ); ?>
							<img loading="lazy" width="60" height="60"
							     src="<?php echo get_template_directory_uri() . '/dist/assets/images/target.png' ?>"
							     alt="target image">
							<?php starsDisplay( 2 ); ?>
						</div>
					</div>
					<?php if ( $text ): ?>
						<div class="event-planning-section__text"><?php echo $text ?></div>
					<?php endif ?>
					<?php if ( ! empty( $event_options ) ): ?>
						<ul class="event-planning-section__options">
							<?php foreach ( $event_options as $event_option ): ?>
								<li class="d-flex justify-content-between align-items-center">
									<h4 class="mb-0"><?php echo $event_option['title'] ?></h4>
									<p class="mb-0 d-none d-md-block"><?php echo $event_option['value'] ?></p>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
					<div class="event-planning-section__bottom">
						<?php if ( $subheading ): ?>
							<h3 class="h5 event-planning-section__subheading"><?php echo $subheading ?></h3>
						<?php endif ?>
						<?php if ( $button ): ?>
							<button class="pc-button pc-button--red" data-lightbox-btn="event-form">
								<?php echo $button ?>
							</button>
						<?php endif ?>
						<?php if ( $description ): ?>
							<div class="event-planning-section__description"><?php echo $description ?></div>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
