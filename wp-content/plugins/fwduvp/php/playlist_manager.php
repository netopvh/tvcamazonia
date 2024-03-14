<!-- Cuepoints. -->
<div id="add-cuepoint-dialog" title="<?php esc_html_e('Add new cuepoint', 'fwduvp'); ?>">
	<p id="cuepoint_cuepoints_tips"><?php esc_html_e('The start time field is required.', 'fwduvp'); ?></p>	

	<table class="dialog cuepoints-dialog">
		<tr>
			<td>
				<label><?php esc_html_e('Cuepoint label:', 'fwduvp'); ?></label>
			</td>
			<td>
				<input id="cuepoint_label" type="text" class="text ui-widget-content ui-corner-all cuepoint_label">
			</td>
		</tr>
		<tr>
			<td>
				<label class="cuepoint_label_start"><?php esc_html_e('Start time:', 'fwduvp'); ?></label>
			</td>
			<td>
				<input type="text" id="cuepoint_start_time" class="text ui-widget-content ui-corner-all cuepoint_start_time">
				<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The start time of for the cuepoint, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="cuepoint_code"><?php esc_html_e('Cuepoint javascript function call:', 'fwduvp'); ?></label>
			</td>
			<td>
				<input type="text" id="cuepoint_code" class="text ui-widget-content ui-corner-all fwduvpInputFleds cuepoint_code"></input>
				<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The cupoint javascript function that will be executed at the cuepoint start time. If you have a javascript function defined in your page it can be set here to be called at the start time, for example if the function is called myFunction set this to myFunction(); make sure you add the parentheses as well and also make sure you don\'t use any parameters the function has to be simple.', 'fwduvp'); ?>">
			</td>
		</tr>
	</table>	
</div>

<div id="edit-cuepoints-dialog" title="<?php esc_html_e('Edit cuepoint', 'fwduvp'); ?>">
	<p id="cuepoint-tips-edit"><?php esc_html_e('The start time field is required.', 'fwduvp'); ?></p>

	<table class="dialog cuepoints-dialog">
		<tr>
			<td>
				<label><?php esc_html_e('Cuepoint label:', 'fwduvp'); ?></label>
			</td>
			<td>
				<input id="cuepoint_label_edit" type="text" class="text ui-widget-content ui-corner-all cuepoint_label">
			</td>
		</tr>
		<tr>
			<td>
				<label class="cuepoint_label_start"><?php esc_html_e('Start time:', 'fwduvp'); ?></label>
			</td>
			<td>
				<input type="text" id="cuepoint_start_time_edit" class="text ui-widget-content ui-corner-all cuepoint_start_time">
				<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The start time of for the cuepoint, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="cuepoint_code_edit"><?php esc_html_e('Cuepoint javascript function call:', 'fwduvp'); ?></label>
			</td>
			<td>
				<input type="text" id="cuepoint_code_edit" class="text ui-widget-content ui-corner-all fwduvpInputFleds cuepoint_code"></input>
				<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The cupoint javascript function that will be executed at the cuepoint start time. If you have a javascript function defined in your page it can be set here to be called at the start time, for example if the function is called myFunction set this to myFunction(); make sure you add the parentheses as well and also make sure you don\'t use any parameters the function has to be simple.', 'fwduvp'); ?>">	
			</td>
		</tr>
	</table>
</div>

<div id="delete-cuepoint-dialog" title="<?php esc_html_e('Delete cuepoint', 'fwduvp'); ?>">
	<fieldset>
    	<label><?php esc_html_e('Are you sure you want to delete this cuepoint?', 'fwduvp'); ?></label>
  	</fieldset>
</div>


