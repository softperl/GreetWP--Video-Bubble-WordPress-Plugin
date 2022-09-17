<?php

// enqueue scripts
function greet_plugin_assets()
{
    wp_enqueue_style('ico-font', GREET_DIR_URL . 'assets/css/icofont.css', '', 1.1);
    wp_enqueue_style('greet-main', GREET_DIR_URL . 'assets/css/greet-main.css', '', 1.2);
    wp_enqueue_script('greet-script', GREET_DIR_URL . 'assets/js/greet-main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'greet_plugin_assets');

// Meta option register
function greet_get_option($option, $section, $default = '')
{
    $options = get_option($section);
    if (isset($options[$option])) {
        return $options[$option];
    }
    return $default;
}

// Greet plugin content
add_action('wp_footer', 'greet_plugin_content');
function greet_plugin_content()
{
    if (greet_get_option('greet_mp4', 'greet_video_upload', '')) {
?>
 
        <div id="greet_wrapper" class="greet_wrapper greet_toggler <?php echo esc_attr( greet_get_option('greet_positon', 'greet_apperience', '') ) ?>">

    <video id="greet_video">
        <source id="playVideo" type="video/mp4" src="<?php echo esc_url( greet_get_option('greet_mp4', 'greet_video_upload', '') ) ?>" />
    </video>
    <h4 id="greet_text" class="greet_text"><?php echo esc_html( greet_get_option('hi_text', 'greet_apperience') )  ?></h4>

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
            <div id="greet_full-replay" class="greet_full-replay">
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
      <?php if (greet_get_option('button_text', 'greet_video_upload', '')) {  ?>
          <div
          <?php if (greet_get_option('second__video', 'greet_video_upload', '')) {  ?>
            onclick="videoChange('<?php echo esc_url( greet_get_option('second__video', 'greet_video_upload', '') ) ?>')"
            <?php } ?>

            class="greet_video"
          > 
          <?php if (greet_get_option('button_text', 'greet_video_upload', '')) {  ?>
            <a <?php if (!greet_get_option('second__video', 'greet_video_upload', '')) {  ?> target="_blank" href="<?php echo esc_url( greet_get_option('button_link', 'greet_video_upload', '') ) ?>"<?php } ?>><?php echo esc_html( greet_get_option('button_text', 'greet_video_upload', '') ) ?></a>
            <?php } ?>
          </div>
          <?php } ?>

          <?php if (greet_get_option('button_second_text', 'greet_video_upload', '')) {  ?>
          <div
          <?php if (greet_get_option('third__video', 'greet_video_upload', '')) {  ?>
            onclick="videoChange('<?php echo esc_url( greet_get_option('third__video', 'greet_video_upload', '') ) ?>')"
            <?php } ?>

            class="greet_video"
          > 
          <?php if (greet_get_option('button_second_text', 'greet_video_upload', '')) {  ?>
            <a <?php if (!greet_get_option('third__video', 'greet_video_upload', '')) {  ?> target="_blank" href="<?php echo esc_url( greet_get_option('button_second_link', 'greet_video_upload', '') ) ?>"<?php } ?>><?php echo esc_html( greet_get_option('button_second_text', 'greet_video_upload', '') ) ?></a>
            <?php } ?>
          </div>
          <?php } ?>



          <?php if (greet_get_option('button_third_text', 'greet_video_upload', '')) {  ?>
          <div
          <?php if (greet_get_option('fourth__video', 'greet_video_upload', '')) {  ?>
            onclick="videoChange('<?php echo esc_url( greet_get_option('fourth__video', 'greet_video_upload', '') ) ?>')"
            <?php } ?>

            class="greet_video"
          > 
          <?php if (greet_get_option('button_third_text', 'greet_video_upload', '')) {  ?>
            <a <?php if (!greet_get_option('fourth__video', 'greet_video_upload', '')) {  ?> target="_blank" href="<?php echo esc_url( greet_get_option('button_third_link', 'greet_video_upload', '') ) ?>"<?php } ?>><?php echo esc_html( greet_get_option('button_third_text', 'greet_video_upload', '') ) ?></a>
            <?php } ?>
          </div>
          <?php } ?>

        </div>
        
    </div>
</div>
<style>
.greet_wrapper video {
    border-color: <?php echo esc_attr( greet_get_option('border_color', 'greet_apperience') ) ?>;
}
</style>

<?php }  ?>
<?php } ?>
