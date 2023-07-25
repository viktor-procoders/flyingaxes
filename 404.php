<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();

[
	'intro'       => $intro,
	'cta_section' => $cta_section,
	'gallery'     => $gallery
] = get_field( 'not_found', 'options' );

[
	'left_column'  => $left_column,
	'right_column' => $right_column,
] = $cta_section;

?>
<main id="primary" class="pc-main">
	<section class="not-found-intro" <?php bg( $intro['background_image'] ) ?>>
		<div class="container">
			<h1 class="not-found-intro__title">
				<span><?php echo $intro['top_title'] ?></span>
				<span><?php echo $intro['bottom_title'] ?></span>
				<img class="not-found-intro__img" loading="lazy" width="370" height="250"
				     src="<?php echo get_template_directory_uri() . '/dist/assets/images/not_found.png' ?>"
				     alt="Not Found">
			</h1>
		</div>
	</section>
	<section class="cta-section">
		<div class="container cta-section__container">
			<div class="cta-section__inner">
				<div class="cta-card cta-card--blue">
					<?php if ( $left_column['title'] ): ?>
						<p class="cta-card__title h5">
							<?php starsDisplay( 2 ); ?>
							<span><?php echo $left_column['title'] ?></span>
							<?php starsDisplay( 2 ); ?>
						</p>
					<?php endif ?>
					<?php if ( ! empty( $left_column['image'] ) ): ?>
						<img
							class="cta-card__image"
							loading="lazy"
							width="300"
							height="250"
							src="<?php echo $left_column['image']['sizes']['300_250'] ?>"
							srcset="<?php echo $left_column['image']['sizes']['600_500'] ?> 2x"
							alt="<?php echo $left_column['image']['alt'] ?>">
					<?php endif ?>
					<?php if ( $left_column['location'] ): ?>
						<p class="cta-card__location"><?php echo $left_column['location'] ?></p>
					<?php endif ?>
					<?php if ( ! empty( $left_column['link'] ) ): ?>
						<a class="pc-button cta-card__link pc-button--red"
						   href="<?php echo $left_column['link']['url'] ?>">
							<?php echo $left_column['link']['title'] ?>
						</a>
					<?php endif ?>
				</div>
				<div class="cta-card cta-card--red">
					<?php if ( $right_column['title'] ): ?>
						<p class="cta-card__title h5">
							<?php starsDisplay( 2 ); ?>
							<span><?php echo $right_column['title'] ?></span>
							<?php starsDisplay( 2 ); ?>
						</p>
					<?php endif ?>
					<?php if ( ! empty( $right_column['image'] ) ): ?>
						<img
							class="cta-card__image"
							loading="lazy"
							width="300"
							height="250"
							src="<?php echo $right_column['image']['sizes']['300_250'] ?>"
							srcset="<?php echo $right_column['image']['sizes']['600_500'] ?> 2x"
							alt="<?php echo $right_column['image']['alt'] ?>">
					<?php endif ?>
					<?php if ( $right_column['location'] ): ?>
						<p class="cta-card__location"><?php echo $right_column['location'] ?></p>
					<?php endif ?>
					<?php if ( ! empty( $right_column['link'] ) ): ?>
						<a class="pc-button cta-card__link"
						   href="<?php echo $right_column['link']['url'] ?>">
							<?php echo $right_column['link']['title'] ?>
						</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</section>
	<section class="not-found-gallery">
		<?php if ( ! empty( $gallery ) ): ?>
			<div class="not-found-gallery__wrapper">
				<?php foreach ( $gallery as $photo ): ?>
					<picture>
						<img loading="lazy" src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['alt'] ?>">
					</picture>
				<?php endforeach ?>
			</div>
		<?php endif ?>

	</section>
</main>
<?php get_footer(); ?>
