<?php

namespace App\Models;

use CodeIgniter\Model;


class SmModel extends Model
{
    protected $table      = 'surat_masuk';
    protected $primaryKey = 'id_masuk';
    protected $useTimestamps = True;
    protected $allowedFields = ['no_surat', 'no_agenda', 'tgl_surat', 'id_jenis', 'id_sifat', 'surat_dari', 'surat_untuk', 'tgl_terima', 'perihal', 'dokumen', 'slug'];

    public function getSm($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_masuk' => $id])->first();
    }

    public function getAll()
    {
        $builder = $this->db->table("surat_masuk");
        // $builder->select('*');
        $builder->join('sifat_surat', 'sifat_surat.id_sifat = surat_masuk.id_sifat');
        $builder->join('jenis_surat', 'jenis_surat.id_jenis = surat_masuk.id_jenis');
        $sifat = $builder->get()->getResult();
        return $sifat;
    }
}
