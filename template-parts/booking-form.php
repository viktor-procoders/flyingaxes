<?php
$booking_form = get_field( 'booking_form', 'options' );
?>

<?php if ( ! empty( $booking_form ) ): ?>
	<div class="pc-lightbox" data-lightbox-content="booking-form">
		<div class="pc-lightbox__inner">
			<button class="pc-lightbox__close" data-close-lightbox>
				<svg width="20" height="20" viewBox="0 0 29 29" fill="none">
					<path d="M3.00008 3L26.0001 26" stroke="black" stroke-width="5" stroke-linecap="round"/>
					<path d="M26.0001 3L3.00003 26" stroke="black" stroke-width="5" stroke-linecap="round"/>
				</svg>
			</button>
			<div class="ratio ratio-16x9">
				<iframe loading="lazy" class="pc-iframe pc-iframe--booking" title="Embedded Content" name="booking" width="100%" height="100%"
				        src="<?php echo $booking_form ?>"></iframe>
			</div>
		</div>
	</div>
<?php endif ?>

