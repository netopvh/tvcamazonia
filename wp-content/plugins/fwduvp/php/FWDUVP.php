<?php
/**
 * Main class.
 *
 * @package fwduvp
 * @since fwduvp 1.0
 */

class FWDUVP{
	
	const MIN_WP_VER =  "3.5.0";
	const CAPABILITY = "edit_fwduvp";
	const VERSION = '9.5.1';
	private $_data;
	private $_dir_url;
    private static $_uvp_id = 0;
    private static $_pl_id = 0;
    public $set_id = 0;
    public $set_order_id = 0;
    public $tab_init_id = 0;
	
 
    // Constructor.
    public function init(){
		$this->_dir_url = plugin_dir_url(dirname(__FILE__));
	
    	// Set hooks.
    	add_action("admin_menu", array($this, "add_plugin_menu"));
    	add_action('admin_enqueue_scripts', array($this, "fwduvp_enqueue_admin_files"));
		add_action("wp_enqueue_scripts", array($this, "fwduvp_add_scripts_and_styles"));
		add_shortcode("fwduvp", array($this, "fwduvp_set_player"));
		
		// set data
		$this->_data = new FWDUVPData();		
		$this->_data->init();

		// Make plugin available for translation.
		load_plugin_textdomain('fwduvp', false, basename(realpath(__DIR__ . '/..')) . '/languages/');
		
    }

	
    // Add menu.
    public function add_plugin_menu(){
        add_menu_page("Ultimate Video Player", "Ultimate Video Player", FWDUVP::CAPABILITY, "fwduvp-menu-general-settings", array($this, "fwduvp_set_general_settings"), esc_url_raw($this->_dir_url) . "content/icons/menu-icon.png");
		add_submenu_page("fwduvp-menu-general-settings", esc_html__('General settings', 'fwduvp'), esc_html__('General settings', 'fwduvp'), FWDUVP::CAPABILITY, "fwduvp-menu-general-settings");
		add_submenu_page("fwduvp-menu-general-settings", esc_html__('Playlists manager', 'fwduvp'), esc_html__('Playlists manager', 'fwduvp'), FWDUVP::CAPABILITY, "fwduvp-menu-playlists-manager", array($this, "fwduvp_set_playlists_manager"));
		add_submenu_page("fwduvp-menu-general-settings", esc_html__('CSS Editor', 'fwduvp'), esc_html__('CSS Editor', 'fwduvp'), FWDUVP::CAPABILITY, "fwduvp-menu-css-editor", array($this, "fwduvp_set_css_editor"));
       	
       	// add meta boxes
       	$post_type_screens = array("post", "page");
       	$args = array(
	       'public'   => true,
	       '_builtin' => false,
	    );
       	$custom_post_types = get_post_types($args);
       	foreach ($custom_post_types as $screen){
       		$post_type_screens[] = $screen;
       	}
		
    	foreach ($post_type_screens as $screen){
       		add_meta_box("fwduvp-shortcode-generator", "Ultimate Video Player Shortcode Generator",  array($this, "fwduvp_set_custom_meta_box"), $screen, "side", "default");
    	}
    }

    // Add backend files.
    public function fwduvp_enqueue_admin_files($hook){

    	// General settings.
    	if($hook == 'toplevel_page_fwduvp-menu-general-settings'){
    		wp_enqueue_style("fwduvp_spectrum", esc_url_raw($this->_dir_url) . "css/spectrum.css", array(), FWDUVP::VERSION);
	    	wp_enqueue_style("fwduvp_general_settings", esc_url_raw($this->_dir_url) . "css/general_settings.css", array(), FWDUVP::VERSION);
			wp_enqueue_style("fwduvp_fwd_ui", esc_url_raw($this->_dir_url). "css/fwd_ui.css", array(), '1.10.4');
			wp_enqueue_script("fwduvp_fwdtooltip", esc_url_raw($this->_dir_url) . "js/fwdtooltip.js", array(), '1.0');
			wp_enqueue_script("fwduvp_spectrum", esc_url_raw($this->_dir_url) . "js/spectrum.js", array(), FWDUVP::VERSION);
			wp_enqueue_script("jquery-ui-tabs");			
			wp_enqueue_media();
			wp_enqueue_script("fwduvp_general_settings", esc_url_raw($this->_dir_url) . "js/general_settings.js", array(), FWDUVP::VERSION, true);

		// Playlist manager.
    	}else if($hook == 'ultimate-video-player_page_fwduvp-menu-playlists-manager'){
    		wp_enqueue_style("fwduvp_fwd_ui_css", esc_url_raw($this->_dir_url) . "css/fwd_ui.css", array(), '1.10.4');
    		wp_enqueue_style("fwduvp_playlist_manager", esc_url_raw($this->_dir_url) . "css/playlist_manager.css", array(), FWDUVP::VERSION);
			wp_enqueue_script("fwduvp_fwdtooltip", esc_url_raw($this->_dir_url) . "js/fwdtooltip.js", array(), '1.0');
			wp_enqueue_script("jquery-ui-sortable");
			wp_enqueue_script("jquery-ui-accordion");
			wp_enqueue_script("jquery-ui-dialog");
			wp_enqueue_media();
			wp_enqueue_script("fwduvp_playlist_manager", esc_url_raw($this->_dir_url) . "js/playlist_manager.js", array(), FWDUVP::VERSION, true);

		// CSS editor.
    	}else if($hook == 'ultimate-video-player_page_fwduvp-menu-css-editor'){
    		wp_enqueue_style("fwduvp_fwd_ui_css", esc_url_raw($this->_dir_url) . "css/fwd_ui.css", array(), '1.10.4');
    		wp_enqueue_style("fwduvp_css_editor", esc_url_raw($this->_dir_url) . "css/css_editor.css", array(), FWDUVP::VERSION);
    		wp_enqueue_script("fwduvp_css_editor", esc_url_raw($this->_dir_url) . "js/css_editor.js", array(), FWDUVP::VERSION, true);

    	// Shortcode.
    	}else if($hook == 'post.php' || $hook == 'post-new.php'){
    		wp_enqueue_style("fwduvp_schortcode", esc_url_raw($this->_dir_url) . "css/shortcode.css", array(), FWDUVP::VERSION);
    		wp_enqueue_style("fwduvp_fwd_ui_css", esc_url_raw($this->_dir_url) . "css/fwd_ui.css", array(), '1.10.4');
			wp_enqueue_script("fwduvp_fwdtooltip", esc_url_raw($this->_dir_url) . "js/fwdtooltip.js", array(), '1.0');
			wp_enqueue_script("fwduvp_shortcode_script", esc_url_raw($this->_dir_url) . "js/shortcode.js", array(), FWDUVP::VERSION, true);
    	}
    }


    // Add front js and css.
    public function fwduvp_add_scripts_and_styles(){
     	global $post, $wpdb;
     	if(empty($post)) return;

		$shortcode_found = false;
       	if(has_shortcode($post->post_content, 'fwduvp')){
          	$shortcode_found = true;
       	}else if(isset($post->ID)){ 
          	$result = $wpdb->get_var($wpdb->prepare(
            "SELECT count(*) FROM $wpdb->postmeta " .
            "WHERE post_id = %d and meta_value LIKE '%%fwduvp%%'", $post->ID));
          	$shortcode_found = !empty($result);
       	}
		
		// Uncomment this to add the front requires js/css files only if the shortcode is found in the page/post.
		//if(!empty($shortcode_found)){
		if(!preg_match('/acora/', FWDUVP_TEXT_DOMAIN)){
			wp_enqueue_style("fwduvp", esc_url_raw($this->_dir_url) . "css/fwduvp.css", array(), FWDUVP::VERSION);
		} 
		wp_enqueue_script("fwduvp", esc_url_raw($this->_dir_url) . "js/FWDUVP.js", array(), FWDUVP::VERSION, true);
		//}	
	}


 	// Check WP version.   
	private function fwduvp_check_wp_ver(){
	    global $wp_version;
	    
		$exit_msg = "The Ultimate Video Player plugin requires WordPress " . FWDUVP::MIN_WP_VER . " or newer. <a href='http://codex.wordpress.org/Updating_WordPress'>Please update!</a>";
		
		if (version_compare($wp_version, FWDUVP::MIN_WP_VER) <= 0){
			echo $exit_msg;
			return false;
		}
		return true;
	}


