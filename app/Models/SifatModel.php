<?php

namespace App\Models;

use CodeIgniter\Model;

class SifatModel extends Model
{
    protected $table = 'sifat_surat';
    protected $primaryKey = 'id_sifat';
    protected $useTimestamps = true;
    protected $allowedFields = ['sifat'];

    public function getSifat($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_sifat' => $id])->first();
    }

    public function jumlahSifat($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['sifat' => $id])->countAllResults();
    }
}
