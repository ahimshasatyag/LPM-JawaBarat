<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model('m_penduduk');
		$this->load->library('form_validation');
	}

	public function tampil() {
		$data['title'] = "Data Bantuan Sosial";
		$data['penduduk'] = $this->m_penduduk->tampil();

		$mutasi = $this->load->view('header', $data);
		$this->load->view('penduduk/tampil_penduduk');
		$this->load->view('footer');
	}

	public function tampil_penduduk() {
		$data['title'] = "Data Bantuan Sosial";
		$data['penduduk'] = $this->m_penduduk->tampil();

		$mutasi = $this->load->view('header', $data);
		$this->load->view('penduduk/tampil_penduduk2');
		$this->load->view('footer');
	}

	public function tambah() {
		$data['title'] = "Tambah Bantuan Sosial";

		$this->load->view('header', $data);
		$this->load->view('penduduk/tambah_penduduk');
		$this->load->view('footer');
	}

	public function proses_tambah() {

		$nik = $this->input->post('nik');
		$nomor_kk = $this->input->post('nomor_kk');
		$foto_ktp = $_FILES['foto_ktp'];
		$foto_kk = $_FILES['foto_kk'];
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$nama = $this->input->post('nama');
		$umur = $this->input->post('umur');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$provinsi_id = $this->input->post('provinsi_id');
		$kota_kabupaten_id = $this->input->post('kota_kabupaten_id');
		$kecamatan_id = $this->input->post('kecamatan_id');
		$kelurahan_id = $this->input->post('kelurahan_id');
		$alamat = $this->input->post('alamat');
		$penghasilan_sebelum_pandemi = $this->input->post('penghasilan_sebelum_pandemi');
		$penghasilan_setelah_pandemi = $this->input->post('penghasilan_setelah_pandemi');
        $alasan = $this->input->post('alasan');
		if ($foto_ktp = ''){}else{
			$config['upload_path']		= './assets/images/foto';
			$config['allowed_types']	= 'jpg|png|gif';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('foto_ktp')){
				echo "Upload Gagal"; die();
			}else{
				$foto_ktp = $this->upload->data('file_name');
			}
			if ($foto_kk = ''){}else{
				$config['upload_path']		= './assets/images/fotoKK';
				$config['allowed_types']	= 'jpg|png|gif';
	
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('foto_kk')){
					echo "Upload Gagal"; die();
				}else{
					$foto_kk = $this->upload->data('file_name');
				}
			}

		}

		$data = array(
			'nama' => ucwords($nama),
			'nik' => $nik,
			'nomor_kk' => $nomor_kk,
			'foto_ktp' => $foto_ktp,
			'foto_kk' => $foto_kk,
			'umur' => $umur,
			'jenis_kelamin' => $jenis_kelamin,
			'provinsi_id' => $provinsi_id,
			'kota_kabupaten_id' => $kota_kabupaten_id,
			'kecamatan_id' => $kecamatan_id,
			'kelurahan_id' => $kelurahan_id,
			'alamat' => ucwords($alamat),
			'rt' => $rt,
			'rw' => $rw,
			'penghasilan_sebelum_pandemi' => $penghasilan_sebelum_pandemi,
			'penghasilan_setelah_pandemi' => $penghasilan_setelah_pandemi,
            'alasan' => $alasan
		);
		$this->m_penduduk->tambah($data);

		$this->session->set_flashdata('sukses', 'Data Bantuan Sosial ' . $nama . ' berhasil ditambahkan.');
		redirect(base_url('penduduk/tampil'));
	}

	public function edit($nik) {
		$data['title'] = "Edit Bantuan Sosial";
		$data['penduduk'] = $this->m_penduduk->edit($nik);

		$this->load->view('header', $data);
		$this->load->view('penduduk/edit_penduduk');
		$this->load->view('footer');
	}

	public function proses_edit() {

		$nik = $this->input->post('nik');
		$nomor_kk = $this->input->post('nomor_kk');
		$foto_ktp = $_FILES['foto_ktp'];
		$foto_kk = $_FILES['foto_kk'];
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$nama = $this->input->post('nama');
		$umur = $this->input->post('umur');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$provinsi_id = $this->input->post('provinsi_id');
		$kota_kabupaten_id = $this->input->post('kota_kabupaten_id');
		$kecamatan_id = $this->input->post('kecamatan_id');
		$kelurahan_id = $this->input->post('kelurahan_id');
		$alamat = $this->input->post('alamat');
		$penghasilan_sebelum_pandemi = $this->input->post('penghasilan_sebelum_pandemi');
		$penghasilan_setelah_pandemi = $this->input->post('penghasilan_setelah_pandemi');
        $alasan = $this->input->post('alasan');
		if ($foto_ktp == ''){}else{
			$config['upload_path']		= './assets/images/foto';
			$config['allowed_types']	= 'jpg|png|gif';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('foto_ktp')){
				echo "Upload Gagal"; die();
			}else{
				$foto_ktp = $this->upload->data('file_name');
		}
		if ($foto_kk == ''){}else{
				$config['upload_path']		= './assets/images/fotoKK';
				$config['allowed_types']	= 'jpg|png|gif';
	
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('foto_kk')){
					echo "Upload Gagal"; die();
				}else{
					$foto_kk = $this->upload->data('file_name');
				}
		}

		}

		$data = array(
			'nama' => ucwords($nama),
			'nik' => $nik,
			'nomor_kk' => $nomor_kk,
			'foto_ktp' => $foto_ktp,
			'foto_kk' => $foto_kk,
			'umur' => $umur,
			'jenis_kelamin' => $jenis_kelamin,
			'provinsi_id' => $provinsi_id,
			'kota_kabupaten_id' => $kota_kabupaten_id,
			'kecamatan_id' => $kecamatan_id,
			'kelurahan_id' => $kelurahan_id,
			'alamat' => ucwords($alamat),
			'rt' => $rt,
			'rw' => $rw,
			'penghasilan_sebelum_pandemi' => $penghasilan_sebelum_pandemi,
			'penghasilan_setelah_pandemi' => $penghasilan_setelah_pandemi,
            'alasan' => $alasan
		);
		$where = array(
			'nik' => $nik,
		);
		$this->m_penduduk->proses_edit($where, $data);

		$this->session->set_flashdata('sukses', 'Data Bantuan Sosial ' . $nama . ' berhasil diedit.');
		redirect(base_url('penduduk/tampil/' . $nik));
	}

	public function hapus($nik) {
		$this->m_penduduk->hapus($nik);
		$this->session->set_flashdata('sukses', 'Data Bantuan Sosial ' . $nama . ' berhasil dihapus.');
		redirect(base_url('penduduk/tampil'));
	}

	public function detail($nik) {

		$data['title'] = "Detail Bantuan Sosial";
		$this->load->model('m_penduduk');
		$detail = $this->m_penduduk->detail($nik);
		$data['detail'] = $detail;
		$this->load->view('header', $data);
		$this->load->view('penduduk/detail_penduduk', $data);
		$this->load->view('footer');
	}
}