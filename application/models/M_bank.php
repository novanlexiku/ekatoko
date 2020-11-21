<?php
class M_bank extends CI_Model
{


    function get_all_bank()
    {
        $hsl = $this->db->query("select * from tbl_bank order by bank_id desc");
        return $hsl;
    }

    function simpan_bank($nama, $rek, $owner)
    {
        $hsl = $this->db->query("INSERT INTO tbl_bank (bank_nama, bank_rek, bank_owner) VALUES ('$nama', '$rek', '$owner')");
        return $hsl;
    }

    function hapus_bank($id)
    {
        $hsl = $this->db->query("DELETE FROM tbl_bank where bank_id='$id'");
        return $hsl;
    }

    function update_bank($id, $nama, $rek, $owner)
    {
        $hsl = $this->db->query("UPDATE tbl_bank set bank_nama='$nama', bank_rek='$rek', bank_owner='$owner' where bank_id='$id'");
        return $hsl;
    }
}
