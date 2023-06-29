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
$id = 'gift-posts-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'gift-posts-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'gift-posts-section';
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

$gift_block = get_field( 'gift_block' );
$blog_block = get_field( 'blog_block' );
?>

<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="gift-posts-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>
		<div class="container gift-posts-section__container">
			<div class="gift-posts-section__inner">
				<div class="gift-posts-section-card gift-posts-section-card--blue">
					<?php if ( $gift_block['subtitle'] ): ?>
						<p class="gift-posts-section-card__subtitle">
							<span><?php echo $gift_block['subtitle'] ?></span>
						</p>
					<?php endif ?>
					<?php if ( $gift_block['title'] ): ?>
						<h2 class="h1">
							<?php echo $gift_block['title'] ?>
						</h2>
					<?php endif ?>
					<?php if ( ! empty( $gift_block['image'] ) ): ?>
						<img
							class="gift-posts-section-card__image"
							loading="lazy"
							width="330"
							height="215"
							src="<?php echo $gift_block['image']['url'] ?>"
							alt="<?php echo $gift_block['image']['alt'] ?>">
					<?php endif ?>
					<?php if ( ! empty( $gift_block['link'] ) ): ?>
						<a class="pc-button gift-posts-section-card__link pc-button--red"
						   href="<?php echo $gift_block['link']['url'] ?>">
							<?php echo $gift_block['link']['title'] ?>
						</a>
					<?php endif ?>
				</div>
				<div class="gift-posts-section-card gift-posts-section-card--red">
					<?php if ( $blog_block['title'] ): ?>
						<h2 class="gift-posts-section-card__title gift-posts-section-card__title--blog">
							<?php starsDisplay( 2 ); ?>
							<span><?php echo $blog_block['title'] ?></span>
							<?php starsDisplay( 2 ); ?>
						</h2>
					<?php endif ?>
					<?php if ( ! empty( $blog_block['posts'] ) ): ?>
						<ul class="gift-posts-section-card__posts">
							<?php foreach ( $blog_block['posts'] as $post ): ?>
								<li class="d-flex">
									<time datetime="<?php echo get_the_date( 'n.j.y', $post->ID ) ?>">
										<?php echo get_the_date( 'n.j.y', $post->ID ) ?>
									</time>
									<a href="<?php echo get_the_permalink( $post->ID ); ?>"><?php echo get_the_title( $post->ID ) ?></a>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
					<a class="pc-button gift-posts-section-card__link mt-auto"
					   href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>">
						<?php _e( 'SEE ALL', 'flyingaxes' ) ?>
					</a>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
