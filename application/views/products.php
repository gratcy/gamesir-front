
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('collections/' . $data[0] -> gcid); ?>"><?php echo $data[0] -> cname; ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="main-container">
                <div class="category-list" id="category-list">
                    <ul class="nav category-list-nav">
                        <li class="nav-item red">
                            <a href="<?php echo base_url(); ?>#cat-1" class="nav-link">
                                <span class="cat-list-icon"><img src="<?php echo base_url('assets/images/category-icons/gamepad.png'); ?>" width="32" alt="Category Name"></span>
                                <span class="cat-list-text">Products</span>
                            </a>
                        </li>
                        <li class="nav-item lime">
                            <a href="<?php echo base_url(); ?>#cat-2" class="nav-link">
                                <span class="cat-list-icon"><img src="<?php echo base_url('assets/images/category-icons/youtube.png'); ?>" width="32" alt="Category Name"></span>
                                <span class="cat-list-text">Youtube</span>
                            </a>
                        </li>
                        <li class="nav-item blue">
                            <a href="<?php echo base_url(); ?>#cat-3" class="nav-link">
                                <span class="cat-list-icon"><img src="<?php echo base_url('assets/images/category-icons/instagram.png'); ?>" width="25" alt="Category Name"></span>
                                <span class="cat-list-text">Instagram</span>
                            </a>
                        </li>
                        <li class="nav-item gray">
                            <a href="<?php echo base_url(); ?>#cat-4" class="nav-link">
                                <span class="cat-list-icon"><img src="<?php echo base_url('assets/images/category-icons/blog.png'); ?>" width="24" alt="Category Name"></span>
                                <span class="cat-list-text">Blog</span>
                            </a>
                        </li>
                    </ul>
                </div><!-- End .category-list -->


    
                <div class="main-content mt-3 mt-xl-5">
                    <div class="container-fluid">
                        <div class="product-single-container product-single-default">
                            <div class="row">
                                <div class="col-lg-7 product-single-gallery">
                                    <div class="sticky-slider">
                                        <div class="product-slider-container product-item">
                                            <div class="product-single-carousel owl-carousel owl-theme">
                                                <?php if ($data[0] -> gfile) : ?>
                                                <div class="product-item">
                                                    <img class="product-single-image" src="<?php echo __get_upload_file($data[0] -> gfile,2); ?>" data-zoom-image="<?php echo __get_upload_file($data[0] -> gfile,2); ?>"/>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($data[0] -> gfile2) : ?>
                                                <div class="product-item">
                                                    <img class="product-single-image" src="<?php echo __get_upload_file($data[0] -> gfile2,2); ?>" data-zoom-image="<?php echo __get_upload_file($data[0] -> gfile2,2); ?>"/>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($data[0] -> gfile3) : ?>
                                                <div class="product-item">
                                                    <img class="product-single-image" src="<?php echo __get_upload_file($data[0] -> gfile3,2); ?>" data-zoom-image="<?php echo __get_upload_file($data[0] -> gfile3,2); ?>"/>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($data[0] -> gfile4) : ?>
                                                <div class="product-item">
                                                    <img class="product-single-image" src="<?php echo __get_upload_file($data[0] -> gfile4,2); ?>" data-zoom-image="<?php echo __get_upload_file($data[0] -> gfile4,2); ?>"/>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <!-- End .product-single-carousel -->
                                            <span class="prod-full-screen">
                                                <i class="icon-plus"></i>
                                            </span>
                                        </div>

                                        <div class="prod-thumbnail row owl-dots transparent-dots" id='carousel-custom-dots'>
                                            <?php if ($data[0] -> gfile) : ?>
                                                <div class="owl-dot">
                                                    <img src="<?php echo __get_upload_file($data[0] -> gfile,2); ?>"/>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($data[0] -> gfile2) : ?>
                                                <div class="owl-dot">
                                                    <img src="<?php echo __get_upload_file($data[0] -> gfile2,2); ?>"/>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($data[0] -> gfile3) : ?>
                                                <div class="owl-dot">
                                                    <img src="<?php echo __get_upload_file($data[0] -> gfile3,2); ?>"/>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($data[0] -> gfile4) : ?>
                                                <div class="owl-dot">
                                                    <img src="<?php echo __get_upload_file($data[0] -> gfile4,2); ?>"/>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div><!-- End .col-md-6 -->

                                <div class="col-lg-5">
                                    <div class="product-single-details">
                                        <h1 class="product-title"><?php echo $title; ?></h1>

                                        <div class="price-box">
                                            <span class="old-price">IDR <?php echo __price_format($data[0] -> gprice + ($data[0] -> gprice * 0.1)); ?></span>
                                            <span class="product-price">IDR <?php echo __price_format($data[0] -> gprice); ?></span>
                                        </div><!-- End .price-box -->
                                        <?php if (!empty($data[0] -> gfeatured)) : ?>
                                        <div class="product-desc">
                                            <p><?php echo $data[0] -> gfeatured; ?></p>
                                        </div><!-- End .product-desc -->
                                        <?php endif;?>
                                        <div class="product-single-share mb-4">
                                            <label>Share:</label>
                                            <!-- www.addthis.com share plugin-->
                                            <div class="addthis_inline_share_toolbox"></div>
                                        </div><!-- End .product single-share -->
                                    </div><!-- End .product-single-details -->

                                    <div class="product-single-tabs">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                                <div class="product-desc-content">
                                                    <?php echo $data[0] -> gcontent; ?>
                                                </div><!-- End .product-desc-content -->
                                            </div><!-- End .tab-pane -->
                                        </div><!-- End .tab-content -->
                                    </div><!-- End .product-single-tabs -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-single-container -->
                    </div><!-- End .container-fluid -->

                    <div class="featured-section">
                        <div class="container-fluid">
                            <h2 class="carousel-title">Featured Products</h2>

                            <div class="featured-products owl-carousel owl-theme owl-dots-top">
                            <?php foreach($related as $k => $v) : ?>
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="<?php echo base_url('product/' . $v -> gid);?>" class="product-image">
                                            <img src="<?php echo __get_upload_file($v -> gfile,2); ?>" alt="<?php echo $v -> gtitle; ?>">
                                        </a>
                                        <a href="<?php echo base_url('overview/1/' . $v -> gid);?>" class="btn-quickview">Quickview</a>
                                        <?php if ($v -> gnew == 1) : ?>
                                        <span class="product-label label-new">New</span>
                                        <?php endif; ?>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="<?php echo base_url('product/' . $v -> gid);?>"> <?php echo $v -> gtitle; ?></a>
                                        </h2>
                                        <div class="price-box">
                                            <span class="product-price">IDR <?php echo __price_format($v -> gprice); ?></span>
                                        </div><!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="<?php echo base_url('product/' . $v -> gid);?>" class="paction add-cart" title="Detail of <?php echo $v -> gtitle; ?>">
                                                <span>Detail of <?php echo $v -> gtitle; ?></span>
                                            </a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .product -->
                            <?php endforeach; ?>
                            </div><!-- End .featured-proucts -->
                        </div><!-- End .container-fluid -->
                    </div><!-- End .featured-section -->
                </div><!-- End .main-content -->
            </div><!-- End .main-container -->
        </main><!-- End .main -->

    <script src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b927288a03dbde6"></script>
