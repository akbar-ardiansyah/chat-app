<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PasienModel');
    }

    public function index()
    {
        $data['tgl_berobat'] = $this->input->get('tgl_berobat') ?? date('Y-m-d');
        $data['pasiens'] = $this->PasienModel->get_data_berobat($data['tgl_berobat']);

        $this->template->render('admision.pasien.index', $data);
    }
}