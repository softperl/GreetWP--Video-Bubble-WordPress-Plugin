<?php
// Main settings api
if (!class_exists('Greet_Settings_API_Main')) :
    class Greet_Settings_API_Main
    {
        private $settings_api;
        function __construct()
        {
            $this->settings_api = new Greet_Settings_API;
            add_action('admin_init', array($this, 'admin_init'));
            add_action('admin_menu', array($this, 'admin_menu'));
        }

        function admin_init()
        {

            //set the settings
            $this->settings_api->set_sections($this->get_settings_sections());
            $this->settings_api->set_fields($this->get_settings_fields());

            //initialize settings
            $this->settings_api->admin_init();
        }

        function admin_menu()
        {
            add_options_page(
                esc_html__('Greet Video', 'greet'),
                esc_html__('Greet Video', 'greet'),
                'manage_options',
                'greet_settings',
                array($this, 'plugin_page')
            );
        }

        function get_settings_sections()
        {
            $sections = array(
                array(
                    'id'    => 'greet_video_upload',
                    'title' => esc_html__('Greet video upload', 'greet')
                ),
                array(
                    'id'    => 'greet_apperience',
                    'title' => esc_html__('Greet Apperience', 'greet')
                )
            );
            return $sections;
        }

        /**
         * Returns all the settings fields
         *
         * @return array settings fields
         */
        function get_settings_fields()
        {
            $settings_fields = array(
                'greet_video_upload' => array(
                    array(
                        'name'    => 'greet_mp4',
                        'label'   => esc_html__('Upload default Video (mp4)', 'greet'),
                        'desc'    => esc_html__('If you do not have a mp4 video you may use this website https://www.freeconvert.com/ to convert your current version of video.', 'greet'),
                        'type'    => 'file',
                        'default' => '',
                        'options' => array(
                            'button_label' =>  esc_html__('Choose a Video', 'greet')
                        )
                    ),
                    array(
                        'name'              => 'button_text',
                        'label'             => esc_html__('Button text', 'greet'),
                        'desc'              => esc_html__('Add button text here. If you don\'t want to show the button just keep it blank.', 'greet'),
                        'type'              => 'text',
                        'default'           =>  esc_html__('Make a booking', 'greet'),
                        'sanitize_callback' => 'sanitize_text_field'
                    ),
                    array(
                        'name'              => 'button_link',
                        'label'             => esc_html__('Single video button link', 'greet'),
                        'desc'              => esc_html__('Add button link for showing in single video', 'greet'),
                        'type'              => 'text',
                        'sanitize_callback' => 'sanitize_text_field'
                    ),
                    array(
                        'name'    => 'second__video',
                        'label'   => esc_html__('Second video on button click (mp4)', 'greet'),
                        'desc'    => esc_html__('This video will play on first button click', 'greet'),
                        'type'    => 'file',
                        'default' => '',
                        'options' => array(
                            'button_label' =>  esc_html__('Choose a Video', 'greet')
                        )
                    ),
                    array(
                        'name'              => 'button_second_text',
                        'label'             => esc_html__('Second button text', 'greet'),
                        'desc'              => esc_html__('Add button text here. If you don\'t want to show the button just keep it blank.', 'greet'),
                        'type'              => 'text',
                        'sanitize_callback' => 'sanitize_text_field'
                    ),
                    array(
                        'name'              => 'button_second_link',
                        'label'             => esc_html__('Second button link', 'greet'),
                        'desc'              => esc_html__('Add boutton link for second button.', 'greet'),
                        'type'              => 'text',
                        'sanitize_callback' => 'sanitize_text_field'
                    ),
                    array(
                        'name'    => 'third__video',
                        'label'   => esc_html__('Third video on button click (mp4)', 'greet'),
                        'desc'    => esc_html__('This video will play on second button click.', 'greet'),
                        'type'    => 'file',
                        'default' => '',
                        'options' => array(
                            'button_label' =>  esc_html__('Choose a Video', 'greet')
                        )
                    ),

                    array(
                        'name'              => 'button_third_text',
                        'label'             => esc_html__('Third button text', 'greet'),
                        'desc'              => esc_html__('Add button text here. If you don\'t want to show the button just keep it blank.', 'greet'),
                        'type'              => 'text',
                        'sanitize_callback' => 'sanitize_text_field'
                    ),
                    array(
                        'name'              => 'button_third_link',
                        'label'             => esc_html__('Third button link', 'greet'),
                        'desc'              => esc_html__('Add boutton link for third button.', 'greet'),
                        'type'              => 'text',
                        'sanitize_callback' => 'sanitize_text_field'
                    ),
                    array(
                        'name'    => 'fourth__video',
                        'label'   => esc_html__('Fourth video on button click (mp4)', 'greet'),
                        'desc'    => esc_html__('This video will play on third button click.', 'greet'),
                        'type'    => 'file',
                        'default' => '',
                        'options' => array(
                            'button_label' =>  esc_html__('Choose a Video', 'greet')
                        )
                    ),
                   
                ),
                'greet_apperience' => array(
                    array(
                        'name'              => 'hi_text',
                        'label'             => esc_html__('Hi text Input', 'greet'),
                        'desc'              => esc_html__('Change small hi text here', 'greet'),
                        'placeholder'       => esc_html__('Write your text', 'greet'),
                        'type'              => 'text',
                        'default'           =>  esc_html__('Hi 👋', 'greet'),
                        'sanitize_callback' => 'sanitize_text_field'
                    ),

                    array(
                        'name'    => 'greet_positon',
                        'label'   => esc_html__('Bubble position', 'greet'),
                        'desc'    => esc_html__('Select bubble position you want to show', 'greet'),
                        'type'    => 'select',
                        'default' => 'right',
                        'options' => array(
                            'right' => esc_html__('Right', 'greet'),
                            'greet-left'  => esc_html__('Left', 'greet')
                        )
                    ),

                    array(
                        'name'    => 'border_color',
                        'label'   => esc_html__('Border Color', 'greet'),
                        'desc'    => esc_html__('Change bubble border color here', 'greet'),
                        'type'    => 'color',
                        'default' => '#7432ff'
                    ),
                )
            );

            return $settings_fields;
        }

        function plugin_page()
        {
            echo '<div class="wrap">';

            $this->settings_api->show_navigation();
            $this->settings_api->show_forms();

            echo '</div>';
        }

        /**
         * Get all the pages
         *
         * @return array page names with key value pairs
         */
        function get_pages()
        {
            $pages = get_pages();
            $pages_options = array();
            if ($pages) {
                foreach ($pages as $page) {
                    $pages_options[$page->ID] = $page->post_title;
                }
            }

            return $pages_options;
        }
    }
endif;
