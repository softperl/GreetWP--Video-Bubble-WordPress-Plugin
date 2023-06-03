<?php

// enqueue scripts
function greet_plugin_assets()
{
    $options = get_option('_greet');
    wp_enqueue_style('ico-font', GREET_DIR_URL . 'assets/css/icofont.css', '', 1.1);
    wp_enqueue_style('greet-main', GREET_DIR_URL . 'assets/css/greet-main.css', '', 1.2);
    wp_enqueue_script('greet-script', GREET_DIR_URL . 'assets/js/greet-main.js', array('jquery'), '1.0.0', true);

    wp_localize_script(
        'greet-script',
        'frontend_scripts',
        array(
            'pause_on_switch' => esc_attr($options['pause-video'])
        )
    );
}
add_action('wp_enqueue_scripts', 'greet_plugin_assets');

// Greet plugin content
add_action('wp_footer', 'greet_plugin_content');
function greet_plugin_content()
{
    // Meta csf option
    $options = get_option('_greet');
    $show_pages = $options['show_pages'];
    $meta = get_post_meta(get_the_ID(), '_greet_meta', true);
?>

    <?php if (!empty($meta['mp4']['url'])) : ?>
        <div id="greet_wrapper" class="greet_wrapper greet_toggler <?php echo esc_attr($meta['greet_positon']) ?>">
            <video id="greet_video">
                <source id="playVideo" type="video/mp4" src="<?php echo esc_url($meta['mp4']['url']) ?>" />
            </video>
            <h4 id="greet_text" class="greet_text"><?php echo esc_html($meta['hi_text'])  ?></h4>
            <div class="greet_close">
                <i class="icofont-close-circled"></i>
            </div>
            <div id="greet_full-btn">
                <div class="greet_full-close">
                    <i class="icofont-close-line"></i>
                </div>
                <div id="greet_full-play" class="greet_full-play">
                    <i class="icofont-play"></i>
                </div>
                <div class="greet_media-action">
                    <div id="greet_full-replay" class="greet_full-replay" onclick="videoChange('<?php echo esc_url($meta['mp4']['url']) ?>')">
                        <i class="icofont-refresh"></i>
                    </div>
                    <div id="greet_full-volume" class="greet_full-volume">
                        <i class="icofont-volume-up"></i>
                    </div>
                    <div id="greet_full-mute" class="greet_full-mute">
                        <i class="icofont-ui-mute"></i>
                    </div>
                    <div id="greet_full-expand" class="greet_full-expand">
                        <i class="icofont-expand"></i>
                    </div>
                </div>
                <div class="greet_change-video">
                    <?php if ($meta['button_text']) {  ?>
                        <div <?php if ($meta['second__video']['url']) {  ?> onclick="videoChange('<?php echo esc_url($meta['second__video']['url']) ?>')" <?php } ?> class="greet_video">
                            <?php if ($meta['button_text']) {  ?>
                                <a <?php if (!$meta['second__video']['url']) {  ?> target="_blank" href="<?php echo esc_url($meta['button_link']['url']) ?>" <?php } ?>><?php echo esc_html($meta['button_text']) ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ($meta['button_second_text']) {  ?>
                        <div <?php if ($meta['third__video']['url']) {  ?> onclick="videoChange('<?php echo esc_url($meta['third__video']['url']) ?>')" <?php } ?> class="greet_video">
                            <?php if ($meta['button_second_text']) {  ?>
                                <a <?php if (!$meta['third__video']['url']) {  ?> target="_blank" href="<?php echo esc_url($meta['button_second_link']['url']); ?>" <?php } ?>><?php echo esc_html($meta['button_second_text']) ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if ($meta['button_third_text']) {  ?>
                        <div <?php if ($meta['fourth__video']['url']) {  ?> onclick="videoChange('<?php echo esc_url($meta['fourth__video']['url']) ?>')" <?php } ?> class="greet_video">
                            <?php if ($meta['button_third_text']) {  ?>
                                <a <?php if (!$meta['fourth__video']['url']) {  ?> target="_blank" href="<?php echo esc_url($meta['button_third_link']['url']) ?>" <?php } ?>><?php echo esc_html($meta['button_third_text']) ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <style>
            .greet_wrapper video {
                border-color: <?php echo esc_attr($meta['border_color']) ?>;
            }

            .greet_wrapper-full .greet_change-video [class*="video"] a {
                background-color: <?php echo esc_attr($meta['buttonsColors']['buttons_bg']) ?>;
                color: <?php echo esc_attr($meta['buttonsColors']['buttons_color']) ?>;

                <?php if ($meta['button_type'] == 'rounded') {
                ?>border-radius: <?php echo esc_attr($meta['button_radius']) ?>px;
                <?php
                }

                ?>
            }

            .greet_wrapper-full .greet_change-video [class*="video"] a:hover {
                background-color: <?php echo esc_attr($meta['buttonsColors']['buttons_hover_bg']) ?>;
                color: <?php echo esc_attr($meta['buttonsColors']['buttons_hover_color']) ?>;
            }
        </style>
    <?php else : ?>



        <?php if ($show_pages && $options['mp4']['url']) : ?>
            <?php if (is_page($show_pages)) : ?>
                <div id="greet_wrapper" class="greet_wrapper greet_toggler <?php echo esc_attr($options['greet_positon']) ?>">
                    <video id="greet_video">
                        <source id="playVideo" type="video/mp4" src="<?php echo esc_url($options['mp4']['url']) ?>" />
                    </video>
                    <h4 id="greet_text" class="greet_text"><?php echo esc_html($options['hi_text'])  ?></h4>

                    <div class="greet_close">
                        <i class="icofont-close-circled"></i>
                    </div>
                    <div id="greet_full-btn">
                        <div class="greet_full-close">
                            <i class="icofont-close-line"></i>
                        </div>
                        <div id="greet_full-play" class="greet_full-play">
                            <i class="icofont-play"></i>
                        </div>
                        <div class="greet_media-action">
                            <div id="greet_full-replay" class="greet_full-replay" onclick="videoChange('<?php echo esc_url($options['mp4']['url']) ?>')">
                                <i class="icofont-refresh"></i>
                            </div>
                            <div id="greet_full-volume" class="greet_full-volume">
                                <i class="icofont-volume-up"></i>
                            </div>
                            <div id="greet_full-mute" class="greet_full-mute">
                                <i class="icofont-ui-mute"></i>
                            </div>
                            <div id="greet_full-expand" class="greet_full-expand">
                                <i class="icofont-expand"></i>
                            </div>
                        </div>
                        <div class="greet_change-video">
                            <?php if ($options['button_text']) {  ?>
                                <div <?php if ($options['second__video']['url']) {  ?> onclick="videoChange('<?php echo esc_url($options['second__video']['url']) ?>')" <?php } ?> class="greet_video">
                                    <?php if ($options['button_text']) {  ?>
                                        <a <?php if (!$options['second__video']['url']) {  ?> target="_blank" href="<?php echo esc_url($options['button_link']['url']) ?>" <?php } ?>><?php echo esc_html($options['button_text']) ?></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php if ($options['button_second_text']) {  ?>
                                <div <?php if ($options['third__video']['url']) {  ?> onclick="videoChange('<?php echo esc_url($options['third__video']['url']) ?>')" <?php } ?> class="greet_video">
                                    <?php if ($options['button_second_text']) {  ?>
                                        <a <?php if (!$options['third__video']['url']) {  ?> target="_blank" href="<?php echo esc_url($options['button_second_link']['url']); ?>" <?php } ?>><?php echo esc_html($options['button_second_text']) ?></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php if ($options['button_third_text']) {  ?>
                                <div <?php if ($options['fourth__video']['url']) {  ?> onclick="videoChange('<?php echo esc_url($options['fourth__video']['url']) ?>')" <?php } ?> class="greet_video">
                                    <?php if ($options['button_third_text']) {  ?>
                                        <a <?php if (!$options['fourth__video']['url']) {  ?> target="_blank" href="<?php echo esc_url($options['button_third_link']['url']) ?>" <?php } ?>><?php echo esc_html($options['button_third_text']) ?></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <style>
                    .greet_wrapper video {
                        border-color: <?php echo esc_attr($options['border_color']) ?>;
                    }

                    .greet_wrapper-full .greet_change-video [class*="video"] a {
                        background-color: <?php echo esc_attr($options['buttonsColors']['buttons_bg']) ?>;
                        color: <?php echo esc_attr($options['buttonsColors']['buttons_color']) ?>;

                        <?php if ($options['button_type'] == 'rounded') {
                        ?>border-radius: <?php echo esc_attr($options['button_radius']) ?>px;
                        <?php
                        }

                        ?>
                    }

                    .greet_wrapper-full .greet_change-video [class*="video"] a:hover {
                        background-color: <?php echo esc_attr($options['buttonsColors']['buttons_hover_bg']) ?>;
                        color: <?php echo esc_attr($options['buttonsColors']['buttons_hover_color']) ?>;
                    }
                </style>
            <?php endif; ?>
        <?php elseif ($options['mp4']['url']) : ?>
            <div id="greet_wrapper" class="greet_wrapper greet_toggler <?php echo esc_attr($options['greet_positon']) ?>">
                <video id="greet_video">
                    <source id="playVideo" type="video/mp4" src="<?php echo esc_url($options['mp4']['url']) ?>" />
                </video>
                <h4 id="greet_text" class="greet_text"><?php echo esc_html($options['hi_text'])  ?></h4>

                <div class="greet_close">
                    <i class="icofont-close-circled"></i>
                </div>
                <div id="greet_full-btn">
                    <div class="greet_full-close">
                        <i class="icofont-close-line"></i>
                    </div>
                    <div id="greet_full-play" class="greet_full-play">
                        <i class="icofont-play"></i>
                    </div>
                    <div class="greet_media-action">
                        <div id="greet_full-replay" class="greet_full-replay" onclick="videoChange('<?php echo esc_url($options['mp4']['url']) ?>')">
                            <i class="icofont-refresh"></i>
                        </div>
                        <div id="greet_full-volume" class="greet_full-volume">
                            <i class="icofont-volume-up"></i>
                        </div>
                        <div id="greet_full-mute" class="greet_full-mute">
                            <i class="icofont-ui-mute"></i>
                        </div>
                        <div id="greet_full-expand" class="greet_full-expand">
                            <i class="icofont-expand"></i>
                        </div>
                    </div>
                    <div class="greet_change-video">
                        <?php if ($options['button_text']) {  ?>
                            <div <?php if ($options['second__video']['url']) {  ?> onclick="videoChange('<?php echo esc_url($options['second__video']['url']) ?>')" <?php } ?> class="greet_video">
                                <?php if ($options['button_text']) {  ?>
                                    <a <?php if (!$options['second__video']['url']) {  ?> target="_blank" href="<?php echo esc_url($options['button_link']['url']) ?>" <?php } ?>><?php echo esc_html($options['button_text']) ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if ($options['button_second_text']) {  ?>
                            <div <?php if ($options['third__video']['url']) {  ?> onclick="videoChange('<?php echo esc_url($options['third__video']['url']) ?>')" <?php } ?> class="greet_video">
                                <?php if ($options['button_second_text']) {  ?>
                                    <a <?php if (!$options['third__video']['url']) {  ?> target="_blank" href="<?php echo esc_url($options['button_second_link']['url']); ?>" <?php } ?>><?php echo esc_html($options['button_second_text']) ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($options['button_third_text']) {  ?>
                            <div <?php if ($options['fourth__video']['url']) {  ?> onclick="videoChange('<?php echo esc_url($options['fourth__video']['url']) ?>')" <?php } ?> class="greet_video">
                                <?php if ($options['button_third_text']) {  ?>
                                    <a <?php if (!$options['fourth__video']['url']) {  ?> target="_blank" href="<?php echo esc_url($options['button_third_link']['url']) ?>" <?php } ?>><?php echo esc_html($options['button_third_text']) ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <style>
                .greet_wrapper video {
                    border-color: <?php echo esc_attr($options['border_color']) ?>;
                }

                .greet_wrapper-full .greet_change-video [class*="video"] a {
                    background-color: <?php echo esc_attr($options['buttonsColors']['buttons_bg']) ?>;
                    color: <?php echo esc_attr($options['buttonsColors']['buttons_color']) ?>;

                    <?php if ($options['button_type'] == 'rounded') {
                    ?>border-radius: <?php echo esc_attr($options['button_radius']) ?>px;
                    <?php
                    }

                    ?>
                }

                .greet_wrapper-full .greet_change-video [class*="video"] a:hover {
                    background-color: <?php echo esc_attr($options['buttonsColors']['buttons_hover_bg']) ?>;
                    color: <?php echo esc_attr($options['buttonsColors']['buttons_hover_color']) ?>;
                }
            </style>
        <?php endif; ?>
    <?php endif; ?>
<?php }; ?>