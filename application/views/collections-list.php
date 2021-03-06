
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container-fluid ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Collections</a></li>
                        <li class="breadcrumb-item active"><a href="#"><?php echo $name; ?></a></li>
                    </ol>
                </div><!-- End .container-fluid  -->
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

                <div class="main-content">
                    <div class="container-fluid">
                        <div class="banners-group mb-1 mt-3" style="display: none">
                            <div class="row row-sm">
                                <div class="col-md-6">
                                    <div class="banner banner-image">
                                        <a href="#">
                                            <img src="<?php echo base_url('assets/images/banners/banner-1.jpg'); ?>" alt="banner">
                                        </a>
                                    </div><!-- End .banner -->
                                </div><!-- End .col-sm-6 -->

                                <div class="col-md-6">
                                    <div class="banner banner-image">
                                        <a href="#">
                                            <img src="<?php echo base_url('assets/images/banners/banner-2.jpg'); ?>" alt="banner">
                                        </a>
                                    </div><!-- End .banner -->
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .banners-group -->
<br />
                        <nav class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-item toolbox-sort">
                                    <div class="select-custom">
                                        <select name="orderby" class="form-control">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div><!-- End .select-custom -->

                                    <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending Direction</span></a>
                                </div><!-- End .toolbox-item -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-item toolbox-show">
                            </div><!-- End .toolbox-item -->

                            <div class="layout-modes">
                                <a href="<?php echo base_url('collections/' . $oid);?>" class="layout-btn btn-grid" title="Grid">
                                    <i class="icon-mode-grid"></i>
                                </a>
                                <a href="#" class="layout-btn btn-list active" title="List">
                                    <i class="icon-mode-list"></i>
                                </a>
                            </div><!-- End .layout-modes -->
                        </nav>

                        <?php foreach($data as $k => $v) : ?>
                        <div class="product product-list">
                            <figure class="product-image-container">
                                <a href="<?php echo base_url('product/' . $v -> gslug);?>" class="product-image">
                                    <img src="<?php echo __get_upload_file($v -> gfile,2); ?>" alt="product">
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
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <h2 class="product-title">
                                    <a href="<?php echo base_url('product/' . $v -> gslug);?>">Baseball Cap</a>
                                </h2>
                                <div class="product-desc">
                                    <p><?php echo $v -> gfeatured; ?> <a href="<?php echo base_url('product/' . $v -> gslug);?>">Learn More</a></p>
                                </div><!-- End .product-desc -->
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
                    </div><!-- End .container-fluid -->
                </div><!-- End .main-content -->
            </div><!-- End .main-container -->

        </main><!-- End .main -->
