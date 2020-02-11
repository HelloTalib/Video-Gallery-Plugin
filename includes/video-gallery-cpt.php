<?php
class Video_Gallery_CPT
{
    public function __construct()
    {
        add_action('init', [$this, 'register_video_gallery']);
    }
    public function register_video_gallery()
    {
        $singular_name = apply_filters('video-gallery-single', 'Video');
        $plural_name = apply_filters('video-gallery-plural', 'Videos');
        $labels = array(
            'name' => $plural_name,
            'singular_name' => $singular_name,
            'add_new' => 'Add New',
            'add_new_item' => 'Add New' . $singular_name,
            'edit' => 'Edit',
            'edit_item' => 'Edit' . $singular_name,
            'new_item' => 'New' . $singular_name,
            'view' => 'View',
            'view_item' => 'View' . $plural_name,
            'search_item' => 'Search' . $plural_name,
            'not_found' => "No" . $plural_name . 'Found',
            'not_found_in_trash' => "No" . $plural_name, 'Found',
        );

        $args = apply_filters('video_gallery_args', array(
            'labels' => $labels,
            'description' => 'Videos by category',
            'taxonomies' => ['category'],
            'public' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-video-alt2
            ',
            'capability_type' => 'post',
            'supports' => ['title'],
        ));
        register_post_type('video', $args);
    }

}
new Video_Gallery_CPT();
