<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="card-deck">
                    <?php
                    foreach ($data->result_array() as $a) :
                        $id = $a['barang_id'];
                        $gbr = $a['barang_gambar'];
                        $nm = $a['barang_nama'];
                        $desc = html_entity_decode($a['barang_deskripsi']);
                        $satuan = $a['barang_satuan'];
                        $harpok = $a['barang_harpok'];
                        $harjul = $a['barang_harjul'];
                        $harjul_grosir = $a['barang_harjul_grosir'];
                        $stok = $a['barang_stok'];
                        $min_stok = $a['barang_min_stok'];
                        $kat_id = $a['barang_kategori_id'];
                        $kat_nama = $a['kategori_nama'];
                    ?>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="<?php echo base_url() . 'assets/upload/images/barang/' . $gbr; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $nm; ?></h5>
                                <p class="card-text">Barang ini tersisa : <span class="badge badge-primary"><?php echo $stok; ?> Item</span></p>
                                <p class="card-text"><small class="text-muted"><?php echo 'Rp ' . number_format($harjul); ?></small></p>
                                <button type="button" data-toggle="modal" data-target="#modalDetail<?php echo $id ?>" class="btn btn-block btn-outline-info animate-up-2 ">
                                    Detail <span class="icon icon-xs"></i></span>
                                </button>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
</div>

<!-- Modal CART -->
<div class="modal fade" id="ModalCart" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h6 class="modal-title" id="modal-title-default">Shopping Cart</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="detail_cart">

                    </tbody>

                </table>
            </div>
            <div class="modal-footer">
                <a href="pemesanan_pelanggan" class="btn btn-secondary">Pesan sekarang</a>
            </div>
        </div>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Argon JS -->
<script src="<?php echo base_url() ?>/assets/js/argon.js?v=1.2.0"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.add_cart').click(function() {
            var barang_id = $(this).data("barangid");
            var barang_nama = $(this).data("barangnama");
            var barang_harjul = $(this).data("barangharga");
            var quantity = $('#' + barang_id).val();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/cart/add_to_cart",
                method: "POST",
                data: {
                    barang_id: barang_id,
                    barang_nama: barang_nama,
                    barang_harjul: barang_harjul,
                    quantity: quantity
                },
                success: function(data) {
                    $('#detail_cart').html(data);

                }
            });
            $.notify({
                message: 'Berhasil menambahkan barang',
                type: 'success'
            });
        });

        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url(); ?>index.php/cart/load_cart");

        //Hapus Item Cart
        $(document).on('click', '.hapus_cart', function() {
            var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url: "<?php echo base_url(); ?>cart/hapus_cart",
                method: "POST",
                data: {
                    row_id: row_id
                },
                success: function(data) {
                    $('#detail_cart').html(data);
                }
            });
            $.notify({
                message: 'Berhasil menghapus barang',
                type: 'info'
            });
        });
    });
</script>

</body>

</html>