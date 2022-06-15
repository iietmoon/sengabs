<div class="stx-team-member-wrapper">
	<?php
	\StaxAddons\Utils::load_template(
		'widgets/team-member/templates/' . $settings['layout'],
		[
			'settings' => $settings,
		]
	);
	?>
</div>
