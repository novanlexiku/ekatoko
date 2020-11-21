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
                            <li class="breadcrumb-item active" aria-current="page">Bank</li>
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
                    <h2 class="mb-0">Bank Barang</h3>
                        <div class="col text-right">
                            <a href="#!" data-toggle="modal" data-target="#largeModal" class="btn btn-sm btn-success"><span class="ni ni-fat-add"></span>Tambah Bank</a>
                        </div>
                        <div class="mt-1">
                            <?php
                            $msg = $this->session->flashdata('msg');
                            if ($msg == "tambahbank") {
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Tambah Data Bank!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }; ?>
                            <?php
                            if ($msg == "editbank") {
                            ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Update Data Bank!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            } elseif ($msg == "hapusbank") {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Sukses!</strong> Hapus Data Bank!</span>
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
                                <th scope="col">Bank</th>
                                <th scope="col">Rekening</th>
                                <th scope="col">Owner</th>
                                <th scope="col" style="width:140px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $a) :
                                $no++;
                                $id = $a['bank_id'];
                                $nm = $a['bank_nama'];
                                $rk = $a['bank_rek'];
                                $ow = $a['bank_owner'];
                            ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no; ?></td>
                                    <td><?php echo $nm; ?></td>
                                    <td><?php echo $rk; ?></td>
                                    <td><?php echo $ow; ?></td>
                                    <td style="text-align:center;">
                                        <a class="btn btn-warning btn-sm" href="#modalEditBank<?php echo $id ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#modalHapusBank<?php echo $id ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
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
                <h3 class="modal-title" id="myModalLabel">Tambah Bank</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/bank/tambah_bank' ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Bank</label>
                        <div class="col-xs-9">
                            <input name="bank_nama" class="form-control" type="text" placeholder="Input Nama Bank" style="width:280px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Rekening Bank</label>
                        <div class="col-xs-9">
                            <input name="bank_rek" class="form-control" type="text" placeholder="Input Nomor Rekening" style="width:280px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Pemilik Rekening</label>
                        <div class="col-xs-9">
                            <input name="bank_owner" class="form-control" type="text" placeholder="Nama Pemilik Rekening" style="width:280px;" required>
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
    $id = $a['bank_id'];
    $nm = $a['bank_nama'];
    $rk = $a['bank_rek'];
    $ow = $a['bank_owner'];
?>
    <div id="modalEditBank<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Bank</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/bank/edit_bank' ?>">
                    <div class="modal-body">
                        <input name="bank_id" type="hidden" value="<?php echo $id; ?>">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Bank</label>
                            <div class="col-xs-9">
                                <input name="bank_nama" class="form-control" type="text" value="<?php echo $nm; ?>" placeholder="Input Nama Bank" style="width:280px;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Rekening Bank</label>
                            <div class="col-xs-9">
                                <input name="bank_rek" class="form-control" type="text" value="<?php echo $rk; ?>" placeholder="Input Nomor Rekening" style="width:280px;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Pemilik Rekening</label>
                            <div class="col-xs-9">
                                <input name="bank_owner" class="form-control" type="text" value="<?php echo $ow; ?>" placeholder="Nama Pemilik Rekening" style="width:280px;" required>
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
    $id = $a['bank_id'];
    $nm = $a['bank_nama'];
?>
    <div id="modalHapusBank<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Bank</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/bank/hapus_bank' ?>">
                    <div class="modal-body">
                        <p>Yakin mau menghapus bank ini..?</p>
                        <input name="bank_id" type="hidden" value="<?php echo $id; ?>">
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
    });
</script>

</body>

</html>