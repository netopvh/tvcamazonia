<form action="" method="post" class="fwduvp">

	<div class="ui-widget ui-widget-content ui-corner-all main">
		<label for="css_text"><?php esc_html_e('Here you can edit the video player main CSS file (css/fwduvp.css):', 'fwduvp'); ?></label>
	  	<br><br>
	  	<textarea id="css_text" cols="256" rows="35"><?php echo fread($handle, filesize($css_file)); ?></textarea>
  	</div>

  	
  	<input type="hidden" id="css_data" name="css_data" value="">
  	<input type="hidden" id="scroll_pos" name="scroll_pos" value="<?php echo esc_html($scroll_pos); ?>">
	<input id="update_btn" type="submit" name="submit" value="<?php esc_html_e('Update CSS file', 'fwduvp'); ?>" />
	<?php wp_nonce_field("fwduvp_css_editor_update", "fwduvp_css_editor_nonce"); ?>

</form>

<?php if(!(empty($msg))): ?>
<div class='fwd-updated'>
	<p class="fwd-updated-p">
		<?php echo esc_html($msg); ?>
	</p>
</div>
<?php endif; ?>