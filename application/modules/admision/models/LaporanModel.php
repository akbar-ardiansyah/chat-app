<?php

class LaporanModel extends CI_Model
{
    public function kunjungan_poliklinik($tahun)
    {
        $this->db->select(
            'nama_poliklinik,
            SUM( IF( MONTH(tgl_berobat) = "1", 1 , 0) ) AS jan,
            SUM( IF( MONTH(tgl_berobat)= "2", 1 , 0) ) AS feb,
            SUM( IF( MONTH(tgl_berobat)= "3", 1 , 0) ) AS mar,
            SUM( IF( MONTH(tgl_berobat)= "4", 1 , 0) ) AS apr,
            SUM( IF( MONTH(tgl_berobat)= "5", 1 , 0) ) AS mai,
            SUM( IF( MONTH(tgl_berobat)= "6", 1 , 0) ) AS jun,
            SUM( IF( MONTH(tgl_berobat)= "7", 1 , 0) ) AS jul,
            SUM( IF( MONTH(tgl_berobat)= "8", 1 , 0) ) AS agt,
            SUM( IF( MONTH(tgl_berobat)= "9", 1 , 0) ) AS sep,
            SUM( IF( MONTH(tgl_berobat)= "10", 1 , 0) ) AS okt,
            SUM( IF( MONTH(tgl_berobat)= "11", 1 , 0) ) AS nov,
            SUM( IF( MONTH(tgl_berobat)= "12", 1 , 0) ) AS des'
        );
        $this->db->from('tbl_poliklinik');
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.id_poliklinik = tbl_poliklinik.id_poliklinik', 'left');
        $this->db->where('YEAR(tbl_pendaftaran.tgl_berobat)', $tahun);
        $this->db->group_by('tbl_poliklinik.nama_poliklinik');
        return $this->db->get();
    }
}
