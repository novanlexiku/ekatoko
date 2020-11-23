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
    <div class="container mt--8">
        <div class="row">
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
                <div class="col-4">
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
                </div>
            <?php endforeach; ?>

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

<!-- ============ MODAL DETAIL =============== -->
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
    <div id="modalDetail<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Detail Barang</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <div class="modal-body">
                    <div class="card shadow-soft mb-5 mb-lg-6 px-2">
                        <div class="card-header border-light p-4">
                            <!-- Price -->
                            <div class="d-flex mb-3">
                                <span class="h5 mb-0">RP</span>
                                <span class="price display-2 mb-0" data-annual="<?php echo number_format($harjul); ?>" data-monthly="<?php echo number_format($harjul); ?>"><?php echo number_format($harjul); ?></span>
                            </div>
                            <h4 class="mb-3 text-black"><?php echo $nm; ?></h4>
                        </div>
                        <div class="card-body pt-5">
                            <p class="font-weight-normal mb-0"><?php echo $desc; ?></p>
                            <a data-fancybox="gallery" href="<?php echo base_url() . 'assets/upload/images/barang/' . $gbr; ?>"><img src="<?php echo base_url() . 'assets/upload/images/barang/' . $gbr; ?>"></a>
                        </div>
                        <div class="card-footer px-4 pb-4">
                            <input type="number" name="quantity" id="<?php echo $id; ?>" value="1" class="quantity form-control">
                            <!-- Button -->
                            <button class="add_cart btn btn-block btn-outline-success animate-up-2 mt-2" data-barangid="<?php echo $id; ?>" data-barangnama="<?php echo $nm; ?>" data-barangharga="<?php echo $harjul; ?>">Add To Cart <span class="icon icon-xs ml-3"><i class="fas fa-arrow-right"></i></span></button>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php
endforeach;
?>
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