	// Set general settings.
    public function fwduvp_set_general_settings($hook){
    	if (!$this->fwduvp_check_wp_ver()){
    		return;
    	}
    	
    	$msg = "";
    	$set_id = 0;
		$set_order_id = 0;
		$tab_init_id = 0;
		$tootlTipImgSrc = esc_url_raw($this->_dir_url . "content/icons/help-icon.png"); 
		$fwduvpIconsPath =  esc_url_raw($this->_dir_url . "content/icons/");
    	
	    if (!empty($_POST) && check_admin_referer("fwduvp_general_settings_update", "fwduvp_general_settings_nonce")){
			$data_obj = json_decode(str_replace("\\", "", $_POST["settings_data"]), true);
			
			$action = $data_obj["action"];
			$fwduvpSettingsAr = $data_obj["settings_ar"];
			$fwduvpVideoStartBehaviour = $data_obj["fwduvpVideoStartBehaviour"];
	
			// Validate input.
			foreach ($fwduvpSettingsAr as $key => $value) {
	
				if(!empty($fwduvpSettingsAr[$key]["autoPlayText"])){
					$fwduvpSettingsAr[$key]["autoPlayText"] = sanitize_text_field($fwduvpSettingsAr[$key]["autoPlayText"]);
				}
					
				if(!empty($fwduvpSettingsAr[$key]["googleAnalyticsMeasurementId"])){
					$fwduvpSettingsAr[$key]["googleAnalyticsMeasurementId"] = sanitize_text_field($fwduvpSettingsAr[$key]["googleAnalyticsMeasurementId"]);
				}

				if(!empty($fwduvpSettingsAr[$key]["subtitles_off_label"])){
					$fwduvpSettingsAr[$key]["subtitles_off_label"] = sanitize_text_field($this->fwduvp_clean_name($fwduvpSettingsAr[$key]["subtitles_off_label"]));
				}

				if(!empty($fwduvpSettingsAr[$key]["privateVideoPassword"])){
					$fwduvpSettingsAr[$key]["privateVideoPassword"] = sanitize_text_field($fwduvpSettingsAr[$key]["privateVideoPassword"]);
				}

				if(!empty($fwduvpSettingsAr[$key]["loggedInMessage"])){
					$fwduvpSettingsAr[$key]["loggedInMessage"] = esc_html($fwduvpSettingsAr[$key]["loggedInMessage"]);
				}
				if(!empty($fwduvpSettingsAr[$key]["logo_link"])){
					$fwduvpSettingsAr[$key]["logo_link"] = sanitize_text_field($fwduvpSettingsAr[$key]["logo_link"]);
				}
				if(!empty($fwduvpSettingsAr[$key]["logo_path"])){
					$fwduvpSettingsAr[$key]["logo_path"] = sanitize_text_field($fwduvpSettingsAr[$key]["logo_path"]);
				}
				if(!empty($fwduvpSettingsAr[$key]["skip_to_video_text"])){
					$fwduvpSettingsAr[$key]["skip_to_video_text"] = sanitize_text_field($fwduvpSettingsAr[$key]["skip_to_video_text"]);
				}
				if(!empty($fwduvpSettingsAr[$key]["skip_to_video_button_text"])){
					$fwduvpSettingsAr[$key]["skip_to_video_button_text"] = sanitize_text_field($fwduvpSettingsAr[$key]["skip_to_video_button_text"]);
				}
				if(!empty($fwduvpSettingsAr[$key]["aopwTitle"])){
					$fwduvpSettingsAr[$key]["aopwTitle"] = sanitize_text_field($fwduvpSettingsAr[$key]["aopwTitle"]);
				}
				if(!empty($fwduvpSettingsAr[$key]["uvp_mainBackgroundImagePath"])){
					$fwduvpSettingsAr[$key]["uvp_mainBackgroundImagePath"] = sanitize_text_field($fwduvpSettingsAr[$key]["uvp_mainBackgroundImagePath"]);
				}
			}  
			
			$this->_data->settings_ar = $fwduvpSettingsAr;
			$this->_data->videoStartBehaviour = $fwduvpVideoStartBehaviour;
	
			$this->_data->set_data();

			switch ($action){
			    case "add":
			    	$msg = esc_html__("Your new preset has been added!", 'fwduvp');
			        $set_id = $data_obj["set_id"];
					$set_order_id = $data_obj["set_order_id"];
					$tab_init_id = $data_obj["fwduvpCurTabId"];
			        break;
			    case "save":
			        $msg = esc_html__("Your preset settings have been updated!", 'fwduvp');
			        $set_id = $data_obj["set_id"];
					$set_order_id = $data_obj["set_order_id"];
					$tab_init_id = $data_obj["fwduvpCurTabId"];
			        break;
			    case "del":
			    	$msg = esc_html__("Your preset has been deleted!", 'fwduvp');
			        break;
			}
		}
		
		// Add and escape required js vars.
        $vars = 'var fwduvpSettingsAr = ' . '"' . esc_html(htmlspecialchars(json_encode($this->_data->settings_ar))) . '";';
        $vars .= 'var fwduvpVideoStartBehaviour = ' . '"' . esc_html(htmlspecialchars(json_encode($this->_data->videoStartBehaviour))) . '";';
        $vars .= 'var fwduvpTextDomain = ' . '"' . esc_html(FWDUVP_TEXT_DOMAIN) . '";';
        $vars .= 'var fwduvpSpacesUrl = ' . '"' . esc_url_raw($this->_dir_url . "content/spaces/") . '";';
        $vars .= 'var fwduvpSetId = ' .  esc_html($set_id) .';';
    	$vars .= 'var fwduvpCurOrderId = ' .  esc_html($set_order_id) .';';
    	$vars .= 'var fwduvpCurTabId = ' . esc_html($tab_init_id) .';';
        wp_add_inline_script('fwduvp_general_settings', $vars);

    	include_once "general_settings.php";
    }
    

