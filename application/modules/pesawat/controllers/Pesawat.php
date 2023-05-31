<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesawat extends MX_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesawat_model', 'pesawat_m');
	}

	public function index()
	{
		$data['title'] = 'Pesawat';
		$data['judul'] = 'Pesawat';
		$data['data'] = $this->pesawat_m->get()->result();
		$this->template->load('template','index', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('kode_pesawat', 'kode Pesawat', 'required|is_unique[pesawat.kode_pesawat]',
			array(
				'required' => '%s Tidak Boleh Kosong',
				'is_unique' => '%s Sudah Terpakai Oleh Pesawat Lain, Silahkan Cari Kode Baru',
			)
		);
		$this->form_validation->set_rules('nama_pesawat', 'Nama Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('keberangkatan_pesawat', 'Keberangkatan Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('tujuan_pesawat', 'Tujuan Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('waktu_berangkat', 'Waktu Berangkat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('harga', 'Harga Ticket Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);

		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Add Pesawat';
			$data['judul'] = 'Add Pesawat';
			$this->template->load('template', 'add', $data);
		} else {
			$pos = $this->input->post(null, true);
			$this->pesawat_m->add($pos);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat, Anda Berhasil Menambahkan Data Pesawat Baru');
				redirect('pesawat');
			}else{
				$this->session->set_flashdata('error', 'Data Gagal Di Tambahkan');
				redirect('pesawat');
			}
		}
	}

	public function update($id)
	{
		$this->form_validation->CI =& $this;
		$this->form_validation->set_rules('kode_pesawat', 'Kode Pesawat', 'required|callback_kode_check',
			array(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('nama_pesawat', 'Nama Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('keberangkatan_pesawat', 'Keberangkatan Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('tujuan_pesawat', 'Tujuan Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('waktu_berangkat', 'Waktu Berangkat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('harga', 'Harga Ticket Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);

		
		if ($this->form_validation->run() == FALSE) {
			$id = $this->pesawat_m->get($id);
			if($id->num_rows() > 0){
				$data['title'] = 'Update Pesawat';
				$data['judul'] = 'Update Pesawat';
				$data['data'] = $id->row();
				$this->template->load('template', 'update', $data);
			}else{
				$this->session->set_flashdata('warning', 'Data Tidak Ditemukan Silahkan Cari Data Yang Sudah Tersedia');
				redirect('pesawat');
			}
		} else {
			$pos = $this->input->post(null, true);
			$this->pesawat_m->update($pos);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat, Anda Berhasil Mengupdate Data Pesawat');
				redirect('pesawat');
			}else{
				$this->session->set_flashdata('error', 'Data Gagal Di Tambahkan');
				redirect('pesawat');
			}
		}
	}

	function kode_check()
	{
		$pos = $this->input->post(null, true);
		$query = $this->db->query("SELECT * FROM PESAWAT WHERE kode_pesawat = '$pos[kode_pesawat]' AND id_pesawat != '$pos[id_pesawat]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('kode_check', '{field} sudah ada, silahkan cari {field} lain');
			return false;
		}else{
			return true;
		}
	}

	public function del()
	{
		$id = $this->input->post('id_pesawat');
		$this->pesawat_m->delete($id);
		$error = $this->db->error();
		if($error['code'] != 0 ){
			$this->session->set_flashdata('warning', 'Data Tidak Bisa Di Hapus, Pesawat Masih Memiliki Customers. Silahkan Cek Kembali Data Customers');
			redirect('pesawat');
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Anda Berhasil Menghapus Data');
			redirect('pesawat');
		}else{
			$this->session->set_flashdata('error', 'Gagal Menghapus Data, Silahkan Cek Kembali');
			redirect('pesawat');
		}
	}
}
