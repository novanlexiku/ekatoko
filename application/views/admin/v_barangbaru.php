<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hot Deals</li>
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
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h2 class="mb-0">Data Barang</h3>
                        <div class="col text-right">
                            <a href="#!" data-toggle="modal" data-target="#largeModal" class="btn btn-sm btn-success"><span class="ni ni-fat-add"></span>Tambah Barang</a>
                        </div>
                        <div class="mt-1">
                            <?php
                            $msg = $this->session->flashdata('msg');
                            if ($msg == "tambahbrg") {
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Tambah Data Barang!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }; ?>
                            <?php
                            if ($msg == "editbrg") {
                            ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Update Data Barang!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            } elseif ($msg == "promodeactivated") {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Non-Aktifkan Promo!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            } elseif ($msg == "promoactivated") {
                            ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Aktifkan Promo!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            } elseif ($msg == "hapusbrg") {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Hapus Barang!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" style="font-size:11px;" id="mydata">
                        <thead class="thead-light">
                            <tr>
                                <th style="text-align:center;width:20px;">No</th>
                                <th>Kode Barang</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Hot Deals</th>
                            </tr>
                        </thead>
                        <!-- Memanggil data sesuai array nya -->
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $a) :
                                $no++;
                                $id = $a['barang_id'];
                                $gbr = $a['barang_gambar'];
                                $nm = $a['barang_nama'];
                                $promo = $a['barang_promo'];
                                $kat_id = $a['barang_kategori_id'];
                                $kat_nama = $a['kategori_nama'];
                            ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no; ?></td>
                                    <td><?php echo $id; ?></td>
                                    <td> <img class="avatar" width="50" src="<?php echo base_url() . 'assets/upload/images/barang/' . $gbr; ?>">
                                    </td>
                                    <td><?php echo $nm; ?></td>
                                    <td><?php echo $kat_nama; ?></td>
                                    <td style="text-align:center;">
                                        <?php if ($promo == '1') { ?>
                                            <a class="btn btn-sm btn-danger" href="#modaldeactivePromo<?php echo $id ?>" data-toggle="modal" title="Nonaktifkan"><span class="fa fa-close"></span> Non-Aktifkan</a>
                                        <?php } elseif ($promo == '0') { ?>
                                            <a class="btn btn-sm btn-success" href="#modalreactivePromo<?php echo $id ?>" data-toggle="modal" title="Aktifkan"><span class="fa fa-close"></span> Aktifkan</a>
                                        <?php  } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


</div>
</div>

<!-- ============ MODAL Aktif/Non Aktif =============== -->
<?php
foreach ($data->result_array() as $a) {
    $id = $a['barang_id'];
    $gbr = $a['barang_gambar'];
    $nm = $a['barang_nama'];
    $promo = $a['barang_promo'];
    $kat_id = $a['barang_kategori_id'];
    $kat_nama = $a['kategori_nama'];
?>
    <div id="modaldeactivePromo<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">NonAktifkan Promo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/hotdeals/nonaktifkan' ?>">
                    <div class="modal-body">
                        <p>Yakin mau menonaktifkan promo <b><?php echo $nm; ?></b>..?</p>
                        <input name="kode" type="hidden" value="<?php echo $id; ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary">Nonaktifkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
foreach ($data->result_array() as $a) {
    $id = $a['barang_id'];
    $gbr = $a['barang_gambar'];
    $nm = $a['barang_nama'];
    $promo = $a['barang_promo'];
    $kat_id = $a['barang_kategori_id'];
    $kat_nama = $a['kategori_nama'];
?>
    <div id="modalreactivePromo<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Aktifkan Promo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/hotdeals/aktifkan' ?>">
                    <div class="modal-body">
                        <p>Mau mengaktifkan promo <b><?php echo $nm; ?></b>..?</p>
                        <input name="kode" type="hidden" value="<?php echo $id; ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary">Aktifkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>
<!--END MODAL-->

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
        $('#summernote').summernote({
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
        $('#summernote2').summernote({
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