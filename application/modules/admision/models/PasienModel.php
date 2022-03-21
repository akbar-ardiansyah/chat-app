<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PasienModel extends CI_Model
{
    public function get_data_berobat($tgl_berobat)
    {
        $this->db->select('p.nama_pasien, p.nik, tgl_berobat, a.nama_asuransi, p.nama_poliklinik, d.nama_dokter');
        $this->db->from("tbl_pendaftaran p");
        $this->db->join('tbl_asuransi a', 'a.id_asuransi = p.id_asuransi');
        $this->db->join('tbl_poliklinik po', 'p.id_poliklinik = po.id_poliklinik');
        $this->db->join('tbl_dokter d', 'd.id_dokter = p.id_dokter');
        $this->db->where('p.tgl_berobat', $tgl_berobat);

        // return $this->db->get('tbl_pendaftaran p')->result_array();
        // $query = $this->db->get();
        // return $query->result();
    }
}
