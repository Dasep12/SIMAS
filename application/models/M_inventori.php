<?php

class M_inventori extends CI_Model
{

    public function getData($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function get($table)
    {
        return $this->db->get($table);
    }

    //delete data
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    //input data
    public function input($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }
    //input data dari excel dengan metode array()
    public function inputArray($data, $table)
    {
        return $this->db->insert_batch($data, $table);
    }

    //update data di database
    public function update($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }


    //tarik laporan 
    public function cetakReport($start, $end)
    {
        $this->db->where('tgl_pinjam >=', $start);
        $this->db->where('tgl_pinjam <=', $end);
        $this->db->where("status", "selesai");
        return $this->db->get("tbl_peminjam");
    }

    //upload data barang
    public function uploadfile($filename)
    {
        $this->load->library('upload');
        $config['upload_path']        = './assets/upload/';
        $config['allowed_types']      = 'xlsx';
        $config['max_size']           = '12048';
        $config['overwrite']          = true;
        $config['file_name']          = $filename;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            //jik berhasil
            $return = array('result' => 'success', 'file'    => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'gagal', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    //hitung peminjam yang telat mengembalikan
    public function range()
    {
        $query = $this->db->query("SELECT 
        CASE  
         WHEN selisih < 0 THEN selisih 
         WHEN selisih = 0  THEN 0 
         WHEN selisih > 0  THEN 0 
        END  AS hari_terlambat ,
        COUNT(IF (selisih < 0 , 1 , NULL) )  AS jumlah  
        FROM (SELECT id, tgl_kembali
          ,CURDATE() AS tgl_sekarang
          ,DATEDIFF(tgl_kembali, CURDATE()) AS selisih
           FROM pinjam_brg  where status = 'dipinjam' ) AS dummy_table");
        return $query->row();
    }

    //hitung peminjam yang telat mengembalikan
    public function dataTerlambat()
    {
        $query = $this->db->query("SELECT *  ,
        CASE  
         WHEN selisih < 0 THEN selisih  
        END  AS hari_terlambat 
        FROM ( SELECT *
          ,CURDATE() AS tgl_sekarang
          ,DATEDIFF(tgl_kembali, CURDATE()) AS selisih
           FROM pinjam_brg WHERE CURDATE() > tgl_kembali and status = 'dipinjam' ) AS dummy_table");
        return $query->result();
    }
}
