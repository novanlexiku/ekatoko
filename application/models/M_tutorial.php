<?php
class M_tutorial extends CI_Model
{

    function hapus_tutorial($kode)
    {
        $hsl = $this->db->query("DELETE FROM tbl_tutorial where tutorial_id='$kode'");
        return $hsl;
    }

    function update_tutorial($kode, $tut, $desc, $gambar)
    {
        $hsl = $this->db->query("UPDATE tbl_tutorial set tutorial_nama='$tut',tutorial_desc='$desc',tutorial_gambar='$gambar' where tutorial_id='$kode'");
        return $hsl;
    }

    function update_tutorial_noimg($kode, $tut, $desc)
    {
        $hsl = $this->db->query("UPDATE tbl_tutorial set tutorial_nama='$tut',tutorial_desc='$desc' where tutorial_id='$kode'");
        return $hsl;
    }

    function tampil_tutorial()
    {
        $hsl = $this->db->query("select * from tbl_tutorial order by tutorial_id desc");
        return $hsl;
    }

    function simpan_tutorial($tut, $desc, $gambar)
    {
        $hsl = $this->db->query("INSERT INTO tbl_tutorial(tutorial_nama,tutorial_desc,tutorial_gambar) VALUES ('$tut','$desc','$gambar')");
        return $hsl;
    }
}
