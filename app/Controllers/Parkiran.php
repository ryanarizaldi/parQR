<?php namespace App\Controllers;
use App\Models\M_kendaraan;
include "qrcode/qrlib.php";



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

    public function addDirAction()
    {
        $no_plat = $this->request->getPost('no_plat');
        $nama_pemilik = $this->request->getPost('nama_pemilik');
        $jabatan = $this->request->getPost('jabatan');
        $car = new M_kendaraan();

        // $add = $car->addDept($no_plat, $nama_pemilik, $jabatan)->getResult();
        $add = $car->addDir($no_plat, $nama_pemilik, $jabatan);
        if ($add) {
            return redirect()->to(base_url('/direksi'));
        } else {
            echo"inputan gagal";
        }
    }

    public function addVipAction()
    {
        $no_plat = $this->request->getPost('no_plat');
        $nama_pemilik = $this->request->getPost('nama_pemilik');
        $jabatan = $this->request->getPost('jabatan');
        $car = new M_kendaraan();

        // $add = $car->addDept($no_plat, $nama_pemilik, $jabatan)->getResult();
        $add = $car->addVip($no_plat, $nama_pemilik, $jabatan);
        if ($add) {
            return redirect()->to(base_url('/vip'));
        } else {
            echo"inputan gagal";
        }
    }

    public function addDivAction()
    {
        $no_plat = $this->request->getPost('no_plat');
        $nama_pemilik = $this->request->getPost('nama_pemilik');
        $jabatan = $this->request->getPost('jabatan');
        $car = new M_kendaraan();

        // $add = $car->addDept($no_plat, $nama_pemilik, $jabatan)->getResult();
        $add = $car->addDiv($no_plat, $nama_pemilik, $jabatan);
        if ($add) {
            return redirect()->to(base_url('/divisi'));
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
    public function editDiv($no_plat)
    {
        $car = new M_kendaraan();
        $res = $car->getDeptByPlat($no_plat);

        if ($res) {
            $data = ['res' => $res[0]];
            return view('parkiran/v_edit_divisi', $data);
        }
    }
    public function editDir($no_plat)
    {
        $car = new M_kendaraan();
        $res = $car->getDeptByPlat($no_plat);

        if ($res) {
            $data = ['res' => $res[0]];
            return view('parkiran/v_edit_direksi', $data);
        }
    }
    public function editVip($no_plat)
    {
        $car = new M_kendaraan();
        $res = $car->getDeptByPlat($no_plat);

        if ($res) {
            $data = ['res' => $res[0]];
            return view('parkiran/v_edit_vip', $data);
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
    public function updateDir($id)
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
            return redirect()->to(base_url('Parkiran/showDireksi'));
        } else {
            echo "Update gagal";
        }
    }
    public function updateDiv($id)
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
            return redirect()->to(base_url('Parkiran/showDivisi'));
        } else {
            echo "Update gagal";
        }
    }
    public function updateVip($id)
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
            return redirect()->to(base_url('Parkiran/showVip'));
        } else {
            echo "Update gagal";
        }
    }


    public function printBarcode($no_plat)
    {

        
        // $no_rekening="123414512400912312";
        // $nama="agoes tinus psdfmsdf asdfaasdf asdfadf asdfasfda asdfasfsd";
        // $pjw="agustinus pamungkas sumardjono";
        // $tgl="2021-12-01";
        // $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
        // if (!file_exists($tempdir)) //Buat folder bername temp
        //     mkdir($tempdir);

        //     QRcode::png("$no_rekening $nama $pjw $tgl", $tempdir.'007_4.png', QR_ECLEVEL_L, 10, 10);
            
        //     echo "<table>";
        //     echo "<tr><td>";
        //     echo '<img src="'.$tempdir.'007_4.png" />'; 
        //     echo"</td><td><font size='2'>$no_rekening<br>$nama<br>$pjw<br>$tgl</font></td>";
        //     echo"</tr>";
        //     echo"</table";
            
        //     echo "halo";
        $car = new M_kendaraan;
        $res = $car->getDeptByPlat($no_plat);
        $data = [
            'no_plat' => $res[0]['no_plat'],
            'nama_pemilik' => $res[0]['nama_pemilik'],
            'jabatan' => $res[0]['jabatan'],
        ];


        return view('tes_qrcode', $data);
    }


}
