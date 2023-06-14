<header class="pc-header">
	<div class="container">
		<div class="pc-header__inner">
			<a class="pc-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
				<?php if ( has_custom_logo() ) : ?>
					<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$image = wp_get_attachment_image_src( $custom_logo_id, 'full' );
					?>
					<img width="160" height="90" src="<?php echo $image[0] ?>" alt="<?php bloginfo( 'name' ); ?>"/>
				<?php else : ?>
					<?php bloginfo( 'name' ); ?>
				<?php endif ?>
			</a>

			<nav class="pc-main-nav">
				<?php
				wp_nav_menu(
					[
						'container'      => false,
						'menu_class'     => 'menu',
						'items_wrap'     => '<ul class="%2$s pc-top-menu">%3$s</ul>',
						'theme_location' => 'desktop_nav',
//					'depth'          => 1,
						'fallback_cb'    => false,
						'walker'         => new TopBarWalker(),
					]
				);
				?>
			</nav>
		</div>
	</div>
</header>
