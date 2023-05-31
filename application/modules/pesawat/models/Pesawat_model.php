<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesawat_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('pesawat');
        if($id){
            $this->db->where('id_pesawat', $id);
        }
        $this->db->where('deleted_at', null);
        $data = $this->db->get();
        return $data;
    }

    public function add($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $params = [
            'kode_pesawat'          => htmlspecialchars(strtolower($data['kode_pesawat'])),
            'nama_pesawat'          => htmlspecialchars($data['nama_pesawat']),
            'keberangkatan_pesawat' => htmlspecialchars($data['keberangkatan_pesawat']),
            'tujuan_pesawat'        => htmlspecialchars($data['tujuan_pesawat']),
            'waktu_berangkat'       => htmlspecialchars($data['waktu_berangkat']),
            'harga'                 => htmlspecialchars($data['harga']),
            'created_at'            => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('pesawat', $params);
    }

    public function update($pos)
    {
        date_default_timezone_set('Asia/Jakarta');
        $params = array(
            'kode_pesawat'           =>  $pos['kode_pesawat'],
            'nama_pesawat'           =>  $pos['nama_pesawat'],
            'keberangkatan_pesawat'  =>  $pos['keberangkatan_pesawat'],
            'tujuan_pesawat'         =>  $pos['tujuan_pesawat'],
            'waktu_berangkat'        =>  $pos['waktu_berangkat'],
            'harga'                  =>  $pos['harga'],
            'updated_at'             =>  date('Y-m-d H:i:s')
        );
        $this->db->where('id_pesawat', $pos['id_pesawat']);
        $this->db->update('pesawat', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_pesawat', $id);
        $this->db->delete('pesawat');
    }
}
?>