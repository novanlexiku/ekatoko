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
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <!-- Content -->
    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h2 class="mb-0">Laporan</h3>


                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" style="font-size:12px;" id="mydata">
                        <thead>
                            <tr>
                                <th style="text-align:center;width:40px;">No</th>
                                <th>Laporan</th>
                                <th style="width:100px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">1</td>
                                <td style="vertical-align:middle;">Laporan Data Barang</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'index.php/admin/laporan/lap_data_barang' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">2</td>
                                <td style="vertical-align:middle;">Laporan Stok Barang</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'index.php/admin/laporan/lap_stok_barang' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">3</td>
                                <td style="vertical-align:middle;">Laporan Penjualan</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'index.php/admin/laporan/lap_data_penjualan' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">4</td>
                                <td style="vertical-align:middle;">Laporan Penjualan PerTanggal</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">5</td>
                                <td style="vertical-align:middle;">Laporan Penjualan PerBulan</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">6</td>
                                <td style="vertical-align:middle;">Laporan Laba/Rugi</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_laba_rugi" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>


</div>

<!-- ============ MODAL laporan tanggal =============== -->
<div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/laporan/lap_penjualan_pertanggal' ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Tanggal</label>
                        <div class="col-xs-9">
                            <div class='input-group date' id='datepicker' style="width:200px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input type='text' name="tgl" class="form-control datepicker" data-date-format="yyyy/mm/dd" value="" placeholder="Tanggal..." required />

                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-sm btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============ MODAL laporan bulan =============== -->
<div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/laporan/lap_penjualan_perbulan' ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Bulan</label>
                        <div class="col-xs-9">
                            <select name="bln" class="select show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                            <?php foreach ($jual_bln->result_array() as $k) {
                                $bln = $k['bulan'];
                            ?>
                                <option><?php echo $bln; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-sm btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============ MODAL laporan tahun=============== -->
<div class="modal fade" id="lap_jual_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/laporan/lap_penjualan_pertahun' ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Tahun</label>
                        <div class="col-xs-9">
                            <select name="thn" class="select show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required />
                            <?php foreach ($jual_thn->result_array() as $t) {
                                $thn = $t['tahun'];
                            ?>
                                <option><?php echo $thn; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="lap_laba_rugi" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/laporan/lap_laba_rugi' ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Bulan</label>
                        <div class="col-xs-9">
                            <select name="bln" class="select show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                            <?php foreach ($jual_bln->result_array() as $k) {
                                $bln = $k['bulan'];
                            ?>
                                <option><?php echo $bln; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-sm btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>


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
<script>
    $.fn.datepicker.defaults.format = "mm/dd/yyyy";
    $('.datepicker').datepicker({
        startDate: '-3d'
    });
</script>

</body>

</html>