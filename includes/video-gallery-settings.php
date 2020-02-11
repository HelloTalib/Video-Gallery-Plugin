<?php
class video_gallery_settings
{
    public function __construct()
    {
        add_action('admin_init', [$this, 'video_gallery_settings_api']);
    }
    public function video_gallery_settings_api()
    {
        add_settings_section('video_gallery_settings_section', 'Video Gallery Settings', [$this, 'video_gallery_settings_section_callback'], 'reading');
        add_settings_field('video_gallery_settings_field', 'Video Galler Desible Full Screen', [$this, 'video_gallery_settings_field_callback'], 'reading', 'video_gallery_settings_section');
        register_setting('reading', 'video_gallery_settings_field');
    }
    public function video_gallery_settings_section_callback()
    {
        echo '<p>Settings for Youtube Video gallery section</p>';
    }
    public function video_gallery_settings_field_callback()
    {?>
       <input type="checkbox" class="code" id="video_gallery_settings_field" name="video_gallery_settings_field" value="1" <?php echo checked('1', get_option('video_gallery_settings_field'), false); ?>>
       <?php
}
}
new video_gallery_settings();
