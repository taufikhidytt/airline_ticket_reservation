<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customers_model', 'customers_m');
        $this->load->model('pesawat/Pesawat_model', 'pesawat_m');
    }
    public function index()
    {
        $data['title'] = 'Data Customers';
		$data['judul'] = 'Data Customers';
		$data['data'] = $this->customers_m->get()->result();
		$this->template->load('template','index', $data);
    }

    public function add()
	{
		$this->form_validation->set_rules('nama_customers', 'Nama Customers', 'required',
			array(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('alamat_customers', 'Alamat Customers', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('no_hp', 'Keberangkatan Pesawat', 'required|numeric',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
                'numeric'  => '%s Wajib Nomor'
			)
		);
		$this->form_validation->set_rules('no_bangku', 'Tujuan Pesawat', 'required|numeric',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
                'numeric'  => '%s Wajib Nomor',
			)
		);

		$this->form_validation->set_rules('kode_pesawat', 'Kode Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);

		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Add Customers';
			$data['judul'] = 'Add Customers';
            $data['pesawat'] = $this->pesawat_m->get()->result();
			$this->template->load('template', 'add', $data);
		} else {
			$pos = $this->input->post(null, true);
			$this->customers_m->add($pos);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat, Anda Berhasil Menambahkan Data Customers Baru');
				redirect('customers');
			}else{
				$this->session->set_flashdata('error', 'Data Gagal Di Tambahkan');
				redirect('customers');
			}
		}
	}

    public function update($id)
	{
		$this->form_validation->set_rules('nama_customers', 'Nama Customers', 'required',
			array(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('alamat_customers', 'Alamat Customers', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('no_hp', 'Keberangkatan Pesawat', 'required|numeric',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
                'numeric'  => '%s Wajib Nomor'
			)
		);
		$this->form_validation->set_rules('no_bangku', 'Tujuan Pesawat', 'required|numeric',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
                'numeric'  => '%s Wajib Nomor',
			)
		);

		$this->form_validation->set_rules('kode_pesawat', 'Kode Pesawat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);

		
		if ($this->form_validation->run() == FALSE) {
            $id = $this->customers_m->get($id);
            if($id->num_rows() > 0){
                $data['title'] = 'Add Customers';
                $data['judul'] = 'Add Customers';
                $data['data'] = $id->row();
                $data['pesawat'] = $this->pesawat_m->get()->result();
                $this->template->load('template', 'update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Tidak Ditemukan Silahkan Cari Data Yang Sudah Tersedia');
				redirect('customers');
            }
		} else {
			$pos = $this->input->post(null, true);
			$this->customers_m->update($pos);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat, Anda Berhasil Mengupdate Data Customers');
				redirect('customers');
			}else{
				$this->session->set_flashdata('error', 'Data Gagal Di Tambahkan');
				redirect('customers');
			}
		}
	}

    public function del()
	{
		$id = $this->input->post('id_customers');
		$this->customers_m->delete($id);
		// echo "<pre>";
		// var_dump($id);
		// die();
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Anda Berhasil Menghapus Data');
			redirect('customers');
		}else{
			$this->session->set_flashdata('error', 'Gagal Menghapus Data, Silahkan Cek Kembali');
			redirect('customers');
		}
	}
}
?>