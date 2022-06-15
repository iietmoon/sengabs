<div class="stx-info-box-wrapper">
	<?php if ( isset( $settings['icon'] ) && ! empty( $settings['icon']['value'] ) ) : ?>
		<div class="stx-m-icon-wrapper">
			<?php
			\StaxAddons\Utils::load_template(
				'widgets/info-box/templates/parts/icon',
				[
					'settings' => $settings,
				]
			);
			?>
		</div>
	<?php endif; ?>
	<div class="stx-m-content">
		<?php
		\StaxAddons\Utils::load_templates(
			[
				'widgets/info-box/templates/parts/subtitle',
				'widgets/info-box/templates/parts/title',
				'widgets/info-box/templates/parts/text',
			],
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
	<?php
	\StaxAddons\Utils::load_template(
		'widgets/info-box/templates/parts/button',
		[
			'settings' => $settings,
		]
	);
	?>
	<?php if ( 'yes' === $enable_link_overlay && ! empty( $link['url'] ) ) : ?>
		<a class="stx-m-link" href="<?php echo esc_url( $link['url'] ); ?>"></a>
	<?php endif; ?>
</div>
