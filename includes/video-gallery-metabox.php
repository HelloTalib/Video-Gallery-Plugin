<?php
class Video_Gallery_Metabox
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'video_gallery_metabox']);
        add_action('save_post', [$this, 'video_gallery_save']);
    }
    public function video_gallery_metabox()
    {
        add_meta_box('video_gallery_metabox', __('video Gallery'), [$this, 'video_gallery_callback'], 'video', 'normal', 'default');
    }
    public function video_gallery_callback($post)
    {

        wp_nonce_field(basename(__FILE__), 'video_gallery_nonce');
        $video_gallery_stored_data = get_post_meta($post->ID);
        // $video_link = $video_gallery_stored_data['video_link'];
        // $youtube_link = $video_gallery_stored_data['youtube_link'];
        $content = get_post_meta($post->ID, 'details', true);
        $editor = 'details';
        $settings = [
            'textarea_rows' => 5,
            'media_buttons' => false,
        ];
        ?>
            <div class="wrap video-form">
                <div class="form-group">
                    <label for="video_link"><?php _e('video Link', 'dom');?></label>
                    <input type="text" name="video_link" id="video_link" value="<?php if (!empty($video_gallery_stored_data['video_link'])) {
            echo esc_attr($video_gallery_stored_data['video_link'][0]);
        }
        ?>">
                </div>

                <div class="form-group">
                    <label for="details"><?php _e('details', 'dom');?></label>
                    <?php wp_editor($content, $editor, $settings);?>
                </div>
                <div class="form-group">
                    <?php if (isset($video_gallery_stored_data['video_link'][0])): ?>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_gallery_stored_data['video_link'][0]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php endif;?>
                </div>
            </div>

        <?php

    }

    public function video_gallery_save($post_id)
    {
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);
        $is_valid_nonce = isset($_POST['video_gallery_nonce']) && wp_verify_nonce($_POST['video_gallery_nonce'], basename(__FILE__)) ? 'true' : 'false';

        if ($is_autosave || $is_revision || !$is_valid_nonce) {
            return;
        }
        if (isset($_POST['video_link'])) {
            update_post_meta($post_id, 'video_link', sanitize_text_field($_POST['video_link']));
        }
        if (isset($_POST['details'])) {
            update_post_meta($post_id, 'details', sanitize_text_field($_POST['details']));
        }
        if (isset($_POST['video'])) {
            update_post_meta($post_id, 'video', sanitize_text_field($_POST['video']));
        }
    }
}
new Video_Gallery_Metabox();