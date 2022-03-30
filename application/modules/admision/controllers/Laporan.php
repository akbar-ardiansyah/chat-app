<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LaporanModel');
    }

    public function kunjungan_poliklinik()
    {
        $data['selected_tahun'] = $this->input->get('tahun') ?? date('Y');
        $data['kunjungan'] = $this->LaporanModel->kunjungan_poliklinik($data['selected_tahun']);

        $this->template->render('admision.laporan.kunjungan_poliklinik', $data);
    }
}
