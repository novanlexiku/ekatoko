<!-- Header -->
<?php
$a = $detail->row_array();
$id = $a['invoice_id'];
$nm = $a['invoice_user_nama'];
$tgl = $a['invoice_tanggal'];
$tuj = $a['invoice_tujuan'];
$ttl = $a['invoice_total'];
$kon = $a['invoice_konfirmasi'];
$sts = $a['invoice_status'];
$inm = $a['bi_barang_nama'];
$inh = $a['bi_barang_harjul'];
$inq = $a['bi_barang_qty'];

?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboards</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Detail</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $id; ?></li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <!-- Content -->
        <div class="col-8">
            <div class="card shadow-soft mb-5 mb-lg-6 px-2">
                <div class="card-header border-light p-4">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/pemesanan/konfirmasi' ?>" enctype="multipart/form-data">
                        <h5>Nama : <?php echo $nm; ?></h5>
                        <h5>No.Invoice : <?php echo $id; ?></h5>
                        <h5>Tanggal: <?php echo $tgl; ?></h5>
                        <h5>Tujuan Pengiriman : <?php echo $tuj; ?></h5>
                        <h5>Status : <?php if ($sts == 'pengiriman') { ?>
                                <span class="badge badge-success"><?php echo $sts; ?></span></h5>
                    <?php } else { ?>
                        <span class="badge badge-warning"><?php echo $sts; ?></span></h5>
                    <?php } ?>
                    <?php if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') {
                        if ($kon == '') { ?>
                            <h5>Pembayaran : <span class="badge badge-danger">Belum melakukan pembayaran</span></h5>
                        <?php } else { ?>
                            <a data-fancybox="gallery" href="<?php echo base_url() . 'assets/upload/images/konfirmasi/' . $kon; ?>"><img src="<?php echo base_url() . 'assets/upload/images/konfirmasi/' . $kon; ?>"></a>
                        <?php } ?>
                        <?php } elseif ($this->session->userdata('user_level') == '3') {
                        if ($kon == '') { ?>
                            <h5>Pembayaran : <span class="badge badge-danger">Belum melakukan pembayaran</span></h5>
                            <input name="invoice_id" type="hidden" value="<?php echo $id; ?>">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Konfirmasi</label>
                                <div class="form-group">
                                    <input type="file" name="filefoto" class="dropify" data-height="220" data-default-file="<?php echo base_url() . 'assets/upload/images/konfirmasi/' . $kon; ?>">
                                </div>
                            </div>
                        <?php } else { ?>
                            <a data-fancybox="gallery" href="<?php echo base_url() . 'assets/upload/images/konfirmasi/' . $kon; ?>"><img src="<?php echo base_url() . 'assets/upload/images/konfirmasi/' . $kon; ?>"></a>
                        <?php } ?>

                    <?php } ?>
                </div>
                <div class="card-body pt-5">


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $jmlqty = 0;
                            foreach ($detail->result_array() as $a) {
                                $ttl = $a['invoice_total'];
                                $inm = $a['bi_barang_nama'];
                                $inh = $a['bi_barang_harjul'];
                                $inq = $a['bi_barang_qty'];
                                $jmlqty = $jmlqty + $inq;
                            ?>
                                <tr>
                                    <td><?php echo $inm; ?></td>
                                    <td><?php echo 'Rp ' . number_format($inh); ?></td>
                                    <td><?php echo $inq; ?></td>

                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <th>Total</th>
                                <th><?php echo 'Rp ' . number_format($ttl); ?></th>
                                <th><?php echo $jmlqty; ?></th>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <?php if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') { ?>
                    <div class="card-footer px-4 pb-4">
                        <!-- Button -->
                        <a href="<?php echo base_url() ?>" target="_blank" class="btn btn-block btn-outline-gray animate-up-2">
                            Cetak <span class="icon icon-xs ml-3"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="card-footer px-4 pb-4">
                        <!-- Button -->
                        <button type="submit" class="btn btn-block btn-outline-info animate-up-2">Konfirmasi</button>
                    </div>
                <?php } ?>
                </form>

            </div>
        </div>
    </div>

    <!-- Footer -->

</div>
</div>

<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="<?php echo base_url() ?>/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/dropify/dropify.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/summernote-master/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<!-- Datatables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.5/datatables.min.js"></script>
<!-- Argon JS -->
<script src="<?php echo base_url() ?>/assets/js/argon.js?v=1.2.0"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mydata').DataTable();
        $('.dropify').dropify({
            defaultFile: '',
            messages: {
                default: 'Drag atau drop untuk memilih Photo',
                replace: 'Ganti',
                remove: 'Hapus',
                error: 'error'
            }
        });
        $('.summernote').summernote({
            height: 200,
            focus: true,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ["fullscreen", "codeview", "help"]],
            ],
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }
        });



        function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "<?php echo site_url() ?>assets/upload/staff",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }
    });
</script>

</body>

</html>