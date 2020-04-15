<?php
//  berfungsi untuk melayani segala query CRUD database
class M_data_jenispaket extends CI_Model
{
    // function untuk mengambil keseluruhan baris data dari tabel user
    public function tampil_data()
    {
        return $this->db->get('jenis_paket');
    }
    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function getEdit($where, $table)
    {
    return $this->db->get_where($table, $where);
    }

    public function getId()
    {
        return $this->db->query("SELECT * FROM jenis_paket ORDER BY id_jenis_paket DESC LIMIT 1");
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
