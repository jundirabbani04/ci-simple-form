<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BiodataModel;

class Form extends BaseController
{
    // Shows the form view
    public function index()
    {
        $data = ['activePage' => 'form'];
        return view('form', $data);
    }

    // Handles the form submission
    public function submit()
    {
        // 1. Set up COMPLETE validation rules
        $rules = [
            // Data Pribadi
            'nik' => 'required|exact_length[16]|is_unique[biodata.nik]',
            'nama' => 'required|min_length[3]|max_length[255]',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required|valid_date',
            'jk' => 'required|in_list[1,2]',

            // Alamat
            'alamat_1' => 'required',
            'provinsi' => 'required',
            'kab' => 'required',
            'kec' => 'required',
            'desa' => 'required',
            'rt' => 'required',
            'rw' => 'required',

            // Kontak & Info Lain
            'agama' => 'required',
            'stat_kwn' => 'required',
            'hp1' => 'required',
            'hp2' => 'required',
            'mail' => 'required|valid_email|is_unique[biodata.mail]',

            // Pekerjaan
            'kerja' => 'required',
            'jenis_tmpt_kerja' => 'required',

            // Akun
            'usern' => 'required|min_length[5]|is_unique[biodata.usern]',
            'pasw' => 'required|min_length[8]',

            // Dokumen
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Anda harus mengunggah foto.',
                    'max_size' => 'Ukuran file foto maksimal 1MB.',
                    'is_image' => 'File yang diunggah bukan gambar.',
                ]
            ],

            // Agreement
            'agreement' => 'required',
        ];

        // 2. Run validation
        if (!$this->validate($rules)) {
            // If validation fails, redirect back to the form with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 3. Handle the file upload
        $img = $this->request->getFile('foto');
        $newName = '';
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            // Move the file to the 'writable/uploads' directory
            $img->move(WRITEPATH . 'uploads', $newName);
        }

        // 4. Prepare data to be saved (including hashed password)
        $model = new BiodataModel();
        $data = $this->request->getPost();
        $data['pasw'] = password_hash($this->request->getVar('pasw'), PASSWORD_DEFAULT);
        $data['foto'] = $newName; // Save the new random filename

        // 5. Save data using the model
        $model->save($data);

        return redirect()->to('/')->with('success', 'Pendaftaran berhasil! Data Anda telah disimpan.');
    }
}