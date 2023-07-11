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
$id = 'info-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_script( 'tabs' );
wp_enqueue_style( 'info-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'info-section';
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
	'text'   => $text,
	'button' => $button,
	'tabs'   => $tabs,
] = get_field( 'info_section' );
?>

<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="info-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-lg-0 mb-5">
					<?php if ( $text ): ?>
						<div class="mb-4"><?php echo $text ?></div>
					<?php endif ?>
					<?php if ( $button ): ?>
						<button class="pc-button pc-button--outline" data-lightbox-btn="booking-form">
							<?php echo $button ?>
						</button>
					<?php endif ?>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="pc-tabs">
						<div class="mb-4">
							<div class="d-flex justify-content-between pc-tabs__wrapper">
								<?php $i = 1; ?>
								<?php foreach ( $tabs as $tab ): ?>

									<?php if ( $tab['title'] ): ?>
										<button class="pc-tab-title <?php echo $i === 1 ? 'active' : '' ?>"
										        data-tab-title="<?php echo $i . $block['id'] ?>">
											<?php if ( $tab['icon'] ): ?>
												<img loading="lazy" src="<?php echo $tab['icon']['url'] ?>" alt="<?php echo $tab['title'] ?>">
											<?php endif ?>
											<?php echo $tab['title'] ?>
										</button>
									<?php endif ?>

									<?php $i ++; ?>
								<?php endforeach ?>
							</div>
						</div>

						<?php $j = 1; ?>
						<?php foreach ( $tabs as $tab ): ?>
							<?php if ( ! empty( $tab['image'] ) ): ?>
								<div class="pc-tab-content <?php echo $j === 1 ? 'active' : '' ?>" data-tab-content="<?php echo $j . $block['id'] ?>">
									<div class="row">
										<div class="col-lg-6">
											<?php if ( $tab['content'] ): ?>
												<div class="pc-tab-content__text"><?php echo $tab['content'] ?></div>
											<?php endif ?>

											<?php if ( ! empty( $tab['list'] ) ): ?>
												<ul class="pc-tab-content__list">
													<?php foreach ( $tab['list'] as $item ): ?>
														<li class="pc-tab-content__list-item">
															<strong><?php echo $item['title'] ?></strong>
															<span><?php echo $item['value'] ?></span>
														</li>
													<?php endforeach ?>
												</ul>
											<?php endif ?>

											<?php if ( $tab['bottom_text'] ): ?>
												<div class=""><?php echo $tab['bottom_text'] ?></div>
											<?php endif ?>
										</div>
										<div class="col-lg-6">
											<img src="<?php echo $tab['image']['url'] ?>" alt="<?php echo $tab['image']['alt'] ?>">
										</div>
									</div>

								</div>
							<?php else: ?>
								<div class="pc-tab-content <?php echo $j === 1 ? 'active' : '' ?>" data-tab-content="<?php echo $j . $block['id'] ?>">
									<?php if ( $tab['content'] ): ?>
										<div class="pc-tab-content__text"><?php echo $tab['content'] ?></div>
									<?php endif ?>

									<?php if ( ! empty( $tab['list'] ) ): ?>
										<ul class="pc-tab-content__list">
											<?php foreach ( $tab['list'] as $item ): ?>
												<li class="pc-tab-content__list-item">
													<strong><?php echo $item['title'] ?></strong>
													<span><?php echo $item['value'] ?></span>
												</li>
											<?php endforeach ?>
										</ul>
									<?php endif ?>

									<?php if ( $tab['bottom_text'] ): ?>
										<div class=""><?php echo $tab['bottom_text'] ?></div>
									<?php endif ?>
								</div>
							<?php endif ?>

							<?php $j ++; ?>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
