<?php
/** no direct access **/
defined('MECEXEC') or die();
?>

<div class="wns-be-container wns-be-container-sticky">

    <div id="wns-be-infobar"></div>

    <div class="wns-be-sidebar">

        <ul class="wns-be-group-menu">

            <li class="wns-be-group-menu-li has-sub">
                <a href="<?php echo esc_url($this->main->remove_qs_var('tab')); ?>" id="" class="wns-be-group-tab-link-a">
                    <span class="extra-icon">
                        <i class="sl-arrow-down"></i>
                    </span>
                    <i class="mec-sl-settings"></i> 
                    <span class="wns-be-group-menu-title"><?php esc_html_e('Settings', 'mec'); ?></span>
                </a>
            </li>

            <?php if($this->main->getPRO() and isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>

                <li class="wns-be-group-menu-li">
                    <a href="<?php echo esc_url($this->main->add_qs_var('tab', 'MEC-reg-form')); ?>" id="" class="wns-be-group-tab-link-a">
                        <i class="mec-sl-layers"></i> 
                        <span class="wns-be-group-menu-title"><?php esc_html_e('Booking Form', 'mec'); ?></span>
                    </a>
                </li>            

                <li class="wns-be-group-menu-li">
                    <a href="<?php echo esc_url($this->main->add_qs_var('tab', 'MEC-gateways')); ?>" id="" class="wns-be-group-tab-link-a">
                        <i class="mec-sl-wallet"></i> 
                        <span class="wns-be-group-menu-title"><?php esc_html_e('Payment Gateways', 'mec'); ?></span>
                    </a>
                </li>

            <?php endif; ?>

            <li class="wns-be-group-menu-li">
                <a href="<?php echo esc_url($this->main->add_qs_var('tab', 'MEC-notifications')); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-envelope"></i> 
                    <span class="wns-be-group-menu-title"><?php esc_html_e('Notifications', 'mec'); ?></span>
                </a>
            </li>

            <li class="wns-be-group-menu-li">
                <a href="<?php echo esc_url($this->main->add_qs_var('tab', 'MEC-styling')); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-equalizer"></i> 
                    <span class="wns-be-group-menu-title"><?php esc_html_e('Styling Options', 'mec'); ?></span>
                </a>
            </li>            

            <li class="wns-be-group-menu-li">
                <a href="<?php echo esc_url($this->main->add_qs_var('tab', 'MEC-customcss')); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-wrench"></i> 
                    <span class="wns-be-group-menu-title"><?php esc_html_e('Custom CSS', 'mec'); ?></span>
                </a>
            </li>            

            <li class="wns-be-group-menu-li">
                <a href="<?php echo esc_url($this->main->add_qs_var('tab', 'MEC-messages')); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-bubble"></i> 
                    <span class="wns-be-group-menu-title"><?php esc_html_e('Messages', 'mec'); ?></span>
                </a>
            </li>

            <li class="wns-be-group-menu-li">
                <a href="<?php echo esc_url($this->main->add_qs_var('tab', 'MEC-ie')); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-refresh"></i> 
                    <span class="wns-be-group-menu-title"><?php esc_html_e('Import / Export', 'mec'); ?></span>
                </a>
            </li>

        </ul>
    </div>

    <div class="wns-be-main">

        <div id="wns-be-notification"></div>

        <div id="wns-be-content">
            <div class="wns-be-group-tab">
                <h2><?php esc_html_e('Support', 'mec'); ?></h2>
                <div class="mec-container">
                    <div id="webnus-dashboard" class="mec-container">
                        <div class="welcome-content w-clearfix extra">
                            <div class="w-col-sm-6">
                                <div class="w-box doc">
                                    <div class="w-box-head">
                                        <?php esc_html_e('Documentation', 'mec'); ?>
                                    </div>
                                    <div class="w-box-content">
                                        <p>
                                            <?php echo esc_html__('Our documentation is simple and functional with full details and cover all essential aspects from beginning to the most advanced parts.', 'mec'); ?>
                                        </p>
                                        <div class="w-button">
                                            <a href="http://webnus.net/dox/modern-events-calendar/" target="_blank"><?php echo esc_html__('DOCUMENTATION', 'mec'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-col-sm-1"></div>
                            <div class="w-col-sm-6">
                                <div class="w-box support">
                                    <div class="w-box-head">
                                        <?php echo esc_html__('Support Forum', 'mec'); ?>
                                    </div>
                                    <div class="w-box-content">
                                        <?php if(!$this->getPRO()): ?>
                                            <p><?php echo esc_html__("Webnus is an elite and trusted author with great user satisfaction. If you want to use this service you need to upgrade your plugin to Pro version. Click on the following button.", 'mec'); ?></p>
                                        <?php else: ?>
                                            <p><?php echo esc_html__("Webnus is an elite and trusted author with great user satisfaction. If you have any issues please don't hesitate to contact us, we will reply as soon as possible.", 'mec'); ?></p>
                                        <?php endif; ?>
                                        <div class="w-button">
                                            <?php if(!$this->getPRO()): ?>
                                                <a href="<?php echo esc_url($this->main->get_pro_link()); ?>" target="_blank"><?php echo esc_html__('GO PREMIUM', 'mec'); ?></a>
                                            <?php else: ?>
                                                <a href="https://webnus.net/support/" target="_blank"><?php echo esc_html__('OPEN A TICKET', 'mec'); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-col-sm-1"></div>
                            <div class="w-col-sm-12">
                                <div class="w-box knowledgebase">
                                    <div class="w-box-head w-Knowledgebase">
                                        <?php esc_html_e('Knowledgebase', 'mec'); ?>
                                    </div>
                                    <div class="w-box-content">
                                        <ul>
                                            <li><a href="https://webnus.net/dox/modern-events-calendar/add-event/"><?php esc_html_e('How to create a new event?', 'mec'); ?></a></li>
                                            <li><a href="https://webnus.net/dox/modern-events-calendar/booking-system-and-register-button-configurations-in-mec-plugin/"><?php esc_html_e("Booking module doesn't work", 'mec'); ?></a></li>
                                            <li><a href="https://webnus.net/dox/modern-events-calendar/how-to-export-events-in-ical-format/"><?php esc_html_e("How to export events in iCal format?", 'mec'); ?></a></li>
                                            <li><a href="https://webnus.net/dox/modern-events-calendar/category/developer-document/"><?php esc_html_e("How to override MEC template files?", 'mec'); ?></a></li>
                                            <li><a href="https://webnus.net/dox/modern-events-calendar/making-advance-shortcodes-in-modern-event-calendar/"><?php esc_html_e("How to add/manage shortcodes?", 'mec'); ?></a></li>
                                            <li class="mec-view-all-articles"><a href="https://webnus.net/dox/modern-events-calendar/category/knowledge/"><?php esc_html_e("All Articles", 'mec'); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>