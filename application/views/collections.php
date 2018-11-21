
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
                    <div class="banner banner-cat mb-3" style="background-image: url('<?php echo base_url('assets/images/slider/slide-1.jpg'); ?>');">
                        <div class="banner-content container-fluid">
                            <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                            <h1 class="banner-title">
                                INCREDIBLE deals
                            </h1>
                            <a href="#" class="btn btn-dark">Shop Now</a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->

                    <div class="container-fluid">
                        <nav class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-item toolbox-sort">
                                    <div class="select-custom">
                                        <select name="orderby" class="form-control">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="date">Sort by oldness</option>
                                            <option value="date-desc">Sort by newness</option>
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
                                <a href="#" class="layout-btn btn-grid active" title="Grid">
                                    <i class="icon-mode-grid"></i>
                                </a>
                                <a href="<?php echo base_url('collections-list/' . $oid);?>" class="layout-btn btn-list" title="List">
                                    <i class="icon-mode-list"></i>
                                </a>
                            </div><!-- End .layout-modes -->
                        </nav>

                        <div class="row row-sm">
                            <?php foreach($data as $k => $v) : ?>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="<?php echo base_url('product/' . $v -> gid);?>" class="product-image">
                                            <img src="<?php echo __get_upload_file($v -> gfile,2); ?>" alt="product">
                                        </a>
                                        <a href="<?php echo base_url('overview/1/' . $v -> gid);?>" class="btn-quickview">Quickview</a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="<?php echo base_url('product/' . $v -> gid);?>"><?php echo $v -> gtitle; ?></a>
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
                            </div><!-- End .col-md-4 -->
                            <?php endforeach;?>
                        </div><!-- End .row -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .main-content -->
            </div><!-- End .main-container -->

        </main><!-- End .main -->
