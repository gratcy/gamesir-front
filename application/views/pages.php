
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </div><!-- End .container-fluid -->
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
                        <div class="heading mb-4">
                          <br />
                            <h2 class="title"><?php echo $title; ?></h2>
                          <br />
                            <?php echo $data[0] -> pcontent;?>
                            <?php if ($data[0] -> pid == getenv('GUARANTEE_PAGE_ID')) { ?>
                                <form action="<?php echo base_url('guarantee/check'); ?>" method="post" class="form-warranty">
                                    <table class="ratings-table">
                                        <tr>
                                            <td>Serial No.</td><td><input style="width: 90%" type="text" class="form-input" name="serialno" placeholder="Input Serial Number" value="<?php echo $serialno; ?>"></td><td><input class="form-input" type="submit" name="submit" value="Go!" style="width: 50%"></td>
                                        </tr>
                                    </table>
                                </form>
                            <?php } ?>
                        </div><!-- End .heading -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .main-content -->
            </div><!-- End .main-container -->
        </main><!-- End .main -->