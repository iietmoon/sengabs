<div class="swiper-container" <?php echo $autoplay; ?>>
	<div class="swiper-wrapper">
		<?php foreach ( $settings['list'] as $item ) : ?>
			<?php

			$target   = $item['list_btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $item['list_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			$align    = $item['align_horizontal'] ? 'sq-align-' . $item['align_horizontal'] : '';
			?>
			<div class="swiper-slide elementor-repeater-item-<?php echo $item['_id']; ?> <?php echo esc_attr( $align ); ?>">
				<?php if ( $item['list_title'] ) : ?>
					<h3><?php echo $item['list_title']; ?></h3>
				<?php endif; ?>

				<?php if ( $item['list_sub_title'] ) : ?>
					<div class="slide-subtitle"><?php echo $item['list_sub_title']; ?></div>
				<?php endif; ?>

				<?php if ( $item['list_description'] ) : ?>
					<div class="slide-description"><?php echo $item['list_description']; ?></div>
				<?php endif; ?>

				<?php if ( $item['list_btn_text'] ) : ?>
					<div class="slide-btn">
						<a href="<?php echo $item['list_btn_link']['url']; ?>" 
							<?php
							echo $target;
							echo $nofollow;
							?>
						>
							<?php echo $item['list_btn_text']; ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
	<?php if ( $settings['nav_pagination'] ) : ?>
		<div class="swiper-pagination"></div>
	<?php endif; ?>

	<?php if ( $settings['nav_arrows'] ) : ?>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	<?php endif; ?>
</div>
