<?php
[
	'title'              => $title,
	'text'               => $text,
	'form'               => $form,
	'booking_assistance' => $booking_assistance,
	'thank_you_message'  => $thank_you_message,
] = get_field( 'event_form', 'options' );
?>

<?php if ( $form ): ?>
	<div class="pc-lightbox" data-lightbox-content="event-form">
		<div class="pc-lightbox__inner">
			<button class="pc-lightbox__close" data-close-lightbox>
				<svg width="20" height="20" viewBox="0 0 29 29" fill="none">
					<path d="M3.00008 3L26.0001 26" stroke="black" stroke-width="5" stroke-linecap="round"/>
					<path d="M26.0001 3L3.00003 26" stroke="black" stroke-width="5" stroke-linecap="round"/>
				</svg>
			</button>
			<div class="row">
				<div class="col-lg-7">
					<?php if ( $title ): ?>
						<h2 class="pc-lightbox__title"><?php echo $title ?></h2>
					<?php endif ?>
				</div>
				<div class="col-lg-5">
					<?php if ( $booking_assistance ): ?>
						<div class="pc-lightbox__booking-cta">
							<?php echo $booking_assistance ?>
						</div>
					<?php endif ?>
				</div>
			</div>
			<div class="pc-lightbox__form">
				<?php echo $form ?>
			</div>
			<div class="text-center thank-you-message" data-message>
				<?php if ( $thank_you_message ): ?>
					<?php echo $thank_you_message ?>
				<?php endif ?>
			</div>
		</div>
	</div>
<?php endif ?>
