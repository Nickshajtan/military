<?php
/**
 * File for functions and definitions of the theme
 *
 * Contain loading of styles and scripts
 *
 */
//Style css
add_action('wp_enqueue_scripts', 'load_sec_css');
function load_sec_css() {
    $url = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css';
    $response = wp_remote_get('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    $code = wp_remote_retrieve_response_code( $response );
    if ( !is_wp_error( $response ) ){
        if( isset( $url ) && !empty( $url) && ( $code == '200') ){
            wp_register_style( 'b4', $url, array(), ' ' );
            wp_enqueue_style( 'b4' );
        }
    }
    else{
        wp_register_style( 'b4', get_template_directory_uri() . '/styles/bootstrap.min.css', array(), ' ' );
        wp_enqueue_style( 'b4' );
    }
    wp_register_style( 'progressive',  get_template_directory_uri() . '/styles/progressive-image.min.css', array(), ' ' );
    wp_enqueue_style( 'progressive');
    wp_register_style( 'fancybox',  get_template_directory_uri() . '/styles/jquery.fancybox.min.css', array(), ' ' );
    wp_enqueue_style( 'fancybox');
    wp_register_style( 'mine',  get_template_directory_uri() . '/styles/mine.css', array(), ' ' );
    wp_enqueue_style( 'mine');
    wp_register_style( 'styles', get_stylesheet_uri(), array(), ' ' );
    wp_enqueue_style( 'styles' );
}
//JQUERY
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method() {
    $url = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js';
    $response = wp_remote_get('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js');
    $code = wp_remote_retrieve_response_code( $response );
    if ( !is_wp_error( $response ) ){
        if( isset( $url ) && !empty( $url) && ( $code == '200') ){
        	wp_deregister_script( 'jquery-core' );
	        wp_register_script( 'jquery-core', $url ,array(), null, true);
	        wp_enqueue_script( 'jquery' );
        }
    }
    else{
            wp_deregister_script( 'jquery-core' );
	        wp_register_script( 'jquery-core', get_theme_file_uri( 'js/jquery-3.3.1.min.js' ) ,array(), null, true);
	        wp_enqueue_script( 'jquery' );
    }
}
//Load js
add_action( 'wp_enqueue_scripts', 'load_js' );
function load_js() {
     wp_register_script('custom', get_theme_file_uri( 'js/scripts.js' ), array( 'jquery' ), null, true );
     wp_enqueue_script('custom');
     wp_register_script('ajax', get_theme_file_uri( 'js/ajax.js' ), array( 'jquery' ), null, true );
     wp_enqueue_script('ajax');
     $locale = get_locale();
     if( $locale == 'ru_RU'){$code = 'ru';}
     if( $locale == 'en_GB'){$code = 'en';}
     if( $locale == 'uk'){$code = 'uk';}
     $url = get_bloginfo('url');
     $url = str_replace($code, "", $url );
     $wnm_custom = array( 'template_url' =>get_bloginfo('template_url') , 'url' => $url );
     wp_localize_script( 'ajax', 'wnm_custom', $wnm_custom );
     wp_register_script('progressive', get_theme_file_uri( 'js/progressive-image.min.js' ), array( 'jquery' ), null, true );
     wp_enqueue_script('progressive'); 
     if( !is_404() ){
         wp_register_script('fancybox', get_theme_file_uri( 'js/jquery.fancybox.min.js' ), array( 'jquery' ), null, true );
         wp_enqueue_script('fancybox');     
         wp_register_script( 'mihdan-infinite-scroll', get_theme_file_uri( 'js/jquery-ias.min.js' ), array( 'jquery' ), null, true );
         wp_enqueue_script('mihdan-infinite-scroll');   
     }
     //$wnm_custom = array( 'ajax_text_button' => get_field('text_for_ajax_button_more','options'), 'ajax_end_load' => get_field('text_fo_end_of_ajax_load','options') );
     //wp_localize_script( 'mihdan-infinite-scroll', 'wnm_custom', $wnm_custom );
}

/**
 * Disable the confirmation notices when an administrator
 * changes their email address.
 *
 * @see http://codex.wordpress.com/Function_Reference/update_option_new_admin_email
 */
function wpdocs_update_option_new_admin_email( $old_value, $value ) {

    update_option( 'admin_email', $value );
}
add_action( 'add_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );
add_action( 'update_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );
//No slash
add_filter('user_trailingslashit', 'no_page_slash', 70, 2);
function no_page_slash( $string, $type ){
   global $wp_rewrite;

	if( $type == 'page' && $wp_rewrite->using_permalinks() && $wp_rewrite->use_trailing_slashes )
		$string = untrailingslashit($string);

   return $string;
}
//Remove admin pages
function remove_menus(){
    remove_menu_page( 'edit.php' ); 
    //remove_menu_page( 'users.php' );
    remove_menu_page( 'edit-comments.php' );   
}
add_action( 'admin_menu', 'remove_menus' );
//Options page for main information
/*
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Main Settings',
		'menu_title'	=> 'Основная информация',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
*/
//Setup
add_theme_support( 'post-thumbnails', array( 'post' ) );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'blog-thumb', 170, 160, array( 'left', 'center' ) ); 
    add_image_size( 'modal', 800, 600, array( 'left', 'center' ) ); 
    add_image_size( 'middle', 150, 150, array( 'left', 'top' ) );
    add_image_size( 'position', 540, 300, array( 'left', 'top' ) );
    add_image_size( 'sold-full', 580, 420, array( 'left', 'top' ) );
    add_image_size( 'map', 540, 625, array( 'left', 'top' ) );
    add_image_size( 'lazy-load', 32, 32, array( 'left', 'top' ) );
}
if ( ! function_exists( 'theme_setup' ) ) :
function theme_setup(){
    //Add support theme html 5    
    add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption') ); 
    //Add custom logo
    add_theme_support( 'custom-logo', array(
		'height'      => 52,
		'width'       => 166,
		'flex-height' => false,
	) );
}
endif;
add_action( 'after_setup_theme', 'theme_setup' );
remove_filter('the_content', 'wpautop');
//No robots
function meta_robots () {
if (is_feed() or is_single() or is_category() or is_author() or is_archive() or is_month() or is_date() or is_day() or is_year() or is_tag() or is_tax() or is_attachment() or is_paged() or is_search() or is_404())
{
echo "".'<meta name="robots" content="noindex,nofollow" />'."\n";
} }
add_action('wp_head', 'meta_robots');
//Is mobile
function is_mobile(){
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	if(
		// добавить '|android|ipad|playbook|silk' в первую регулярку для определения еще и tablet
		@preg_match(
			'/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i|android|ipad|playbook|silk',
			$useragent
		)
		||
		@preg_match(
			'/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',
			substr($useragent,0,4)
		)
	)
		return true;
	return false; 
}
//Pagination
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}
//title
add_theme_support('title-tag');
//Enable webp + mp4 +webp
add_filter( 'upload_mimes', 'upload_allow_types' );
function upload_allow_types( $mimes ) {
    $mimes['mp4']  = 'video/mp4'; 
   // $mimes['mp4']  = 'application/mp4'; 
    $mimes['webm']  = 'video/webm'; 
    $mimes['webp']  = 'image/webp';
    return $mimes;
}
//Polylang strings
add_action('init', function() {
    pll_register_string('Словосочетание для ссылки на галерею', 'Cмотрите больше фото и видео в галерее');
    pll_register_string('Заголовок для контактной формы', 'Закажите обратный звонок');
    pll_register_string('Заголовок для секции с видео', 'Видеопрезентация');
    pll_register_string('Словосочетание для контактной формы', 'и мы перезвоним вам');
    pll_register_string('Словосочетание для контактной формы', 'Ваше имя');
    pll_register_string('Словосочетание для контактной формы', 'Телефон');
    pll_register_string('Словосочетание для контактной формы', 'Email');
    pll_register_string('Словосочетание для контактной формы', 'Ваше сообщение...');
    pll_register_string('Словосочетание для контактной формы', 'Отправить');
    pll_register_string('Заголовок для галереи', 'Галерея');
    pll_register_string('Заголовок для футера сайта', 'Контакты');
    pll_register_string('Заголовок для футера сайта', 'Связь с нами');
    pll_register_string('Заголовок для футера сайта', 'Как добраться');
    pll_register_string('Заголовок для меню сайта', 'О выставке');
    pll_register_string('Заголовок для страницы 404', 'К сожалению, такой страницы тут нет');
    pll_register_string('Кнопка для страницы 404', 'Попробуйте это');
});    
//Register sidebars
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Хедер',
		'id'            => "header",
		'description'   => 'Виджет для переключателя языка',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => "",
		'before_title'  => '',
		'after_title'   => "",
	) );
}
function add_async_attribute($tag, $handle) {
   $scripts_to_async = array('mihdan-infinite-scroll', 'fancybox');
   
   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
         return str_replace(' src', ' async src', $tag);
      }
   }
   return $tag;
}
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
//Email form
add_action( 'wp_ajax_ajax_order', 'ajax_mail_function' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_ajax_order', 'ajax_mail_function' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
function ajax_mail_function(){
    //Variables
        $headers = "Content-type: text/html; charset=utf-8\r\n";
        $sitename = get_bloginfo('name');
        $admin_email = get_bloginfo('admin_email');
        $subject = "Новое сообщение с сайта ". $sitename;
        $user_name = htmlspecialchars(trim($_POST['name']));
        $user_phone = htmlspecialchars(trim($_POST['phone']));
        $user_email = htmlspecialchars(trim($_POST['email']));
        $user_message = htmlspecialchars(trim($_POST['message']));
        $spam_first = (trim($_POST['spamFirst']));
        $spam_second = (trim($_POST['spamSecond']));
if( (isset( $spam_first ) && !empty( $spam_first )) || (isset( $spam_second ) && !empty( $spam_second) )){
    exit;
}    
    //    $id = trim($_POST['page']);
        $message = '<html>
<head>
     <meta charset="UTF-8">
     <title>Форма обратной связи</title>
</head>
<body>
    <body style="width:94%; height:auto;">
    <table style="width:100%; max-width:600px;height:auto;vertical-align: middle;border-color:#000;border:0px;border-style:solid;border-spacing:unset;padding:0;" summary="форма заявки" rules="none" frame="border" cellpadding="0" cellspacing="0">
        <caption align="justify" style="height: 45px;">
            <h2 style="margin: 5px;font-size: 1.5rem;">Сообщение</h2>
        </caption>
        <thead align="justify" style="background-color:#ddd;border-color:#000;border:1px;border-style:solid;">
            <tr style="height: 30px;">
                <td align="center" style="width:100%;" colspan="4">
                    <h3 style="margin:5px;font-size: 1.1rem;">' . $subject . '</h3>
                </td>
            </tr>
        </thead>
        <tbody style="font-size: 1rem;">';
if(isset($user_name)&&!empty($user_name)) {       
  $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">Имя отправителя:</td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">'. $user_name .'</td>
            </tr>';
}
if(isset($user_phone)&&!empty($user_phone)) {     
   $message .=   '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">
                    Номер телефона:
                </td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">
                    '. $user_phone .'
                </td>
            </tr>';
}
if(isset($user_email)&&!empty($user_email)) {
    $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td style="border-right: 1px solid #ccc;padding-left:25px;">
                    Email:
                </td>
                <td style="border-left: 1px solid #ccc;padding-left:25px;">
                    '. $user_email .'
                </td>
            </tr>';
}
if(isset($user_message)&&!empty($user_message)) {
    $message .= '<tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td colspan="4" align="center">
                    Сообщение:
                </td>
            </tr>
            <tr style="height:30px;width:auto;border-bottom: 1px solid black;">
                <td colspan="4" align="center">
                    '. $user_message .'
                </td>
            </tr>';
}
    $message .= '<tr style="height:90px;width:auto;">
               <td colspan="4" align="center">
                        <a href="'. get_bloginfo("url") . '/wp-admin" style="background-color:#1eb4e9;border:none; width: 70%;padding: 16px 15px;-webkit-border-radius: 49px;border-radius: 49px;margin:16px 0;color:#fff;font-size: 1rem;text-decoration:none;font-weight:600;">АДМИНИСТРИРОВАТЬ</a>
               </td>
            </tr>';
        mail($admin_email,$subject,$message,$headers);
}