<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Laporan Laba/rugi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body onload="window.print()">
    <div id="laporan">
        <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
            <!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
        </table>

        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;padding-left:20px;">
                    <center>
                        <h4>LAPORAN LABA / RUGI </h4>
                    </center><br />
                </td>
            </tr>

        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <?php
        $b = $jml->row_array();
        ?>
        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <thead>
                <tr>
                    <th colspan="9" style="text-align:left;">Bulan : <?php echo $b['bulan']; ?></th>
                </tr>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga Pokok</th>
                    <th>Harga Jual</th>
                    <th>Keuntungan Per Unit</th>
                    <th>Item Terjual</th>
                    <th>Untung Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $total = 0;
                foreach ($data->result_array() as $i) {
                    $no++;
                    $tgl = $i['invoice_tanggal'];
                    $nabar = $i['barang_nama'];
                    $satuan = $i['barang_satuan'];
                    $harpok = $i['barang_harpok'];
                    $harjul = $i['barang_harjul'];
                    $untung_perunit = $harjul - $harpok;
                    $qty = $i['bi_barang_qty'];
                    $untung_bersih = $untung_perunit * $qty;
                    $total = $untung_perunit + $total;

                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td style="text-align:center;"><?php echo $tgl; ?></td>
                        <td style="text-align:left;"><?php echo $nabar; ?></td>
                        <td style="text-align:left;"><?php echo $satuan; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($harpok); ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($harjul); ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($untung_perunit); ?></td>
                        <td style="text-align:center;"><?php echo $qty; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($untung_bersih); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>

                <tr>
                    <td colspan="8" style="text-align:center;"><b>Total Keuntungan</b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($total); ?></b></td>
                </tr>
            </tfoot>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Yogyakarta, <?php echo date('d-M-Y') ?></td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>

            <tr>
                <td><br /><br /><br /><br /></td>
            </tr>
            <tr>
                <td align="right">( <?php echo $this->session->userdata('user_nama'); ?> )</td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br /><br /></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>
    </div>
</body>

</html>