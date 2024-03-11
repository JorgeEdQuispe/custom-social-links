<?php
/*
Plugin Name: Custom Social Links
Description: Plugin para agregar enlaces de redes sociales.
Version: 0.1
Author: Jorge Quispe
website: http://spawndev.uk
*/

// Acción para inicializar el plugin
add_action('init', 'custom_social_links_init');

function custom_social_links_init()
{
    // Define los shortcodes
    add_shortcode('enl_cel', 'custom_social_links_cel_shortcode');
    add_shortcode('text_cel', 'custom_social_links_cel_text_shortcode');
    add_shortcode('enl_what', 'custom_social_links_whatsapp_shortcode');
    add_shortcode('text_what', 'custom_social_links_whatsapp_text_shortcode');
    add_shortcode('enl_facebook', 'custom_social_links_facebook_shortcode');
    add_shortcode('enl_instagram', 'custom_social_links_instagram_shortcode');
    add_shortcode('enl_tiktok', 'custom_social_links_tiktok_shortcode');
    add_shortcode('enl_twitter', 'custom_social_links_twitter_shortcode');
    add_shortcode('enl_youtube', 'custom_social_links_youtube_shortcode');
    add_shortcode('enl_linkedin', 'custom_social_links_linkedin_shortcode');
}

// Función para obtener los enlaces guardados
function custom_social_links_get_links()
{
    $links = array(
        'cel' => get_option('cel_number'),
        'whatsapp' => get_option('whatsapp_number'),
        'facebook' => get_option('facebook_link'),
        'instagram' => get_option('instagram_link'),
        'tiktok' => get_option('tiktok_link'),
        'twitter' => get_option('twitter_link'),
        'youtube' => get_option('youtube_link'),
        'linkedin' => get_option('linkedin_link'),
    );
    return $links;
}

// Función para manejar el shortcode [enl_cel]
function custom_social_links_cel_shortcode()
{
    $links = custom_social_links_get_links();
    return 'tel:' . esc_attr($links['cel']);
}

// Función para manejar el shortcode [text_cel]
function custom_social_links_cel_text_shortcode()
{
    $links = custom_social_links_get_links();
    return esc_html($links['cel']);
}

// Función para manejar el shortcode [enl_what]
function custom_social_links_whatsapp_shortcode()
{
    $links = custom_social_links_get_links();
    return 'https://api.whatsapp.com/send?phone=' . esc_attr($links['whatsapp']);
}

// Función para manejar el shortcode [text_what]
function custom_social_links_whatsapp_text_shortcode()
{
    $links = custom_social_links_get_links();
    return esc_attr($links['whatsapp']);
}

// Función para manejar el shortcode [enl_facebook]
function custom_social_links_facebook_shortcode()
{
    $links = custom_social_links_get_links();
    return $links['facebook'];
}

// Función para manejar el shortcode [enl_instagram]
function custom_social_links_instagram_shortcode()
{
    $links = custom_social_links_get_links();
    return esc_attr($links['instagram']);
}

// Función para manejar el shortcode [enl_tiktok]
function custom_social_links_tiktok_shortcode()
{
    $links = custom_social_links_get_links();
    return esc_attr($links['tiktok']);
}

// Función para manejar el shortcode [enl_twitter]
function custom_social_links_twitter_shortcode()
{
    $links = custom_social_links_get_links();
    return esc_attr($links['twitter']);
}

// Función para manejar el shortcode [enl_youtube]
function custom_social_links_youtube_shortcode()
{
    $links = custom_social_links_get_links();
    return esc_attr($links['youtube']);
}

// Función para manejar el shortcode [enl_linkedin]
function custom_social_links_linkedin_shortcode()
{
    $links = custom_social_links_get_links();
    return esc_attr($links['linkedin']);
}

// Función para mostrar el formulario en el panel de administración
function custom_social_links_admin_page()
{
?>
    <div class="wrap">
        <h2>Configuración de Enlaces Sociales</h2>
        <form method="post" action="options.php">
            <?php settings_fields('custom_social_links_options'); ?>
            <?php do_settings_sections('custom_social_links_options'); ?>
            <script src="https://cdn.tailwindcss.com"></script>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row" class="flex">Número de Celular:</th>
                    <td>
                        <input type="text" name="cel_number" value="<?php echo esc_attr(get_option('cel_number')); ?>" class="" />
                    </td>
                    <td>
                        <span>[enl_cel] [text_cel]</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="flex">Número de WhatsApp:</th>
                    <td>
                        <input type="text" name="whatsapp_number" value="<?php echo esc_attr(get_option('whatsapp_number')); ?>" class="" />
                    </td>
                    <td>
                        <span>[enl_what] [text_what]</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="flex ">Enlace de Facebook:</th>
                    <td>
                        <input type="text" name="facebook_link" value="<?php echo esc_attr(get_option('facebook_link')); ?>" class=" " />
                    </td>
                    <td>
                        <span>[enl_facebook]</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="flex">Enlace de Instagram:</th>
                    <td>
                        <input type="text" name="instagram_link" value="<?php echo esc_attr(get_option('instagram_link')); ?>" class="" />
                    </td>
                    <td>
                        <span>[enl_instagram]</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="flex">Enlace de TikTok:</th>
                    <td>
                        <input type="text" name="tiktok_link" value="<?php echo esc_attr(get_option('tiktok_link')); ?>" class="" />
                    </td>
                    <td>
                        <span>[enl_tiktok]</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="">Enlace de Twitter:</th>
                    <td>
                        <input type="text" name="twitter_link" value="<?php echo esc_attr(get_option('twitter_link')); ?>" class="" />
                    </td>
                    <td>
                        <span>[enl_twitter]</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="">Enlace de YouTube:</th>
                    <td>
                        <input type="text" name="youtube_link" value="<?php echo esc_attr(get_option('youtube_link')); ?>" class="" />
                    </td>
                    <td>
                        <span>[enl_youtube]</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="">Enlace de LinkedIn:</th>
                    <td>
                        <input type="text" name="linkedin_link" value="<?php echo esc_attr(get_option('linkedin_link')); ?>" class="" />
                    </td>
                    <td>
                        <span>[enl_linkedin]</span>
                    </td>
                </tr>


            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

// Acción para agregar una página de opciones en el panel de administración
add_action('admin_menu', 'custom_social_links_admin_menu');

function custom_social_links_admin_menu()
{
    add_options_page('Configuración de Enlaces Sociales', 'Enlaces Sociales', 'manage_options', 'custom_social_links_options', 'custom_social_links_admin_page');
}

// Registro de las opciones
add_action('admin_init', 'custom_social_links_settings');

function custom_social_links_settings()
{
    register_setting('custom_social_links_options', 'cel_number');
    register_setting('custom_social_links_options', 'whatsapp_number');
    register_setting('custom_social_links_options', 'facebook_link');
    register_setting('custom_social_links_options', 'instagram_link');
    register_setting('custom_social_links_options', 'tiktok_link');
    register_setting('custom_social_links_options', 'twitter_link');
    register_setting('custom_social_links_options', 'youtube_link');
    register_setting('custom_social_links_options', 'linkedin_link');
}
