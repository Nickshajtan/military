        <footer id="contact" class="bgimg progressive replace">
            <div class="container">
               <div class="row">
                <div class="col-12 col-md-6">
                   <?php $footer = get_field('footer_left', $id); ?>
                   <?php $circle = $footer['email_cycle']; ?>
                   <?php if( $footer['text_time'] && $circle ) : ?>
                    <div class="row">
                        <p class="title col-12 text-center"><?php pll_e('Контакты'); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php   
                                    $img = $footer['icon_time'];
                                    $size = 'sale-full';
                                    $thumb = $img['sizes'][ $size ];
                                    $width = $img['sizes'][ $size . '-width' ];
                                    $height = $img['sizes'][ $size . '-height' ];
                              ?>
                    <div class="row">
                        <div class="contact__one col-12 d-flex flex-row align-items-center">
                            <?php if( !empty($img) ) : ?>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
                            <?php endif; ?>
                            <p><?php echo $footer['text_time']; ?></p>
                        </div>
                    </div>
                    <?php $cycle = $footer['email_cycle']; ?>
                    <?php if( !empty( $cycle ) ) : ?>
                        <?php foreach( $cycle  as $cycl ) : ?>
                            <?php   
                                    $img = $cycl['icon_email'];
                                    $size = 'sale-full';
                                    $thumb = $img['sizes'][ $size ];
                                    $width = $img['sizes'][ $size . '-width' ];
                                    $height = $img['sizes'][ $size . '-height' ];
                              ?>
                               <div class="row">
                                    <div class="contact__one col-12 d-flex flex-row align-items-center">
                                        <?php if( !empty($img) ) : ?>
                                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
                                        <?php endif; ?>
                                        <p>E-mail: <a href="mailto:<?php echo $cycl['email']; ?>"><?php echo $cycl['email']; ?></a></p>
                                    </div>
                               </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php $cycle = $footer['phone_cycle']; ?>
                    <?php if( !empty( $cycle ) ) : ?>
                        <?php foreach( $cycle  as $cycl ) : ?>
                            <?php   
                                    $img = $cycl['icon_phone'];
                                    $size = 'sale-full';
                                    $thumb = $img['sizes'][ $size ];
                                    $width = $img['sizes'][ $size . '-width' ];
                                    $height = $img['sizes'][ $size . '-height' ];
                              ?>
                               <div class="row">
                                    <div class="contact__one col-12 d-flex flex-row align-items-center">
                                        <?php if( !empty($img) ) : ?>
                                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
                                        <?php endif; ?>
                                        <p><a href="tel:<?php echo $cycl['phone_link']; ?>"><?php echo $cycl['phone']; ?></a></p>
                                    </div>
                               </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                      <div class="row contact">
                          <p class="title col-12 text-center"><?php pll_e('Связь с нами'); ?></p>
                          <form action="" method="post" class="col-12 submit">
                               <?php echo '<style>textarea[name="comment"],textarea[name="message"]{display:none}</style>'; ?>
                               <textarea name="comment"></textarea>
                               <textarea name="message"></textarea>
                               <div class="row">
                                   <div class="col-12 col-md-6 col-lg-4">
                                       <div class="form-group">
                                            <label for="name" class="sr-only"><?php pll_e('Ваше имя'); ?></label>
                                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="<?php pll_e('Ваше имя'); ?>">
                                        </div>
                                   </div>
                                   <div class="col-12 col-md-6 col-lg-4">
                                       <div class="form-group">
                                            <label for="tel" class="sr-only"><?php pll_e('Телефон'); ?></label>
                                            <input type="tel" class="form-control" id="tel" aria-describedby="tel" placeholder="<?php pll_e('Телефон'); ?>">
                                        </div>
                                   </div>
                                   <div class="col-12 col-md-6 col-lg-4">
                                       <div class="form-group">
                                            <label for="email" class="sr-only"><?php pll_e('Email'); ?></label>
                                            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="<?php pll_e('Email'); ?>">
                                        </div>
                                   </div>
                                   <div class="col-12">
                                         <label for="question" class="sr-only"><?php pll_e('Ваше сообщение...'); ?></label>
                                         <textarea name="question" id="question" cols="30" rows="6" placeholder="<?php pll_e('Ваше сообщение...'); ?>" class="form-control"></textarea>   
                                   </div>
                                   <div class="col-12 col-md-6 col-lg-12">
                                       <input type="submit" value="<?php pll_e('Отправить'); ?>">
                                   </div>
                               </div>
                          </form>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <?php $footer_two = get_field('footer_right', $id); ?>
                        <?php if( $footer_two['map'] && $footer_two['address'] ) : ?>
                            <p class="title col-12 text-center"><?php pll_e('Как добраться'); ?></p>
                        <?php endif; ?>
                        <?php   
                                    $img = $footer_two['map'];
                                    $size = 'map';
                                    $thumb = $img['sizes'][ $size ];
                                    $width = $img['sizes'][ $size . '-width' ];
                                    $height = $img['sizes'][ $size . '-height' ];
                        ?>
                        <?php   
                                    $img_small = $footer_two['map'];
                                    $size = 'lazy-load';
                                    $thumb = $img['sizes'][ $size ];
                                    $width = $img['sizes'][ $size . '-width' ];
                                    $height = $img['sizes'][ $size . '-height' ];
                        ?>
                        <?php if( !empty($img) ) : ?>
                        <div class="col-12">
                             <?php $link = $footer_two['map_link']; ?> 
                             <a href="<?php echo (!empty($link)) ? $link : '#'; ?>" target="_blank" class="map progressive replace" data-href="<?php echo $img['url']; ?>">
                                 <img src="<?php echo $img_small['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="preview">
                             </a>
                        </div>
                        <?php endif; ?>
                        <p class="col-12 address"><?php echo $footer_two['address']; ?></p>
                    </div>
                </div>
              </div>
              <div class="row">
                  <center class="col-12 copyright">Created by HCC &copy;copyright <?php $date = date('Y'); if( $date > 2019 ) { echo '2019 - '; } ?><?php echo date('Y');?></center>
              </div>
            </div>    
        </footer>
        <div class="modal text-center justify-content-center align-items-center">
            <div class="value text-center d-flex justify-content-center align-items-center"></div>
        </div>
        <div id="youtube-popup" class="justify-content-center align-items-center"></div>
        <div id="video-popup" class="justify-content-center align-items-center"></div>
        <div id="loader" style="display:none;"></div>
        <div id="toTop"><a href="#nav"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-down-min.webp" alt=""></a></div>
        <div class="overlay"></div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>