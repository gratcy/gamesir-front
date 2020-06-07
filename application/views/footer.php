
        <footer class="footer">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="widget widget-about">
                                <h4 class="widget-title">About Us</h4>
                                <p>GameSir.Id lahir dari sebuah keinginan murni untuk menciptakan lebih banyak kesenangan untuk para gamers di seluruh indonesia!</p>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-5 -->

                        <div class="col-lg-3">
                            <div class="widget widget-newsletter">
                                <div class="social-icons">
                                    <a href="https://www.facebook.com/GameSirIndonesia/" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                                    <a href="https://www.instagram.com/gamesir.id/" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="https://twitter.com/gamesirid" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="https://www.youtube.com/channel/UCZhblvtYPVNoxR6APnRpbCA" class="social-icon" target="_blank"><img src="<?php echo base_url('assets/images/category-icons/youtube.png'); ?>" style="width: 50%"></a>
                                </div><!-- End .social-icons -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-4">
                            <div class="widget">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="widget-title">Contact Info</h4>
                                        <ul class="contact-info">
                                            <li>
                                                <span class="contact-info-label">Phone:</span><a href="tel:">(+62) 882 1101 0000</a>
                                            </li>
                                            <li>
                                                <span class="contact-info-label">Whatsapp:</span><a href="https://wa.me/6288211010000" target="_blank">(+62) 882 1101 0000</a>
                                            </li>
                                            <li>
                                                <span class="contact-info-label">Email:</span> <a href="mailto:ask@gamesir.id">ask@gamesir.id</a>
                                            </li>
                                        </ul>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .footer-top -->

            <div class="footer-bottom">
                <div class="container-fluid">
                    <p class="footer-copyright">GameSir.Id. &copy;  2017-<?php echo date('Y'); ?>.  All Rights Reserved</p>
                </div><!-- End .container-fluid -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li>
                        <a href="<?php echo base_url('collections/all'); ?>" class="sf-with-ul">Products</a>
                        <?php echo __get_categories_products(); ?>
                    </li>
                    <?php echo __get_menus(); ?>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="https://www.facebook.com/GameSirIndonesia/" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="https://www.instagram.com/gamesir.id/" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
                <a href="https://twitter.com/gamesirid" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="https://www.youtube.com/channel/UCZhblvtYPVNoxR6APnRpbCA" class="social-icon" target="_blank"><i class="icon-video"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins.min.js'); ?>"></script>

    <!-- Main JS File -->
    <script src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>

<script type="text/javascript">
    <?php if (!empty($serialno)) : ?>
        $.post( "<?php echo base_url('guarantee/get-warranty'); ?>", { serialno: "<?php echo $serialno; ?>" })
          .done(function( data ) {
            var res = ''
            if (data.status === 200) {
                res += '<h3>Produk Anda bergaransi resmi</h3>';
                res += '<table class="ratings-table">';
                res += '<tr>';
                res += '<td><b>Product</b></td><td>Date Order</td><td>End Warranty</td><td>Customer</td><td><b>Status</b></td>';
                res += '</tr>';
                res += '<tr>';
                res += '<td><b>'+data.data.pname+'</b></td>';
                res += '<td>'+data.data.tdate+'</td>';
                res += '<td>'+data.data.tguarantee_until+'</td>';
                res += '<td>'+data.data.cname+'</td>';
                res += '<td><b>This device in Warranty</b></td>';
                res += '</tr>';
                res += '</table>';
            }
            else {
                res += '<h3>Produk Anda tidak ditemukan</h3>';
            }
            $('form.form-warranty').append(res)
          });
    <?php endif; ?>
</script>
</body>
</html>