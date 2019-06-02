<?php if (substr_count($_SERVER[‘HTTP_ACCEPT_ENCODING’], ‘gzip’)) ob_start(«ob_gzhandler»); else ob_start(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,user-scalable=0">
    <meta name="keywords" content="">
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
     <?php $locale = get_locale();
          if( $locale == 'ru_RU'){$id = 2;}
          if( $locale == 'en_GB'){$id = 167;}
          if( $locale == 'uk'){$id = 150;}
    ?>
    <div class="main__wrapper">
        <header id="nav">
            <div class="container nav-container">
               <div class="d-none d-md-block row d-xl-none">
                   <div class="col-12">
                       <div class="row lang__wrapper">
                           <div class="col-4">
                               <?php if ( is_active_sidebar( 'header' ) ) : ?> 
                                <div class="lang col-12">
                                   <?php dynamic_sidebar( 'header' ); ?>
                                </div>
                                <?php endif; ?>
                           </div>
                           <div class="col-8">
                                <a href="<?php the_field('main_phone_tel', $id ); ?>" class="col-12 d-flex main__phone text-right justify-content-end">
                                    <?php the_field('main_phone', $id ); ?>
                                </a>
                                <p class="col-12 time text-right">
                                    <?php the_field('main_phone_time', $id ); ?>
                                </p>
                           </div>
                       </div>
                   </div>
               </div>
                <div class="row">
                    <div class="col-12 col-xl-9 menu__wrapper">
                       <?php if( !is_404() ) : ?>
                        <nav class="navbar navbar-expand-lg sticky-top d-flex align-items-start">
                            <?php $logo_img = '';
                                    if( $custom_logo_id = get_theme_mod('custom_logo') ){
                                        $logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                                            'class'    => 'custom-logo',
                                            'itemprop' => 'logo',
                                        ) );
                                    }
                            ?>
                            <a class="navbar-brand" href="#"><?php echo $logo_img; ?></a>
                            <button class="navbar-toggler d-flex d-lg-none justify-content-center align-items-center flex-column" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbar1">
                                <ul class="navbar-nav mr-auto d-flex justify-content-between">
                                    <li class="nav-item dropdown">
                                        <a href="#main" class="nav-link"><?php pll_e('О выставке'); ?></a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1"></ul>    
                                    </li>
                                    <?php $gallery = get_field('gallery', $id); ?>
                                    <?php $hiden = $gallery['cycle']['type']; ?>
                                    <?php if(!empty($gallery) && $gallery && !$hiden ) : ?>
                                        <li class="nav-item"><a href="#gallery" class="nav-link"><?php pll_e('Галерея'); ?></a></li>
                                    <?php endif; ?>
                                    <?php $footer_two = get_field('footer_right', $id); ?>
                                    <?php if( $footer_two['map'] && $footer_two['address'] ) : ?>
                                        <li class="nav-item"><a href="#contact" class="nav-link"><?php pll_e('Как добраться'); ?></a></li>
                                    <?php endif; ?>
                                    <?php $footer = get_field('footer_left', $id); ?>
                                    <?php $circle = $footer['email_cycle']; ?>
                                    <?php if( $footer['text_time'] && $circle ) : ?>
                                        <li class="nav-item"><a href="#contact" class="nav-link"><?php pll_e('Контакты'); ?></a></li>
                                    <?php endif; ?>
                                        <li class="d-md-none d-flex li__lang">
                                        <?php if ( is_active_sidebar( 'header' ) ) : ?> 
                                            <span class="lang col-12">
                                               <?php dynamic_sidebar( 'header' ); ?>
                                            </span>
                                        <?php endif; ?>
                                        </li>
                                </ul>
                            </div>
                        </nav>
                        <?php endif; ?>
                        <?php if( is_404() ) : ?>
                            <nav class="navbar navbar-expand-lg sticky-top d-flex align-items-start">
                            <?php $logo_img = '';
                                    if( $custom_logo_id = get_theme_mod('custom_logo') ){
                                        $logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                                            'class'    => 'custom-logo',
                                            'itemprop' => 'logo',
                                        ) );
                                    }
                            ?>
                            <a class="navbar-brand" href="#"><?php echo $logo_img; ?></a>
                            <button class="navbar-toggler d-flex d-lg-none justify-content-center align-items-center flex-column" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                                <div class="collapse navbar-collapse" id="navbar1">
                                    <ul class="navbar-nav mr-auto d-flex">
                                        <li class="nav-item">
                                            <a href="<?php echo home_url(); ?>" class="nav-link"><?php pll_e('О выставке'); ?></a>
                                        </li>
                                        <?php $footer = get_field('footer_left', $id); ?>
                                        <?php $circle = $footer['email_cycle']; ?>
                                        <?php if( $footer['text_time'] && $circle ) : ?>
                                            <li class="nav-item"><a href="#contact" class="nav-link"><?php pll_e('Контакты'); ?></a></li>
                                        <?php endif; ?>
                                        <li class="d-md-none d-flex li__lang">
                                        <?php if ( is_active_sidebar( 'header' ) ) : ?> 
                                            <span class="lang col-12">
                                               <?php dynamic_sidebar( 'header' ); ?>
                                            </span>
                                        <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        <?php endif; ?>
                    </div>
                    <div class="d-none d-xl-flex col-xl-3 lang__wrapper">
                        <div class="row">
                            <?php if ( is_active_sidebar( 'header' ) ) : ?> 
                                <div class="lang col-12">
                                   <?php dynamic_sidebar( 'header' ); ?>
                                </div>
                            <?php endif; ?>
                            <a href="<?php the_field('main_phone_tel', $id ); ?>" class="col-12 main__phone text-center">
                                    <?php the_field('main_phone', $id ); ?>
                            </a>
                            <p class="col-12 time text-center">
                                <?php the_field('main_phone_time', $id ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <script>
            $('.lang ul').find('a[lang="uk"]').html('UK');
            $('.lang ul').find('a[lang="ru-RU"]').html('RU');
            $('.lang ul').find('a[lang="en-GB"]').html('ENG');
        </script>
   