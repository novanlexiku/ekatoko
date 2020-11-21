<?php
class M_pemesanan extends CI_Model
{

    function get_all_invoice()
    {
        $hsl = $this->db->query("select * from tbl_invoice");
        return $hsl;
    }

    function get_pelanggan_invoice()
    {
        $id = $this->session->userdata('user_id');
        $hsl = $this->db->query("SELECT invoice_id, invoice_user_id, invoice_user_nama, invoice_no_hp, invoice_tujuan, invoice_bank_id, DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal, invoice_total, invoice_konfirmasi, invoice_status from tbl_invoice where invoice_user_id='$id'");
        return $hsl;
    }

    function get_admin_detail_invoice($id)
    {
        $hsl = $this->db->query("SELECT i.invoice_id, i.invoice_user_id, i.invoice_user_nama, i.invoice_no_hp, i.invoice_tujuan, i.invoice_bank_id, DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal, i.invoice_total, i.invoice_konfirmasi, i.invoice_status, b.bi_invoice_id, b.bi_barang_nama, b.bi_barang_harjul, b.bi_barang_qty from tbl_invoice i, tbl_barang_invoice b where i.invoice_id='$id' and i.invoice_id=b.bi_invoice_id");
        return $hsl;
    }

    function get_detail_invoice()
    {
        $id = $this->session->userdata('user_id');
        $hsl = $this->db->query("SELECT i.invoice_id, i.invoice_user_id, i.invoice_user_nama, i.invoice_no_hp, i.invoice_tujuan, i.invoice_bank_id, DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal, i.invoice_total, i.invoice_konfirmasi, i.invoice_status, b.bi_invoice_id, b.bi_barang_nama, b.bi_barang_harjul, b.bi_barang_qty from tbl_invoice i, tbl_barang_invoice b where i.invoice_id=b.bi_invoice_id and i.invoice_user_id='$id'");
        return $hsl;
    }

    function update($id, $sts)
    {
        $hsl = $this->db->query("UPDATE tbl_invoice set invoice_status='$sts' where invoice_id='$id'");
        return $hsl;
    }

    function update_invoice($id, $gambar)
    {
        $hsl = $this->db->query("UPDATE tbl_invoice set invoice_konfirmasi='$gambar' where invoice_id='$id'");
        return $hsl;
    }
}
