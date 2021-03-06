        <main class="main">
            <div class="home-slider-container">
                <div class="home-slider owl-carousel owl-theme">
                    <?php foreach ($slideshow as $key => $v) : ?>
                    <div class="home-slide">
                        <div class="slide-bg owl-lazy" data-src="<?php echo __get_upload_file($v -> sfile, 3); ?>"></div><!-- End .slide-bg -->
                        
                        <div class="home-slide-content container">
                            <div class="slide-content-wrapper">
                                <p><?php echo $v -> sdesc; ?></p>
                                <h3><?php echo $v -> stitle; ?></h3>
                                <a href="<?php echo $v -> surl; ?>" class="btn btn-outline-primary">Go!</a>
                            </div><!-- End .slide-content-wrapper -->
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->
                    <?php endforeach; ?>
                </div><!-- End .home-slider -->
            </div><!-- End .home-slider-container -->

            <div class="main-container">
                <div class="category-list" id="category-list">
                    <ul class="nav category-list-nav">
                        <li class="nav-item red">
                            <a href="#cat-1" class="nav-link">
                                <span class="cat-list-icon"><img src="<?php echo base_url('assets/images/category-icons/gamepad.png'); ?>" width="32" alt="Category Name"></span>
                                <span class="cat-list-text">Products</span>
                            </a>
                        </li>
                        <li class="nav-item lime">
                            <a href="#cat-2" class="nav-link">
                                <span class="cat-list-icon"><img src="<?php echo base_url('assets/images/category-icons/youtube.png'); ?>" width="32" alt="Category Name"></span>
                                <span class="cat-list-text">Youtube</span>
                            </a>
                        </li>
                        <li class="nav-item blue">
                            <a href="#cat-3" class="nav-link">
                                <span class="cat-list-icon"><img src="<?php echo base_url('assets/images/category-icons/instagram.png'); ?>" width="25" alt="Category Name"></span>
                                <span class="cat-list-text">Instagram</span>
                            </a>
                        </li>
                        <li class="nav-item gray">
                            <a href="#cat-4" class="nav-link">
                                <span class="cat-list-icon"><img src="<?php echo base_url('assets/images/category-icons/blog.png'); ?>" width="24" alt="Category Name"></span>
                                <span class="cat-list-text">Blog</span>
                            </a>
                        </li>
                    </ul>
                </div><!-- End .category-list -->

                <div class="main-content">
                    <div class="container-fluid">
                        <div id="cat-1" class="category-section">
                            <div class="category-title">
                                <div class="cat-title">Our Products</div>
                                <a href="<?php echo base_url('collections/all');?>" class="btn btn-outline-primary btn-dark">See more</a>
                            </div><!-- End .category-title -->
                            <div class="products-carousel owl-carousel owl-theme">
                            <?php foreach($products as $k => $v) : ?>
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="<?php echo base_url('product/' . $v -> gslug);?>" class="product-image">
                                            <img src="<?php echo __get_upload_file($v -> gfile,2); ?>" alt="<?php echo $v -> gtitle; ?>">
                                        </a>
                                        <a href="<?php echo base_url('overview/1/' . $v -> gid);?>" class="btn-quickview">Quickview</a>
                                        <?php if ($v -> gnew == 1) : ?>
                                        <span class="product-label label-new">New</span>
                                        <?php endif; ?>
                                        <?php if ($v -> gisready == 0) : ?>
                                        <span class="product-label label-sale">Out of stock!</span>
                                        <?php endif; ?>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="<?php echo base_url('product/' . $v -> gslug);?>"> <?php echo $v -> gtitle; ?></a>
                                        </h2>
                                        <div class="price-box">
                                            <span class="product-price">IDR <?php echo __price_format($v -> gprice); ?></span>
                                        </div><!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="<?php echo base_url('product/' . $v -> gslug);?>" class="paction add-cart" title="Detail of <?php echo $v -> gtitle; ?>">
                                                <span>Detail of <?php echo $v -> gtitle; ?></span>
                                            </a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .product -->
                            <?php endforeach; ?>
                            </div><!-- End .products-carousel -->
                            <div class="banners-group">
                                <div class="row row-sm">
                                    <div class="col-sm-6">
                                        <div class="banner banner-image">
                                            <a href="https://gamesir.id/product/18">
                                                <img src="https://cdn.gamesir.id/ads/Gamesir_Banner_800x200__GameSir_F2.jpg" alt="GameSir F2">
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="banner banner-image">
                                            <a href="https://gamesir.id/product/16">
                                                <img src="https://cdn.gamesir.id/ads/Gamesir_Banner_800x200__GameSir_G5.jpg" alt="GameSir G5">
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .banners-group -->
                        </div><!-- End .category-section -->

                        <div id="cat-2" class="category-section">
                            <div class="category-title">
                                <div class="cat-title">Youtube - Gamesir Indonesia</div>
                                <a href="https://www.youtube.com/channel/UCZhblvtYPVNoxR6APnRpbCA" target="_blank" class="btn btn-outline-primary btn-dark">See more</a>
                            </div><!-- End .category-title -->

                            <div class="products-carousel owl-carousel owl-theme">
                                <?php
                                $YoutubeFile = FCPATH . 'application/tmp/youtube.json';
                                if (file_exists($YoutubeFile)) :
                                    $dataYoutube = json_decode(file_get_contents($YoutubeFile), true);
                                    $finalDataYoutube = [];
                                    foreach ($dataYoutube['entry'] as $key => $value) :
                                        $value['id'] = str_replace('yt:video:', '', $value['id']);
                                        if (!empty($value['id'])) $finalDataYoutube[] = $value;
                                    endforeach;
                                    $finalDataYoutube = array_slice($finalDataYoutube, 0, 5);
                                    foreach ($finalDataYoutube as $key => $value) :
                                ?>
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="#" class="product-image">
                                            <img src="https://img.youtube.com/vi/<?php echo $value['id']; ?>/mqdefault.jpg" alt="<?php echo limit_text($value['title'],5); ?>">
                                        </a>
                                        <a href="<?php echo base_url('overview/2/' . $value['id']);?>" class="btn-quickview">Quickview</a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="#"><?php echo $value['title']; ?></a>
                                        </h2>
                                        <div class="price-box">
                                            <span class="product-price"><?php echo $value['title']; ?></span>
                                        </div><!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="<?php echo base_url('overview/2/' . $value['id']);?>" class="btn-quickview" title="Quickview">
                                                <span>Quickview</span>
                                            </a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .product -->
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div><!-- End .products-carousel -->
                            
                            <div class="banners-group">
                                <div class="row row-sm">
                                    <div class="col-sm-6">
                                        <div class="banner banner-image">
                                            <a href="https://gamesir.id/product/12">
                                                <img src="https://cdn.gamesir.id/ads/Gamesir_Banner_800x200__GameSir_T4_Banner.jpg" alt="GameSir T4">
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="banner banner-image">
                                            <a href="https://gamesir.id/product/9">
                                                <img src="https://cdn.gamesir.id/ads/Gamesir_Banner_800x200__GameSir_VX_Banner.jpg" alt="GameSir VX">
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .banners-group -->
                        </div><!-- End .category-section -->

                        <div id="cat-3" class="category-section">
                            <div class="category-title">
                                <div class="cat-title">Instagram @gamesir.id</div>
                                <a href="https://www.instagram.com/gamesir.id/" target="_blank" class="btn btn-outline-primary btn-dark">See more</a>
                            </div><!-- End .category-title -->

                            <div class="products-carousel owl-carousel owl-theme">
                                <?php
                                $instagramFile = FCPATH . 'application/tmp/instagram.json';
                                if (file_exists($instagramFile)) :
                                    $dataInstagram = json_decode(file_get_contents($instagramFile), true);
                                    if (!empty($dataInstagram['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'])) :
                                    $dataInstagram = array_slice($dataInstagram['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'], 0, 5);
                                    foreach ($dataInstagram as $key => $value) :
                                ?>
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="#" class="product-image">
                                            <img src="<?php echo $value['node']['thumbnail_resources'][2]['src']; ?>" alt="<?php echo limit_text($value['node']['edge_media_to_caption']['edges'][0]['node']['text'],5); ?>">
                                        </a>
                                        <a href="<?php echo base_url('overview/3/' . $key);?>" class="btn-quickview">Quickview</a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="#"><?php echo limit_text($value['node']['edge_media_to_caption']['edges'][0]['node']['text'],5); ?></a>
                                        </h2>
                                        <div class="product-action">
                                            <a href="<?php echo base_url('overview/3/' . $key);?>" class="btn-quickview" title="Quickview">
                                                <span>Quickview</span>
                                            </a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .product -->
                                <?php
                                    endforeach;
                                endif;
                                endif;
                                ?>
                            </div><!-- End .products-carousel -->
                            
                            <div class="banners-group">
                                <div class="row row-sm">
                                    <div class="col-sm-6">
                                        <div class="banner banner-image">
                                            <a href="https://gamesir.id/product/18">
                                                <img src="https://cdn.gamesir.id/ads/Gamesir_Banner_800x200__GameSir_F2.jpg" alt="GameSir F2">
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="banner banner-image">
                                            <a href="https://gamesir.id/product/16">
                                                <img src="https://cdn.gamesir.id/ads/Gamesir_Banner_800x200__GameSir_G5.jpg" alt="GameSir G5">
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .banners-group -->
                        </div><!-- End .category-section -->

                        <div id="cat-4" class="category-section">
                            <div class="category-title">
                                <div class="cat-title">Blog</div>
                                <a href="#" class="btn btn-outline-primary">See more</a>
                            </div><!-- End .category-title -->
                            <div class="products-carousel owl-carousel owl-theme">
                                <?php
                                $blogFile = FCPATH . 'application/tmp/blog-gamesir.json';
                                if (file_exists($blogFile)) :
                                    $dataBlogFile = json_decode(file_get_contents($blogFile), true);
                                    if (!empty($dataBlogFile['channel']['item'][0])) :
                                    $dataBlogFile = array_slice($dataBlogFile['channel']['item'], 0, 5);
                                    foreach ($dataBlogFile as $key => $value) :
                                ?>
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="<?php echo $value['link'];?>" class="product-image" title="<?php echo $value['title']; ?>">
                                            <img src="<?php echo __grep_image_url($value['contentEncoded']); ?>" alt="<?php echo $value['title']; ?>">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="<?php echo $value['link'];?>" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a>
                                        </h2>
                                        <p class="product-action">
                                            <?php echo __limit_word(trim(str_replace('&#8230; Continue Reading &#8594;','',strip_tags($value['description']))), 10); ?>
                                        </p>
                                        <div class="product-action">
                                            <a href="<?php echo $value['link'];?>" class="paction add-cart" title="Go to blog!">
                                                <span>Read more</span>
                                            </a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .product -->
                                <?php
                                    endforeach;
                                endif;
                                endif;
                                ?>
                            </div><!-- End .products-carousel -->
                            
                            <div class="banners-group">
                                <div class="row row-sm">
                                    <div class="col-sm-6">
                                        <div class="banner banner-image">
                                            <a href="https://gamesir.id/product/12">
                                                <img src="https://cdn.gamesir.id/ads/Gamesir_Banner_800x200__GameSir_T4_Banner.jpg" alt="GameSir T4">
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="banner banner-image">
                                            <a href="https://gamesir.id/product/9">
                                                <img src="https://cdn.gamesir.id/ads/Gamesir_Banner_800x200__GameSir_VX_Banner.jpg" alt="GameSir VX">
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .banners-group -->
                        </div><!-- End .category-section -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .main-content -->
            </div><!-- End .main-container -->
        </main><!-- End .main -->
