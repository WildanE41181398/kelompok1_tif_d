<?php
//  berfungsi untuk melayani segala query CRUD database
class M_durasipaket extends CI_Model
{
    // function untuk mengambil keseluruhan baris data dari tabel user
    public function tampil_data()
    {
        return $this->db->get('durasi_paket');
    }

    public function get_table()
    {
        $sql = $this->db->get('durasi_paket');

        return $sql->result_array();
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function getId()
    {
        return $this->db->query("SELECT * FROM durasi_paket ORDER BY id_durasi DESC LIMIT 1");
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
