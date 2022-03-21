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
                'nama_pasien'           => $this->input->post('nama_pasien', true),
                'nik'                   => $this->input->post('nik', true),
                'jenis_kelamin'         => $this->input->post('jenis_kelamin', true),
                'tgl_lahir'             => $this->input->post('tgl_lahir', true),
                'tgl_berobat'           => $this->input->post('tgl_berobat', true),
                'id_asuransi'           => $this->input->post('id_asuransi', true),
                'id_poliklinik'        => $this->input->post('id_poliklinik', true),
                'id_dokter'             => $this->input->post('id_dokter', true),
            ];

            $pendaftaran = $this->PendaftaranModel->insert($data);

            if ($pendaftaran) {
                $response = ['status' => true, 'message' => 'Data pendaftaran berhasil disimpan'];
            } else {
                $response = ['status' => false, 'message' => 'Ooops, terjadi kesalahan ketika menyimpan data'];
            }

            echo json_encode($response);
        } else {

            $data['asuransi'] = $this->PendaftaranModel->asuransi();
            $data['poliklinik'] = $this->PendaftaranModel->poliklinik();

            $this->template->render('admision.pendaftaran.index', $data);
        }
    }


    public function fetch_dokter()
    {
        $id_poliklinik = $this->input->post('id_poliklinik');

        $dokters = $this->PendaftaranModel->dokter($id_poliklinik);

        $option = '<option value="">Pilih Dokter</option>';

        foreach ($dokters as $dokter) {
            $option .= '<option value="' . $dokter->id_dokter . '">' . $dokter->nama_dokter . '</option>';
        }

        echo $option;
    }
}
