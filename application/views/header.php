<?php
$title = (!empty($title) ? $title . ' | ' : '')  . $this -> config -> config['site']['title'];
$desc = (!empty($desc) ? $desc : $this -> config -> config['site']['description']);
$dataSD = ['title' => $title, 'description' => $desc];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title; ?></title>
    <meta name="google-site-verification" content="88SKBFipPh9AwOO07b-V7C7EqR5iIzDXas-fn230M-U" />
    <meta name="keywords" content="<?php echo (!empty($title) ? $title . ' | ' : '')  . $this -> config -> config['site']['title']; ?>" />
    <meta name="description" content="<?php echo $desc; ?>" />
    <link rel="canonical" href="https://gamesir.id<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <meta name="author" content="GameSir">
    <meta property="og:title" content="<?php echo (!empty($title) ? $title . ' | ' : '')  . $this -> config -> config['site']['title']; ?>" />
    <meta property="og:url" content="<?php echo base_url($_SERVER['REQUEST_URI']);?>" />
    <meta property="og:description" content="<?php echo (!empty($desc) ? $desc : $this -> config -> config['site']['title']); ?>">
    <meta property="og:image" itemprop="image" content="<?php echo !empty($ogImage) ? $ogImage : base_url('assets/images/logo-red-2.png'); ?>">
    <meta property="og:type" content="article" />
    <meta property="og:image:alt" content="<?php echo (!empty($title) ? $title : $this -> config -> config['site']['title']); ?>" />
    <meta property="og:site_name" content="Official Store GameSir Indonesia" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@gamesirid">
    <meta name="twitter:title" content="<?php echo (!empty($title) ? $title . ' | ' : '')  . $this -> config -> config['site']['title']; ?>">
    <meta name="twitter:description" content="<?php echo $desc; ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico?4'); ?>">
    <script type="application/ld+json">
        <?php echo __generate_schema($dataSD, 1); ?>
    </script>
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.min.css'); ?>?6">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-165275225-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-165275225-1');
</script>

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
                            <img src="<?php echo base_url('assets/images/logo-white-3.png'); ?>" class="logo-dark" alt="Porto Logo">
                            <img src="<?php echo base_url('assets/images/logo-white-3.png'); ?>" class="logo-light" alt="Porto Logo">
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
                            <i class="icon-whatsapp"></i>
                            <a href="https://wa.me/6288211010000?text=Halo, aku mau tanya tentang gamesir." target="_blank">(+62) 882 1101 0000</a>
                        </div><!-- End .header-contact -->
                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
