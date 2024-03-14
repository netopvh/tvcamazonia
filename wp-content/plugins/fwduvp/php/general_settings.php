<fieldset class="ui-widget select-header fwduvp">
	<label for="skins"><?php esc_html_e('Select your preset:', 'fwduvp'); ?></label>
	<select id="skins" class="ui-widget ui-corner-all"></select>
	
	<label for="startBH"><?php esc_html_e('Video player start behaviour:', 'fwduvp'); ?></label>
	<select id="startBH" class="ui-widget ui-corner-all">
		<option value="stop"><?php esc_html_e('stop', 'fwduvp'); ?></option>
		<option value="default"><?php esc_html_e('default', 'fwduvp'); ?></option>
		<option value="pause"><?php esc_html_e('pause', 'fwduvp'); ?></option>
	</select>

	<img class="fwdtooltip img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If set to pause and more then one instance is used all instances will pause except the current playing instance otherwise if set to stop all instances will stop playing and stop the download precess except the current playing instance. If default is used when playing one instance will not stop or pause other instances.', 'fwduvp'); ?>">

    <p id="tips">All form fields are required.</p>
</fieldset>

<form action="" class="form fwduvp" method="post">
	<div id="tabs">
	  	<ul class="menu">
		    <li><a href="#tab1"><img src=<?php echo esc_url($fwduvpIconsPath . "tab1-icon.png"); ?>><span><?php esc_html_e('Main settings', 'fwduvp'); ?></span></a></li>
		    <li><a href="#tab2"><img src=<?php echo esc_url($fwduvpIconsPath . "tab2-icon.png"); ?>><span><?php esc_html_e('Controller settings', 'fwduvp'); ?></span></a></li>
		    <li><a href="#tab3"><img src=<?php echo esc_url($fwduvpIconsPath . "tab3-icon.png"); ?>><span><?php esc_html_e('Playlists window settings', 'fwduvp'); ?></span></a></li>
		    <li><a href="#tab4"><img src=<?php echo esc_url($fwduvpIconsPath . "tab4-icon.png"); ?>><span><?php esc_html_e('Playlist settings', 'fwduvp'); ?></span></a></li>
		    <li><a href="#tab5"><img src=<?php echo esc_url($fwduvpIconsPath . "tab5-icon.png"); ?>><span><?php esc_html_e('Logo settings', 'fwduvp'); ?></span></a></li>
		    <li><a href="#tab6"><img src=<?php echo esc_url($fwduvpIconsPath . "tab6-icon.png"); ?>><span><?php esc_html_e('Embed and info windows settings', 'fwduvp'); ?></span></a></li>
		    <li><a href="#tab7"><img src=<?php echo esc_url($fwduvpIconsPath . "tab7-icon.png"); ?>><span><?php esc_html_e('Ads settings', 'fwduvp'); ?></span></a></li>
			<li><a href="#tab8"><img src=<?php echo esc_url($fwduvpIconsPath . "tab6-icon.png"); ?>><span><?php esc_html_e('Advertisement window on pause settings', 'fwduvp'); ?></span></a></li>
			<li><a href="#tab9"><img src=<?php echo esc_url($fwduvpIconsPath . "sticky-icon.png"); ?>><span><?php esc_html_e('Sticky display type setting', 'fwduvp'); ?>s</span></a></li>
			<li><a href="#tab10"><img src=<?php echo esc_url($fwduvpIconsPath . "lightbox-icon.png"); ?>><span><?php esc_html_e('Lightbox display type settings', 'fwduvp'); ?></span></a></li>
			<li><a href="#tab11"><img src=<?php echo esc_url($fwduvpIconsPath . "ab-icon.png"); ?>><span><?php esc_html_e('A to B loop settings', 'fwduvp'); ?></span></a></li>
			<li><a href="#tab12"><img src=<?php echo esc_url($fwduvpIconsPath . "thumbnials-preview-icon.png"); ?>><span><?php esc_html_e('Thumbnails preview', 'fwduvp'); ?></span></a></li>
			<li><a href="#tab13"><img src=<?php echo esc_url($fwduvpIconsPath . "right-click-icon.png"); ?>><span><?php esc_html_e('Right click context menu', 'fwduvp'); ?></span></a></li>
			<li><a href="#tab14"><img src=<?php echo esc_url($fwduvpIconsPath . "fps.png"); ?>><span><?php esc_html_e('Fingerprint Stamp', 'fwduvp'); ?></span></a></li>
	  	</ul>

	  	<div id="tab1" class="tab">
			<table>
    			<tr>
		    		<td>
		    			<label for="name"><?php esc_html_e('Preset name:', 'fwduvp'); ?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="name" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="skin_path"><?php esc_html_e('Skin type:', 'fwduvp'); ?></label>
		    		</td>
		    		<td>
						<?php if(preg_match('/acora/', FWDUVP_TEXT_DOMAIN)): ?>
						<select id="skin_path" class="ui-corner-all" dsisabled>
							<option value="acora_skin"><?php esc_html_e('Acora skin', 'fwduvp'); ?></option>
						</select>
						<?php else: ?>
		    			<select id="skin_path" class="ui-corner-all">
							<option value="minimal_skin_dark">minimal-skin-dark</option>
							<option value="modern_skin_dark">modern-skin-dark</option>
							<option value="classic_skin_dark">classic-skin-dark</option>
							<option value="metal_skin_dark">metal-skin-dark</option>
							<option value="minimal_skin_white">minimal-skin-white</option>
							<option value="modern_skin_white">modern-skin-white</option>
							<option value="classic_skin_white">classic-skin-white</option>
							<option value="metal_skin_white">metal-skin-white</option>
							<option value="hex_dark">hex-dark</option>
							<option value="hex_white">hex-white</option>
						</select>
						<?php endif; ?>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="googleAnalyticsMeasurementId"><?php esc_html_e('Google analytics measurement id:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="googleAnalyticsMeasurementId" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If you want to use google analytics set this option to the google analytics tracking code otherwise leave it blank.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="useVectorIcons"><?php esc_html_e('Use vector icons:', 'fwduvp'); ?></label>
		    		</td>
		    		<td>
		    			<select id="useVectorIcons" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this option to yes to use vector based icons for the buttons.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="showErrorInfo"><?php esc_html_e('Show error / info window:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showErrorInfo" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this to no if you do\'t want the error / info window appear and display the error to the user.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="initializeOnlyWhenVisible"><?php esc_html_e('Initialize only when visible:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="initializeOnlyWhenVisible" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Lazy scrolling / loading, the posibility to initialize UVP on scroll when the player is visible in the page, this way for example if the player is in a section of a webpage that is not visible it will not be initialized / play, instead UVP will be initalized / play only when the user is scrolling to that section in which the player is added.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="stickyOnScroll"><?php esc_html_e('Use sticky on scroll:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="stickyOnScroll" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this to yes to keep UVP visible when it is outside the viewport otherwise leave it to no.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="stickyOnScrollShowOpener"><?php esc_html_e('Show sticky on scroll open / close button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="stickyOnScrollShowOpener" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Use or not the show or hide button when then player is in sticky on scroll mode.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="stickyOnScrollWidth"><?php esc_html_e('Sticky on scroll player maximum width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="stickyOnScrollWidth" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This value represents the player maximum width in px units for the player when it is in sticky on scroll mode, think of this property as it would be the \'max-width\' CSS property.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="stickyOnScrollHeight"><?php esc_html_e('Sticky on scroll player maximum height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="stickyOnScrollHeight" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This value represents the player maximum height in px units for the player when it is in sticky on scroll mode, think of this property as it would be the \'max-height\' CSS property.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="display_type"><?php esc_html_e('Display type:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="display_type" class="ui-corner-all">
							<option value="responsive"><?php esc_html_e('responsive', 'fwduvp');?></option>
							<option value="sticky"><?php esc_html_e('sticky', 'fwduvp');?></option>
							<option value="fullscreen"><?php esc_html_e('fullscreen', 'fwduvp');?></option>
							<option value="lightbox"><?php esc_html_e('lightbox', 'fwduvp');?></option>
							<option value="afterparent"><?php esc_html_e('after parent', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="use_deeplinking"><?php esc_html_e('Use deeplinking:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="use_deeplinking" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This allows or not deeplinking (an unique URL for each video).', 'fwduvp'); ?>">
		    		</td>					
		    	</tr>
				<tr>
		    		<td>
		    			<label for="fill_entire_video_screen"><?php esc_html_e('Fill entire video screen:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="fill_entire_video_screen" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This feature will allow to fill the gaps of the video player.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="fillEntireposterScreen"><?php esc_html_e('Fill entire poster screen:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="fillEntireposterScreen" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This feature will allow to fill the gaps of the video player poster.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
			</table>
			<table>
				<tr>
		    		<td>
		    			<label for="goFullScreenOnButtonPlay"><?php esc_html_e('Go fullscreen on play:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="goFullScreenOnButtonPlay" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If this feature is set to yes when the play button is clicked or tapped the player will start playing the video and go in fullscreen at the same time.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="playsinline"><?php esc_html_e('Playsinline:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="playsinline" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This affects only mobile devices, if you want the player to go fullscreen and use the device dfault player when the play button is tapped set this to yes otherwise leave it to no and the player will play inline just like on a desktop machine.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="useResumeOnPlay"><?php esc_html_e('Use resume / remember on play:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="useResumeOnPlay" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Enable / disable the  resume / remember function which marks the last play position of the video when the browser is closed and remembers it when you come back to watch video again.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="use_HEX_colors_for_skin"><?php esc_html_e('Use HEX / CSS colors:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="use_HEX_colors_for_skin" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This feature allows to add hexadecimal colors to all buttons and some player elements just like it\'s done with CSS and even more, we have done it in a cool way that all graphics will retain the texture and at the same time apply the chosen color. Please note that this feature will work with all skins but we created a custom dark skin and a custom white skin specially for this, I suggest to use this skins, if you are using a dark theme set the \'Skin type:\' option to hex_dark if is the white theme set \'Skin type:\' to hex_white , both skins can be found in the plugin directory wp-plugins/fwduvp/content.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="normal_HEX_buttons_color"><?php esc_html_e('Normal HEX / CSS color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="normal_HEX_buttons_color" />
		    		</td>
		    	</tr>
			
				<tr>
		    		<td>
		    			<label for="add_keyboard_support"><?php esc_html_e('Add keyboard support:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="add_keyboard_support" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="auto_scale"><?php esc_html_e('Autoscale:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="auto_scale" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_buttons_tooltips"><?php esc_html_e('Show buttons tooltips:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_buttons_tooltips" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="stop_video_when_play_complete"><?php esc_html_e('Stop video when play complete:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="stop_video_when_play_complete" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
					<td>
		    			<label for="subtitles_off_label"><?php esc_html_e('Subtitle off label:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="subtitles_off_label" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="autoplay"><?php esc_html_e('Autoplay:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="autoplay" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="autoPlayText"><?php esc_html_e('Autoplay button text:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="autoPlayText" class="text ui-widget-content ui-corner-all">
		    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The autoplay button text will appear if autoplay is set to yes, in a button on the top left player side, when clicked the volume will be unmuted. If you don\'t want this button leave the input empty/blank.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	
				<tr>
		    		<td>
		    			<label for="loop"><?php esc_html_e('Loop:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="loop" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="shuffle"><?php esc_html_e('Shuffle:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="shuffle" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    </table>
			<table>
				<tr>
		    		<td>
		    			<label for="show_popup_ads_close_button"><?php esc_html_e('Show popup commercial ads close button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_popup_ads_close_button" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="max_width"><?php esc_html_e('Player maximum width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="max_width" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This value represents the player maximum width in px units, think of this property as it would be the \'max-width\' CSS property.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="max_height"><?php esc_html_e('Player maximum height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="max_height" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This value represents the player maximum height in px units, think of this property as it would be the \'max-height\' CSS property.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="volume"><?php esc_html_e('Volume:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="volume" class="text ui-widget-content ui-corner-all">
		    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is the volume level of the player. It must be a float value between 0 and 1', 'fwduvp'); ?>">
		    		</td>
		    	</tr>

		    	<tr>
		    		<td>
		    			<label for="rewindTime"><?php esc_html_e('Rewind time:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="rewindTime" class="text ui-widget-content ui-corner-all">
		    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The rewind time in seconds.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	
				<tr>
		    		<td>
		    			<label for="bg_color"><?php esc_html_e('Background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="bg_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="video_bg_color"><?php esc_html_e('Video background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="video_bg_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="poster_bg_color"><?php esc_html_e('Poster background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="poster_bg_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="buttons_tooltip_hide_delay"><?php esc_html_e('Buttons tooltip hide delay:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="buttons_tooltip_hide_delay" class="text ui-widget-content ui-corner-all">
		    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a float number that represents the duration in seconds until the tooltip button is showed on mouse hover.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="buttons_tooltip_font_color"><?php esc_html_e('Buttons tooltip font color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="buttons_tooltip_font_color" />
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="defaultPlaybackRate"><?php esc_html_e('Playback rate / speed:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="defaultPlaybackRate" class="ui-corner-all">
							<option value="0.25">0.25</option>
							<option value="0.5">0.5</option>
							<option value="1">1</option>
							<option value="1.25">1.25</option>
							<option value="1.5">1.5</option>
							<option value="2">2</option>
						</select>
		    		</td>
		    	</tr>				
				
				<tr>
		    		<td>
		    			<label for="privateVideoPassword"><?php esc_html_e('Global private videos password:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="privateVideoPassword" class="text ui-widget-content ui-corner-all">
		    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The global password for private videos.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				
				
				<tr>
					<td>
						<label for="showPreloader"><?php esc_html_e('Show preloader:', 'fwduvp');?></label>
					</td>
					<td>
						<select id="showPreloader" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this to no to disable the counting time preloader.', 'fwduvp'); ?>">
					</td>
				</tr>
				
				<tr>
		    		<td>
		    			<label for="preloaderColor1"><?php esc_html_e('Preloader color 1:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="preloaderColor1" />
		    		</td>
		    	</tr>
			</table>
			
			<table>
				<tr>
		    		<td>
		    			<label for="preloaderColor2"><?php esc_html_e('Preloader color 2:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="preloaderColor2" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="showDefaultControllerForVimeo"><?php esc_html_e('Show UVP controller when playing Vimeo videos:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showDefaultControllerForVimeo" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Normal vimeo videos do not allow to remove the player default controlls so leave this option to no, if you are using vimeo pro video and disabled the vimeo video controller set this to yes this way the UVP controller can be used.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>

		    	<tr>
		    		<td>
		    			<label for="playIfLoggedIn"><?php esc_html_e('Play video only when loggedin:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="playIfLoggedIn" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="loggedInMessage"><?php esc_html_e('Message to show if user is not loggedin:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="loggedInMessage" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="executeCuepointsOnlyOnce"><?php esc_html_e('Execute cuepoints only once:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="executeCuepointsOnlyOnce" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>

		    	<tr>
		    		<td>
		    			<label for="audioVisualizerLinesColor"><?php esc_html_e('Audio visualizer lines color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="audioVisualizerLinesColor" />
		    		</td>
		    	</tr>

		    	<tr>
		    		<td>
		    			<label for="audioVisualizerCircleColor"><?php esc_html_e('Audio visualizer circle color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="audioVisualizerCircleColor" />
		    		</td>
		    	</tr>
			</table>
		</div>
	  
		<div id="tab2" class="tab">
		  	<table>
		  		<tr>
		    		<td>
		    			<label for="showController"><?php esc_html_e('Show controller:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showController" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_controller_when_video_is_stopped"><?php esc_html_e('Show controller when video is stopped:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_controller_when_video_is_stopped" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_next_and_prev_buttons_in_controller"><?php esc_html_e('Show next and previous buttons in controller:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_next_and_prev_buttons_in_controller" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_volume_button"><?php esc_html_e('Show volume button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_volume_button" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_time"><?php esc_html_e('Show time:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_time" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="showPlaybackRateButton"><?php esc_html_e('Show playback rate / speed button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showPlaybackRateButton" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="showRewindButton"><?php esc_html_e('Show rewind 10 seconds button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showRewindButton" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_youtube_quality_button"><?php esc_html_e('Show Youtube quality button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_youtube_quality_button" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_info_button"><?php esc_html_e('Show info button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_info_button" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_download_button"><?php esc_html_e('Show download button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_download_button" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_share_button"><?php esc_html_e('Show share button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_share_button" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_embed_button"><?php esc_html_e('Show embed button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_embed_button" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show360DegreeVideoVrButton"><?php esc_html_e('Show 360 degree VR button:', 'fwdevp'); ?></label>
		    		</td>
		    		<td>
		    			<select id="show360DegreeVideoVrButton" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwdevp'); ?></option>
							<option value="no"><?php esc_html_e('no', 'fwdevp'); ?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('To enable vr for 360 videos set this feature to yes otherwise leave it to no.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="showChromecastButton"><?php esc_html_e('Show chromecast button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showChromecastButton" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Show or hide the chormecast button (this only works on google chrome and a https protocol).', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
			</table>

			<table>
				<tr>
		    		<td>
		    			<label for="showSubtitleButton"><?php esc_html_e('Show subtitle button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showSubtitleButton" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Show or hide the subtitle button, this only applies if the video has one or more subtitle files.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="showAudioTracksButton"><?php esc_html_e('Show audio tracks button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showAudioTracksButton" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Support for HLS .m3u8 and video / mp4 multiple audio tracks, please note that for .mp4 / video this feature is limited by browser support, browsers that do not have support for the HTMLMediaElement.audioTracks video property will not display the headphone button that allows changing the video audio track.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_fullscreen_button"><?php esc_html_e('Show fullscreen button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_fullscreen_button" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="disable_video_scrubber"><?php esc_html_e('Disable video scrubber:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="disable_video_scrubber" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="repeat_background"><?php esc_html_e('Repeat background:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="repeat_background" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This option is like the CSS \'background-repeat\' property for the controller background image. If set to \'no\' it will expand the image to fill the controller size.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="showMainScrubberToolTipLabel"><?php esc_html_e('Show main scrubber tooltip:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showMainScrubberToolTipLabel" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="showScrubberWhenControllerIsHidden"><?php esc_html_e('Show scrubber when controller is hidden:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showScrubberWhenControllerIsHidden" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Show or hide the video scrubbar when the video controller is hidden.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>

		    	<tr>
		    		<td>
		    			<label for="showYoutubeRelAndInfo"><?php esc_html_e('Show Youtube UI elements:', 'fwdevp'); ?></label>
		    		</td>
		    		<td>
		    			<select id="showYoutubeRelAndInfo" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwdevp'); ?></option>
							<option value="no"><?php esc_html_e('no', 'fwdevp'); ?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Show or hide the YouTube UI elements (Title/Share/Watch later/Related videos/Logo).', 'fwdevp'); ?>">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="scrubbersToolTipLabelBackgroundColor"><?php esc_html_e('Main scrubber tooltip background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="scrubbersToolTipLabelBackgroundColor" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="scrubbersToolTipLabelFontColor"><?php esc_html_e('Main scrubber tooltip font color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="scrubbersToolTipLabelFontColor" />
		    		</td>
		    	</tr>
	    		<tr>
		    		<td>
		    			<label for="controller_height"><?php esc_html_e('Controller height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="controller_height" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="controller_hide_delay"><?php esc_html_e('Controller hide delay:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="controller_hide_delay" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the seconds until the control bar is hiding after a period of inactivity.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="start_space_between_buttons"><?php esc_html_e('Start space between buttons:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="start_space_between_buttons" class="text ui-widget-content ui-corner-all">
		    			<img src="<?php echo esc_url($tootlTipImgSrc); ?>" id="start_space_between_buttons_img"  title="">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="space_between_buttons"><?php esc_html_e('Space between buttons:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="space_between_buttons" class="text ui-widget-content ui-corner-all">
		    			<img src="<?php echo esc_url($tootlTipImgSrc); ?>" id="space_between_buttons_img" title="">
		    		</td>
		    	</tr>
			</table>
			<table>
				<tr>
		    		<td>
		    			<label for="scrubbers_offset_width"><?php esc_html_e('Scrubbers offset width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="scrubbers_offset_width" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the total amount in pixels removed from the scrubber bars when they are at the end (useful based on the skin type).', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_scrubber_offest_top"><?php esc_html_e('Main scrubber offset top:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="main_scrubber_offest_top" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is the amount in pixels to push the main scrubber up when the controller is hiding.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="time_offset_left_width"><?php esc_html_e('Time offset left width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="time_offset_left_width" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents an addition in px to the space between the time indicator left side and the scrubber.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="time_offset_right_width"><?php esc_html_e('Time offset right width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="time_offset_right_width" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents an addition in px to the space between the time indicator right side and the volume button or any other button that will follow the time indicator.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="volume_scrubber_height"><?php esc_html_e('Volume scrubber height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="volume_scrubber_height" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the height of the volume scrubber.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="time_offset_top"><?php esc_html_e('Time offset top:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="time_offset_top" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents an addition in px to the time position on the y axis.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="volume_scrubber_ofset_height"><?php esc_html_e('Volume scrubber offset height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="volume_scrubber_ofset_height" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the extra offset height added to the volume scrubber.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="time_color"><?php esc_html_e('Time color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="time_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="youtube_quality_button_normal_color"><?php esc_html_e('Youtube quality button normal color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="youtube_quality_button_normal_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="youtube_quality_button_selected_color"><?php esc_html_e('Youtube quality button selected color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="youtube_quality_button_selected_color" />
		    		</td>
		    	</tr>
			</table>
		</div>
	
		<div id="tab3" class="tab">
			
			<table>
				
				<tr>
		    		<td>
		    			<label for="showPlaylistsSearchInput"><?php esc_html_e('Show playlists search box input:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showPlaylistsSearchInput" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
					
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="use_playlists_select_box"><?php esc_html_e('Show playlists select / combo-box:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="use_playlists_select_box" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If this is set to \'yes\' the playlists select / combo-box is showed as soon as the player is loaded and displayed.', 'fwduvp'); ?>">
		    		</td>
					
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_playlists_button_and_playlists"><?php esc_html_e('Show playlists button and playlists:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_playlists_button_and_playlists" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_playlists_by_default"><?php esc_html_e('Show playlists by default:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_playlists_by_default" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If this is set to \'yes\' the playlists window is showed as soon as the player is loaded and displayed.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="thumbnail_selected_type"><?php esc_html_e('Thumbnail selected type:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="thumbnail_selected_type" class="ui-corner-all">
							<option value="opacity"><?php esc_html_e('opacity', 'fwduvp');?></option>
							<option value="threshold"><?php esc_html_e('threshold', 'fwduvp');?></option>
							<option value="blackAndWhite"><?php esc_html_e('black-and-white', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This represents the playlist thumbnail selected state (please note that this setting is always \'opacity\' when tested locally or on a mobile device).', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="youtubePlaylistAPI"><?php esc_html_e('Youtube playlist API key:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="youtubePlaylistAPI" class="text ui-widget-content ui-corner-all">
		    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This the youtube API key required to load youtube playlists or channels, please refer to documentation about info for getting this key.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="start_at_playlist"><?php esc_html_e('Start at playlist:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="start_at_playlist" class="text ui-widget-content ui-corner-all">
		    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the playlist number that will be loaded when the player loads the first time. If deeplinking is used and the browser URL has a playlist link this option is ignored. The playlists count starts from 0 (zero).', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="buttons_margins"><?php esc_html_e('Buttons margins:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="buttons_margins" class="text ui-widget-content ui-corner-all">
		    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the margins offset for the prev, next and close buttons from the playlists window.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumbnail_max_width"><?php esc_html_e('Thumbnail maximum width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumbnail_max_width" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumbnail_max_height"><?php esc_html_e('Thumbnail maximum height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumbnail_max_height" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="horizontal_space_between_thumbnails"><?php esc_html_e('Horizontal space between thumbnails:', 'fwduvp');?></label></label>
		    		</td>
		    		<td>
		    			<input type="text" id="horizontal_space_between_thumbnails" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="vertical_space_between_thumbnails"><?php esc_html_e('Vertical space between thumbnails:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="vertical_space_between_thumbnails" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_selector_background_selected_color"><?php esc_html_e('Combo-box selector background selected color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="main_selector_background_selected_color" />
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="main_selector_text_normal_color"><?php esc_html_e('Combo-box selector text normal color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="main_selector_text_normal_color" />
		    		</td>
		    	</tr>
		    </table>
			<table>
				<tr>
		    		<td>
		    			<label for="main_selector_text_selected_color"><?php esc_html_e('Combo-box selector text selected color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="main_selector_text_selected_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_button_background_normal_color"><?php esc_html_e('Combo-box button background normal color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="main_button_background_normal_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_button_background_selected_color"><?php esc_html_e('Combo-box button background selected color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="main_button_background_selected_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_button_text_normal_color"><?php esc_html_e('Combo-box button text normal color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="main_button_text_normal_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_button_text_selected_color"><?php esc_html_e('Combo-box button text selected color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="main_button_text_selected_color" />
		    		</td>
		    	</tr>
			</table>
		</div>
			
		<div id="tab4" class="tab">
			<table>
		    	<tr>
		    		<td>
		    			<label for="show_playlist_button_and_playlist"><?php esc_html_e('Show playlist button and playlist:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_playlist_button_and_playlist" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="playlist_position"><?php esc_html_e('Playlist position:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="playlist_position" class="ui-corner-all">
							<option value="right">right</option>
							<option value="bottom">bottom</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_playlist_by_default"><?php esc_html_e('Show playlist by default:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_playlist_by_default" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If this is set to \'yes\' the playlist is showed as soon as the player is loaded and displayed otherwise the playlist is hidden and it will only appear if the playlist button is clicked or touched.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="showPlaylistOnFullScreen"><?php esc_html_e('Show playlist on fullscreen:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showPlaylistOnFullScreen" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('By default when the player is in fullscreen the playlist is hidden and not allowed to be viewed. Set this option to yes if you want the playlist to be visible  in fullscreen, otherwise leave it to no (please note that if the browser viewport width is smaller then 1000px then this option will be ignored becuase there is not enough space to display both the player and the playlist).', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	
		    	<tr>
		    		<td>
		    			<label for="showThumbnail"><?php esc_html_e('Show playlist thumbnails:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showThumbnail" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="showOnlyThumbnail"><?php esc_html_e('Show only playlist thumbnails:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showOnlyThumbnail" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This feature will only show the thumbnails without text, please don\'t forget to set the thumbnail width and thumbnail height to the size that you want.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	
		    	<tr>
		    		<td>
		    			<label for="show_playlist_name"><?php esc_html_e('Show playlist name:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_playlist_name" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="randomizePlaylist"><?php esc_html_e('Randomize playlist:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="randomizePlaylist" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this to yes if you want the playlist to be shuffled / random when first loaded.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_search_input"><?php esc_html_e('Show search input:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_search_input" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="show_loop_button"><?php esc_html_e('Show loop button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_loop_button" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_shuffle_button"><?php esc_html_e('Show shuffle button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_shuffle_button" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="show_next_and_prev_buttons"><?php esc_html_e('Show next and previous buttons:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_next_and_prev_buttons" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="force_disable_download_button_for_folder"><?php esc_html_e('Disable download button for folder:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="force_disable_download_button_for_folder" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="add_mouse_wheel_support"><?php esc_html_e('Add mouse wheel support:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="add_mouse_wheel_support" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>	
			</table>

			<table>
				<tr>
		    		<td>
		    			<label for="start_at_random_video"><?php esc_html_e('Start at random video:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="start_at_random_video" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="stopAfterLastVideoHasPlayed"><?php esc_html_e('Stop after last video in the playlist has played:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="stopAfterLastVideoHasPlayed" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('By default when the last video in the playlist has finished playing UVP will start playing the fist video fro the playlist, if you want to stop the video after the last video in the playlist has finished playing set this option to yes.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="addScrollOnMouseMove"><?php esc_html_e('Scroll playlist on mouse move:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="addScrollOnMouseMove" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="playAfterVideoStop"><?php esc_html_e('Play next video after video is stopped:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="playAfterVideoStop" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If the video is set to stop at a specific time by default it will stop but if you want to skip to the next video set this feature to yes.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>

				<tr>
		    		<td>
		    			<label for="playlist_right_width"><?php esc_html_e('Playlist right width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="playlist_right_width" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the playlist width when it is positioned at the right.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="playlist_bottom_height"><?php esc_html_e('Playlist bottom height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="playlist_bottom_height" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the playlist height when it is positioned at the bottom.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="start_at_video"><?php esc_html_e('Start at video:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="start_at_video" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the video number that will be loaded when the player loads the first time. If deeplinking is used and the browser URL has a playlist link this option is ignored. The videos count starts from 0 (zero).', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="max_playlist_items"><?php esc_html_e('Maximum playlist items:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="max_playlist_items" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This option is useful if the number of playlist items needs to be limited, for example if a playlist is loaded from Youtube and it has 1000 videos it will be too large to display so the playlist will display only 100 videos. If you want to load the total available number of videos without limitation just set this number to a large number like 10000.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="thumbnail_width"><?php esc_html_e('Thumbnail width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumbnail_width" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the thumbnails width in pixels.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="thumbnail_height"><?php esc_html_e('Thumbnail height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumbnail_height" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the thumbnails height in pixels.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="space_between_controller_and_playlist"><?php esc_html_e('Space between controller and playlist:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="space_between_controller_and_playlist" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the space in pixels between the video control bar and playlist.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="space_between_thumbnails"><?php esc_html_e('Space between thumbnails:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="space_between_thumbnails" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the vertical space in pixels between thumbnails.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="scrollbar_offest_width"><?php esc_html_e('Scrollbar offset width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="scrollbar_offest_width" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the width to remove from the playlist total width to make room for the playlist scrollbar.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="scollbar_speed_sensitivity"><?php esc_html_e('Scrollbar speed sensitivity:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="scollbar_speed_sensitivity" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This is a number that represents the scrollbar speed sensitivity. It must be a float value between 0 and 1.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
			</table>
			
			<table>
				<tr>
		    		<td>
		    			<label for="playlist_background_color"><?php esc_html_e('Playlist background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="playlist_background_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="playlist_name_color"><?php esc_html_e('Playlist name color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="playlist_name_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="thumbnail_normal_background_color"><?php esc_html_e('Thumbnail normal background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="thumbnail_normal_background_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="thumbnail_hover_background_color"><?php esc_html_e('Thumbnail hover background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="thumbnail_hover_background_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="thumbnail_disabled_background_color"><?php esc_html_e('Thumbnail disabled background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="thumbnail_disabled_background_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="search_input_background_color"><?php esc_html_e('Search input background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="search_input_background_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="search_input_color"><?php esc_html_e('Search input color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="search_input_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="youtube_and_folder_video_title_color"><?php esc_html_e('Youtube and folder video title color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="youtube_and_folder_video_title_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="youtube_owner_color"><?php esc_html_e('Youtube owner color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="youtube_owner_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="youtube_description_color"><?php esc_html_e('Youtube description color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="youtube_description_color" />
		    		</td>
		    	</tr>
		    </table>
		</div>
		
		<div id="tab5" class="tab">
			<table>
				<tr>
		    		<td>
		    			<label for="show_logo"><?php esc_html_e('Show logo:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="show_logo" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="hide_logo_with_controller"><?php esc_html_e('Hide logo with controller:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="hide_logo_with_controller" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="logo_position"><?php esc_html_e('Logo position:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="logo_position" class="ui-corner-all">
							<option value="topRight"><?php esc_html_e('top-right', 'fwduvp');?></option>
							<option value="topLeft"><?php esc_html_e('top-left', 'fwduvp');?></option>
							<option value="bottomRight"><?php esc_html_e('bottom-right', 'fwduvp');?></option>
							<option value="bottomLeft"><?php esc_html_e('bottom-left', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="logo_path"><?php esc_html_e('Logo path:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="logo_path" class="text ui-widget-content ui-corner-all">
		    			<button id="uvp_logo_image_btn"><?php esc_html_e('Add Image', 'fwduvp');?></button>
		    		</td>
		    		<td>
						<img src="" id="uvp_logo_upload_img">
					</td>
		    	</tr>	    		
				<tr>
		    		<td>
		    			<label for="logo_link"><?php esc_html_e('Logo link:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="logo_link" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="logoTarget"><?php esc_html_e('Logo click target:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="logoTarget" class="ui-corner-all">
							<option value="_self"><?php esc_html_e('_self', 'fwduvp');?></option>
							<option value="_blank"><?php esc_html_e('_blank', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	
				<tr>
		    		<td>
		    			<label for="logo_margins"><?php esc_html_e('Logo margins:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="logo_margins" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
			</table>
		</div>
		
		<div id="tab6" class="tab">
			<table>
				<tr>
		    		<td>
		    			<label for="embed_and_info_window_close_button_margins"><?php esc_html_e('Embed and info window close button margins:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="embed_and_info_window_close_button_margins" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="borderColor"><?php esc_html_e('Border color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="borderColor" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_labels_color"><?php esc_html_e('Main labels color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="main_labels_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="secondary_labels_color"><?php esc_html_e('Secondary labels color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="secondary_labels_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="share_and_embed_text_color"><?php esc_html_e('Share and embed text color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="share_and_embed_text_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="input_background_color"><?php esc_html_e('Input background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="input_background_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="input_color"><?php esc_html_e('Input color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="input_color" />
		    		</td>
		    	</tr>
			</table>
			
			<img src=<?php echo $this->_dir_url . "content/spaces/embedWindow.jpg" ?>>
		</div>
		
		<div id="tab7" class="tab">
			<table>
				<tr>
		    		<td>
		    			<label for="open_new_page_at_the_end_of_the_ads"><?php esc_html_e('Open new page at the end of the ads:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="open_new_page_at_the_end_of_the_ads" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="play_ads_only_once"><?php esc_html_e('Play ads only once:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="play_ads_only_once" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="ads_buttons_position"><?php esc_html_e('Ads buttons position:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="ads_buttons_position" class="ui-corner-all">
							<option value="left"><?php esc_html_e('left', 'fwduvp');?></option>
							<option value="right"><?php esc_html_e('right', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="skip_to_video_text"><?php esc_html_e('Skip to video text:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="skip_to_video_text" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="skip_to_video_button_text"><?php esc_html_e('Skip to video button text:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="skip_to_video_button_text" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="ads_text_normal_color"><?php esc_html_e('Ads text normal color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="ads_text_normal_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="ads_text_selected_color"><?php esc_html_e('Ads text selected color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="ads_text_selected_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="ads_border_normal_color"><?php esc_html_e('Ads border normal color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="ads_border_normal_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="ads_border_selected_color"><?php esc_html_e('Ads border selected color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="ads_border_selected_color" />
		    		</td>
		    	</tr>
			</table>
		</div>
		
		<div id="tab8" class="tab">
			<table>
				<tr>
		    		<td>
		    			<label for="aopwTitle"><?php esc_html_e('Title:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="aopwTitle" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="aopwWidth"><?php esc_html_e('Maximum width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="aopwWidth" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="aopwHeight"><?php esc_html_e('Maximum height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="aopwHeight" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="aopwBorderSize"><?php esc_html_e('Advertisement border size:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="aopwBorderSize" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="aopwTitleColor"><?php esc_html_e('Title color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="aopwTitleColor" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				
			</table>
		</div>
		
		<div id="tab9" class="tab">
			<table>
				
				<tr>
		    		<td>
		    			<label for="showPlayerByDefault"><?php esc_html_e('Show player by default:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showPlayerByDefault" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="animatePlayer"><?php esc_html_e('Animate player:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="animatePlayer" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="showOpener"><?php esc_html_e('Show opener:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showOpener" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="showOpenerPlayPauseButton"><?php esc_html_e('Show opener play / pause button:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showOpenerPlayPauseButton" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="openerAlignment"><?php esc_html_e('Opener alignment:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="openerAlignment" class="ui-corner-all">
							<option value="left"><?php esc_html_e('left', 'fwduvp');?></option>
							<option value="right"><?php esc_html_e('right', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				
				
				<tr>
		    		<td>
		    			<label for="verticalPosition"><?php esc_html_e('Player vertical position:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="verticalPosition" class="ui-corner-all">
							<option value="bottom"><?php esc_html_e('bottom', 'fwduvp');?></option>
							<option value="top"><?php esc_html_e('top', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="horizontalPosition"><?php esc_html_e('Player horizontal position:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="horizontalPosition" class="ui-corner-all">
							<option value="left"><?php esc_html_e('left', 'fwduvp');?></option>
							<option value="center"><?php esc_html_e('center', 'fwduvp');?></option>
							<option value="right"><?php esc_html_e('right', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
				
    			<tr>
		    		<td>
		    			<label for="openerEqulizerOffsetTop"><?php esc_html_e('Equalizer offset top:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="openerEqulizerOffsetTop" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This number represents the opener equalizer left offset (left margin).', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				
    			<tr>
		    		<td>
		    			<label for="openerEqulizerOffsetLeft"><?php esc_html_e('Equalizer offset left:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="openerEqulizerOffsetLeft" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This number represents the opener equalizer top offset (top margin).', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="offsetX"><?php esc_html_e('Offset X:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="offsetX" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This value represents an offset in px on the x axis, basically if you want to push the player a few px on the x axis from it\'s position you can do it by modifying this option.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="offsetY"><?php esc_html_e('Offset Y:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="offsetY" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This value represents an offset in px on the y axis, basically if you want to push the player a few px on the y axis from it\'s position you can do it by modifying this option.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="uvp_mainBackgroundImagePath"><?php esc_html_e('Background image path:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<div id="cov_bg_image_div">
				    		<table>
				    			<tr>
						    		<td>
						    			<input id="uvp_mainBackgroundImagePath" type="text" class="text ui-widget-content ui-corner-all">
						    		 	<button id="uvp_bg_image_btn"><?php esc_html_e('Add Image', 'fwduvp');?></button>
						    		</td>
						    		<td>
						    			<img src="" id="uvp_bg_upload_img">
						    		</td>
						    	</tr>
						    </table>
						</div>
		    		</td>
		    	</tr>
				
			</table>
		</div>
		
		<div id="tab10" class="tab">
			<table>
				<tr>
					<td>
						<label for="closeLightBoxWhenPlayComplete"><?php esc_html_e('Close lightbox on play complete:', 'fwduvp');?></label>
					</td>
					<td>
						<select id="closeLightBoxWhenPlayComplete" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If set to yes when the video has finished playing and UVP lightbox is opened the lightbox will automatically close.', 'fwduvp'); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="lightBoxBackgroundOpacity"><?php esc_html_e('Background opacity:', 'fwduvp');?></label>
					</td>
					<td>
						<input type="text" id="lightBoxBackgroundOpacity" class="text ui-widget-content ui-corner-all">
					</td>
				</tr>
				
				<tr>
					<td>
						<label for="lightBoxBackgroundColor"><?php esc_html_e('Youtube quality button normal color:', 'fwduvp');?></label>
					</td>
					<td>
						<input id="lightBoxBackgroundColor" />
					</td>
				</tr>
			</table>
		</div>

		<div id="tab11" class="tab">
			<table>
				<tr>
					<td>
						<label for="useAToB"><?php esc_html_e('Use a to be loop:', 'fwduvp');?></label>
					</td>
					<td>
						<select id="useAToB" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The a to b loop feature is basically a plugin for UVP this way it will not add to the total file size if it is not used. To enable it set it to yes otherwise set it to no.', 'fwduvp'); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="atbTimeTextColorNormal"><?php esc_html_e('Time text normal color:', 'fwduvp');?></label>
					</td>
					<td>
						<input id="atbTimeTextColorNormal" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="atbTimeTextColorSelected"><?php esc_html_e('Time text selected color:', 'fwduvp');?></label>
					</td>
					<td>
						<input id="atbTimeTextColorSelected" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="atbButtonTextNormalColor"><?php esc_html_e('Button text normal color:', 'fwduvp');?></label>
					</td>
					<td>
						<input id="atbButtonTextNormalColor" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="atbButtonTextSelectedColor"><?php esc_html_e('Button text selected color:', 'fwduvp');?></label>
					</td>
					<td>
						<input id="atbButtonTextSelectedColor" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="atbButtonBackgroundNormalColor"><?php esc_html_e('Button background normal color:', 'fwduvp');?></label>
					</td>
					<td>
						<input id="atbButtonBackgroundNormalColor" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="atbButtonBackgroundSelectedColor"><?php esc_html_e('Button background selected color:', 'fwduvp');?></label>
					</td>
					<td>
						<input id="atbButtonBackgroundSelectedColor" />
					</td>
				</tr>
			</table>
		</div>

		<div id="tab12" class="tab">
			<table>
				<tr>
		    		<td>
		    			<label for="thumbnails_preview_width"><?php esc_html_e('Thumbnail width:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumbnails_preview_width" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Thumbnail preview width in px.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumbnails_preview_height"><?php esc_html_e('Thumbnail height:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="thumbnails_preview_height" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Thumbnail preview height in px.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumbnails_preview_background_color"><?php esc_html_e('Background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="thumbnails_preview_background_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumbnails_preview_border_color"><?php esc_html_e('Border color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="thumbnails_preview_border_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumbnails_preview_label_background_color"><?php esc_html_e('Time background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="thumbnails_preview_label_background_color" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="thumbnails_preview_label_font_color"><?php esc_html_e('Time text color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="thumbnails_preview_label_font_color" />
		    		</td>
		    	</tr>
			</table>
		</div>
		
		<div id="tab13" class="tab">
			<table>
				<tr>
					<td>
		    			<label for="showContextmenu"><?php esc_html_e('Show right click context menu:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showContextmenu" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="showScriptDeveloper"><?php esc_html_e('Show developer link:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="showScriptDeveloper" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Ads an extra option in the right click context menu with a link for the developer website, if you want to support this pluogin please set this option to yes.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="contextMenuBackgroundColor"><?php esc_html_e('Background color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="contextMenuBackgroundColor" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="contextMenuBorderColor"><?php esc_html_e('Border color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="contextMenuBorderColor" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="contextMenuSpacerColor"><?php esc_html_e('Spacer color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="contextMenuSpacerColor" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="contextMenuItemNormalColor"><?php esc_html_e('Menu item normal color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="contextMenuItemNormalColor" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="contextMenuItemSelectedColor"><?php esc_html_e('Menu item selected color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="contextMenuItemSelectedColor" />
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="contextMenuItemDisabledColor"><?php esc_html_e('Menu item disabled color:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input id="contextMenuItemDisabledColor" />
		    		</td>
		    	</tr>
			</table>
		</div>

		<div id="tab14" class="tab">
			<table>
				<tr>
					<td>
		    			<label for="useFingerPrintStamp"><?php esc_html_e('Use fingerprint stamp:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<select id="useFingerPrintStamp" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp');?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp');?></option>
						</select>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="frequencyOfFingerPrintStamp"><?php esc_html_e('Fingerprint stamp frequency:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="frequencyOfFingerPrintStamp" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The time in milliseconds until the fingerprint stamp text appears, please note there is also a small random offset added to this.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>
		    			<label for="durationOfFingerPrintStamp"><?php esc_html_e('Fingerprint stamp duration:', 'fwduvp');?></label>
		    		</td>
		    		<td>
		    			<input type="text" id="durationOfFingerPrintStamp" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The time in milliseconds until the finger print stamp text is visible.', 'fwduvp'); ?>">
		    		</td>
		    	</tr>
		    </table>
		</div>
	</div>
	
	<input type="hidden" id="settings_data" name="settings_data" value="">
	
	<input id="add_btn" type="submit" name="submit" value="<?php esc_html_e('Add new preset', 'fwduvp');?>" />
	<input id="update_btn" type="submit" name="submit" value="<?php esc_html_e('Update preset settings', 'fwduvp');?>" />
	<input id="del_btn" type="submit" name="submit" value="<?php esc_html_e('Delete preset', 'fwduvp');?>" />
	
	<?php wp_nonce_field("fwduvp_general_settings_update", "fwduvp_general_settings_nonce"); ?>
</form>
<?php if(!(empty($msg))): ?>
<div class='fwd-updated'>
	<p class="fwd-updated-p">
		<?php echo esc_html($msg); ?>
	</p>
</div>
<?php endif; ?>