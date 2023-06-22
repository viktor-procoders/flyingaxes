<div class="pc-offcanvas" data-offcanvas>
	<div class="pc-offcanvas__inner">
		<button class="pc-close-menu" data-close aria-label="Close mobile menu">
			<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M3.00008 3L26.0001 26" stroke="white" stroke-width="5" stroke-linecap="round"/>
				<path d="M26.0001 3L3.00003 26" stroke="white" stroke-width="5" stroke-linecap="round"/>
			</svg>
		</button>
		<?php
		wp_nav_menu(
			[
				'container'      => false,
				'menu_class'     => 'menu',
				'items_wrap'     => '<ul class="%2$s pc-offcanvas-menu">%3$s</ul>',
				'theme_location' => 'desktop_nav',
				//'depth'        => 1,
				'fallback_cb'    => false,
				'walker'         => new TopBarWalker(),
			]
		);
		?>
	</div>
</div>
