<?php namespace App\Controllers;
use App\Models\M_kendaraan;


class Parkiran extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

    public function showVip()
    {
        $car = new M_kendaraan();
        $vip = $car->getVip();
        $data =[
            'vip' => $vip
        ];
        return view('parkiran/v_parkiran_vip', $data);
    }

    public function showDireksi()
    {
        $car = new M_kendaraan();
        $direksi = $car->getDireksi();
        $data =[
            'direksi' => $direksi
        ];
        return view('parkiran/v_parkiran_direksi', $data);
    }

    public function showDivisi()
    {
        $car = new M_kendaraan();
        $divisi = $car->getDivisi();
        $data =[
            'divisi' => $divisi
        ];
        return view('parkiran/v_parkiran_divisi', $data);
    }

    public function showDepartemen()
    {
        $car = new M_kendaraan();
        $departemen = $car->getDepartemen();
        $data =[
            'departemen' => $departemen
        ];
        return view('parkiran/v_parkiran_departemen', $data);
    }

    public function addVip()
    {
        return view('parkiran/v_add_vip');
    }

    public function addDireksi()
    {
        return view('parkiran/v_add_direksi');
    }

    public function addDivisi()
    {
        return view('parkiran/v_add_divisi');
    }

    public function addDepartemen()
    {
        return view('parkiran/v_add_departemen');
    }

    public function deleteCar($no_plat)
    {
        $car = new M_kendaraan();
        $delete = $car->deleteCar($no_plat);
    }

    public function addDeptAction()
    {
        $no_plat = $this->request->getPost('no_plat');
        $nama_pemilik = $this->request->getPost('nama_pemilik');
        $jabatan = $this->request->getPost('jabatan');
        $car = new M_kendaraan();

        // $add = $car->addDept($no_plat, $nama_pemilik, $jabatan)->getResult();
        $add = $car->addDept($no_plat, $nama_pemilik, $jabatan);
        if ($add) {
            return redirect()->to(base_url('/departemen'));
        } else {
            echo"inputan gagal";
        }
    }

    public function editDept($no_plat)
    {
        $car = new M_kendaraan();
        $res = $car->getDeptByPlat($no_plat);

        if ($res) {
            $data = ['res' => $res[0]];
            return view('parkiran/v_edit_departemen', $data);
        }
    }

    public function updateDept($id)
    {
        $no_plat = $this->request->getPost('no_plat');
        $nama_pemilik = $this->request->getPost('nama_pemilik');
        $jabatan = $this->request->getPost('jabatan');
        $car = new M_kendaraan();

        $data = [
            'no_plat' => $no_plat,
            'nama_pemilik' => $nama_pemilik,
            'jabatan' => $jabatan,
        ];
        $update = $car->updateDept($data, $id);

        if ($update) {
            echo "data berhasil diupdate";
            return redirect()->to(base_url('Parkiran/showDepartemen'));
        } else {
            echo "Update gagal";

        }

    }

    public function editVip()
    {
        return view('parkiran/v_edit_vip');
    }


}
