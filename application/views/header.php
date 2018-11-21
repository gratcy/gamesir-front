<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo (isset($title) ? $title . ' | ' : '')  . $this -> config -> config['site']['title']; ?></title>

    <meta name="keywords" content="<?php echo (isset($title) ? $title . ' | ' : '')  . $this -> config -> config['site']['title']; ?>" />
    <meta name="description" content="<?php echo (isset($desc) ? $desc : $this -> config -> config['site']['title']); ?>" />
    <meta name="author" content="SW-THEMES">
    <meta property="og:title" content="<?php echo (isset($title) ? $title . ' | ' : '')  . $this -> config -> config['site']['title']; ?>" />
    <meta property="og:url" content="<?php echo base_url($_SERVER['REQUEST_URI']);?>" />
    <meta property="og:description" content="<?php echo (isset($desc) ? $desc : $this -> config -> config['site']['title']); ?>">
    <meta property="og:image" content="<?php echo isset($ogImage) ? $ogImage : base_url('assets/images/logo-black-2.png'); ?>">
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="gameSir" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.min.css'); ?>">
</head>
<body class="homepage" data-spy="scroll" data-target="#category-list" data-offset="130">
    <div class="page-wrapper">
        <?php if ($_SERVER['REQUEST_URI'] == '/') : ?>
        <header class="header header-transparent">
        <?php else: ?>
        <header class="header">
        <?php endif; ?>
            <div class="header-middle sticky-header">
                <div class="container-fluid">
                    <div class="header-left">
                        <a href="<?php echo base_url(); ?>" class="logo">
                            <img src="<?php echo base_url('assets/images/logo-white-2.png'); ?>" class="logo-dark" alt="Porto Logo">
                            <img src="<?php echo base_url('assets/images/logo-white-2.png'); ?>" class="logo-light" alt="Porto Logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li>
                                    <a href="<?php echo base_url('collections/all'); ?>" class="sf-with-ul">Products</a>
                                    <?php echo __get_categories_products(); ?>
                                </li>
                                <?php echo __get_menus(); ?>
                            </ul>
                        </nav>

                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>

                        <div class="header-contact">
                            <i class="icon-phone"></i>
                            <a href="tel:#">(+62) 817 1900 21</a>
                        </div><!-- End .header-contact -->
                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
