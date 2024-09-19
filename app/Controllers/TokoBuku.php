<?php

namespace App\Controllers;

use App\Models\BukuModel;

class TokoBuku extends BaseController
{
    public function index()
    {
    }

    //Function sederhana untuk menampilkan data array dalam format JSON
    public function showSimpleJson()
    {
        // Data array sederhana
        $data = [
        'id' => 1,
        'judul' => 'dia angkasa',
        'kategori' => 'fiksi',
        'harga' => '99000',
        'stok' => '5'
        ];
       
        // Mengambil response dalam format JSON
        return $this->response->setJSON($data);
    }

    // method untuk menampilkan data admin dalam bentuk JSON
    public function getTokoBukuDataJson()
    {
        // Memanggil  model toko buku model
        $tokobukumodel = new TokoBukuData();

        // Mengambil data dari tabel tb_buku
        $tokobuku = $tokobukumodel->getTokoBukuData();

        //Memanggil data dalam format JSON
        return $this->response->setJSON($tokobuku);
    }

    // Function untuk menyimpan data dengan output JSON
    public function storeData()
    {
        // Memanggil model TokoBukuModel
        $tokobukuModel = new TokoBukuModel();

        // Mendapatkan data input dari request
        $data = [
            'id' => $this->request->get('id',),
            'judul' => $this->request->get('judul',),
            'kategori' => $this->request->get('kategori',),
            'harga' => $this->request->get('harga',),
            'stok' => $this->request->get('stok',)

        ];

        // Menyimpan data ke dalam database
        if ($tokobukuModel->insert($data)) {
            // Jika berhasil menyimpan data, kirimkan respon JSON
            return $this->response->setJSON([
                'message' => 'Berhasil menyimpan data',
                'status' => 1 // atau TRUE
            ]);
        } else {
            // jika gagal menyimpan data, kirimkan response JSON dengan status gagal
            return $this->response->setJSON([
                'message' => 'Gagal menyimpan data',
                'status' => 1 // atau FALSE
            ]);
        }
    }

    
    // Method untuk mengupdate data admin
    public function update($id)
    {
        //$idAdmin = $this->request->getGet('id');
        // Memanggil model AdminModel
        $TokoBukuModel = new AdminModel();

        // Mengambil data input dari request
        $data = [
            'id' => $this->request->getPost('id'),
            'judul' => $this->request->getPost('judul'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'tgl_update' => date('Y-m-d H:i:s') // Mengisi dengan tanggal dan waktu saat ini
        ];

        // Update data admin berdasarkan id
        if ($adminModel->updateTokoBukuData($id, $data)) {
            // Jika berhasil update
            return $this->response->setJSON([
                'message' => 'Berhasil memperbarui data',
                'status' => 1
            ]);
        } else {
            // Jika gagal update
            return $this->response->setJSON([
                'message' => 'Gagal memperbarui data',
                'status' => 0
            ]);
        }
    }

    // Method untuk menghapus data admin
    public function delete($id)
    {
        //$idAdmin = $this->request->getGet('id');
        // Memanggil model TokoBukuModel
        $adminModel = new TokoBukuModel();

        // Menghapus data admin berdasarkan id
        if ($adminModel->deleteAdmin($id)) {
            // Jika berhasil dihapus
            return $this->response->setJSON([
                'message' => 'Berhasil menghapus data',
                'status' => 1
            ]);
        } else {
            // Jika gagal dihapus
            return $this->response->setJSON([
                'message' => 'Gagal menghapus data',
                'status' => 0
            ]);
        }
    }
}