    // Set playlist settings.
 	public function fwduvp_set_playlists_manager(){
    	if (!$this->fwduvp_check_wp_ver()){
    		return;
    	}
    	
    	$msg = "";
    	$tootlTipImgSrc = esc_url_raw($this->_dir_url . "content/icons/help-icon.png");
    	
	    if (!empty($_POST) && check_admin_referer("fwduvp_playlist_manager_update", "fwduvp_playlist_manager_nonce")){
			$fwduvpMainPlaylistsAr = json_decode(str_replace("\\", "", $_POST["playlist_data"]), true);
			
			// Validate input.
			foreach($fwduvpMainPlaylistsAr as &$mainPlaylist){

				if(!empty($mainPlaylist['name'])){
					$mainPlaylist['name'] = sanitize_text_field($this->fwduvp_clean_name($mainPlaylist['name']));
				}

				foreach($mainPlaylist['playlists'] as &$playlist){
					
					if(!empty($playlist['password'])){
						$playlist['password'] = sanitize_text_field($playlist['password']);
					}
					if(!empty($playlist['name'])){
						$playlist['name'] = sanitize_text_field($this->fwduvp_clean_name($playlist['name']));
					}

					if(!empty($playlist['source'])){
						if($playlist['type'] == 'folder'){
							$playlist['source'] = sanitize_text_field($this->fwduvp_clean_folder_name($playlist['source']));
						}else{
							$playlist['source'] = esc_url_raw($playlist['source']);
						}
					}

					if(!empty($playlist['thumb'])){
						$playlist['thumb'] = sanitize_text_field($playlist['thumb']);
					}

					if(!empty($playlist['text'])){
						$playlist['text'] = wp_kses_post($playlist['text']);
					}

					foreach($playlist['videos'] as &$video){
						if(!empty($video['name'])){
							$video['name'] = sanitize_text_field($this->fwduvp_clean_name($video['name']));
						}

						foreach($video['vids_ar'] as &$fvideo){
							if(!empty($fvideo['source'])){
								$fvideo['source'] = esc_url_raw($fvideo['source']);
							}
							if(!empty($fvideo['label'])){
								$fvideo['label'] = sanitize_text_field($this->fwduvp_clean_name($fvideo['label']));
							}
						}

						foreach($video['ads_ar'] as &$fads){
							if(!empty($fads['source'])){
								$fads['source'] = esc_url_raw($fads['source']);
							}
							if(!empty($fads['url'])){
								$fads['url'] = esc_url_raw($fads['url']);
							}
							if(!empty($fads['label'])){
								$fads['label'] = sanitize_text_field($this->fwduvp_clean_name($fads['label']));
							}
						}

						foreach($video['subtitles_ar'] as &$fsubtitles){
							if(!empty($fsubtitles['source'])){
								$fsubtitles['source'] = esc_url_raw($fsubtitles['source']);
							}
							if(!empty($fsubtitles['label'])){
								$fsubtitles['label'] = sanitize_text_field($this->fwduvp_clean_name($fsubtitles['label']));
							}
						}

						foreach($video['popupads_ar'] as &$fpopupads){
							if(!empty($fpopupads['source'])){
								$fpopupads['source'] = esc_url_raw($fpopupads['source']);
							}

							if(!empty($fpopupads['label'])){
								$fpopupads['label'] = sanitize_text_field($this->fwduvp_clean_name($fpopupads['label']));
							}

							if(!empty($fpopupads['url'])){
								$fpopupads['url'] = esc_url_raw($fpopupads['url']);
							}

							if(!empty($fpopupads['google_ad_client'])){
								$fpopupads['google_ad_client'] = esc_html($fpopupads['google_ad_client']);
							}

							if(!empty($fpopupads['google_ad_slot'])){
								$fpopupads['google_ad_slot'] = esc_html($fpopupads['google_ad_slot']);
							}
						}
					
						foreach($video['cuepoints_ar'] as &$fcuepoints){
							if(!empty($fcuepoints['label'])){
								$fcuepoints['label'] = sanitize_text_field($fcuepoints['code']);
							}
							if(!empty($fcuepoints['code'])){
								$fcuepoints['code'] = sanitize_text_field($fcuepoints['code']);
							}
						}
						
						if(!empty($video['popw_label'])){
							$video['popw_label'] = esc_url_raw($this->fwduvp_clean_name($video['popw_label']));
						}

						if(!empty($video['thumb'])){
							$video['thumb'] = sanitize_text_field($video['thumb']);
						}
						
						if(!empty($video['popw'])){
							$video['popw'] = esc_url_raw($video['popw']);
						}

						if(!empty($video['redirectURL'])){
							$video['redirectURL'] = esc_url_raw($video['redirectURL']);
						}

						if(!empty($video['poster'])){
							$video['poster'] = esc_url_raw($video['poster']);
						}	

						if(!empty($video['password'])){
							$video['password'] = sanitize_text_field($video['password']);
						}

						if(!empty($video['vastURL'])){
							$video['vastURL'] = esc_url_raw($video['vastURL']);
						}

						if(!empty($video['short_descr'])){
							$video['short_descr'] = wp_kses_post($video['short_descr']);
						}

						if(!empty($video['long_descr'])){
							$video['long_descr'] = wp_kses_post($video['long_descr']);
						}

						if(!empty($video['thumbnails_preview'])){
							$video['thumbnails_preview'] = sanitize_text_field($video['thumbnails_preview']);
						}
					}
				}
			}
			unset($mainPlaylist);
			unset($playlist);
			unset($video);
			unset($fvideo);
			unset($fsubtitles);
			unset($fcuepoints);
			unset($fpopupads);
			unset($fads);
			
			$this->_data->main_playlists_ar = $fwduvpMainPlaylistsAr;
			$this->_data->set_data();
			$msg = esc_html__("Your playlists have been updated!", 'fwduvp');
		}

		// Add and escape required js vars.
        $vars = 'var fwduvpMainPlaylistsAr = ' . '"' . esc_html(htmlspecialchars(json_encode($this->_data->main_playlists_ar))) . '";';
        $vars .= 'var fwduvpIconsPath = ' . '"' . esc_url_raw($this->_dir_url) . "content/icons/" . '";';
        $vars .= 'var fwduvpAddNewVideo__ = ' . '"' . esc_html__('Add new video', 'fwduvp') . '";';
        $vars .= 'var fwduvpEdit__ = ' . '"' . esc_html__('Edit', 'fwduvp') . '";';
        $vars .= 'var fwduvpDelete__ = ' . '"' . esc_html__('Delete', 'fwduvp') . '";';
        $vars .= 'var fwduvpDuplicatePlaylist__ = ' . '"' . esc_html__('Duplicate playlist', 'fwduvp') . '";';
        $vars .= 'var fwduvpAddNewPlaylist__ = ' . '"' . esc_html__('Add new playlist', 'fwduvp') . '";';
        $vars .= 'var fwduvpUpdate__ = ' . '"' . esc_html__('Update', 'fwduvp') . '";';
        $vars .= 'var fwduvpAdd__ = ' . '"' . esc_html__('Add', 'fwduvp') . '";';
        $vars .= 'var fwduvpCancel__ = ' . '"' . esc_html__('Cancel', 'fwduvp') . '";';
        $vars .= 'var fwduvpYes__ = ' . '"' . esc_html__('Yes', 'fwduvp') . '";';
        $vars .= 'var fwduvpNo__ = ' . '"' . esc_html__('No', 'fwduvp') . '";';
        $vars .= 'var fwduvpYoutubeInfo__ = ' . '"' . esc_html__('The source must be a youtube playlist or youtube channel URL.', 'fwduvp') . '";';
        $vars .= 'var fwduvpFolderInfo__ = ' . '"' . esc_html__('The source represents the relative path to a folder containing only MP4 files that must be a subfolder of the \'content\' folder contained in the plugin directory \'wp-content/plugins/fwduvp\'.', 'fwduvp') . '";';
        $vars .= 'var fwduvpXmlInfo__ = ' . '"' . esc_html__('The source represents the absolute path of an XML file that contains a formatted XML playlist. You can get the file example from the plugin main zip file or from the following URL  http://webdesign-flash.ro/w/uvp/content/playlist_dark.xml.', 'fwduvp') . '";';
        $vars .= 'var fwduvpVideoTip__ = ' . '"' . esc_html__('The video name, source and thumbnail path fields are required.', 'fwduvp') . '";';
        $vars .= 'var fwduvpVideoOneSource__ = ' . '"' . esc_html__('Please make sure at least one video source is added.', 'fwduvp') . '";';
        $vars .= 'var fwduvpPlaylistNameRequired__ = ' . '"' . esc_html__('The playlist name is required (and also the playlist source if the type is not normal).', 'fwduvp') . '";';
        
        wp_add_inline_script('fwduvp_playlist_manager', $vars);

    	include_once "playlist_manager.php";
    }
    

    // Set CSS editor.
    public function fwduvp_set_css_editor(){
    	if (!$this->fwduvp_check_wp_ver()){
    		return;
    	}
    	
    	$msg = "";
    	$scroll_pos = 0;
    	
    	$css_file = plugin_dir_path(dirname(__FILE__)) . "css/fwduvp.css";
    	
	    if (!empty($_POST) && check_admin_referer("fwduvp_css_editor_update", "fwduvp_css_editor_nonce")){
			$handle = fopen($css_file, "w") or die("Cannot open file: " . $css_file);
			
			$data = str_replace("\\", "", $_POST["css_data"]);
			$data = str_replace("'e", "'\\e", $data);

			$scroll_pos = $_POST["scroll_pos"];
			
			fwrite($handle, $data);
			
			$msg = esc_html__('The CSS file has been updated!', 'fwduvp');
		}
		
		$handle = fopen($css_file, "r") or die("Cannot open file: " . $css_file);
    	include_once "css_editor.php";
    	fclose($handle);
    }
    

