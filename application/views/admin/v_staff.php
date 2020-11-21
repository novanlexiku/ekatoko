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
                            <li class="breadcrumb-item active" aria-current="page">Staff</li>
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
                    <h2 class="mb-0">Staff</h3>
                        <div class="col text-right">
                            <a href="#!" data-toggle="modal" data-target="#largeModal" class="btn btn-sm btn-success"><span class="ni ni-fat-add"></span>Tambah Staff</a>
                        </div>
                        <div class="mt-1">
                            <?php
                            $msg = $this->session->flashdata('msg');
                            if ($msg == "tambahstaff") {
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Tambah Staff!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }; ?>
                            <?php
                            if ($msg == "editstaff") {
                            ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Update Staff!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            } elseif ($msg == "hapusstaff") {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Hapus Staff!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            } elseif ($msg == "error-img") {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Peringatan!</strong> gambar Tidak Valid!</span>
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
                    <table class="table table-bordered" id="mydata">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align:center;width:40px;">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col" style="width:140px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $a) :
                                $no++;
                                $id = $a['staff_id'];
                                $nm = $a['staff_nama'];
                                $desc = $a['staff_desc'];
                                $gbr = $a['staff_gambar'];
                            ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no; ?></td>
                                    <td><?php echo $nm; ?></td>
                                    <td><?php echo $desc; ?></td>
                                    <td> <img class="avatar rounded-circle" width="50" src="<?php echo base_url() . 'assets/upload/staff/' . $gbr; ?>">
                                    </td>
                                    <td style="text-align:center;">
                                        <a class="btn btn-warning btn-sm" href="#modalEditStaff<?php echo $id ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#modalHapusStaff<?php echo $id ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
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
                <h3 class="modal-title" id="myModalLabel">Tambah Staff</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/staff/tambah_staff' ?>" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Staff</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" placeholder="Input Nama Staff..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Deskripsi Staff</label>
                        <div class="col-xs-9">
                            <textarea name="deskripsi" id="summernote" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Gambar staff</label>
                        <div class="form-group">
                            <input type="file" name="filefoto" class="dropify" data-height="220" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============ MODAL EDIT =============== -->
<?php
foreach ($data->result_array() as $a) {
    $id = $a['staff_id'];
    $nm = $a['staff_nama'];
    $desc = $a['staff_desc'];
    $gbr = $a['staff_gambar'];
?>
    <div id="modalEditStaff<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Staff</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/staff/edit_staff' ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input name="kode" type="hidden" value="<?php echo $id; ?>">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Staff</label>
                            <div class="col-xs-9">
                                <input name="nama" class="form-control" type="text" value="<?php echo $nm; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Deskripsi Staff</label>
                            <div class="col-xs-9">
                                <textarea name="deskripsi" id="summernote2" required><?php echo $desc; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Gambar Barang</label>
                            <div class="form-group">
                                <input type="file" name="filefoto" class="dropify" data-height="220" data-default-file="<?php echo base_url() . 'assets/upload/staff/' . $gbr; ?>">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="submit" class="btn btn-info btn-sm">Update</button>
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
    $id = $a['staff_id'];
    $nm = $a['staff_nama'];
?>
    <div id="modalHapusStaff<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Staff</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/staff/hapus_staff' ?>">
                    <div class="modal-body">
                        <p>Yakin mau menghapus staff ini..?</p>
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