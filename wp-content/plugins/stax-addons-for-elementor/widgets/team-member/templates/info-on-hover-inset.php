<div class="stx-info-on-hover-inset">
	<div class="stx-m-inner">
		<div class="stx-m-image">
			<?php
			\StaxAddons\Utils::load_template(
				'widgets/team-member/templates/parts/image',
				[
					'settings' => $settings,
				]
			);
			?>
		</div>
		<div class="stx-m-content">
			<?php
			\StaxAddons\Utils::load_templates(
				[
					'widgets/team-member/templates/parts/title',
					'widgets/team-member/templates/parts/role',
					'widgets/team-member/templates/parts/text',
					'widgets/team-member/templates/parts/social-icons',
				],
				[
					'settings' => $settings,
				]
			);
			?>
		</div>
	</div>
</div>
