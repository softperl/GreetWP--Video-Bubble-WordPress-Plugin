<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_greet';

//
// Create options
//
CSF::createOptions($prefix, array(
    'menu_title' => 'Greet video',
    'menu_slug'  => 'greet-options',
    'menu_icon' => 'dashicons-format-video',
    'framework_title' => 'Greet <small>by ThemeAtelier</small>',
    'footer_text'             => __('If you love the plugin don\'t forgot to give us a rating form your <a target="_blank" href="https://codecanyon.net/downloads">download page</a>.', 'greet'),
    'theme'                   => 'light',
));

//
// Create a section
//


CSF::createSection($prefix, array(
    'title'  => 'Upload video',
    'icon'   => 'fas fa-upload',


    'fields' => array(
        array(
            'id'      => 'mp4',
            'type'    => 'media',
            'title'   => esc_html__('Upload default Video (mp4)*', 'greet'),
            'subtitle'  =>  __('If you do not have a mp4 video you may use <a href="http://www.freeconvert.com" target="_blank">this website</a> to convert your current version of video.', 'greet'),
            'library' => 'video',
        ),

        array(
            'id'    => 'button_text',
            'title' => esc_html__('First Button text', 'greet'),
            'subtitle' => esc_html__('Add button text here. If you don\'t want to show the button just keep it blank.', 'greet'),
            'type'  => 'text',
            'default' => esc_html__('Make a booking', 'greet'),
        ),

        array(
            'id'    => 'button_link',
            'title' => esc_html__('First button link', 'greet'),
            'subtitle' => esc_html__('Add link for opening as external link on first button click. Remove link if you want to load second video instead of link.', 'greet'),
            'type'  => 'link',
        ),

        // Second video
        array(
            'id'      => 'second__video',
            'type'    => 'media',
            'title'   => esc_html__('Second video on first button click (mp4)', 'greet'),
            'subtitle' => esc_html__('If you add video here the video will play on first button click', 'greet'),
            'library' => 'video',
            'dependency' => array('button_link', '==', 'false'),
        ),

        array(
            'id'    => 'button_second_text',
            'title' => esc_html__('Second button text', 'greet'),
            'subtitle' => esc_html__('Add button text here. If you don\'t want to show the button just keep it blank.', 'greet'),
            'type'  => 'text',
        ),

        array(
            'id'    => 'button_second_link',
            'title' => esc_html__('Second button link', 'greet'),
            'subtitle' => esc_html__('Put link for opening as external link on second button click. Remove link if you want to load third video instead of link.', 'greet'),
            'type'  => 'link',
        ),

        // Third video
        array(
            'id'      => 'third__video',
            'type'    => 'media',
            'title'   => esc_html__('Third video on button click (mp4)', 'greet'),
            'subtitle' => esc_html__('This video will play on second button click.', 'greet'),
            'library' => 'video',
            'dependency' => array('button_second_link', '==', 'false'),
        ),

        array(
            'id'    => 'button_third_text',
            'title' => esc_html__('Third button text', 'greet'),
            'subtitle' => esc_html__('Add button text here. If you don\'t want to show the button just keep it blank.', 'greet'),
            'type'  => 'text',
        ),

        array(
            'id'    => 'button_third_link',
            'title' => esc_html__('Third button link', 'greet'),
            'subtitle' => esc_html__('Put link for opening as external link on third button click. Remove link if you want to load fourth video instead of link', 'greet'),
            'type'  => 'link',
        ),

        // Fourth video
        array(
            'id'      => 'fourth__video',
            'type'    => 'media',
            'title'   => esc_html__('Fourth video on button click (mp4)', 'greet'),
            'subtitle' => esc_html__('This video will play on third button click.', 'greet'),
            'library' => 'video',
            'dependency' => array('button_third_link', '==', 'false'),
        ),

    )
));

//
// Validate
//
CSF::createSection($prefix, array(
    'title'       => 'Appearance',
    'icon'        => 'fas fa-desktop',
    'fields'      => array(

        array(
            'id'    => 'hi_text',
            'title' => esc_html__('Hi text Input', 'greet'),
            'subtitle' => esc_html__('Change small hi text here', 'greet'),
            'type'  => 'text',
            'default' =>  esc_html__('Hi 👋', 'greet'),
        ),

        array(
            'id'          => 'greet_positon',
            'type'        => 'select',
            'title'       => esc_html__('Bubble position', 'greet'),
            'subtitle' => esc_html__('Select bubble position you want to show', 'greet'),

            'options'     => array(
                'right'     => 'Right',
                'greet-left'     => 'Left',
            ),
            'default'     => 'right'
        ),

        array(
            'id'         => 'pause-video',
            'type'       => 'switcher',
            'title'       => esc_html__('Pause video when leaving page', 'greet'),
            'subtitle' => esc_html__('Turn on the option to pause video if they switch browser tab. ', 'greet'),
        ),


        array(
            'id'      => 'border_color',
            'type'    => 'color',
            'title'   => esc_html__('Border Color', 'greet'),
            'subtitle'   => esc_html__('Change bubble border color here', 'greet'),
            'default' => '#7432ff',
        ),

        array(
            'id'      => 'button_type',
            'type'    => 'button_set',
            'title'   => esc_html__('Button type', 'greet'),
            'options' => array(
                'square'    => esc_html__('Square', 'greet'),
                'rounded'   => esc_html__('Rounded', 'greet'),
            ),
            'default' => 'square',
        ),

        array(
            'id'      => 'button_radius',
            'type'    => 'slider',
            'title'   => 'Button radius',
            'default' => 5,
            'dependency' => array('button_type', '==', 'rounded'),
        ),

        array(
            'id'        => 'buttonsColors',
            'type'      => 'color_group',
            'title'     => 'Buttons colors',
            'options'   => array(
                'buttons_bg' => 'Backorund',
                'buttons_color' => 'Text color',
                'buttons_hover_bg' => 'Background hover',
                'buttons_hover_color' => 'Hover text color',
            ),
            'default'   => array(
                'buttons_bg' => '#7432ff',
                'buttons_color' => '#ffffff',
                'buttons_hover_bg' => '#7113ff',
                'buttons_hover_color' => '#ffffff',
            )
        ),


        array(
            'id'          => 'show_pages',
            'type'        => 'select',
            'title'       => esc_html__('Select select specefic pages to show bubble on specefic page only', 'greet'),
            'chosen'      => true,
            'multiple'    => true,
            'sortable'    => false,
            'ajax'        => true,
            'options'     => 'pages',
            'placeholder' => esc_html__('Select pages', 'greet'),
        ),


    )
));


CSF::createSection($prefix, array(
    'title'       => 'Backup',
    'icon'        => 'fas fa-shield-alt',
    'description' => esc_html__('Export or import to use same settings in different websites.', 'greet'),
    'fields'      => array(
        array(
            'type' => 'backup',
        ),

    )
));