    // Set action link.
	public static function fwduvp_set_action_links($links){
		$settings_link = "<a href='" . get_admin_url(null, "admin.php?page=fwduvp-menu-general-settings") . "'>Settings</a>";
   		array_unshift($links, $settings_link);
   		
   		return $links;
	}
    
    
    // Extract shortcode.
	public function fwduvp_set_player($atts){
		
		extract(shortcode_atts(array("preset_id" => 0, "playlist_id" => 0, "start_at_playlist"=>"", "start_at_video"=>""), $atts, "fwduvp"));

		// Check for preset.
		$preset = NULL;
    	foreach ($this->_data->settings_ar as $set){
    		if ($set["name"] == $preset_id){
    			$preset = $set;
    		}
    	}
    	
    	if (is_null($preset)){
    		return "Ultimate Video Player with preset id <strong>". esc_html($preset_id) . "</strong> does not exist!";
    	}
    	
    	// Check for playlist.
    	$main_playlist = NULL;
    	foreach ($this->_data->main_playlists_ar as $pl){
    		if ($pl["name"] == $playlist_id){
    			$main_playlist = $pl;
    		}
    	}
    	 	
    	if (is_null($main_playlist)){
    		return "Ultimate Video Player playlist with id <strong>". esc_html($playlist_id) . "</strong> does not exist!";
    	}
	
		// Get data for output.
		$uvp_constructor = $this->fwduvp_get_constructor($preset, $playlist_id, $start_at_playlist, $start_at_video);
		$uvp_div = "<div id='fwduvpDiv" . FWDUVP::$_uvp_id. "' class='fwduvp fwd-hide'></div>";
		$uvp_main_playlist = $this->fwduvp_get_main_playlist($playlist_id);
		FWDUVP::$_uvp_id++;
		$uvp_output = $uvp_div . $uvp_main_playlist;

		// Register JS.
		wp_register_script('fwduvp-dummy-handle-footer', '', [], '', true);
   		wp_enqueue_script( 'fwduvp-dummy-handle-footer'  );
    	wp_add_inline_script('fwduvp-dummy-handle-footer', $uvp_constructor);
		
		return $uvp_output; // All dynamic data was escaped!
	}
	

	// Add shortcode metabox.
	public function fwduvp_set_custom_meta_box($post){
		
		if (!$this->fwduvp_check_wp_ver()){
    		return;
    	}
		
		$tootlTipImgSrc = esc_url_raw($this->_dir_url) . "content/icons/help-icon.png"; 

		// presets
		$presetsNames = array();
		
		foreach ($this->_data->settings_ar as $setting){
    		$el = array(
					"id" => $setting["id"],
					"name" => $setting["name"]
			   );
    				   
    		array_push($presetsNames, $el);
    	}
    	
		// playlists
		$mainPlaylistsNames = array();
		
		if (isset($this->_data->main_playlists_ar)){
			foreach ($this->_data->main_playlists_ar as $main_playlist){
	    		$el = array(
    						"id" => $main_playlist["id"],
    						"name" => $main_playlist["name"]
    				   );
	    				   
	    		array_push($mainPlaylistsNames, $el);
	    	}
		}

		// Add and escape required js vars.
		$vars = 'var fwduvpPresetsObj = ' . '"' . esc_html(htmlspecialchars(json_encode($presetsNames))) . '";';
		$vars .= 'var fwduvpMainPlaylistsObj = ' . '"' . esc_html(htmlspecialchars(json_encode($mainPlaylistsNames))) . '";';
		wp_add_inline_script('fwduvp_shortcode_script', $vars);
		
    	include_once "meta_box.php";
	}
	

	// Check if user is lggedin.
	public function fwduvp_is_user_logged_in() {
		$user = wp_get_current_user();
		return $user->exists();
	}


