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
                            <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
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
        <!-- Content Table Card-->
        <div class="col-xl-12 mb-5 mb-xl-0">

            <div class="card shadow">
                <div class="card-header border-0">
                    <h2 class="mb-0">Data Pengguna</h3>
                        <div class="col text-right">
                            <a href="#!" data-toggle="modal" data-target="#largeModal" class="btn btn-sm btn-success"><span class="ni ni-fat-add"></span>Tambah Pengguna</a>
                        </div>
                        <div class="mt-1">
                            <?php
                            $msg = $this->session->flashdata('msg');
                            if ($msg == "tambahpengguna") {
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Tambah Data Pengguna!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }; ?>
                            <?php
                            if ($msg == "updatepengguna") {
                            ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Update Data Pengguna!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            } elseif ($msg == "penggunadeactivated") {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Non-Aktifkan Pengguna!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            } elseif ($msg == "penggunaactivated") {
                            ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Aktifkan Pengguna!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            } elseif ($msg == "passwordtidaksama") {
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Peringatan!</strong> Data Tidak Valid!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            };
                            ?>
                        </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="mydata">
                        <thead class="thead-light">
                            <tr>
                                <th style="text-align:center;width:40px;">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th style="width:140px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <!-- Memanggil data sesuai array nya -->
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $a) :
                                $no++;
                                $id = $a['user_id'];
                                $nm = $a['user_nama'];
                                $username = $a['user_username'];
                                $password = $a['user_password'];
                                $level = $a['user_level'];
                                $status = $a['user_status'];
                            ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no; ?></td>
                                    <td><?php echo $nm; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $password; ?></td>
                                    <td><?php if ($level == '1') echo 'Administrator';
                                        else if ($level == '2') echo 'Kasir';
                                        else if ($level == '3') echo 'Pelanggan'; ?></td>
                                    <td><?php if ($status == '1') echo 'Aktif';
                                        else if ($status == '0') echo 'Tidak Aktif'; ?></td>
                                    <td style="text-align:center;">
                                        <a class="btn btn-sm btn-warning" href="#modalEditPelanggan<?php echo $id ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                        <?php if ($status == '1') { ?>


                                            <a class="btn btn-sm btn-danger" href="#modaldeactivePelanggan<?php echo $id ?>" data-toggle="modal" title="Nonaktifkan"><span class="fa fa-close"></span> Deactivated</a>
                                        <?php } elseif ($status == '0') { ?>


                                            <a class="btn btn-sm btn-success" href="#modalreactivePelanggan<?php echo $id ?>" data-toggle="modal" title="Aktifkan"><span class="fa fa-close"></span> Reactivated</a>

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

    <!-- ============ MODAL ADD =============== -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Tambah Pengguna</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="post" action="<?php echo base_url() . 'index.php/admin/pengguna/tambah_pengguna' ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama</label>
                            <div class="col-xs-9">
                                <input name="nama" class="form-control" type="text" placeholder="Nama..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Username</label>
                            <div class="col-xs-9">
                                <input name="username" class="form-control" type="text" placeholder="Username..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Password</label>
                            <div class="col-xs-9">
                                <input name="password" class="form-control" type="password" placeholder="Password..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Ulangi Password</label>
                            <div class="col-xs-9">
                                <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Level</label>
                            <div class="col-xs-9">
                                <select name="level" class="form-control" required>
                                    <option value="1">Admin</option>
                                    <option value="2">Kasir</option>
                                </select>
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
        $id = $a['user_id'];
        $nm = $a['user_nama'];
        $username = $a['user_username'];
        $password = $a['user_password'];
        $level = $a['user_level'];
        $status = $a['user_status'];
    ?>
        <div id="modalEditPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Edit Pengguna</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/pengguna/edit_pengguna' ?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $id; ?>">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama</label>
                                <div class="col-xs-9">
                                    <input name="nama" class="form-control" type="text" value="<?php echo $nm; ?>" placeholder="Nama..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Username</label>
                                <div class="col-xs-9">
                                    <input name="username" class="form-control" type="text" value="<?php echo $username; ?>" placeholder="Username..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Password</label>
                                <div class="col-xs-9">
                                    <input name="password" class="form-control" type="password" placeholder="Password...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Ulangi Password</label>
                                <div class="col-xs-9">
                                    <input name="password2" class="form-control" type="password" placeholder="Ulangi Password...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Level</label>
                                <div class="col-xs-9">
                                    <select name="level" class="form-control" required>
                                        <?php if ($level == '1') : ?>
                                            <option value="1" selected>Admin</option>
                                            <option value="2">Kasir</option>
                                        <?php else : ?>
                                            <option value="1">Admin</option>
                                            <option value="2" selected>Kasir</option>
                                        <?php endif; ?>
                                    </select>
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

    <!-- ============ MODAL Aktif/Non Aktif =============== -->
    <?php
    foreach ($data->result_array() as $a) {
        $id = $a['user_id'];
        $nm = $a['user_nama'];
        $username = $a['user_username'];
        $password = $a['user_password'];
        $level = $a['user_level'];
        $status = $a['user_status'];
    ?>
        <div id="modaldeactivePelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">NonAktifkan Pengguna</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/pengguna/nonaktifkan' ?>">
                        <div class="modal-body">
                            <p>Yakin mau menonaktifkan pengguna <b><?php echo $nm; ?></b>..?</p>
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
        $id = $a['user_id'];
        $nm = $a['user_nama'];
        $username = $a['user_username'];
        $password = $a['user_password'];
        $level = $a['user_level'];
        $status = $a['user_status'];
    ?>
        <div id="modalreactivePelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Aktifkan Pengguna</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/pengguna/aktifkan' ?>">
                        <div class="modal-body">
                            <p>Mau mengaktifkan pengguna <b><?php echo $nm; ?></b>..?</p>
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
    });
</script>

</body>

</html>