<?php
[
	'video_url'         => $video_url,
	'video_logo'        => $video_logo,
	'video_title'       => $video_title,
	'video_description' => $video_description,
	'locations_title'   => $locations_title,
	'locations'         => $locations,
	'socials'           => $socials,
	'job_position_cta'  => $job_position_cta,
	'logo'              => $logo,
	'copyright'         => $copyright,

] = get_field( 'footer', 'option' );

if ( $video_url ) {
	parse_str( parse_url( $video_url, PHP_URL_QUERY ), $my_array_of_vars );
	$youtube_url = $my_array_of_vars['v'];
}
?>

<footer class="pc-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 d-md-block d-none">
				<?php if ( $video_url ): ?>
					<div class="pc-video">
						<a class="pc-video__link" href="https://youtu.be/<?php echo $youtube_url ?>">
							<?php if ( $video_logo['url'] ): ?>
								<img loading="lazy" class="pc-video__logo d-none d-lg-block" src="<?php echo $video_logo['url'] ?>"
								     alt="<?php echo $video_logo['alt'] ?>">
							<?php endif ?>
							<?php if ( $video_title ): ?>
								<h3 class="pc-video__title">
									<?php echo $video_title ?>
								</h3>
							<?php endif ?>
							<picture>
								<source srcset="https://i.ytimg.com/vi_webp/<?php echo $youtube_url ?>/maxresdefault.webp" type="image/webp">
								<img loading="lazy" class="pc-video__media" src="https://i.ytimg.com/vi/<?php echo $youtube_url ?>/maxresdefault.jpg"
								     alt="jennifer lawrence & jimmy fallon">
							</picture>
						</a>
						<button class="pc-video__button" aria-label="Play Video">
							<svg width="100" height="100">
								<use xlink:href="#play-icon"/>
							</svg>
						</button>
					</div>
					<?php if ( $video_description ): ?>
						<div class="pc-video-description"><?php echo $video_description ?></div>
					<?php endif ?>
				<?php endif ?>
			</div>
			<div class="col-lg-5 col-md-6 offset-lg-1 d-flex flex-column">
				<?php if ( $locations_title ): ?>
					<h2><?php echo $locations_title ?></h2>
				<?php endif ?>
				<?php if ( ! empty( $locations ) ): ?>
					<div class="row">
						<?php foreach ( $locations as $location ): ?>
							<div class="col-md-6">
								<div class="pc-location">
									<?php if ( $location['title']['url'] ): ?>
										<p class="mb-1">
											<a class="pc-location__title" href="<?php echo $location['title']['url'] ?>">
												<?php echo $location['title']['title'] ?>
											</a>
										</p>
									<?php endif ?>
									<?php if ( $location['address'] ): ?>
										<address class="pc-location__address mb-1"><?php echo $location['address'] ?></address>
									<?php endif ?>
									<?php if ( $location['phone'] ): ?>
										<p class="pc-location__phone mb-1">
											<b><?php _e( 'Phone:', 'flyingaxes' ) ?></b>
											<a href="tel:<?php echo preparePhone( $location['phone'] ) ?>">
												<?php echo $location['phone'] ?>
											</a>
										</p>
									<?php endif ?>
									<?php if ( $location['email'] ): ?>
										<p class="pc-location__email mb-1">
											<a href="mailto:<?php echo $location['email'] ?>">
												<?php _e( 'Email us', 'flyingaxes' ) ?>
											</a>
										</p>
									<?php endif ?>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				<?php endif ?>
				<?php if ( ! empty( $socials ) ): ?>
					<div class="d-flex justify-content-center justify-content-md-start footer-socials">
						<?php foreach ( $socials as $social ): ?>
							<?php if ( $social['url'] ): ?>
								<a class="footer-socials__item" href="<?php echo $social['url'] ?>" target="_blank"
								   aria-label="Link to <?php echo $social['icon']['title'] ?>">
									<img width="50" height="50" loading="lazy" src="<?php echo $social['icon']['url'] ?>"
									     alt="<?php echo $social['icon']['alt'] ?>">
									<?php if ( $social['title'] ): ?>
										<p><?php echo $social['title'] ?></p>
									<?php endif ?>
								</a>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<nav class="pc-footer-nav d-none d-md-block">
					<?php
					wp_nav_menu(
						[
							'container'      => false,
							'menu_class'     => 'menu',
							'items_wrap'     => '<ul class="%2$s pc-footer-menu">%3$s</ul>',
							'theme_location' => 'footer',
							'depth'          => 1,
							'fallback_cb'    => false,
							'walker'         => new TopBarWalker(),
						]
					);
					?>
				</nav>
				<?php if ( $job_position_cta ): ?>
					<div class="pc-footer__jobs-cta"><?php echo $job_position_cta ?></div>
				<?php endif ?>
				<?php if ( ! empty( $logo ) ): ?>
					<div class="pc-footer__logo">
						<img width="130" height="70" loading="lazy" src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
					</div>
				<?php endif ?>
				<?php if ( $copyright ): ?>
					<p class="pc-footer__copyright mb-0">© <?php echo date( "Y " ); ?><?php echo $copyright ?></p>
				<?php endif ?>
			</div>
		</div>
	</div>
</footer>