	// Get user IP.
	public function fwduvp_get_the_user_ip(){
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			// Check ip from share internet.
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			// Check ip is pass from proxy.
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	

	// Get constructor.
	public function fwduvp_get_constructor($preset, $playlistId, $start_at_playlist, $start_at_video) {
    	
    	if(!is_numeric($start_at_playlist)){
    		$start_at_playlist = intval($preset['start_at_playlist']);
    	}

    	if(!is_numeric($start_at_video)){
    		$start_at_video = intval($preset['start_at_video']);
    	}

		$isLoggedIn = $this->fwduvp_is_user_logged_in();
		if($preset['playIfLoggedIn'] == "yes" && $isLoggedIn) $preset['playIfLoggedIn'] = 'no';
		
		$preset['loggedInMessage'] = $preset['loggedInMessage'];

		$youtubePlaylistAPI = empty($preset['youtubePlaylistAPI']) ? '' : $preset['youtubePlaylistAPI'];
		$fps = '';
		if($preset['useFingerPrintStamp'] == 'yes'){
			$fps .= 'var fwduvpFingerPrintStamp={';
			$fps .= '\'<span class="fwduvp-finger-print-stamp"><span class="fwduvp-user-header">User:</span>\':\'<span class="fwduvp-user-text">' . wp_get_current_user()->display_name .'</span></span>\',';
			$fps .= '\'<span class="fwduvp-finger-print-stamp"><span class="fwduvp-name-header">Name:</span>\':\'<span class="fwduvp-name-text">' . wp_get_current_user()->user_nicename .'</span></span>\',';
			$fps .= '\'<span class="fwduvp-finger-print-stamp"><span class="fwduvp-email-header">Email:</span>\':\'<span class="fwduvp-email-text">' . wp_get_current_user()->user_email .'</span></span>\',';
			$fps .= '\'<span class="fwduvp-finger-print-stamp"><span class="fwduvp-ip-header">IP:</span>\':\'<span class="fwduvp-ip-text">' . $this->fwduvp_get_the_user_ip() .'</span></span>\',';
			$fps .= '\'<span class="fwduvp-finger-print-stamp"><span class="fwduvp-time-header">Time:</span>\':\'<span class="fwduvp-time-text">' . date( 'F j, Y H:i:s', current_time('timestamp', 0)) .'</span></span>\',';
			$fps .= '};';
		}
	

    	$output =  html_entity_decode(esc_html($fps), ENT_QUOTES) . "document.addEventListener('DOMContentLoaded', function(){if(document.getElementById('fwduvpDiv" . esc_html(FWDUVP::$_uvp_id) . "')){loadUVP" . esc_html(FWDUVP::$_uvp_id) . "();}});function loadUVP" . esc_html(FWDUVP::$_uvp_id) . "(){FWDUVPUtils.checkIfHasTransofrms();FWDUVPlayer.videoStartBehaviour = '" . esc_html($this->_data->videoStartBehaviour) . "';new FWDUVPlayer({" . "instanceName:'fwduvpPlayer" . esc_html(FWDUVP::$_uvp_id) . "',parentId:'fwduvpDiv" . esc_html(FWDUVP::$_uvp_id) . "',playlistsId:\"fwduvpMainPlaylist" . html_entity_decode(esc_html($playlistId), ENT_QUOTES) . "\",goFullScreenOnButtonPlay:'" . esc_html($preset['goFullScreenOnButtonPlay']) ."',fillEntireposterScreen:'" . esc_html($preset['fillEntireposterScreen']) ."',fillEntireVideoScreen:'" . esc_html($preset['fill_entire_video_screen']) . "',useHEXColorsForSkin:'" . esc_html($preset['use_HEX_colors_for_skin']) . "',normalHEXButtonsColor:'" . esc_html($preset['normal_HEX_buttons_color']) . "',privateVideoPassword:'" . esc_html($preset['privateVideoPassword']) . "',showContextmenu:'" .  esc_html($preset['showContextmenu']) . "',showScriptDeveloper:'" .  esc_html($preset['showScriptDeveloper']) . "',contextMenuBackgroundColor:'" .  esc_html($preset['contextMenuBackgroundColor']) . "',contextMenuBorderColor:'" .  esc_html($preset['contextMenuBorderColor']) . "',contextMenuSpacerColor:'" .  esc_html($preset['contextMenuSpacerColor']) . "',contextMenuItemNormalColor:'" .  esc_html($preset['contextMenuItemNormalColor']) . "',contextMenuItemSelectedColor:'" .  esc_html($preset['contextMenuItemSelectedColor']) . "',showYoutubeRelAndInfo:'" . esc_html($preset['showYoutubeRelAndInfo']) . "',contextMenuItemDisabledColor:'" .  esc_html($preset['contextMenuItemDisabledColor']) . "',stickyOnScroll:'" . esc_html($preset['stickyOnScroll']) . "',stickyOnScrollShowOpener:'" . esc_html($preset['stickyOnScrollShowOpener'])  . "',youtubeAPIKey:'" .  esc_html($youtubePlaylistAPI)  . "',stickyOnScrollWidth:" . esc_html($preset['stickyOnScrollWidth']) . ",stickyOnScrollHeight:" . esc_html($preset['stickyOnScrollHeight']) .",googleAnalyticsMeasurementId:'" . esc_html($preset['googleAnalyticsMeasurementId']) . "',randomizePlaylist:'" . esc_html($preset['randomizePlaylist']) . "',showRewindButton:'" . esc_html($preset['showRewindButton']) . "',showDefaultControllerForVimeo:'" . esc_html($preset['showDefaultControllerForVimeo']) . "',preloaderBackgroundColor:'" . esc_html($preset['preloaderColor1']) . "',preloaderFillColor:'" . esc_html($preset['preloaderColor2'])  . "',isLoggedIn:'" . esc_html($isLoggedIn) . "',playIfLoggedIn:'" .  esc_html($preset['playIfLoggedIn']) . "',lightBoxBackgroundColor:'" .  esc_html($preset['lightBoxBackgroundColor']) . "',closeLightBoxWhenPlayComplete:'" .  esc_html($preset['closeLightBoxWhenPlayComplete']) . "',lightBoxBackgroundOpacity:" .  esc_html($preset['lightBoxBackgroundOpacity']) . ",playIfLoggedInMessage:\"" . html_entity_decode($preset['loggedInMessage'], ENT_QUOTES) . "\",executeCuepointsOnlyOnce:'" .   esc_html($preset['executeCuepointsOnlyOnce']) . "',showOpener:'" .   esc_html($preset['showOpener']) . "',verticalPosition:'" . esc_html($preset['verticalPosition'])  . "',useResumeOnPlay:'" .  esc_html($preset['useResumeOnPlay']) . "',logoTarget:'" .  esc_html($preset['logoTarget']) . "',useFingerPrintStamp:'" .  esc_html($preset['useFingerPrintStamp']) . "',frequencyOfFingerPrintStamp:" .  esc_html($preset['frequencyOfFingerPrintStamp']) . ",durationOfFingerPrintStamp:" . esc_html($preset['durationOfFingerPrintStamp']) . ",playsinline:'" .  esc_html($preset['playsinline']) . "',horizontalPosition:'" .  esc_html($preset['horizontalPosition']) . "',showPlayerByDefault:'" .  esc_html($preset['showPlayerByDefault']) . "',animatePlayer:'" .  esc_html($preset['animatePlayer']) . "',showOpenerPlayPauseButton:'" .  esc_html($preset['showOpenerPlayPauseButton']) . "',openerAlignment:'" . esc_html($preset['openerAlignment']) . "',mainBackgroundImagePath:'" .  esc_html($preset['mainBackgroundImagePath']) . "',openerEqulizerOffsetTop:" .  esc_html($preset['openerEqulizerOffsetTop']) . ",openerEqulizerOffsetLeft:" .  $preset['openerEqulizerOffsetLeft'] . ",offsetX:" .  $preset['offsetX'] . ",offsetY:" .  $preset['offsetY']. ",showScrubberWhenControllerIsHidden:'" . esc_html($preset['showScrubberWhenControllerIsHidden']) . "',useVectorIcons:'" .  esc_html($preset['useVectorIcons']) . "',mainFolderPath:'" . esc_url_raw($this->_dir_url) . "content'," . "skinPath:'" . esc_html($preset['skin_path']) . "',displayType:'" . $preset['display_type'] . "',showSubtitleButton:'" . $preset['showSubtitleButton'] . "',useYoutube:'" . $preset['showErrorInfo'] . "',initializeOnlyWhenVisible:'" . esc_html($preset['initializeOnlyWhenVisible']) . "',showPreloader:'" . esc_html($preset['showPreloader']) . "',useDeepLinking:'" . esc_html($preset['use_deeplinking']) . "',addKeyboardSupport:'" . esc_html($preset['add_keyboard_support']) . "',autoScale:'" . esc_html($preset['auto_scale']) . "',showButtonsToolTip:'" . esc_html($preset['show_buttons_tooltips']) . "',stopVideoWhenPlayComplete:'" . esc_html($preset['stop_video_when_play_complete']) . "',autoPlayText:'" . esc_html($preset['autoPlayText']) . "',autoPlay:'" . esc_html($preset['autoplay']) . "',loop:'" . esc_html($preset['loop']) . "',shuffle:'" . esc_html($preset['shuffle']) . "',maxWidth:" . esc_html($preset['max_width']) . ",maxHeight:" . esc_html($preset['max_height']) . ",buttonsToolTipHideDelay:" . esc_html($preset['buttons_tooltip_hide_delay']) . ",showPopupAdsCloseButton:'" . esc_html($preset['show_popup_ads_close_button']) . "',volume:" . esc_html($preset['volume']) . ",rewindTime:" . esc_html($preset['rewindTime']) . ",backgroundColor:'" . $preset['bg_color'] . "',showErrorInfo:'" . esc_html($preset['showErrorInfo']) . "',aopwTitle:'" . esc_html($preset['aopwTitle']) . "',aopwWidth:" . esc_html($preset['aopwWidth']) . ",aopwHeight:" . esc_html($preset['aopwHeight']) . ",aopwBorderSize:" . esc_html($preset['aopwBorderSize']) . ",aopwTitleColor:'" . esc_html($preset['aopwTitleColor']) . "',playAfterVideoStop:'" . esc_html($preset['playAfterVideoStop']) . "',stopAfterLastVideoHasPlayed:'" . esc_html($preset['stopAfterLastVideoHasPlayed']) . "',disableVideoScrubber:'" . esc_html($preset['disable_video_scrubber']) . "',videoBackgroundColor:'" . esc_html($preset['video_bg_color']) . "',posterBackgroundColor:'" . esc_html($preset['poster_bg_color']) . "',buttonsToolTipFontColor:'" . esc_html($preset['buttons_tooltip_font_color']) . "'," . "showControllerWhenVideoIsStopped:'" . esc_html($preset['show_controller_when_video_is_stopped']) . "', showController:'" . esc_html($preset['showController']) . "', audioVisualizerLinesColor:'" . esc_html($preset['audioVisualizerLinesColor']) . "', audioVisualizerCircleColor:'" . esc_html($preset['audioVisualizerCircleColor']) . "',showNextAndPrevButtonsInController:'" . esc_html($preset['show_next_and_prev_buttons_in_controller']) . "',defaultPlaybackRate:" . esc_html($preset['defaultPlaybackRate']) . ",showPlaybackRateButton:'" . esc_html($preset['showPlaybackRateButton']) . "',showVolumeButton:'" . esc_html($preset['show_volume_button']) . "',showTime:'" . esc_html($preset['show_time']) . "',showYoutubeQualityButton:'" . esc_html($preset['show_youtube_quality_button']) . "',showInfoButton:'" . esc_html($preset['show_info_button']) . "',showDownloadButton:'" . esc_html($preset['show_download_button']) . "',showShareButton:'" . esc_html($preset['show_share_button']) . "',showAudioTracksButton:'" . esc_html($preset['showAudioTracksButton']) . "',showChromecastButton:'" . esc_html($preset['showChromecastButton']) . "',show360DegreeVideoVrButton:'" . esc_html($preset['show360DegreeVideoVrButton']) . "',showEmbedButton:'" . esc_html($preset['show_embed_button']) . "',showFullScreenButton:'" . esc_html($preset['show_fullscreen_button']) . "',repeatBackground:'" . esc_html($preset['repeat_background']) . "',controllerHeight:" . esc_html($preset['controller_height']) . ",controllerHideDelay:" . esc_html($preset['controller_hide_delay']) . ",startSpaceBetweenButtons:" . esc_html($preset['start_space_between_buttons']) . ",spaceBetweenButtons:" . esc_html($preset['space_between_buttons']) . ",scrubbersOffsetWidth:" . esc_html($preset['scrubbers_offset_width']) . ",mainScrubberOffestTop:" . esc_html($preset['main_scrubber_offest_top']) . ",timeOffsetLeftWidth:" . esc_html($preset['time_offset_left_width']) . ",timeOffsetRightWidth:" . esc_html($preset['time_offset_right_width']) . ",timeOffsetTop:" . esc_html($preset['time_offset_top']) . ",volumeScrubberHeight:" . esc_html($preset['volume_scrubber_height']) . ",volumeScrubberOfsetHeight:" . esc_html($preset['volume_scrubber_ofset_height']) . ",timeColor:'" . esc_html($preset['time_color']) . "',youtubeQualityButtonNormalColor:'" . esc_html($preset['youtube_quality_button_normal_color']) . "',youtubeQualityButtonSelectedColor:'" . esc_html($preset['youtube_quality_button_selected_color']) . "'," . "showPlaylistsButtonAndPlaylists:'" . esc_html($preset['show_playlists_button_and_playlists']) . "',usePlaylistsSelectBox:'" . esc_html($preset['use_playlists_select_box']) . "',showPlaylistsByDefault:'" . esc_html($preset['show_playlists_by_default']) . "',thumbnailSelectedType:'" . esc_html($preset['thumbnail_selected_type']) . "',startAtPlaylist:" . esc_html($start_at_playlist) . ",buttonsMargins:" . esc_html($preset['buttons_margins']) . ",thumbnailMaxWidth:" . esc_html($preset['thumbnail_max_width']) . ", thumbnailMaxHeight:" . esc_html($preset['thumbnail_max_height']) . ",thumbnailsPreviewWidth:" . esc_html($preset['thumbnails_preview_width']) . ",thumbnailsPreviewHeight:" . esc_html($preset['thumbnails_preview_height']) . ",thumbnailsPreviewBackgroundColor:'" . esc_html($preset['thumbnails_preview_background_color']) . "',thumbnailsPreviewBorderColor:'" . esc_html($preset['thumbnails_preview_border_color']) . "',thumbnailsPreviewLabelBackgroundColor:'" . esc_html($preset['thumbnails_preview_label_background_color']) . "',thumbnailsPreviewLabelFontColor:'" . esc_html($preset['thumbnails_preview_label_font_color']) . "',horizontalSpaceBetweenThumbnails:" . esc_html($preset['horizontal_space_between_thumbnails']) . ",mainSelectorBackgroundSelectedColor:'" . esc_html($preset['main_selector_background_selected_color']) . "',mainSelectorTextNormalColor:'" . esc_html($preset['main_selector_text_normal_color']) . "',mainSelectorTextSelectedColor:'" . esc_html($preset['main_selector_text_selected_color']) . "',mainButtonBackgroundNormalColor:'" . esc_html($preset['main_button_background_normal_color']) . "',mainButtonBackgroundSelectedColor:'" . esc_html($preset['main_button_background_selected_color']) . "',mainButtonTextNormalColor:'" . esc_html($preset['main_button_text_normal_color']) . "',mainButtonTextSelectedColor:'" . esc_html($preset['main_button_text_selected_color']) . "',verticalSpaceBetweenThumbnails:" . esc_html($preset['vertical_space_between_thumbnails']) . "," . "showPlaylistButtonAndPlaylist:'" . esc_html($preset['show_playlist_button_and_playlist']) . "',showPlaylistsSearchInput:'" . esc_html($preset['showPlaylistsSearchInput']) . "',playlistPosition:'" . esc_html($preset['playlist_position']) . "',showPlaylistByDefault:'" . esc_html($preset['show_playlist_by_default']) . "',addScrollOnMouseMove:'" . esc_html($preset['addScrollOnMouseMove']) . "',showPlaylistOnFullScreen:'" . esc_html($preset['showPlaylistOnFullScreen']) . "',showOnlyThumbnail:'" . esc_html($preset['showOnlyThumbnail']) . "',showThumbnail:'" . esc_html($preset['showThumbnail']) . "',showPlaylistName:'" . esc_html($preset['show_playlist_name']) . "',showSearchInput:'" . esc_html($preset['show_search_input']) . "',showLoopButton:'" . esc_html($preset['show_loop_button']) . "',showShuffleButton:'" . esc_html($preset['show_shuffle_button']) . "',showNextAndPrevButtons:'" . esc_html($preset['show_next_and_prev_buttons']) . "',forceDisableDownloadButtonForFolder:'" . esc_html($preset['force_disable_download_button_for_folder']) . "',addMouseWheelSupport:'" . esc_html($preset['add_mouse_wheel_support']) . "',startAtRandomVideo:'" . esc_html($preset['start_at_random_video'])  . "',playlistRightWidth:" . esc_html($preset['playlist_right_width']) . ",playlistBottomHeight:" . esc_html($preset['playlist_bottom_height']) . ",startAtVideo:" . esc_html($start_at_video) . ",maxPlaylistItems:" . esc_html($preset['max_playlist_items']) . ",thumbnailWidth:" . esc_html($preset['thumbnail_width']) . ",thumbnailHeight:" . esc_html($preset['thumbnail_height'] . ",spaceBetweenControllerAndPlaylist:" . $preset['space_between_controller_and_playlist'] . ",spaceBetweenThumbnails:" . $preset['space_between_thumbnails'] . ",scrollbarOffestWidth:" . $preset['scrollbar_offest_width']) . ",scollbarSpeedSensitivity:" . esc_html($preset['scollbar_speed_sensitivity']) . ",playlistBackgroundColor:'" . esc_html($preset['playlist_background_color']) . "',playlistNameColor:'" . esc_html($preset['playlist_name_color']) . "',thumbnailNormalBackgroundColor:'" . esc_html($preset['thumbnail_normal_background_color']) . "',thumbnailHoverBackgroundColor:'" . esc_html($preset['thumbnail_hover_background_color']) . "',thumbnailDisabledBackgroundColor:'" . esc_html($preset['thumbnail_disabled_background_color']) . "',searchInputBackgroundColor:'" . esc_html($preset['search_input_background_color']) . "',searchInputColor:'" . esc_html($preset['search_input_color']) . "',youtubeAndFolderVideoTitleColor:'" . esc_html($preset['youtube_and_folder_video_title_color']) . "',youtubeOwnerColor:'" . esc_html($preset['youtube_owner_color']) . "',youtubeDescriptionColor:'" . esc_html($preset['youtube_description_color']) . "'," . "showLogo:'" . esc_html($preset['show_logo']) . "',hideLogoWithController:'" . esc_html($preset['hide_logo_with_controller']) . "',logoPosition:'" . esc_html($preset['logo_position']) . "',logoPath:'" . esc_html($preset['logo_path']) . "',logoLink:'" . esc_html($preset['logo_link']) . "',logoMargins:" . esc_html($preset['logo_margins']) . "," ."subtitlesOffLabel:'" . esc_html($preset['subtitles_off_label']) . "'," . "embedAndInfoWindowCloseButtonMargins:" . esc_html($preset['embed_and_info_window_close_button_margins']) . ",borderColor:'" . (empty($preset['border_color']) ? 'transparent' : esc_html($preset['border_color'])) . "',mainLabelsColor:'" . esc_html($preset['main_labels_color']) . "',secondaryLabelsColor:'" . esc_html($preset['secondary_labels_color']) . "',shareAndEmbedTextColor:'" . esc_html($preset['share_and_embed_text_color']) . "',inputBackgroundColor:'" . esc_html($preset['search_input_background_color']) . "',inputColor:'" . esc_html($preset['input_color']) . "'," ."openNewPageAtTheEndOfTheAds:'" . esc_html($preset['open_new_page_at_the_end_of_the_ads']) . "',playAdsOnlyOnce:'" . esc_html($preset['play_ads_only_once']) . "',adsButtonsPosition:'" . esc_html($preset['ads_buttons_position']) . "',skipToVideoText:'" . esc_html($preset['skip_to_video_text']) . "',skipToVideoButtonText:'" . esc_html($preset['skip_to_video_button_text']) . "',adsTextNormalColor:'" . esc_html($preset['ads_text_normal_color']) . "',adsTextSelectedColor:'" . esc_html($preset['ads_text_selected_color']) . "',adsBorderNormalColor:'" . esc_html($preset['ads_border_normal_color']) . "',adsBorderSelectedColor:'" . esc_html($preset['ads_border_selected_color']) . "',showMainScrubberToolTipLabel:'" . esc_html($preset['showMainScrubberToolTipLabel']) . "',scrubbersToolTipLabelFontColor:'" . esc_html($preset['scrubbersToolTipLabelFontColor']) .  "',scrubbersToolTipLabelBackgroundColor:'" . esc_html($preset['scrubbersToolTipLabelBackgroundColor']) . "',useAToB:'" . esc_html($preset['useAToB']) . "',atbTimeBackgroundColor:'transparent',atbTimeTextColorNormal:'" . esc_html($preset['atbTimeTextColorNormal']) . "',atbTimeTextColorSelected:'" . esc_html($preset['atbTimeTextColorSelected']) . "',atbButtonTextNormalColor:'" . esc_html($preset['atbButtonTextNormalColor']) . "',atbButtonTextSelectedColor:'" . esc_html($preset['atbButtonTextSelectedColor']) . "',atbButtonBackgroundNormalColor:'" . esc_html($preset['atbButtonBackgroundNormalColor']) . "',atbButtonBackgroundSelectedColor:'" . esc_html($preset['atbButtonBackgroundSelectedColor']) . "'});};";
    		
    		return $output;
    }
						
	
	// Get main playlist.
    public function fwduvp_get_main_playlist($playlistId){
    	$main_playlist = NULL;
    	if(is_null($this->_data->main_playlists_ar)) return;

    	foreach ($this->_data->main_playlists_ar as $pl){
    		if($pl["name"] == $playlistId){
    			$main_playlist = $pl;
    		}
    	}
		
    	if (is_null($main_playlist)){
    		return;
    	}
    	
    	// To be safe force display none, this must be hidden!
    	$main_playlist_str = '<ul id="fwduvpMainPlaylist' . html_entity_decode(esc_html($playlistId), ENT_QUOTES) . '" class="fwduvp-playlist-data">';
		$normal_playlist_str = "";
    	
    	foreach ($main_playlist["playlists"] as $playlist){
			
			if ($playlist["type"] == "normal"){
				$main_playlist_str .= '<li data-source="fwduvpPlaylist' . esc_html(FWDUVP::$_pl_id) . '"';
				if(!empty($playlist["password"])){
					$main_playlist_str .= ' data-password="' . esc_html(md5($playlist["password"])) . '"';
				}

				// To be safe force display none, this must be hidden!
				$normal_playlist_str .= '<ul id="fwduvpPlaylist' . esc_html(FWDUVP::$_pl_id) . '" class="fwduvp-playlist-data">';
				
				foreach ($playlist["videos"] as $video){
					$normal_playlist_str .= "<li data-video-source=\"[";
					foreach ($video["vids_ar"] as $vid){
						$source = $vid['source'];
						if($vid['encrypt'] == "yes"){
							$normal_playlist_str .= "{source:'encrypt:" . base64_encode(esc_url_raw($source)) . "', label:&quot;" . esc_html($vid['label']) ."&quot;";
							if(!empty($vid['is360']) && $vid['is360'] == 'yes'){
								$normal_playlist_str .= ", is360:'yes'";
							}

							if(!empty($vid['startWhenPlayButtonClick360DegreeVideo']) && $vid['startWhenPlayButtonClick360DegreeVideo'] && $vid['startWhenPlayButtonClick360DegreeVideo'] == "yes"){
								$normal_playlist_str .= ", startWhenPlayButtonClick360DegreeVideo:'" . esc_html($vid["startWhenPlayButtonClick360DegreeVideo"]) . "'";
							}

							if(!empty($vid['rotationY360DegreeVideo'])){
								$normal_playlist_str .= ", rotationY360DegreeVideo:'" . esc_html($vid["rotationY360DegreeVideo"]) . "'";
							}
							
							$normal_playlist_str .= "},";
						}else{
							$normal_playlist_str .= "{source:'" . esc_url_raw($source) . "', label:&quot;" . esc_html($vid['label']) ."&quot;";
							if(!empty($vid['is360']) && $vid['is360'] == 'yes'){
								$normal_playlist_str .= ", is360:'yes'";
							}

							if(!empty($vid['startWhenPlayButtonClick360DegreeVideo']) && $vid['startWhenPlayButtonClick360DegreeVideo'] == "yes"){
								$normal_playlist_str .= ", startWhenPlayButtonClick360DegreeVideo:'" . esc_html($vid["startWhenPlayButtonClick360DegreeVideo"]) . "'";
							}

							if(!empty($vid['rotationY360DegreeVideo'])){
								$normal_playlist_str .= ", rotationY360DegreeVideo:'" . esc_html($vid["rotationY360DegreeVideo"]) . "'";
							}

							$normal_playlist_str .= "},";
						}
					}
					$normal_playlist_str .= "]\"";
					$normal_playlist_str = str_replace("},]", "}]", $normal_playlist_str); //All dynamic content was escaped!
					$countVids = 0;
					foreach ($video["vids_ar"] as $vid){
						if($vid['checked'] == true){
							$normal_playlist_str .= ' data-start-at-video="' . esc_html($countVids) . '"';
						}
						$countVids ++;
					}
					
					if($video["vastURL"]){
						$normal_playlist_str .= ' data-vast-url="' . esc_url_raw($video["vastURL"]) . '" data-vast-clicktrough-target="' . esc_html($video["vastTarget"]) .  '" data-vast-linear-astart-at-time="' . $video["vastStartTime"] . '"';
					}
					
					if($video["startAtTime"]){
						$normal_playlist_str .= ' data-start-at-time="' . esc_html($video["startAtTime"]) . '"';
					}
					
					if($video["stopAtTime"]){
						$normal_playlist_str .= ' data-stop-at-time="' . esc_html($video["stopAtTime"]) . '"';
					}

					if(!empty($video["thumbnails_preview"])){
						$thumbnails_preview_src = $video["thumbnails_preview"];
						if($thumbnails_preview_src == 'auto'){
							$thumbnails_preview_src = esc_html($thumbnails_preview_src);
						}else{
							$thumbnails_preview_src = esc_url_raw($thumbnails_preview_src);
						}
						$normal_playlist_str .= ' data-thumbnails-preview="' . $thumbnails_preview_src . '"';
					}
				
					if(!empty($video["password"])){
						$normal_playlist_str .= ' data-private-video-password="' . esc_html(md5($video["password"])) . '"';
					}
				
					$normal_playlist_str .= ' data-is-private="' . esc_html($video["isPrivate"]) . '"';
					
					if(count($video["subtitles_ar"]) > 0){
						$normal_playlist_str .= " data-subtitle-soruce=\"[";
						foreach ($video["subtitles_ar"] as $subtitle){
							$source = $subtitle['source'];
							if($subtitle['encrypt'] == "yes"){
								 $normal_playlist_str .= "{source:'encrypt:" . base64_encode(esc_url_raw($subtitle['source'])) . "', label:&quot;" . esc_html($subtitle['label']) ."&quot;},";

							}else{
								$normal_playlist_str .= "{source:'" . esc_url_raw($source) . "', label:&quot;" . esc_html($subtitle['label']) ."&quot;},";
							}
							
						}
						$normal_playlist_str .= "]\"";
						$normal_playlist_str = str_replace("},]", "}]", $normal_playlist_str); // All dynamic content was escaped!
						$countSubtitles = 1;
						foreach ($video["subtitles_ar"] as $subtitle){
							if($subtitle['checked'] == true){
								$normal_playlist_str .= ' data-start-at-subtitle="' . esc_html($countSubtitles) . '"';
							}
							$countSubtitles ++;
						}
					}
					
					if(strlen($video["thumb"]) >= 1){
						$normal_playlist_str .= ' data-thumb-source="' . esc_url_raw($video["thumb"]) . '"';
					}
					
					if(strlen($video["poster"]) >= 1){
						$normal_playlist_str .= " data-poster-source=\"" .  esc_url_raw($video["poster"]) . "\"";
					}
					
					if(strlen($video["popw"]) >= 3){
						$normal_playlist_str .= ' data-advertisement-on-pause-source="' .  esc_url_raw($video["popw"]) . '"';
					}
					$normal_playlist_str .= ' data-downloadable="' . esc_html($video["downloadable"]) . '"';
					
					if(!empty($video["atob"])){
						$normal_playlist_str .= ' data-use-a-to-b="' . esc_html($video["atob"]) . '"';
					}
					
					if (isset($video["ads_source"]) && strlen($video["ads_source"]) >= 1){
						if (isset($video["ads_source_mobile"]) && strlen($video["ads_source_mobile"]) >= 1){
							$normal_playlist_str .= ' data-ads-source="' .  $video["ads_source"] . "," . $video["ads_source_mobile"] . '"';
						}else{
							$normal_playlist_str .= ' data-ads-source="' .  $video["ads_source"] . "'";
						}
					}
					
					if (isset($video["ads_url"]) && strlen($video["ads_url"]) >= 1){
						$normal_playlist_str .= ' data-ads-page-to-open-url="' .  esc_url_raw($video["ads_url"]) . '"';
					}
					
					if (isset($video["ads_url_target"]) && strlen($video["ads_url_target"]) >= 1){
						$normal_playlist_str .= ' data-ads-page-target="' .  esc_html($video["ads_url_target"]) . '"';
					}
					
					if (isset($video["redirectURL"])){
						$normal_playlist_str .= ' data-redirect-url="' . esc_url_raw($video["redirectURL"]) . '" data-redirect-target="' . esc_html($video["redirectTarget"]) . '"'; 
					}
					
					if (isset($video["ads_hold_time"]) && strlen($video["ads_hold_time"]) >= 1){
						$normal_playlist_str .= ' data-time-to-hold-ads="' .  esc_html($video["ads_hold_time"]) . '"';
					}

					if(isset($video["playOnlyIfLoggedIn"])){
						$isLoggedIn = $this->fwduvp_is_user_logged_in();
						if($video["playOnlyIfLoggedIn"] == 'yes' && !$isLoggedIn){
							 $normal_playlist_str .= ' data-play-if-logged-in="yes"';
						}
					}
					
					$normal_playlist_str .= ">";
					
					$normal_playlist_str .= '<div data-video-short-description="">';
					
					$normal_playlist_str .= wp_kses($video["short_descr"], wp_kses_allowed_html('post'));
					
					$normal_playlist_str .= "</div>";
					
					if (strlen($video["long_descr"]) >= 1){
						$normal_playlist_str .= "<div data-video-long-description=''>";
						$normal_playlist_str .= wp_kses($video["long_descr"], wp_kses_allowed_html('post'));
						$normal_playlist_str .= "</div>";
					}
					
					if(count($video["cuepoints_ar"]) > 0){
						$normal_playlist_str .= '<ul data-cuepoints="">';
						foreach ($video["cuepoints_ar"] as $cuepoint){
							$normal_playlist_str .= '<li data-time-start="' . esc_html($cuepoint['startAtTime']) . '" data-javascript-call="' . html_entity_decode(esc_html($cuepoint['code']), ENT_QUOTES) . '"></li>';
						}
						$normal_playlist_str .= '</ul>';
					}
					
					if(count($video["ads_ar"]) > 0){
						$normal_playlist_str .= "<div data-ads=''>";
						foreach ($video["ads_ar"] as $ad){
							$normal_playlist_str .= "<p data-source='" . esc_url_raw($ad['source']) . "' data-time-start='" . esc_html($ad['startTime']) . "' data-time-to-hold-ads='" . esc_html($ad['timeToHoldAd'])  . "' data-add-duration='" . esc_html($ad['addDuration']) ."' data-link='" . esc_url_raw($ad['url']) . "' data-target='" . esc_html($ad['target']) . "'></p>";
						}
						$normal_playlist_str .= "</div>";
					}
					
					if(count($video["popupads_ar"]) > 0){
						$normal_playlist_str .= "<div data-add-popup=''>";
						foreach ($video["popupads_ar"] as $ad){
							
							if($ad["type"] == "image"){
								$normal_playlist_str .= "<p data-image-path='" . esc_url_raw($ad['source']) . "' data-time-start='" . esc_html($ad['startTime']) . "' data-time-end='" . esc_html($ad['stopTime']) ."' data-link='" . esc_url_raw($ad['url']) . "' data-target='" . esc_html($ad['target']) . "' ></p>";
							}else{
								$normal_playlist_str .= "<p data-google-ad-client='" . esc_html($ad['google_ad_client']) . "' data-google-ad-slot='" . esc_html($ad['google_ad_slot']) . "' data-google-ad-width=" . esc_html($ad['google_ad_width']) . " data-google-ad-height=" . esc_html($ad['google_ad_height']) ." data-time-start='" . esc_html($ad['google_ad_start_time']) . "' data-time-end='" . esc_html($ad['google_ad_stop_time']) . "' ></p>";
							}
						}
						$normal_playlist_str .= "</div>";
					}
					$normal_playlist_str .= "</li>";
					
					
				}
				
				$normal_playlist_str .= "</ul>";
				
				FWDUVP::$_pl_id++;
			}else if ($playlist["type"] == "youtube"){
				$youtube_playlist_source = $playlist["source"];
				if(strpos($youtube_playlist_source, 'list=') !== false) {
					$youtube_playlist_source = "list=";
				
					$reg_exp = "/[\?\&]list\=.+/";
					
					if (preg_match($reg_exp, $playlist["source"], $matches)){
						$youtube_playlist_source .= substr($matches[0], 6);
					}
				}
			
				$main_playlist_str .= '<li data-source="' . esc_url_raw($youtube_playlist_source) . '"';
				if(!empty($playlist["password"])){
					$main_playlist_str .= ' data-password="' . esc_html(md5($playlist["password"])) . '"';
				}
			}else if ($playlist["type"] == "folder"){
				$main_playlist_str .= '<li data-source="folder=' . esc_html($playlist["source"]) . '"';
				if(!empty($playlist["password"])){
					$main_playlist_str .= ' data-password="' . esc_html(md5($playlist["password"])) . '"';
				}
			}else if ($playlist["type"] == "vimeo"){
				$main_playlist_str .= '<li data-source="' . esc_html($playlist["vimeoSource"]) . '" data-user-id="' . esc_html($playlist["userId"]) . '"' . ' data-client-id="' . esc_html($playlist["clientId"]) . '" data-vimeo-secret="' . esc_html($playlist["vimeoSecret"]) . '" data-vimeo-token="' . esc_html($playlist["vimeoToken"]) . '"';
				if(!empty($playlist["password"])){
					$main_playlist_str .= ' data-password="' . esc_html(md5($playlist["password"])) . '"';
				}
			}else{
				$main_playlist_str .= '<li data-source="' . esc_url_raw($playlist["source"]) . '"';
				if(!empty($playlist["password"])){
					$main_playlist_str .= ' data-password="' . esc_html(md5($playlist["password"])) . '"';
				}
			}
			$main_playlist_str .= ' data-playlist-name="' . html_entity_decode(esc_html($playlist["name"]), ENT_QUOTES) . '"';
		
			if (isset($playlist["thumb"])){
				$main_playlist_str .= ' data-thumbnail-path="' . esc_url_raw($playlist["thumb"]) . '">';
			}else{
				$main_playlist_str .= '>';
			}
			
			$main_playlist_str .= $playlist["text"];
    		
    		$main_playlist_str .= '</li>';
    	}
    	
    	$main_playlist_str .= '</ul>';
		$main_playlist_str .= $normal_playlist_str;
    	return $main_playlist_str; // All dynamic content was escaped!
    }


	// Clean function for names/labels.
	private function fwduvp_clean_name($string) {
		$string = preg_replace('/"/', '\'', $string);
	   	return preg_replace('/[\[\]\&\/<>|\\\\]/', '', $string);
	}

	private function fwduvp_clean_folder_name($string) {
		$string = preg_replace('/"/', '\'', $string);
	   	return preg_replace('/[\/<>|\\\\]/', '', $string);
	}
}
?>