<!-- Pre-roll,mid-roll,post-roll advertisement. -->
<div id="add-ads-dialog" title="<?php esc_html_e('Add new pre-roll,mid-roll,post-roll advertisement', 'fwduvp'); ?>">
	<p id="add_ads_tips"><?php esc_html_e('The source field is required.', 'fwduvp'); ?></p>
	<fieldset>
		<table class="dialog ads-dialog">
			<tr>
				<td>
					<label><?php esc_html_e('Advertisement label:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input id="ads_label" type="text" class="text ui-widget-content ui-corner-all ads_label">
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Video or image source:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="ads_source" type="text" class="text ui-widget-content ui-corner-all ads_label">
					<button id="ads_source_button" class="ads_source_button"><?php esc_html_e('Add from media library', 'fwduvp'); ?></button>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This feature support mp4 video files from the media library or external path, youtube videos or images (jpg, jpeg, png).', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr class="empty-after-button"></tr>
			<tr>
				<td>
					<label>URL:</label>
				</td>
				<td>
					<input type="text" id="ads_url" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>

			<tr>
				<td>
					<label><?php esc_html_e('Target:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="ads_target" class="ui-corner-all">
						<option value="_blank">_blank</option>
						<option value="_self">_self</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Start time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="ads_start_time"class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The time at which the advertisement will start playing, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Time to hold add:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="time_to_hold_ad" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The duration in seconds format until the skip button will appear, for example to show the skip add button after 10 seconds from the video start set this to 10. If you don\'t want the skip button to appear set this to 0.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="add_duration"><?php esc_html_e('Add duration:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="add_duration" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The add duration in hh:mm:ss format to hold the add if an image is used, for example to hold the image add for 20 seconds set this option to 00:00:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
		</table>
  	</fieldset>
</div>

<div id="edit-ads-dialog" title="<?php esc_html_e('Edit new pre-roll,mid-roll,post-roll advertisement', 'fwduvp'); ?>">
	<p id="edit_ads_tips"><?php esc_html_e('The source field is required.', 'fwduvp'); ?></p>
	<fieldset>
		
		<table class="dialog ads-dialog">
			<tr>
				<td>
					<label for="ads_label_edit"><?php esc_html_e('Advertisement label:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input id="ads_label_edit" type="text" class="text ui-widget-content ui-corner-all ads_label">
				</td>
			</tr>
			<tr>
				<td>
					<label for="ads_source_edit"><?php esc_html_e('Video or image:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="ads_source_edit" type="text" class="text ui-widget-content ui-corner-all ads_label">
					<button id="ads_source_button_edit" class="ads_source_button"><?php esc_html_e('Add from media library', 'fwduvp'); ?></button>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This feature support mp4 video files from the media library or external path, youtube videos or images (jpg, jpeg, png).', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr class="empty-after-button"></tr>
			<tr>
				<td>
					<label>URL:</label>
				</td>
				<td>
					<input type="text" id="ads_url_edit" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Target:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="ads_target_edit" class="ui-corner-all">
						<option value="_blank">_blank</option>
						<option value="_self">_self</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Start time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="ads_start_time_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The time at which the advertisement will start playing, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Time to hold add:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="time_to_hold_ad_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The duration in seconds until the skip button will appear, for example to show the skip add button after 10 seconds from the video start set this to 10. If you don\'t want the skip button to appear  set this to 0.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Add duration:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="add_duration_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The add duration in hh:mm:ss format to hold the add if an image is used, for example to hold the image add for 20 seconds set this option to 00:00:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
		</table>	
  	</fieldset>
</div>


<!-- Pop-up advertisement. -->
<div id="add-popupad-dialog" title="<?php esc_html_e('Add new pop-up advertisement', 'fwduvp'); ?>">
	<p id="popupad_popupads_tips"><?php esc_html_e('The source field is required.', 'fwduvp'); ?></p>
	<fieldset>

		<table class="dialog">
			<tr>
				<td class="popupad-selector">
					<label><?php esc_html_e('Type:', 'fwduvp'); ?></label>
				</td>
				<td>	
					<select id="uvp_popupad_type" class="ui-corner-all">
						<option value="image">image</option>
						<option value="adsense">google adsense</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Advertisement label:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input id="popupads_label" type="text" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>
		</table>
		
		<table class="dialog popupads">
			<tr>
				<td>
					<label><?php esc_html_e('Image source', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="popupads_source" type="text" class="text ui-widget-content ui-corner-all">
					<button id="popupads_source_button" class="popupads_source_button">Add from media library</button>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This feature support mp4 video files from the media library or external path, youtube videos or images (jpg, jpeg, png).', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr class="empty-after-button"></tr>
			<tr>
				<td>
					<label>URL:</label>
				</td>
				<td>
					<input type="text" id="popupads_url" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>
			<tr>
				<td>
					<label for="popupads_target"><?php esc_html_e('Target:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="popupads_target" class="ui-corner-all">
						<option value="_blank">_blank</option>
						<option value="_self">_self</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Start time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="popupads_start_time" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The time at which the advertisement will show, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Stop time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="popupads_stop_time" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The time at which the advertisement will hide, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
		</table>
		
		<table class="dialog adsense">
			<tr>
				<td>
					<label><?php esc_html_e('Google adsense ad client code:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_client" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The google ad client code, you can get this from the google adsense embed code.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Google adsense ad slot code:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_slot" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The google ad slot code, you can get this from the google adsense embed code.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Google adsense ad width:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_width" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The google adsense ad width in px.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Google adsense ad height:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_height" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The google adsense ad height in px.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Google adsense ad start time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_start_time" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The start time of the popup ad when will show, the format is hours:minutes:seconds, for example 01:10:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Google adsense ad stop time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_stop_time" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The stop time of the popup ad when will hide, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
		</table>
  	</fieldset>	
</div>

<div id="edit-popupad-dialog" title="<?php esc_html_e('Edit pop-up advertisement', 'fwduvp'); ?>">
	<p id="popupad_popupads_tips_edit"><?php esc_html_e('The source field is required.', 'fwduvp'); ?></p>
	<fieldset>

		<table class="dialog">
			<tr>
				<td class="popupad-selector">
					<label><?php esc_html_e('Advertisement label:', 'fwduvp'); ?></label>
				</td>
				<td class="td_popupads_label_edit">
					<input id="popupads_label_edit" type="text" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>
		</table>
		
		<table class="dialog popupads_edit">
			<tr>
				<td>
					<label><?php esc_html_e('Image source', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="popupads_source_edit" type="text" class="text ui-widget-content ui-corner-all">
					<button id="popupads_source_button_edit" class="popupads_source_button"><?php esc_html_e('Add from media library', 'fwduvp'); ?></button>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('This feature support mp4 video files from the media library or external path, youtube videos or images (jpg, jpeg, png).', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr class="empty-after-button"></tr>
			<tr>
				<td>
					<label>URL:</label>
				</td>
				<td class="has-button">
					<input type="text" id="popupads_url_edit" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Target:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<select id="popupads_target_edit" class="ui-corner-all">
						<option value="_blank">_blank</option>
						<option value="_self">_self</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Start time:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input type="text" id="popupads_start_time_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The time at which the advertisement will show, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="popupads_stop_time_edit"><?php esc_html_e('Stop time:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input type="text" id="popupads_stop_time_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The time at which the advertisement will hide, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
		</table>
	
		<table class="dialog adsense_edit">
			<tr>
				<td>
					<label for="uvp_google_ad_client_edit"><?php esc_html_e('Google adsense ad client code:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_client_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The google ad client code, you can get this from the google adsense embed code.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="uvp_google_ad_slot_edit"><?php esc_html_e('Google adsense ad slot code:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_slot_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The google ad slot code, you can get this from the google adsense embed code.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="uvp_google_ad_width_edit"><?php esc_html_e('Google adsense ad width:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_width_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The google adsense ad width in px.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="uvp_google_ad_height_edit"><?php esc_html_e('Google adsense ad height:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_height_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The google adsense ad height in px.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="uvp_google_ad_start_time_edit"><?php esc_html_e('Google adsense ad start time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_start_time_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The start time of the popup ad when will show, the format is hours:minutes:seconds, for example 01:10:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="uvp_google_ad_stop_time_edit"><?php esc_html_e('Google adsense ad stop time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="uvp_google_ad_stop_time_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The stop time of the popup ad when will hide, the format is hours:minutes:seconds, for example 01:20:20.', 'fwduvp'); ?>"/>
				</td>
			</tr>
		</table>	
		
  	</fieldset>
</div>

<div id="delete-popupad-dialog" title="<?php esc_html_e('Delete pop-up advertisement', 'fwduvp'); ?>">
	<fieldset>
    	<label><?php esc_html_e('Are you sure you want to delete this pop-up advertisement?', 'fwduvp'); ?></label>
  	</fieldset>
</div>



<!-- Subtitles. -->
<div id="add-subtitle-dialog" title="<?php esc_html_e('Add new subtitle', 'fwduvp'); ?>">
	<p id="add-subtitle-tips"><?php esc_html_e('The label field is required.', 'fwduvp'); ?></p>
	<fieldset>
		<table class="dialog subtitle-dialog">
			<tr>
				<td>
					<label for="subtitle_label"><?php esc_html_e('Subtitle label:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input id="subtitle_label" class="subtitle_label" type="text" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The subtitle label that will appear in the subtitle quality selector like: 720p, 1080p or whatever label you like. If you are using just a single subtitle source this will not be displayed.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label class="subtitle_evpencript" for="subtitle_evpencript"><?php esc_html_e('Encrypt:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="subtitle_evpencript" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this feature to yes if you wish to encrypt the subtitle path this way it will not be possible to see / steal the subtitle source by viewing the page source.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="subtitle_source"><?php esc_html_e('Subtitle source:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="subtitle_source" class="subtitle_source" type="text" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The subtitle .txt or .srt path.', 'fwduvp'); ?>">
					<button id="uploads_subtitle_button" class="uploads_subtitle_button"><?php esc_html_e('Add from media library', 'fwduvp'); ?></button>
				</td>
			</tr>
		</table>
	</fieldset>
</div>

<div id="edit-subtitle-dialog" title="<?php esc_html_e('Edit subtitle', 'fwduvp'); ?>">
	<p id="edit-subtitle-tips_edit"><?php esc_html_e('The label field is required.', 'fwduvp'); ?></p>
	<fieldset>
		<table class="dialog subtitle-dialog">	
			<tr>
				<td>
					<label><?php esc_html_e('Subtitle label:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input id="subtitle_label_edit" class="subtitle_label" type="text" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The subtitle label that will appear in the subtitle quality selector like: 720p, 1080p or whatever label you like. If you are using just a single subtitle source this will not be displayed.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label class="subtitle_evpencript" for="subtitle_evpencript_edit"><?php esc_html_e('Encrypt:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="subtitle_evpencript_edit" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this feature to yes if you wish to encrypt the subtitle path this way it will not be possible to see / steal the subtitle source by viewing the page source.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="subtitle_source_edit"><?php esc_html_e('Subtitle source:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="subtitle_source_edit" class="subtitle_source" type="text" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The subtitle .txt or .srt path.', 'fwduvp'); ?>">
					<button id="uploads_subtitle_button" class="uploads_subtitle_button"><?php esc_html_e('Add from media library', 'fwduvp'); ?></button>
					</td>
				</tr>
		</table>
	</fieldset>
</div>

<div id="delete-subtitle-dialog" title="<?php esc_html_e('Delete subtitle', 'fwduvp'); ?>">
	<fieldset>
    	<label><?php esc_html_e('Are you sure you want to delete this subtitle?', 'fwduvp'); ?></label>
  	</fieldset>
</div>


<!-- Add video final. -->
<div id="add-video-final-dialog" class="add-video-final-dialog" title="<?php esc_html_e('Add new video', 'fwduvp'); ?>">
	<p id="add-video-tips">The label field is required.</p>
	<fieldset>	
		<table class="dialog add-video">
			<tr>
				<td>
					<label><?php esc_html_e('Is 360 degree / VR:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="is360" class="ui-corner-all">
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If 360 degree / VR video is used set this option to yes otherwise set it to no, to enable VR please set in your preset Show 360 degree VR button to yes otherwise lave set it to no.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr class="vr-options">
				<td>
					<label for="rotationY360DegreeVideo"><?php esc_html_e('360 video start rotation:', 'fwdevp'); ?></label>
				</td>
				<td>
					<input id="rotationY360DegreeVideo" type="text" class="text ui-widget-content ui-corner-all"><span>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('For 360 videos the start rotation in degrees, this can also be negative for example -90 will rotate the video on the Y axis / horizontally -90 degrees, by default is zero (0).', 'fwdevp'); ?>">
				</td>
			</tr>
			<tr class="vr-options">
				<td>
					<label for="startWhenPlayButtonClick360DegreeVideo"><?php esc_html_e('Start VR at play:', 'fwdevp'); ?></label>
				</td>
				<td>
					<select id="startWhenPlayButtonClick360DegreeVideo" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('Yes', 'fwdevp'); ?></option>
						<option value="no"><?php esc_html_e('No', 'fwdevp'); ?></option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If you want to start VR when the video is starting to play set this option to yes otherwise leave it to no and the VR will start when the user is clicking the goggles button from the player control bar, to enable VR please set in your preset Show 360 degree VR button to yes otherwise lave set it to no.', 'fwdevp'); ?>"></span></input>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Encrypt:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="fwd_uvpencript" class="ui-corner-all">
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this feature to yes if you wish to encrypt the video paths this way it will not be possible to see / steal the videos location by viewing the page source.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Video label:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input id="video_label" type="text" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The video label that will appear in the video quality selector like: 720p, 1080p or whatever label you like. If you are using just a single video source this will not be displayed.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Video source:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="video_source" type="text"  class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The video mp4 path, Vimeo video URL, Youtube video URL, mp3 path, hls/m3u8 URL.', 'fwduvp'); ?>">
					<button id="uploads_video_button" class="uploads_video_button"><?php esc_html_e('Add from media library', 'fwduvp'); ?></button>
				</td>
			</tr>
		</table>
		
	</fieldset>
</div>

<div id="edit-video-final-dialog" class="add-video-final-dialog" title="<?php esc_html_e('Edit video', 'fwduvp'); ?>">
	<p id="video-tips-edit"><?php esc_html_e('The label field is required.', 'fwduvp'); ?></p>
	<fieldset>
		
		<table class="dialog add-video">	
			<tr>
				<td>
					<label><?php esc_html_e('Is 360 degree / VR:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="is360_edit" class="ui-corner-all">
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If 360 degree / VR video is used set this option to yes otherwise set it to no.', 'fwduvp'); ?>">
				</td>
			</tr>
			</tr>
			<tr class="vr-options">
				<td>
					<label for="rotationY360DegreeVideoEdit"><?php esc_html_e('360 video start rotation:', 'fwdevp'); ?></label>
				</td>
				<td>
					<input id="rotationY360DegreeVideoEdit" type="text" class="text ui-widget-content ui-corner-all"><span>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('For 360 videos the start rotation in degrees, this can also be negative for example -90 will rotate the video on the Y axis / horizontally -90 degrees, by default is zero (0).', 'fwdevp'); ?>">
				</td>
			</tr>
			<tr class="vr-options">
				<td>
					<label for="startWhenPlayButtonClick360DegreeVideoEdit"><?php esc_html_e('Start VR at play:', 'fwdevp'); ?></label>
				</td>
				<td>
					<select id="startWhenPlayButtonClick360DegreeVideoEdit" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('yes', 'fwdevp'); ?></option>
						<option value="no"><?php esc_html_e('no', 'fwdevp'); ?></option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If you want to start VR when the video is starting to play set this option to yes otherwise leave it to no and the VR will start when the user is clicking the goggles button from the player control bar, to enable VR please set in your preset Show 360 degree VR button to yes otherwise lave set it to no.', 'fwdevp'); ?>"></span></input>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Encrypt:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="fwd_uvpencript_edit" class="ui-corner-all">
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this feature to yes if you wish to encrypt the video paths this way it will not be possible to see / steal the videos location by viewing the page source.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Video label:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input id="video_label_edit" type="text" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The video label that will appear in the video quality selector like: 720p, 1080p or whatever label you like. If you are using just a single video source this will not be displayed.', 'fwduvp'); ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label><?php esc_html_e('Video source:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="video_source_edit" type="text" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The video mp4 path, Vimeo video URL, Youtube video URL, mp3 path, hls/m3u8 URL.', 'fwduvp'); ?>">
					<button id="uploads_video_button_edit" class="uploads_video_button"><?php esc_html_e('Add from media library', 'fwduvp'); ?></button>
				</td>
			</tr>
		</table>
	</fieldset>
</div>

<div id="delete-video-final-dialog" title="<?php esc_html_e('Delete video', 'fwduvp'); ?>">
	<fieldset>
    	<label><?php esc_html_e('Are you sure you want to delete this video?', 'fwduvp'); ?></label>
  	</fieldset>
</div>


<!-- Main playlist. -->
<div id="add-main-playlist-dialog" title="<?php esc_html_e('Add new main playlist', 'fwduvp'); ?>">
	<p id="add_mp_tips"><?php esc_html_e('The name field is required.', 'fwduvp'); ?></p>
	
	<fieldset>
    	<label for="mp_name"><?php esc_html_e('Name:', 'fwduvp'); ?></label>
    	<input type="text" id="mp_name" class="text ui-widget-content ui-corner-all">
  	</fieldset>
</div>

<div id="edit-main-playlist-dialog" title="<?php esc_html_e('Edit main playlist', 'fwduvp'); ?>">
	<p id="edit_mp_tips"><?php esc_html_e('The name field is required.', 'fwduvp'); ?></p>
	
	<fieldset>
    	<label for="mp_name_edit">Name:</label>
    	<input type="text" id="mp_name_edit" class="text ui-widget-content ui-corner-all">
  	</fieldset>
</div>

<div id="delete-main-playlist-dialog" title="<?php esc_html_e('Delete main playlist', 'fwduvp'); ?>">
	<fieldset>
    	<label><?php esc_html_e('Are you sure you want to delete this main playlist?', 'fwduvp'); ?></label>
  	</fieldset>
</div>

<div id="add-playlist-dialog" title="<?php esc_html_e('Add new playlist', 'fwduvp'); ?>">
	<p id="add_pl_tips"><?php esc_html_e('The playlist name and thumbnail path is required.', 'fwduvp'); ?></p>
	
	<fieldset>
    	<label for="pl_name"><?php esc_html_e('Playlist name:', 'fwduvp'); ?></label>
		<br>
    	<input type="text" class="pl_name" id="pl_name" class="text ui-widget-content ui-corner-all">
		
		<br>
		<label for="pl_type"><?php esc_html_e('Playlist type:', 'fwduvp'); ?></label>
    	<select id="pl_type" class="ui-corner-all">
			<option value="normal">normal</option>
			<option value="youtube">youtube playlist or channel</option>
			<option value="folder">folder</option>
			<option value="vimeo">vimeo album</option>
			<option value="xml">xml</option>
		</select>
		<br><br>
		<label for="pl_password"><?php esc_html_e('Playlist password:', 'fwduvp'); ?></label>
		<input type="text" id="pl_password" class="text ui-widget-content ui-corner-all pl_password">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Set a password here if you want the playlist to be private otherwise leave it blank.', 'fwduvp'); ?>">
		<br>
		<div id="pl_source_div">
			<label for="pl_source"><?php esc_html_e('Playlist source:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_source" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip source_help_img" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Source help.', 'fwduvp'); ?>">
		</div>

		<div id="pl_vimeo_div">
			<label for="pl_vimeo_source"><?php esc_html_e('Album URL:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_vimeo_source" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here the album URL.', 'fwduvp'); ?>">
			<br>
			
			<label for="pl_vimeo_user_id"><?php esc_html_e('User ID:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_vimeo_user_id" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here your vimeo user id.', 'fwduvp'); ?>">

			<br>
			<label for="pl_client_id"><?php esc_html_e('APP client ID:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_client_id" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here your vimeo app client id.', 'fwduvp'); ?>">
			
			<br>
			<label for="pl_vimeo_secret"><?php esc_html_e('APP secret:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_vimeo_secret" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here your vimeo app secret.', 'fwduvp'); ?>">

			<br>
			<label for="pl_vimeo_token"><?php esc_html_e('APP token:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_vimeo_token" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here your vimeo app token.', 'fwduvp'); ?>">
		</div>
		
		<br>
    	<div id="uploads_pl_thumb_div">
    		<label for="pl_thumb"><?php esc_html_e('Playlist thumbnail path (enter a URL or upload an image):', 'fwduvp'); ?></label>
    		<table>
    			<tr>
		    		<td class="td1">
		    			<input id="pl_thumb" type="text" class="text ui-widget-content ui-corner-all">
		    		 	<button id="uploads_pl_thumb_button"><?php esc_html_e('Add Image', 'fwduvp'); ?></button>
		    		</td>
		    		<td>
		    			<img src="" id="uploads_pl_thumb">
		    		</td>
		    	</tr>
		    </table>
		</div>
		
		<br><br>
		<div id="pl_text_div">
			<label><?php esc_html_e('Playlist text:', 'fwduvp'); ?></label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "tinymce" => false);
				wp_editor("", "pltext", $settings);
			?>
			
			<strong><?php esc_html_e('Caption template:', 'fwduvp'); ?></strong>
			<br>
			&lt;p class="fwduvp-categories-title"&gt;&lt;span class="fwduvp-header"&gt;Title: &lt;/span&gt;&lt;span class="fwduvp-title"&gt;Playlist title&lt;/span&gt;&lt;/p&gt;&lt;p class="fwduvp-categories-type"&gt;&lt;span class="fwduvp-header"&gt;Type: &lt;/span&gt;PLAYLIST TYPE&lt;/p&gt;&lt;p class="fwduvp-categories-description"&gt;&lt;span class="fwduvp-header"&gt;Description: &lt;/span&gt;Playlist description, add here a short description.&lt;/p&gt;
			<br><br>
		</div>
		<?php if(preg_match('/acora/', FWDUVP_TEXT_DOMAIN)): ?>
			</br>
			<strong><?php esc_html_e('Playlist text format:', 'fwduvp'); ?></strong><br>	
			</br>
			&lt;p class='minimalDarkCategoriesTitle'&gt;&lt;span class='minimialDarkBold'&gt;Title: &lt;/span&gt;My playlist&lt;/p&gt;
			<br></br>
			&lt;p class='minimalDarkCategoriesDescription'&gt;&lt;span class='minimialDarkBold'&gt;Description: &lt;/span&gt;My playlist description.&lt;/p&gt;
			<br><br>
		<?php endif; ?>
  	</fieldset>
</div>

<div id="edit-playlist-dialog" title="<?php esc_html_e('Edit playlist', 'fwduvp'); ?>">
	<p id="edit_pl_tips"><?php esc_html_e('The playlist name is required.', 'fwduvp'); ?></p>
	
	<fieldset>
    	<label for="pl_name_edit"><?php esc_html_e('Playlist name:', 'fwduvp'); ?></label>
		<br>
    	<input type="text" id="pl_name_edit" class="pl_name" class="text ui-widget-content ui-corner-all">
		
		<br>
		<label for="pl_type_edit"><?php esc_html_e('Playlist type:', 'fwduvp'); ?></label>
    	<select id="pl_type_edit" class="ui-corner-all">
			<option value="normal">normal</option>
			<option value="youtube">youtube playlist or channel</option>
			<option value="folder">folder</option>
			<option value="vimeo">vimeo album</option>
			<option value="xml">xml</option>
		</select>
		
		<br><br>
		<label for="pl_password_edit"><?php esc_html_e('Playlist password:', 'fwduvp'); ?></label>
		<input type="text" id="pl_password_edit" class="text ui-widget-content ui-corner-all pl_password">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Set a password here if you want the playlist to be private otherwise leave it blank.', 'fwduvp'); ?>">
		<br>
		<div id="pl_source_div_edit">
			<label for="pl_source_edit"><?php esc_html_e('Playlist source:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_source_edit" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip source_help_img_edit" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Source help.', 'fwduvp'); ?>">
		</div>

		<div id="pl_vimeo_div_edit">
			<label for="pl_vimeo_source_edit"><?php esc_html_e('Album URL:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_vimeo_source_edit" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here the album URL.', 'fwduvp'); ?>">
			<br>
			
			<label for="pl_vimeo_user_id_edit"><?php esc_html_e('User ID:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_vimeo_user_id_edit" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here your vimeo user id.', 'fwduvp'); ?>">

			<br>
			<label for="pl_client_id_edit"><?php esc_html_e('APP client ID:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_client_id_edit" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here your vimeo app client id.', 'fwduvp'); ?>">
			
			<br>
			<label for="pl_vimeo_secret_edit"><?php esc_html_e('APP secret:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_vimeo_secret_edit" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here your vimeo app secret.', 'fwduvp'); ?>">

			<br>
			<label for="pl_vimeo_token_edit"><?php esc_html_e('APP token:', 'fwduvp'); ?></label>
			<br>
			<input type="text" id="pl_vimeo_token_edit" class="text ui-widget-content ui-corner-all">
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" id="source_help_img" title="<?php esc_html_e('Add here your vimeo app token.', 'fwduvp'); ?>">
		</div>
		
		<br>
    	<div id="uploads_pl_thumb_div_edit">
    		<label for="pl_thumb_edit"><?php esc_html_e('Playlist thumbnail path (enter a URL or upload an image):', 'fwduvp'); ?></label>
    		<table>
    			<tr>
		    		<td class="td1">
		    			<input id="pl_thumb_edit" type="text" class="text ui-widget-content ui-corner-all">
		    		 	<button id="uploads_pl_thumb_button_edit"><?php esc_html_e('Add Image', 'fwduvp'); ?></button>
		    		</td>
		    		<td>
		    			<img src="" id="uploads_pl_thumb_edit">
		    		</td>
		    	</tr>
		    </table>
		</div>
		
		<br><br>
		<div id="pl_text_div_edit">
			<label><?php esc_html_e('Playlist text:', 'fwduvp'); ?></label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "tinymce" => false);
				wp_editor("", "pltextedit", $settings);
			?>
			
			<strong><?php esc_html_e('Caption template:', 'fwduvp'); ?></strong>
			<br>
			&lt;p class="fwduvp-categories-title"&gt;&lt;span class="fwduvp-header"&gt;Title: &lt;/span&gt;&lt;span class="fwduvp-title"&gt;Playlist title&lt;/span&gt;&lt;/p&gt;&lt;p class="fwduvp-categories-type"&gt;&lt;span class="fwduvp-header"&gt;Type: &lt;/span&gt;PLAYLIST TYPE&lt;/p&gt;&lt;p class="fwduvp-categories-description"&gt;&lt;span class="fwduvp-header"&gt;Description: &lt;/span&gt;Playlist description, add here a short description.&lt;/p&gt;
			<br><br>
		</div>
		<?php if(preg_match('/acora/', FWDUVP_TEXT_DOMAIN)): ?>
			</br>
			<strong><?php esc_html_e('Playlist text format:', 'fwduvp'); ?></strong><br>	
			</br>
			&lt;p class='minimalDarkCategoriesTitle'&gt;&lt;span class='minimialDarkBold'&gt;Title: &lt;/span&gt;My playlist&lt;/p&gt;
			<br></br>
			&lt;p class='minimalDarkCategoriesDescription'&gt;&lt;span class='minimialDarkBold'&gt;Description: &lt;/span&gt;My playlist description.&lt;/p&gt;
			<br><br>
			<?php endif; ?>
  	</fieldset>
</div>

<div id="delete-playlist-dialog" title="<?php esc_html_e('Delete playlist', 'fwduvp'); ?>">
	<fieldset>
    	<label><?php esc_html_e('Are you sure you want to delete this playlist?', 'fwduvp'); ?></label>
  	</fieldset>
</div>


<!-- Add video main dialog. -->
<div id="add-video-dialog" title="<?php esc_html_e('Add new video', 'fwduvp'); ?>">
	<p id="add_vid_tips"><?php esc_html_e('The video name, source and thumbnail path fields are required.', 'fwduvp'); ?></p>
	<fieldset>
    	<label for="vid_name"><?php esc_html_e('Video name:', 'fwduvp'); ?></label>
    	<br>
    	<input type="text" id="vid_name" class="text ui-widget-content ui-corner-all">
		<br>
    	<div id="uploads_thumb_div">
    		<label for="vid_thumb"><?php esc_html_e('Video thumbnail path (enter a URL or upload an image):', 'fwduvp'); ?></label>
    		<table>
    			<tr>
		    		<td class="td1">
		    			<input id="vid_thumb" type="text" class="text ui-widget-content ui-corner-all">
		    		 	<button id="uploads_thumb_button"><?php esc_html_e('Add Image', 'fwduvp'); ?></button>
		    		</td>
		    		<td>
		    			<img src="" id="uploads_thumb">
		    		</td>
		    	</tr>
		    </table>
		</div>
		<br>
    	<div id="uploads_poster_div">
    		<label for="vid_poster"><?php esc_html_e('Video poster path (enter a URL or upload an image):', 'fwduvp'); ?></label>
    		<table>
    			<tr>
		    		<td class="td1">
		    			<input id="vid_poster" type="text" class="text ui-widget-content ui-corner-all">
		    		 	<button id="uploads_poster_button"><?php esc_html_e('Add Image', 'fwduvp'); ?></button>
		    		</td>
		    		<td>
		    			<img src="" id="uploads_poster">
		    		</td>
		    	</tr>
		    </table>
		</div>
		
		<div id="private_video_div">
			<table class="dialog video-details">
				<tr>
					<td>
						<label class="label1" for="is_private"><?php esc_html_e('Is private:', 'fwduvp'); ?></label>
					</td>
					<td>
						<select id="is_private" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this to yes if you want a private video, this way a user will be required to enter a password to view the video.', 'fwduvp'); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label class="label2" for="start_at_time"><?php esc_html_e('Start at time:', 'fwduvp'); ?></label>
					</td>
					<td>
						<input type="text" id="start_at_time" maxlength="8" class="text ui-widget-content ui-corner-all fwduvpInputFleds">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Start playing the video at a specified time in format hours:minutes:seconds, for example 00:01:10. If you don\'t need this feature leave this blank.', 'fwduvp'); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label class="label3" for="stop_at_time"><?php esc_html_e('Stop at time:', 'fwduvp'); ?></label>
					</td>
					<td>
						<input type="text" id="stop_at_time" maxlength="8" class="text ui-widget-content ui-corner-all fwduvpInputFleds">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Stop playing the video at a specified time in format hours:minutes:seconds, for example 00:01:10. If you don\'t need this feature leave this blank.', 'fwduvp'); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label class="label4" for="password"><?php esc_html_e('Video password:', 'fwduvp'); ?></label>
					</td>
					<td>
						<input id="password" type="text" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('A unique password for this video can be set here, if left blank the global password will be used that is set in the general settings under the used preset.', 'fwduvp'); ?>">
					</td>
				</tr>
			</table>		
		</div>

		<br>
    	<div id="uploads_video_div">
			<label for="add_video_button"><?php esc_html_e('Video:', 'fwduvp'); ?></label>
			<div id="main_vids"></div>
			<button id="add_video_button"><?php esc_html_e('Add video', 'fwduvp'); ?></button>
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If multiple videos are added check the select box of the video that you want to load first.', 'fwduvp'); ?>">
		</div>

		<br>
		<div id="uploads_subtitle_div">
			<label for="add_subtitle_button"><?php esc_html_e('Subtitle:', 'fwduvp'); ?></label>
			<div id="main_subtitles"></div>
			<button id="add_subtitle_button"><?php esc_html_e('Add subtitle', 'fwduvp'); ?></button>
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If multiple subtitles are added check the select box of the subtitle that you want to load first.', 'fwduvp'); ?>">
		</div>
		
		<br>
		<div id="uploads_ads_div">
			<label for="add_ads_button"><?php esc_html_e('Advertisement pre-roll,mid-roll,post-roll:', 'fwduvp'); ?></label>
			<div id="main_ads"></div>
			<button id="add_ads_button"><?php esc_html_e('Add advertisement', 'fwduvp'); ?></button>
		</div>

		<br>
		<div id="uploads_popupad_div">
			<label for="add_popupad_button"><?php esc_html_e('Pop-up image / adsense advertisement:', 'fwduvp'); ?></label>
			<div id="main_popupads"></div>
			<button id="add_popupad_button"><?php esc_html_e('Add advertisement', 'fwduvp'); ?></button>
		</div>
		
		<br>
		<div id="uploads_cuepoint_div">
			<label for="add_cuepoint_button"><?php esc_html_e('Cuepoints:', 'fwduvp'); ?></label>
			<div id="main_cuepoints"></div>
			<button id="add_cuepoint_button"><?php esc_html_e('Add cuepoint', 'fwduvp'); ?></button>
		</div>

		<br><br>
		<table class="dialog video-final">
			<tr>
				<td>
					<label><?php esc_html_e('Thumbnails preview:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="thumbnails_preview" type="text" class="text ui-widget-content ui-corner-all">
	    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('For auto-generated live thumbnails set this to auto, this feature works with self hosted or external hosted mp4/video, HLS/m3u8, Google drive, Dropbox, Amazon S3 and more.... The .vtt version works with all the supported video formats.', 'fwduvp'); ?>">
	    		 	<button id="thumbnails_preview_button"><?php esc_html_e('Add .vtt file', 'fwduvp'); ?></button>
				</td>
			</tr>
			<tr class="empty-after-button"></tr>
			<tr>
				<td>
					<label><?php esc_html_e('Advertisement on pause:', 'fwduvp'); ?></label>	
				</td>
				<td class="has-button">
					<input id="popw_label" type="text" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Add here the URL / page source of the webpage to be displayed in the advertisement on pause window (ex:http://www.webdesign-flash.ro/iframe.html), if you don\'t want this window to appear when the video is paused leave this input blank.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Redirect page at video complete:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input type="text" id="redirect_url" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Add here an URL of the page to open when the video has finished playing, if you don\'t want this feature leave it blank.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Redirect target:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<select id="redirect_target" class="ui-corner-all">
						<option value="_blank">_blank</option>
						<option value="_self">_self</option>
						<option value="_parent">_parent</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Vast source:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input class="input1" type="text" id="fwduvp_vast_xml_url" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The absolute path of a valid VAST, VMAP or Google IMA file (this also applies to video IAM adsense), for example http://www.webdesign-flash.ro/p/uvp/content/vast.xml. This feature is optional if you don\'t need it leave it blank.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Vast target:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="fwduvp_vast_xml_target" class="ui-corner-all">
						<option value="_blank">_blank</option>
						<option value="_self">_self</option>
						<option value="_parent">_parent</option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('VAST template dosen\'t specify the target of the new window that is opened when the video ad is clicked so this option is very useful.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Vast start time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="fwduvp_vast_start_time" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The start time of for VAST ads hours:minutes:seconds, for example 01:20:20. For pre-roll set this option to 00:00:00, for mid-roll set it to any start time that you like for example 00:11:20, for post-roll set this option to the total video duration minus one second, for example if the video duration is 01:45:25 set this to 01:45:24.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Downloadable:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="vid_dl" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Use A to B loop:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="atob" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Play only if logged in:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="play_only_if_logged_in" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
					</select>
				</td>
			</tr>
		</table>
    	

		<br><br>
		<div id="vid_short_descr_div">
			<label><?php esc_html_e('Video short description:', 'fwduvp'); ?></label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "tinymce" => false);
				wp_editor("", "vidshortdescr", $settings);
			?>
		
			<strong><?php esc_html_e('Caption template:', 'fwduvp'); ?></strong>
			<br>
			&lt;p class="fwduvp-thumbnail-title"&gt;Title&lt;/p&gt;&lt;p class="fwduvp-thumbnail-description"&gt;Description.&lt;/p&gt;
			<?php if(preg_match('/acora/', FWDUVP_TEXT_DOMAIN)): ?>
				</br>
				<strong><?php esc_html_e('Video short description format:', 'fwduvp'); ?></strong><br>	
				</br>
				&lt;p class="minimalDarkThumbnailTitle"&gt;YOUR TITLE&lt;/p&gt;
				</br>
				&lt;p class="minimalDarkThumbnailDesc"&gt;Your description.&lt;/p&gt;
				<br></br>
			<?php endif; ?>
		</div>
		
		<br><br>
		<div id="vid_long_descr_div">
			<label><?php esc_html_e('Video long description:', 'fwduvp'); ?></label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "tinymce" => false);
				wp_editor("", "vidlongdescr", $settings);
			?>
		
			<strong><?php esc_html_e('Caption template:', 'fwduvp'); ?></strong>
			<br>
			&lt;p class="fwduvp-video-title"&gt;Title&lt;/p&gt;&lt;p class="fwduvp-video-main-description"&gt;Description.&lt;/p&gt;
			<br><br>
		</div>
		<?php if(preg_match('/acora/', FWDUVP_TEXT_DOMAIN)): ?>
			</br>
			<strong><?php esc_html_e('Video long description format:', 'fwduvp'); ?></strong><br>	
			</br>
			&lt;p class="minimalDarkVideoTitleDesc"&gt;YOUR TITLE&lt;/p&gt;
			</br>
			&lt;p class="minimalDarkVideoMainDesc"&gt;Your description.&lt;/p&gt;
			<br></br>
		<?php endif; ?>
		
  	</fieldset>
</div>

<div id="edit-video-dialog" title="<?php esc_html_e('Edit video', 'fwduvp'); ?>">
	<p id="edit_vid_tips"><?php esc_html_e('The video name, source and thumbnail path fields are required.', 'fwduvp'); ?></p>
	<fieldset>
    	<label for="vid_name_edit"><?php esc_html_e('Video name:', 'fwduvp'); ?></label>
    	<br>
    	<input type="text" id="vid_name_edit" class="text ui-widget-content ui-corner-all">
		<br>
    	<div id="uploads_thumb_div_edit">
    		<label for="vid_thumb_edit"><?php esc_html_e('Video thumbnail path (enter a URL or upload an image):', 'fwduvp'); ?></label>
    		<table>
    			<tr>
		    		<td class="td1">
		    			<input id="vid_thumb_edit" type="text" class="text ui-widget-content ui-corner-all">
		    		 	<button id="uploads_thumb_button_edit"><?php esc_html_e('Add Image', 'fwduvp'); ?></button>
		    		</td>
		    		<td>
		    			<img src="" id="uploads_thumb_edit">
		    		</td>
		    	</tr>
		    </table>
		</div>

		<br>
    	<div id="uploads_poster_div_edit">
    		<label for="vid_poster_edit"><?php esc_html_e('Video poster path (enter a URL or upload an image):', 'fwduvp'); ?></label>
    		<table>
    			<tr>
		    		<td class="td1">
		    			<input id="vid_poster_edit" type="text" class="text ui-widget-content ui-corner-all">
		    		 	<button id="uploads_poster_button_edit"><?php esc_html_e('Add Image', 'fwduvp'); ?></button>
		    		</td>
		    		<td>
		    			<img src="" id="uploads_poster_edit">
		    		</td>
		    	</tr>
		    </table>
		</div>
		<br>
		
		<div id="private_video_div_edit">
			<table class="dialog video-details">
				<tr>
					<td>
						<label><?php esc_html_e('Is private:', 'fwduvp'); ?></label>
					</td>
					<td>
						<select id="is_private_edit" class="ui-corner-all">
							<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
							<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
						</select>
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Set this to yes if you want a private video, this way a user will be required to enter a password to view the video.', 'fwduvp'); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label class="label2" for="start_at_time_edit"><?php esc_html_e('Start at time:', 'fwduvp'); ?></label>
					</td>
					<td>
						<input type="text" id="start_at_time_edit" maxlength="8" class="text ui-widget-content ui-corner-all fwduvpInputFleds">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Start playing the video at a specified time in format hours:minutes:seconds, for example 00:01:10. If you don\'t need this feature leave this blank.', 'fwduvp'); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label class="label3" for="stop_at_time_edit"><?php esc_html_e('Stop at time:', 'fwduvp'); ?></label>
					</td>
					<td>
						<input type="text" id="stop_at_time_edit" maxlength="8" class="text ui-widget-content ui-corner-all fwduvpInputFleds">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Stop playing the video at a specified time in format hours:minutes:seconds, for example 00:01:10. If you don\'t need this feature leave this blank.', 'fwduvp'); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label class="label4" for="password_edit"><?php esc_html_e('Video password:', 'fwduvp'); ?></label>
					</td>
					<td>
						<input id="password_edit" type="text" class="text ui-widget-content ui-corner-all">
						<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('A unique password for this video can be set here, if left blank the global password will be used that is set in the general settings under the used preset.', 'fwduvp'); ?>">
					</td>
				</tr>
			</table>
		</div>
		
    	<div id="uploads_video_div_edit">
			<label for="add_video_button_edit"><?php esc_html_e('Video source:', 'fwduvp'); ?></label>
			<div id="main_vids_edit"></div>
			<button id="add_video_button_edit"><?php esc_html_e('Add video', 'fwduvp'); ?></button>
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If multiple videos are added check the select box of the video that you want to load first.', 'fwduvp'); ?>">
		</div>
		
		<br>
		<div id="uploads_subtitle_div_edit">
			<label for="add_subtitle_button_edit"><?php esc_html_e('Subtitle source:', 'fwduvp'); ?></label>
			<div id="main_subtitles_edit"></div>
			<button id="subtitle_button_edit"><?php esc_html_e('Add subtitle', 'fwduvp'); ?></button>
			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('If multiple subtitles are added check the select box of the subtitle that you want to load first.', 'fwduvp'); ?>">
		</div>

		<br>
		<div id="uploads_ads_div_edit">
			<label for="add_ads_button_edit"><?php esc_html_e('Advertisement pre-roll,mid-roll,post-roll:', 'fwduvp'); ?></label>
			<div id="main_ads_edit"></div>
			<button id="edit_ads_button"><?php esc_html_e('Add advertisement', 'fwduvp'); ?></button>
		</div>

		<br>
		<div id="uploads_popupad_div_edit">
			<label for="edit_popupad_button"><?php esc_html_e('Pop-up image / adsense advertisement:', 'fwduvp'); ?></label>
			<div id="main_popupads_edit"></div>
			<button id="edit_popupad_button"><?php esc_html_e('Add advertisement', 'fwduvp'); ?></button>
		</div>

		<br>
		<div id="uploads_cuepoint_div_edit">
			<label for="edit_cuepoint_button"><?php esc_html_e('Cuepoints:', 'fwduvp'); ?></label>
			<div id="main_cuepoints_edit"></div>
			<button id="edit_cuepoint_button"><?php esc_html_e('Add cuepoint', 'fwduvp'); ?></button>
		</div>
		
		<br><br>
		<table class="dialog video-final">
			<tr>
				<td>
					<label><?php esc_html_e('Thumbnails preview:', 'fwduvp'); ?></label>
				</td>
				<td class="has-button">
					<input id="thumbnails_preview_edit" type="text" class="text ui-widget-content ui-corner-all">
	    			<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('For auto-generated live thumbnails set this to auto, this feature works with self hosted or external hosted mp4/video, HLS/m3u8, Google drive, Dropbox, Amazon S3 and more... The .vtt version works with all the supported video formats.', 'fwduvp'); ?>">
	    		 	<button id="thumbnails_preview_button_edit"><?php esc_html_e('Add .vtt file', 'fwduvp'); ?></button>
				</td>
			</tr>
			<tr class="empty-after-button"></tr>
			<tr>
				<td>
					<label><?php esc_html_e('Advertisement on pause:', 'fwduvp'); ?></label>	
				</td>
				<td>
					<input id="popw_label_edit" type="text" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Add here the URL / page source of the webpage to be displayed in the advertisement on pause window (ex:http://www.webdesign-flash.ro/iframe.html), if you don\'t want this window to appear when the video is paused leave this input blank.', 'fwduvp'); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="redirect_url_edit"><?php esc_html_e('Redirect page at video complete:', 'fwduvp'); ?></label>	
				</td>
				<td>
					<input type="text" id="redirect_url_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('Add here an URL of the page to open when the video has finished playing, if you don\'t want this feature leave it blank.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Redirect target:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="redirect_target_edit" class="ui-corner-all">
						<option value="_blank">_blank</option>
						<option value="_self">_self</option>
						<option value="_parent">_parent</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Vast source:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input type="text" id="fwduvp_vast_xml_url_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The absolute path of a valid VAST, VMAP or Google IMA file (this also applies to video IAM adsense), for example http://www.webdesign-flash.ro/p/uvp/content/vast.xml. This feature is optional if you don\'t need it leave it blank.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="fwduvp_vast_xml_target_edit"><?php esc_html_e('Vast target:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="fwduvp_vast_xml_target_edit" class="ui-corner-all">
						<option value="_blank">_blank</option>
						<option value="_self">_self</option>
						<option value="_parent">_parent</option>
					</select>
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('VAST template dosen\'t specify the target of the new window that is opened when the video ad is clicked so this option is very useful.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Vast start time:', 'fwduvp'); ?></label>
				</td>
				<td>
					<input class="input3" type="text" id="fwduvp_vast_start_time_edit" class="text ui-widget-content ui-corner-all">
					<img class="img-tooltip" src="<?php echo esc_url($tootlTipImgSrc); ?>" title="<?php esc_html_e('The start time of for VAST ads hours:minutes:seconds, for example 01:20:20. For pre-roll set this option to 00:00:00, for mid-roll set it to any start time that you like for example 00:11:20, for post-roll set this option to the total video duration minus one second, for example if the video duration is 01:45:25 set this to 01:45:24.', 'fwduvp'); ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Downloadable:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="vid_dl_edit" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Use A to B loop:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="atob_edit" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php esc_html_e('Play only if logged in:', 'fwduvp'); ?></label>
				</td>
				<td>
					<select id="play_only_if_logged_in_edit" class="ui-corner-all">
						<option value="yes"><?php esc_html_e('yes', 'fwduvp'); ?></option>
						<option value="no"><?php esc_html_e('no', 'fwduvp'); ?></option>
					</select>
				</td>
			</tr>
		</table>
  
		<br><br>
		<div id="vid_short_descr_div_edit">
			<label><?php esc_html_e('Video short description:', 'fwduvp'); ?></label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "tinymce" => false);
				wp_editor("", "vidshortdescredit", $settings);
			?>
			
			<strong><?php esc_html_e('Caption template:', 'fwduvp'); ?></strong>
			<br>
			&lt;p class="fwduvp-thumbnail-title"&gt;Title&lt;/p&gt;&lt;p class="fwduvp-thumbnail-description"&gt;Description.&lt;/p&gt;
		</div>
		<?php if(FWDUVP_TEXT_DOMAIN == 'acora'): ?>
			</br>
			<strong><?php esc_html_e('Video short description format:', 'fwduvp'); ?></strong><br>	
			</br>
			&lt;p class="minimalDarkThumbnailTitle"&gt;YOUR TITLE&lt;/p&gt;
			</br>
			&lt;p class="minimalDarkThumbnailDesc"&gt;Your description.&lt;/p&gt;
			<br></br>
		<?php endif; ?>
		
		<br><br>
		<div id="vid_long_descr_div_edit">
			<label><?php esc_html_e('Video long description:', 'fwduvp'); ?></label>
			<?php
				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "tinymce" => false);
				wp_editor("", "vidlongdescredit", $settings);
			?>
		
			<strong><?php esc_html_e('Caption template:', 'fwduvp'); ?></strong>
			<br>
			&lt;p class="fwduvp-video-title"&gt;Title&lt;/p&gt;&lt;p class="fwduvp-video-main-description"&gt;Description.&lt;/p&gt;
			<br><br>
		</div>
		<?php if(FWDUVP_TEXT_DOMAIN == 'acora'): ?>
			</br>
			<strong><?php esc_html_e('Video long description format:', 'fwduvp'); ?></strong><br>	
			</br>
			&lt;p class="minimalDarkVideoTitleDesc"&gt;YOUR TITLE&lt;/p&gt;
			</br>
			&lt;p class="minimalDarkVideoMainDesc"&gt;Your description.&lt;/p&gt;
			<br></br>
		<?php endif; ?>
  	</fieldset>
</div>

<div id="delete-video-dialog" title="<?php esc_html_e('Delete video', 'fwduvp'); ?>">
	<fieldset>
    	<label><?php esc_html_e('Are you sure you want to delete this video?', 'fwduvp'); ?></label>
  	</fieldset>
</div>

<div id="delete-ads-dialog" title="<?php esc_html_e('Delete advertisement', 'fwduvp'); ?>">
	<fieldset>
    	<label><?php esc_html_e('Are you sure you want to delete this advertisement?', 'fwduvp'); ?></label>
  	</fieldset>
</div>


<!-- Form. -->
<form class="main-form fwduvp" action="" method="post">
	<div class="ui-widget ui-widget-content ui-corner-all holder">
		<h3><?php esc_html_e('All main playlists:', 'fwduvp'); ?></h3>
	  	
		<div id="main_playlists">
			<?php 
				$playlists_str = "";
				if (isset($this->_data->main_playlists_ar)){
					foreach ($this->_data->main_playlists_ar as $main_playlist){
			    		$mid = $main_playlist["id"];
			    		$playlists_str .= '<div id="mp' . esc_html($mid) . '" class="main-playlist">';
			    		$playlists_str .= '<h3 class="main-playlist-header">' . esc_html($main_playlist["name"]) . '<span>ID : ' . esc_html($mid) . '</span></h3>';
			    		$playlists_str .= '<div>';
			    		$playlists_str .= '<div id="mp' . esc_html($mid) . '_pls" class="pls">';
			    		
			    		foreach ($main_playlist["playlists"] as $pid => $playlist){
							if ($playlist["type"] == "normal"){
								$playlists_str .= '<div id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '" class="playlist playlist-count normal">';
								$imgPath = $this->_dir_url . "content/icons/normal-icon.png";
								$playlists_str .= '<h3 class="playlist-header-sort playlist-header"><img src="' . esc_url_raw($imgPath) . '" class="playlist-icon"><span class="playlist-name">' . esc_html($playlist["name"]) . '</span></h3>';
								$playlists_str .= '<div>';
								$playlists_str .= '<div id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_vids" class="vids">';
								
								foreach ($playlist["videos"] as $tid => $video){
									$playlists_str .= '<div id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_vid' . esc_html($tid) . '" class="fwd-video">';
									$playlists_str .= '<h3 class="video-header">' . esc_html($video["name"]) . '</h3>';
									$playlists_str .= '<img src="' . esc_url_raw($video['thumb']) . '" class="fwd-video-image-img" id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_vid' . esc_html($tid) . '_img"/>';
									$playlists_str .= '<button class="delete_video_btn" id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_vid' . esc_html($tid) . '_del_btn">' . esc_html__('Delete', 'fwduvp') . '</button>';
									$playlists_str .= '<button class="edit_video_btn" id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_vid' . esc_html($tid) . '_edit_btn">' . esc_html__('Edit', 'fwduvp') . '</button>';
									$playlists_str .= '</div>';
								}
								
								$playlists_str .= '</div>';
								$playlists_str .= '<button class="add_video_btn" id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_add_btn">' . esc_html__('Add new video', 'fwduvp') . '</button>';
								$playlists_str .= '<button class="edit_playlist_btn" id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_edit_btn">' . esc_html__('Edit', 'fwduvp') . '</button>';
								$playlists_str .= '<button class="duplicate_playlist_btn1 duplicate_playlist_btn" id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_duplicate_btn">' . esc_html__('Duplicate playlist', 'fwduvp') . '</button>';
								$playlists_str .= "<button class='delete_playlist_btn' id='mp" . esc_html($mid) . "_pl" . esc_html($pid) . "_del_btn'>" . esc_html__('Delete', 'fwduvp') . "</button>";
								$playlists_str .= "</div>";
								$playlists_str .= "</div>";
							}else{
								$playlists_str .= '<div id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '" class="fwd-playlist playlist-count">';
								$imgPath = $this->_dir_url . 'content/icons/';
								switch ($playlist["type"]){
									case 'youtube':
										$imgPath .= 'youtube-icon.png';
										break;
									case 'folder':
										$imgPath .= 'folder-icon.png';
										break;
									case 'vimeo':
										$imgPath .= 'vimeo-icon.png';
										break;
									case 'xml':
										$imgPath .= 'xml-icon.png';
										break;
								}

								$playlists_str .= '<h3 class="playlist-header-sort pl-header"><img src="' . esc_url_raw($imgPath) . '" class="playlist-icon"><span class="playlist-name-2">' . esc_html($playlist["name"]) . '</span></h3>';	
								$playlists_str .= '<button class="delete_playlist_btn2" id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_del_btn">' . esc_html__('Delete', 'fwduvp') . '</button>';
								$playlists_str .= '<button class="duplicate_playlist_btn" id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_duplicate_btn">' . esc_html__('Duplicate playlist', 'fwduvp') . '</button>';
								$playlists_str .= '<button class="edit_playlist_btn2" id="mp' . esc_html($mid) . '_pl' . esc_html($pid) . '_edit_btn">' . esc_html__('Edit', 'fwduvp') . '</button>';
								$playlists_str .= "</div>";
							}
		    			}
			    		
			    		$playlists_str .= '</div>';
			    		$playlists_str .= '<button class="add_playlist_btn" id="mp' . esc_html($mid) . '_add_btn">' . esc_html__('Add new playlist', 'fwduvp') . '</button>';
			    		$playlists_str .= '<button class="duplicate_main_playlist_btn" id="mp' . esc_html($mid) . '_duplicate_btn">' . esc_html__('Duplicate playlist', 'fwduvp') . '</button>';
			    		$playlists_str .= '<button class="edit_main_playlist_btn" id="mp' . esc_html($mid) . '_edit_btn">' . esc_html__('Edit', 'fwduvp') . '</button>';
			    		$playlists_str .= '<button class="delete_main_playlist_btn" id="mp' . esc_html($mid) . '_del_btn">' . esc_html__('Delete', 'fwduvp') . '</button>';
			    		$playlists_str .= '</div>';
			    		$playlists_str .= '</div>';
			    	}
			    	
			    	// Display and escape playlist content.
			    	echo html_entity_decode(esc_html(htmlspecialchars($playlists_str)), ENT_QUOTES);
				}
			?>
		</div>
		
		<em id="mp_em"><?php esc_html_e('No main playlists are available.', 'fwduvp'); ?></em>
		
		<button id="add_main_playlist_btn"><?php esc_html_e('Add new main playlist', 'fwduvp'); ?></button>
  	</div>
  	
  	<input type="hidden" id="playlist_data" name="playlist_data" value="">
	<input id="update_btn" type="submit" name="submit" value="<?php esc_html_e('Update main playlists', 'fwduvp'); ?>" />
	
	<?php wp_nonce_field("fwduvp_playlist_manager_update", "fwduvp_playlist_manager_nonce"); ?>
</form>
<?php if(!(empty($msg))): ?>
<div class='fwd-updated'>
	<p class="fwd-updated-p">
		<?php echo esc_html($msg); ?>
	</p>
</div>
<?php endif; ?>