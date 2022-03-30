<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PasienModel extends CI_Model
{
    public function get_data_berobat($tgl_berobat)
    {

        $this->db->select('p.nama_pasien, p.nik, date_format(p.tgl_berobat, "%d-%m-%Y") as tgl_berobat, a.nama_asuransi, po.nama_poliklinik, d.nama_dokter');
        $this->db->join('tbl_asuransi a', 'a.id_asuransi = p.id_asuransi');
        $this->db->join('tbl_poliklinik po', 'po.id_poliklinik = p.id_poliklinik');
        $this->db->join('tbl_dokter d', 'd.id_dokter = p.id_dokter');
        $this->db->where('p.tgl_berobat', $tgl_berobat);
        return $this->db->get('tbl_pendaftaran p')->result();
    }
}
