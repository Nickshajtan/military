<?php get_header(); ?>
    <?php $main = get_field('main', $id); ?>
    <?php if(!empty($main) && ( get_field('main', $id)) ) : ?>
        <section id="main">
            <div class="container">
                <div class="row">
                    <?php if( !empty( $main['main_image'] ) ) : ?>
                        <div class="col-12 col-lg-6 col-xl-5">
                            <h1><?php echo $main['main_title']; ?></h1>
                            <p class="subtitle"><?php echo $main['main_subtitle']; ?></p>
                            <p><?php echo $main['main_text']; ?></p>
                        </div>
                        <div class="d-none d-lg-flex col-lg-6 col-xl-7 justify-content-center align-items-center">
                                        <?php   
                                                $img = $main['main_image'];
                                                $size = 'sold-full';
                                                $thumb = $img['sizes'][ $size ];
                                                $width = $img['sizes'][ $size . '-width' ];
                                                $height = $img['sizes'][ $size . '-height' ];
                                          ?>
                                          <?php   
                                                $img_small = $main['main_image'];
                                                $size = 'lazy-load';
                                                $thumb = $img['sizes'][ $size ];
                                                $width = $img['sizes'][ $size . '-width' ];
                                                $height = $img['sizes'][ $size . '-height' ];
                                          ?>
                                    <a href="<?php echo $img['url']; ?>" class="progressive replace">
                                        <img src="<?php echo $img_small['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="preview">
                                    </a>
                        </div>
                    <?php else : ?>
                        <div class="col-12">
                            <h1 class="text-left"><?php echo $main['main_title']; ?></h1>
                            <p class="subtitle text-left"><?php echo $main['main_subtitle']; ?></p>
                            <p><?php echo $main['main_text']; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php $group = get_field('positions_group', $id); ?>
    <?php if(!empty($group) && $group['video'] && $group['cycle_position'] ) : ?>
    <section id="postions" class="d-none d-lg-block bgimg progressive replace">
         <?php $cycle = $group['cycle_position']; ?>
         <div class="container part__one">
             <div class="row justify-content-center">
                 <p class="title text-center"><?php echo $group['name']; ?></p>
             </div>
             <?php if( !empty( $cycle ) ) : ?>
             <div class="row">
                        <?php foreach( $cycle  as $cycl ) : ?>
                            <a href="<?php echo (!empty($cycl['link_position']))? $cycl['link_position'] : '#'; ?>" class="col-12 col-md-6 col-lg-3 d-block">
                                <p class="subtitle text-center"><?php echo $cycl['text_position']; ?></p>
                                <?php   
                                    $img = $cycl['image_position'];
                                    $size = 'middle';
                                    $thumb = $img['sizes'][ $size ];
                                    $width = $img['sizes'][ $size . '-width' ];
                                    $height = $img['sizes'][ $size . '-height' ];
                                ?>
                                <?php if( !empty( $img ) ) : ?>
                                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="icons__pos text-center d-block ml-auto mr-auto">
                                <?php endif; ?>
                                <span class="long__line d-block ml-auto mr-auto"></span>
                                <span class="short__line d-block ml-auto mr-auto"></span>
                            </a>
                        <?php endforeach; ?> 
             </div>
             <?php endif; ?> 
         </div>
         <?php $video = $group['video']; ?>
         <?php if( !empty( $video ) && !is_mobile() && !wp_is_mobile()) : ?>
             <div class="part__two">
                 <?php $type = $video['type']; ?>
                 <?php if( ( !empty($type) ) && ( $type && in_array('youtube', $type) ) ) : ?>
                     <div class="container">
                       <div class="row justify-content-center">
                           <p class="title text-center"><?php pll_e('Видеопрезентация'); ?></p>
                        </div>
                        <?php $link = $video['link']; ?>
                        <?php if( !empty( $link) && !empty( $video['fon'] ) ) : ?>
                             <div class="row">
                                 <a href="<?php echo $link; ?>" class="d-none d-md-flex col-md-12 youtube justify-content-center align-items-center">
                                     <img src="<?php echo $video['fon']; ?>" alt="poster" class="bg">
                                     <img src="<?php echo get_template_directory_uri(); ?>/img/play.webp" alt="Play" class="icon d-flex">
                                 </a>
                             </div>
                         <?php endif; ?>
                     </div>
                 <?php endif; ?>
                 <?php if( ( !empty($type) ) && ( $type && in_array('media', $type) ) ) : ?>
                    <div class="container">
                       <div class="row justify-content-center">
                           <p class="title text-center"><?php pll_e('Видеопрезентация'); ?></p>
                        </div>
                     </div>
                     <?php $iframe = $video['media']; ?>
                     <?php if( !empty( $iframe ) ) : ?>
                         <?php
                                preg_match('/src="(.+?)"/', $iframe, $matches);
                                $src = $matches[1];
                                $params = array(
                                    'controls'    => 0,
                                    'hd'        => 1,
                                    'autohide'    => 1
                                );
                                $new_src = add_query_arg($params, $src);
                                $iframe = str_replace($src, $new_src, $iframe);
                                $attributes = 'frameborder="0"';
                                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                                echo $iframe;
                            ?>
                     <?php endif; ?>
                 <?php endif; ?>
                 <?php if( ( !empty($type) ) && ( $type && in_array('file', $type) ) ) : ?>
                    <div class="container">
                       <div class="row justify-content-center">
                           <p class="title text-center"><?php pll_e('Видеопрезентация'); ?></p>
                        </div>
                     </div>
                     <video preload="auto" autoplay="autoplay" controls="controls" <?php if( !empty($video['fon'])) : ?> poster="<?php echo $video['fon']; ?>" <?php endif; ?> class="fullscreen-bg__video">
                        <?php $file_one = $video['file_mp4']; ?>
                        <?php if( !empty( $file_one ) ) : ?>
                            <source src="<?php echo $file_one; ?>" type="video/mp4">
                        <?php endif; ?>
                        <?php $file_two = $video['file_webm']; ?>
                        <?php if( !empty( $file_two ) ) : ?>
                            <source src="<?php echo $file_two; ?>" type="video/webm">
                        <?php endif; ?>
                     </video>
                 <?php endif; ?>
             </div>
         <?php endif; ?>
    </section>
    <?php endif; ?>
    <?php $positions = get_field('positions', $id); ?>
    <?php if(!empty($positions)) : ?>
    <?php $count = 0; ?>
    <?php foreach( $positions as $position ) : ?>
       <?php $count++; ?>
            <section id="section-<?php echo $count; ?>" class="users__position <?php echo ( $count % 2 == 0 ) ? 'even bgimg progressive replace' : 'odd'; ?>">
                <div class="container">
                   <div class="row d-flex <?php echo ( $count % 2 == 0 ) ? 'flex-row-reverse' : ''; ?>">
                    <?php $one = $position['position_one']; ?>
                    <?php if( !empty( $one['position_image']) ) : ?>
                        <div class="col-12 col-md-12 col-lg-6 image__wrapper">
                            <?php   
                                    $img = $one['position_image'];
                                    $size = 'position';
                                    $thumb = $img['sizes'][ $size ];
                                    $width = $img['sizes'][ $size . '-width' ];
                                    $height = $img['sizes'][ $size . '-height' ];
                              ?>
                              <?php   
                                    $img = $one['position_image'];
                                    $size = 'lazy-load';
                                    $thumb = $img['sizes'][ $size ];
                                    $width = $img['sizes'][ $size . '-width' ];
                                    $height = $img['sizes'][ $size . '-height' ];
                              ?>
                            <?php if( !empty( $img ) ) : ?>
                                <a href="<?php echo $img['url']; ?>" class="progressive replace">
                                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="preview">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 text__wrapper">
                            <h2 class="title text-center">
                                <?php echo $one['position_name']; ?>
                            </h2>
                            <div class="sectiont-text">
                                <?php echo $one['position_text']; ?>
                            </div>
                            <div class="see__more">
                                <p class="title"><?php pll_e('Cмотрите больше фото и видео в галерее'); ?></p>
                                <a href="#gallery"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-down-min.webp" alt="More"></a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-12">
                            <h2 class="title text-center">
                                <?php echo $one['position_name']; ?>
                            </h2>
                            <div class="sectiont-text">
                                <?php echo $one['position_text']; ?>
                            </div>
                            <div class="see__more">
                                <p class="title"><?php pll_e('Cмотрите больше фото и видео в галерее'); ?></p>
                                <a href="#gallery"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-down-min.webp" alt="More"></a>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </section>
            <?php $form = $position['position_form']; ?>
            <?php if( $form && in_array('show', $form) ) : ?>
                <section class="form bgimg progressive replace">
                    <div class="container">
                      <div class="row">
                           <h3 class="text-center col-12 title"><?php pll_e('Закажите обратный звонок'); ?></h3>
                           <p class="text-center col-12"><?php pll_e('и мы перезвоним вам'); ?></p>   
                      </div>
                      <div class="row">
                        <form action="" method="post" class="col-12 submit">
                           <?php echo '<style>textarea[name="comment"],textarea[name="message"]{display:none}</style>'; ?>
                           <textarea name="comment"></textarea>
                           <textarea name="message"></textarea>
                           <div class="row">
                               <div class="d-none d-xl-flex col-xl-2"><img src="<?php echo get_template_directory_uri() ?>/img/radio-left-min.webp" alt="" class="radio"></div>
                               <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                   <div class="form-group">
                                        <label for="name" class="sr-only"><?php pll_e('Ваше имя'); ?></label>
                                        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="<?php pll_e('Ваше имя'); ?>">
                                    </div>
                               </div>
                               <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                   <div class="form-group">
                                        <label for="tel" class="sr-only"><?php pll_e('Телефон'); ?></label>
                                        <input type="tel" class="form-control" id="tel" aria-describedby="tel" placeholder="<?php pll_e('Телефон'); ?>">
                                    </div>
                               </div>
                               <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                   <div class="form-group">
                                        <label for="email" class="sr-only"><?php pll_e('Email'); ?></label>
                                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="<?php pll_e('Email'); ?>">
                                    </div>
                               </div>
                               <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                   <input type="submit" value="<?php pll_e('Отправить'); ?>">
                               </div>
                               <div class="d-none d-xl-flex col-xl-2"><img src="<?php echo get_template_directory_uri() ?>/img/radio-right-min.webp" alt="" class="radio"></div>
                           </div>
                        </form>
                      </div>
                    </div>
                </section>
            <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>
    <?php $gallery = get_field('gallery', $id); ?>
    <?php $hiden = $gallery['cycle']['type']; ?>
    <?php if(!empty($gallery) && $gallery && !$hiden ) : ?>
    <section id="gallery">
        <div class="container">
            <div class="row">
                <h2 class="title col-12 text-center"><?php pll_e('Галерея'); ?></h2>
            </div>
            <div class="row">
            <?php $cycle = $gallery['cycle']; ?>
            <?php if(!empty($cycle)) : ?>
                <?php 
                      $array_length = get_field('cases');
                      $len = count($array_length);
                      $i = 0;
                 ?>
                <?php 
                                if( get_query_var('page') ) {
                                  $page = get_query_var( 'page' );
                                } else {
                                  $page = 1;
                                }
                                $row              = 0;
                                $images_per_page  = 3;
                                $images           = $cycle;
                                $total            = count( $images );
                                $pages            = ceil( $total / $images_per_page );
                                $min              = ( ( $page * $images_per_page ) - $images_per_page ) + 1;
                                $max              = ( $min + $images_per_page ) - 1; 
                           ?>
                <div class="col-12 gallery__wrapper">
                   <div class="row galeryBody">
                    <?php foreach( $cycle  as $cycl ) : ?>
                         <?php $row++;
                               if($row < $min) { continue; }
                               if($row > $max) { break; } 
                         ?>
                        <?php $type = $cycl['type'] ; ?>
                        <?php if( ( !empty($type) ) && ( $type && in_array('image', $type) ) ) : ?>
                        <?php $class = 'align-items-center'; ?>
                        <?php else : ?>
                        <?php $class = 'align-items-start'; ?>
                        <?php endif; ?>
                        <div class="col-12 col-md-6 col-lg-4 image__one d-flex justify-content-center <?php echo $class; ?> galeryWrapper">
                            <?php if( ( !empty($type) ) && ( $type && in_array('image', $type) ) ) : ?>
                                <?php   
                                    $img = $cycl['foto'];
                                    $size = 'position';
                                    $thumb = $img['sizes'][ $size ];
                                    $width = $img['sizes'][ $size . '-width' ];
                                    $height = $img['sizes'][ $size . '-height' ];
                                ?>
                                <?php   
                                    $img_big = $cycl['foto'];
                                    $size = 'modal';
                                    $thumb = $img_big['sizes'][ $size ];
                                    $width = $img_big['sizes'][ $size . '-width' ];
                                    $height = $img_big['sizes'][ $size . '-height' ];
                                ?>
                                <?php if( !empty($img_big) ) : ?>
                                <a href="<?php echo $img_big['url']; ?> " class="fancybox">
                                    <?php if( !empty($img) ) : ?>
                                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
                                    <?php endif; ?>
                                </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if( ( !empty($type) ) && ( $type && in_array('youtube', $type) ) ) : ?>
                                <?php $link = $cycl['link']; ?>
                                <?php if( !empty($link) && !empty($cycl['bg']) ) : ?>
                                    <a href="<?php echo $link; ?>" class="youtube justify-content-center align-items-center d-flex">
                                        <img src="<?php echo $cycl['bg']; ?>" alt="bg">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/play.webp" alt="Play" class="icon">
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if( ( !empty($type) ) && ( $type && in_array('file', $type) ) ) : ?>
                                <video preload="auto" controls="controls" <?php if( !empty($cycl['bg'])) : ?> poster="<?php echo $cycl['bg']; ?>" <?php endif; ?> class="fullscreen-bg__video">
                                    <?php $file_one = $cycl['file_mp4']; ?>
                                    <?php if( !empty( $file_one ) ) : ?>
                                        <source src="<?php echo $file_one; ?>" type="video/mp4">
                                    <?php endif; ?>
                                    <?php $file_two = $cycl['file_webm']; ?>
                                    <?php if( !empty( $file_two ) ) : ?>
                                        <source src="<?php echo $file_two; ?>" type="video/webm">
                                    <?php endif; ?>
                                 </video>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <center class="col-12 d-flex justify-content-center pavNav">
                    <?php echo paginate_links( array(
                                'base' => home_url() . '/%_%',
                                'format' => '?page=%#%',
                                'current' => $page,
                                'total' => $pages,
                                'end_size' => 1,
                                'prev_next' => true,
                                'type' => 'list'
                              ) );
                              ?>
            </center>  
            <?php endif; ?>
            </div>
        </div>
        <script>
        jQuery(document).ready(function($) {
          var last = $('.users__position').last(); 
          if( last.hasClass('odd') ){
              $('#gallery').addClass('even bgimg progressive replace');
          }
        });
        </script>    
    </section>
    <?php endif; ?>
<?php get_footer(); ?>