<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->join('pesawat', 'pesawat.id_pesawat = customers.id_pesawat');
        if($id){
            $this->db->where('id_customers', $id);
        }
        $this->db->where('customers.deleted_at', null);
        $data = $this->db->get();
        return $data;
    }

    public function add($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $params = [
            'nama_customers'   => htmlspecialchars(strtolower($data['nama_customers'])),
            'alamat_customers' => htmlspecialchars($data['alamat_customers']),
            'no_hp'            => htmlspecialchars($data['no_hp']),
            'no_bangku'        => htmlspecialchars($data['no_bangku']),
            'id_pesawat'       => htmlspecialchars($data['id_pesawat']),
            'created_at'       => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('customers', $params);
    }

    public function update($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $params = [
            'nama_customers'   => htmlspecialchars(strtolower($data['nama_customers'])),
            'alamat_customers' => htmlspecialchars($data['alamat_customers']),
            'no_hp'            => htmlspecialchars($data['no_hp']),
            'no_bangku'        => htmlspecialchars($data['no_bangku']),
            'id_pesawat'       => htmlspecialchars($data['id_pesawat']),
            'created_at'       => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_customers', $data['id_customers']);
        $this->db->update('customers', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_customers', $id);
        $this->db->delete('customers');
    }
}
?>