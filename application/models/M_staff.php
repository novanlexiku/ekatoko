<?php
class M_staff extends CI_Model
{

    function hapus_staff($kode)
    {
        $hsl = $this->db->query("DELETE FROM tbl_staff where staff_id='$kode'");
        return $hsl;
    }

    function update_staff($kode, $tut, $desc, $gambar)
    {
        $hsl = $this->db->query("UPDATE tbl_staff set staff_nama='$tut',staff_desc='$desc',staff_gambar='$gambar' where staff_id='$kode'");
        return $hsl;
    }

    function update_staff_noimg($kode, $tut, $desc)
    {
        $hsl = $this->db->query("UPDATE tbl_staff set staff_nama='$tut',staff_desc='$desc' where staff_id='$kode'");
        return $hsl;
    }

    function tampil_staff()
    {
        $hsl = $this->db->query("select * from tbl_staff order by staff_id desc");
        return $hsl;
    }

    function simpan_staff($tut, $desc, $gambar)
    {
        $hsl = $this->db->query("INSERT INTO tbl_staff(staff_nama,staff_desc,staff_gambar) VALUES ('$tut','$desc','$gambar')");
        return $hsl;
    }
}
