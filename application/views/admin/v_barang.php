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
                            <li class="breadcrumb-item active" aria-current="page">Barang</li>
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
                                <th>Satuan</th>
                                <th>Harga Pokok</th>
                                <th>Harga (Eceran)</th>
                                <th>Harga (Grosir)</th>
                                <th>Stok</th>
                                <th>Min Stok</th>
                                <th>Kategori</th>
                                <th style="width:100px;text-align:center;">Aksi</th>
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
                                $satuan = $a['barang_satuan'];
                                $harpok = $a['barang_harpok'];
                                $harjul = $a['barang_harjul'];
                                $harjul_grosir = $a['barang_harjul_grosir'];
                                $stok = $a['barang_stok'];
                                $min_stok = $a['barang_min_stok'];
                                $kat_id = $a['barang_kategori_id'];
                                $kat_nama = $a['kategori_nama'];
                            ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no; ?></td>
                                    <td><?php echo $id; ?></td>
                                    <td> <img class="avatar" width="50" src="<?php echo base_url() . 'assets/upload/images/barang/' . $gbr; ?>">
                                    </td>
                                    <td><?php echo $nm; ?></td>
                                    <td style="text-align:center;"><?php echo $satuan; ?></td>
                                    <td style="text-align:right;"><?php echo 'Rp ' . number_format($harpok); ?></td>
                                    <td style="text-align:right;"><?php echo 'Rp ' . number_format($harjul); ?></td>
                                    <td style="text-align:right;"><?php echo 'Rp ' . number_format($harjul_grosir); ?></td>
                                    <td style="text-align:center;"><?php echo $stok; ?></td>
                                    <td style="text-align:center;"><?php echo $min_stok; ?></td>
                                    <td><?php echo $kat_nama; ?></td>
                                    <td style="text-align:center;">
                                        <a class="btn btn-sm btn-warning" href="#modalEditBarang<?php echo $id ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#modalHapusBarang<?php echo $id ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
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

<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/barang/tambah_barang' ?>" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Gambar Barang</label>
                        <div class="form-group">
                            <input type="file" name="filefoto" class="dropify" data-height="220" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar" class="form-control" type="text" placeholder="Nama Barang..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Deskripsi Barang</label>
                        <div class="col-xs-9">
                            <textarea name="deskripsi" class="summernote" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Kategori</label>
                        <div class="col-xs-9">
                            <select name="kategori" class="select show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_kat = $k2['kategori_id'];
                                    $nm_kat = $k2['kategori_nama'];
                                ?>
                                    <option value="<?php echo $id_kat; ?>"><?php echo $nm_kat; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Satuan</label>
                        <div class="col-xs-9">
                            <select name="satuan" class="select show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>

                                <option>PCS</option>
                                <option>Lusin</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Harga Pokok</label>
                        <div class="col-xs-9">
                            <input name="harpok" class="harpok form-control" type="text" placeholder="Harga Pokok...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Harga (Eceran)</label>
                        <div class="col-xs-9">
                            <input name="harjul" class="harjul form-control" type="text" placeholder="Harga Jual Eceran...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Harga (Grosir)</label>
                        <div class="col-xs-9">
                            <input name="harjul_grosir" class="harjul form-control" type="text" placeholder="Harga Jual Grosir...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Stok</label>
                        <div class="col-xs-9">
                            <input name="stok" class="form-control" type="number" placeholder="Stok...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Minimal Stok</label>
                        <div class="col-xs-9">
                            <input name="min_stok" class="form-control" type="number" placeholder="Minimal Stok...">
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-sm btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============ MODAL EDIT =============== -->
<?php
foreach ($data->result_array() as $a) {
    $id = $a['barang_id'];
    $gbr = $a['barang_gambar'];
    $nm = $a['barang_nama'];
    $desc = $a['barang_deskripsi'];
    $satuan = $a['barang_satuan'];
    $harpok = $a['barang_harpok'];
    $harjul = $a['barang_harjul'];
    $harjul_grosir = $a['barang_harjul_grosir'];
    $stok = $a['barang_stok'];
    $min_stok = $a['barang_min_stok'];
    $kat_id = $a['barang_kategori_id'];
    $kat_nama = $a['kategori_nama'];
?>
    <div id="modalEditBarang<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/barang/edit_barang' ?>" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kode Barang</label>
                            <div class="col-xs-9">
                                <input name="kobar" class="form-control" type="text" value="<?php echo $id; ?>" placeholder="Kode Barang..." readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Gambar Barang</label>
                            <div class="form-group">
                                <input type="file" name="filefoto" class="dropify" data-height="220" data-default-file="<?php echo base_url() . 'assets/upload/images/barang/' . $gbr; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Barang</label>
                            <div class="col-xs-9">
                                <input name="nabar" class="form-control" type="text" value="<?php echo $nm; ?>" placeholder="Nama Barang..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Deskripsi Barang</label>
                            <div class="col-xs-9">
                                <textarea name="deskripsi" class="summernote"><?php echo $desc; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class="select show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                    <?php foreach ($kat2->result_array() as $k2) {
                                        $id_kat = $k2['kategori_id'];
                                        $nm_kat = $k2['kategori_nama'];
                                        if ($id_kat == $kat_id)
                                            echo "<option value='$id_kat' selected>$nm_kat</option>";
                                        else
                                            echo "<option value='$id_kat'>$nm_kat</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Satuan</label>
                            <div class="col-xs-9">
                                <select name="satuan" class="select show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>

                                    <?php if ($satuan == 'PCS') : ?>
                                        <option selected>PCS</option>
                                        <option>Lusin</option>
                                    <?php elseif ($satuan == 'Lusin') : ?>
                                        <option>PCS</option>
                                        <option selected>Lusin</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga Pokok</label>
                            <div class="col-xs-9">
                                <input name="harpok" class="harpok form-control" type="text" value="<?php echo $harpok; ?>" placeholder="Harga Pokok..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga (Eceran)</label>
                            <div class="col-xs-9">
                                <input name="harjul" class="harjul form-control" type="text" value="<?php echo $harjul; ?>" placeholder="Harga Jual..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga (Grosir)</label>
                            <div class="col-xs-9">
                                <input name="harjul_grosir" class="harjul form-control" type="text" value="<?php echo $harjul_grosir; ?>" placeholder="Harga Jual Grosir..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Stok</label>
                            <div class="col-xs-9">
                                <input name="stok" class="form-control" type="number" value="<?php echo $stok; ?>" placeholder="Stok..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Minimal Stok</label>
                            <div class="col-xs-9">
                                <input name="min_stok" class="form-control" type="number" value="<?php echo $min_stok; ?>" placeholder="Minimal Stok..." required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>

<!-- ============ MODAL HAPUS =============== -->
<?php
foreach ($data->result_array() as $a) {
    $id = $a['barang_id'];
    $nm = $a['barang_nama'];
    $desc = $a['barang_deskripsi'];
    $harpok = $a['barang_harpok'];
    $harjul = $a['barang_harjul'];
    $stok = $a['barang_stok'];
    $min_stok = $a['barang_min_stok'];
    $kat_id = $a['barang_kategori_id'];
    $kat_nama = $a['kategori_nama'];
?>
    <div id="modalHapusBarang<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/barang/hapus_barang' ?>">
                    <div class="modal-body">
                        <p>Yakin mau menghapus data barang ini..?</p>
                        <input name="kode" type="hidden" value="<?php echo $id; ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
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