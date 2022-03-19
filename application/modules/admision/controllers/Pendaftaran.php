<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PendaftaranModel');
    }

    public function index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $data = [
                'nama_pasien' => $this->input->post('name_pasien'),
                'nik' => $this->input->post('nik'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'tgl_berobat' => $this->input->post('tgl_berobat'),
                'id_asuransi' => $this->input->post('id_asuransi'),
                'id_polikllinik' => $this->input->post('id_poliklinik'),
                'id_dokter' => $this->input->post('id_dokter'),
            ];

            $pendaftaran = $this->PendaftaranModel->insert($data);

            if ($pendaftaran) {
                $response = ['status' => true, 'message' => 'Data pendaftaran berhasil disimpan'];
            } else {
                $response = ['status' => false, 'message' => 'Ooops, terjadi kesalahan ketika menyimpan data'];
            }

            echo json_encode($response);

        } else {

            $data['asuransii'] = $this->PendaftaranModel->asuransi();
            $data['poliklinik'] = $this->PendaftaranModel->poliklinik();
    
            $this->template->render('admision.pendaftaran.index', $data);
        }

    }

    public function fetch_dokter()
    {
        $id_poliklinik = $this->input->post('id_poliklinik');

        $dokters = $this->PendaftaranModel->dokter($id_poliklinik);

        $option = '<option value="">Pilih Dokter</option>';

        foreach($dokters as $dokter) {
            $option .= '<option value="'.$dokter->id_dokter.'">'.$dokter->nama_dokter.'</option>';
        }

        echo $option;
    }
}