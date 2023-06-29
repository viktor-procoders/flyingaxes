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
$id = 'local-events-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'local-events-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'local-events-section';
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
	'events'           => $events,
	'subheading'       => $subheading,
	'link'             => $link,
	'description'      => $description,
	'background_image' => $bg,
] = get_field( 'local_events_section' );

?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="local-events-section" id="<?php echo esc_attr( $id ); ?>" <?php bg( $bg ) ?> <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="local-events-section__intro">
						<?php if ( $subtitle ): ?>
							<p class="local-events-section__subtitle"><?php echo $subtitle ?></p>
						<?php endif ?>
						<?php if ( $title ): ?>
							<h2 class="h1 local-events-section__title"><?php echo $title ?></h2>
						<?php endif ?>
						<div class="local-events-section__decor">
							<?php starsDisplay( 2 ); ?>
							<img loading="lazy" width="60" height="60"
							     src="<?php echo get_template_directory_uri() . '/dist/assets/images/target.png' ?>"
							     alt="target image">
							<?php starsDisplay( 2 ); ?>
						</div>
					</div>
					<?php if ( $text ): ?>
						<div class="local-events-section__text"><?php echo $text ?></div>
					<?php endif ?>
					<?php if ( ! empty( $events ) ): ?>
						<div class="local-events-section__events">
							<?php foreach ( $events as $event ): ?>
								<a href="<?php echo $event['link']['url'] ?>" class="pc-button pc-button--outline">
									<?php echo $event['link']['title'] ?>
								</a>
							<?php endforeach ?>
						</div>
					<?php endif ?>
					<div class="local-events-section__bottom">
						<?php if ( $subheading ): ?>
							<h3 class="h5 local-events-section__subheading"><?php echo $subheading ?></h3>
						<?php endif ?>
						<?php if ( ! empty( $link ) ): ?>
							<a class="pc-button pc-button--red" href="<?php echo $link['url'] ?>">
								<?php echo $link['title'] ?>
							</a>
						<?php endif ?>
						<?php if ( $description ): ?>
							<p class="local-events-section__description"><?php echo $description ?></p>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
