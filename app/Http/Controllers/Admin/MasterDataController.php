<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterDataModel;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    //
    public function __construct()
    {
        $this->MasterDataModel = new MasterDataModel();
    }

    public function index() {
        $data = [
            'master_data' => $this->MasterDataModel->allData()
        ];
        return view('Admin.Master.v_Index', $data);
    }

    public function create() {
        return view('Admin.Master.v_Create');
    }

    public function edit($id) {
        $data = [
            'master_data' => $this->MasterDataModel->edit($id)
        ];
        return view('Admin.Master.v_Edit', $data);
    }

    public function store(Request $request) {
        $data = [
            'nama_barang' => $request->nama_barang,
            'harga_jual' => $request->harga_jual,
            'stokakhir' => $request->stokakhir,
            'log' => $request->log
        ];
        $create = $this->MasterDataModel->create($data);
        if ($create) {
            return redirect()->route('admin.master-data.index')->with('success', 'Data berhasil ditambahkan');
        }else {
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
        }
    }

    public function update($id, Request $request) {
        $data = [
            'nama_barang' => $request->nama_barang,
            'harga_jual' => $request->harga_jual,
            'stokakhir' => $request->stokakhir,
            'log' => $request->log
        ];
        $update = $this->MasterDataModel->updateById($id, $data);
        if ($update) {
            return redirect()->route('admin.master-data.index')->with('success', 'Data berhasil diubah');
        }else {
            return redirect()->back()->with('error', 'Data gagal diubah');
        }
    }


    public function view($id) {
        $data = [
            'master_data' => $this->MasterDataModel->view($id)
        ];
        return view('Admin.Master.v_View', $data);
    }


    public function destroy($id) {
        $delete = $this->MasterDataModel->remove($id);
        if ($delete) {
            return redirect()->route('admin.master-data.index')->with('success', 'Data berhasil dihapus');
        }
    }
}
