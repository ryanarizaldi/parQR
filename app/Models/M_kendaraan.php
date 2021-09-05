<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_kendaraan extends Model
{
    protected $table = 'kendaraan';
    // protected $allowedFields = ['user_name','user_email','user_password','user_created_at'];
    public function getVip()
    {
        return $this->query("SELECT * from kendaraan where jabatan like '%vip%'")->getResultArray();
    }

    public function getDireksi()
    {
        return $this->query("SELECT * from kendaraan where jabatan like '%direksi%'")->getResultArray();
    }

    public function getDivisi()
    {
        return $this->query("SELECT * from kendaraan where jabatan like '%divisi%'")->getResultArray();
    }

    public function getDepartemen()
    {
        return $this->query("SELECT * from kendaraan where jabatan like '%departemen%'")->getResultArray();
    }

    public function deleteCar($id)
    {
        return $this->db->table($this->table)->delete(['no_plat' => $id]);
    }

    public function addDept($no_plat, $nama_pemilik, $jabatan)
    {
        // return $this->query("INSERT INTO `kendaraan` VALUES ('$no_plat', '$nama_pemilik', 'Kepala Departemen $jabatan')");
        $data = [
            'no_plat' => $no_plat,
            'nama_pemilik' => $nama_pemilik,
            'jabatan' => "Kepala Departemen $jabatan",
        ];
        return $this->db->table($this->table)->insert($data);
    }

    public function updateDept($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['no_plat' => $id]);
    }

    public function getDeptByPlat($no_plat)
    {
        return $this->query("SELECT * from kendaraan where no_plat = '$no_plat'")->getResultArray();

    }
}

