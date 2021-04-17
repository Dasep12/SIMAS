<?php

class Upload extends CI_Controller
{
    private $filename = "upload_data";

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata("id"))) {
            redirect("Logout");
        }
    }

    public function index()
    {
        $data = array();
        if (isset($_POST['submit'])) {
            $upload = $this->m_inventori->uploadfile($this->filename);
            if ($upload['result'] == "success") {
                // Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('assets/upload/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                $data['sheet'] = $sheet;
            } else {
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }
        $data['title']  = 'Upload';
        $data['user']   = $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row();
        $this->template->load('template/template', 'upload', $data);
    }

    public function posting()
    {

        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('assets/upload/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        $numrow = 1;
        $data = array();
        $cek = array();
        foreach ($sheet as $row) {
            if ($numrow > 1) {
                //cek kode barang sudah terdaftar apa belum di master barang
                $cek = $this->m_inventori->getData(array("kode_brg" => $row['C']), "tbl_barang")->num_rows();
                if ($cek > 0) {
                    $this->session->set_flashdata("error", "Kode Barang " . $row['C'] . " Sudah Terdaftar di Master Barang");
                    redirect("Upload");
                } else {
                    // push data
                    array_push($data, array(
                        'nama_brg'  => $row['B'],
                        'kode_brg'  => $row['C'],
                        'kategori'  => $row['D'],
                        'tgl_beli'  => $row['E'],
                        'status'    => $row['F'],
                        'kondisi'   => $row['G'],
                        'posisi'    => $row['H'],
                    ));
                }
            }
            $numrow++; // Tambah 1
        }

        if ($cek > 0) {
            echo "";
        } else {
            $input = $this->m_inventori->inputArray("tbl_barang", $data);
            if ($input == true) {
                $this->session->set_flashdata("success", "Data Barang tersimpan di master");
                redirect("Upload");
            } else {
                echo "Gagal";
            }
        }
    }
}
