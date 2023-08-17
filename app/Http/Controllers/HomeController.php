<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\wajibPajak;
use App\Models\objekPajak;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $wajibPajak = wajibPajak::all();
    //     $objekPajak = objekPajak::all();
    //     return view('admin.index', compact('wajibPajak', 'objekPajak'),);
    // }
    public function index()
    {

        $wajibPajak = wajibPajak::latest();
        $objekPajak = objekPajak::all();

        return view('admin.index', compact('objekPajak'), ["wajibPajak" => $wajibPajak->filter(request(['search']))->paginate(8)->withQueryString()]);
    }
    public function showWp(wajibPajak $wajibPajak)
    {
        return view('admin.showWp', compact('wajibPajak'));
    }

    public function showOp(objekPajak $objekPajak)
    {
        return view('/admin.showOp', compact('objekPajak'));
    }

    public function show()
    {
        return view('show');
    }
    // public function showOp()
    // {
    //     return view('showOp');
    // }
    public function show2()
    {
        return view('show2');
    }

    // public function showWp()
    // {
    //     return view('admin.show-wp');
    // }
    // public function showOp()
    // {
    //     return view('admin.show-op');
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editWp(wajibPajak $wajibPajak)
    {
        $kecamatan_wp = Kecamatan::all();
        return view('admin.editWp', compact('wajibPajak', 'kecamatan_wp'));
    }

    // public function editWp(wajibPajak $wajibPajak)
    // {
    //     return view('admin.editWp', compact('wajibPajak'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateWp(Request $request, wajibPajak $wajibPajak)
    {
        $request->validate([
            'tanggal' => 'required',
            'jenis_daftar_wp' => 'required',
            'bidang_usaha_wp' => 'required',
            'nik_npwp_wp' => 'required|digits_between:15,16',
            'nama_wp' => 'required',
            'alamat_wp' => 'required',
            'rt_wp' => 'required|digits:3',
            'rw_wp' => 'required|digits:3',
            'kabupaten_kota_wp' => 'required',
            'no_telp_wp' => 'required|digits_between:10,12',
            'no_hp_wp' => 'required|digits_between:10,12',
            'email_wp' => 'required|unique:App\Models\wajibPajak,email',
            'kode_pos_wp' => 'required|digits:5',
            'kecamatan_wp' => 'required_if:kecamatan2_wp,null',
            'kelurahan_wp' => 'required_if:kelurahan2_wp,null',
            'kecamatan2_wp' => 'required_if:kecamatan_wp,null',
            'kelurahan2_wp' => 'required_if:kelurahan_wp,null'
        ], [
            'nik_npwp_wp.required' => 'NIK atau NPWP tidak boleh kosong',
            'nik_npwp_wp.digits_between' => 'Digit NIK atau NPWP antara 15-16 digit',
            'jenis_daftar_wp.required' => 'Jenis Pendaftaran harus dipilih',
            'bidang_usaha_wp.required' => 'Bidang Usaha harus dipilih',
            'nama_wp.required' => 'Nama tidak boleh kosong',
            'alamat_wp.required' => 'Alamat tidak boleh kosong',
            'no_telp_wp.required' => 'Nomor Telepon tidak boleh kosong',
            'no_telp_wp.digits_between' => 'Digit nomor telepon antara 10-12 digit',
            'no_hp_wp.digits_between' => 'Digit nomor hp antara 10-12 digit',
            'rt_wp.required' => 'RT tidak boleh kosong',
            'rw_wp.required' => 'RW tidak boleh kosong',
            'rt_wp.digits' => 'RT harus angka 3 digit',
            'rw_wp.digits' => 'RW harus angka 3 digit',
            'no_hp_wp.required' => 'Nomor Handphone tidak boleh kosong',
            'kabupaten_kota_wp.required' => 'Kabupaten/Kota tidak boleh kosong',
            'email_wp.required' => 'Email tidak boleh kosong',
            'email_wp.unique' => 'Email yang anda masukkan sudah terdaftar',
            'kode_pos_wp.required' => 'Kode Pos tidak boleh kosong',
            'kode_pos_wp.digits' => 'Kode Pos harus angka 5 digit',
            'kecamatan_wp.required_if' => 'Kecamatan harus dipilih',
            'kelurahan_wp.required_if' => 'Kelurahan harus dipilih',
            'kecamatan2_wp.required_if' => 'Kecamatan tidak boleh kosong',
            'kelurahan2_wp.required_if' => 'Kelurahan tidak boleh kosong'
        ]);
        if (isset($request->kecamatan_wp) && isset($request->kelurahan_wp) && !isset($request->kecamatan2_wp) && !isset($request->kelurahan2_wp)) {
            wajibPajak::where('id', $wajibPajak->id)
                ->update([
                    'tanggal' => $request->tanggal,
                    'jenis_daftar' => $request->jenis_daftar_wp,
                    'bidang_usaha' => $request->bidang_usaha_wp,
                    'nik_npwp' => $request->nik_npwp_wp,
                    'nama' => $request->nama_wp,
                    'alamat' => $request->alamat_wp,
                    'rt' => $request->rt_wp,
                    'rw' => $request->rw_wp,
                    'kecamatan' => $request->kecamatan_wp,
                    'kelurahan' => $request->kelurahan_wp,
                    'kabupaten_kota' => $request->kabupaten_kota_wp,
                    'no_telp' => $request->no_telp_wp,
                    'no_hp' => $request->no_hp_wp,
                    'email' => $request->email_wp,
                    'kode_pos' => $request->kode_pos_wp
                ]);
        }
        if (isset($request->kecamatan2_wp) && isset($request->kelurahan2_wp) && !isset($request->kecamatan_wp) && !isset($request->kelurahan_wp)) {
            wajibPajak::where('id', $wajibPajak->id)
                ->update([
                    'tanggal' => $request->tanggal,
                    'jenis_daftar' => $request->jenis_daftar_wp,
                    'bidang_usaha' => $request->bidang_usaha_wp,
                    'nik_npwp' => $request->nik_npwp_wp,
                    'nama' => $request->nama_wp,
                    'alamat' => $request->alamat_wp,
                    'rt' => $request->rt_wp,
                    'rw' => $request->rw_wp,
                    'kecamatan' => $request->kecamatan2_wp,
                    'kelurahan' => $request->kelurahan2_wp,
                    'kabupaten_kota' => $request->kabupaten_kota_wp,
                    'no_telp' => $request->no_telp_wp,
                    'no_hp' => $request->no_hp_wp,
                    'email' => $request->email_wp,
                    'kode_pos' => $request->kode_pos_wp
                ]);
        }
        return redirect('/admin')->with('status', 'Data Wajib Pajak Berhasil Diubah!');
    }

    // Di bawah ini Belum Semua

    public function editOp(Request $request, objekPajak $objekPajak)
    {

        return view('admin.editOp', compact('objekPajak'));
    }

    public function updateOp(Request $request, objekPajak $objekPajak)
    {
        $request->validate(
            [
                'jenis_pajak' => 'required_if:jenis_pajak,null',
                'bidang_usaha' => 'required_if:bidang_usaha,null',
                'nomor' => 'required|digits_between:5,20',
                'nama_op' => 'required',
                'alamat_op' => 'required',
                'rt_op' => 'required|digits:3',
                'rw_op' => 'required|digits:3',
                'kecamatan_op' => 'required',
                'kelurahan_op' => 'required',
                'no_telp_op' => 'required|digits_between:10,12',
                'no_hp_op' => 'required|digits_between:10,12',
                'kode_pos_op' => 'required|digits:5',
                'nama_pj' => 'required',
                'alamat_pj' => 'required'
            ],
            [
                'nomor.required' => 'Nomor tidak boleh kosong',
                'nomor.digits_between' => 'Digit Nomor tidak antara 5-20 digit',
                'jenis_pajak.required_if' => 'Jenis Pajak harus dipilih',
                'bidang_usaha.required_if' => 'Bidang Usaha harus dipilih',
                'nama_op.required' => 'Nama tidak boleh kosong',
                'alamat_op.required' => 'Alamat tidak boleh kosong',
                'no_telp_op.digits_between' => 'Digit nomor telepon antara 10-12 digit',
                'no_hp_op.digits_between' => 'Digit nomor hp antara 10-12 digit',
                'no_telp_op.required' => 'Nomor Telepon tidak boleh kosong',
                'rt_op.required' => 'RT tidak boleh kosong',
                'rw_op.required' => 'RW tidak boleh kosong',
                'rt_op.digits' => 'RT harus angka 3 digit',
                'rw_op.digits' => 'RW harus angka 3 digit',
                'no_hp_op.required' => 'Nomor Handphone tidak boleh kosong',
                'kode_pos_op.required' => 'Kode Pos tidak boleh kosong',
                'kode_pos_op.digits' => 'Kode Pos harus angka 5 digit',
                'kecamatan_op.required' => 'Kecamatan harus dipilih',
                'kelurahan_op.required' => 'Kelurahan harus dipilih',
                'nama_pj.required' => 'Nama Penanggung Jawab harus diisi',
                'alamat_pj.required' => 'Alamat Penanggung Jawab harus diisi'
            ]
        );

        objekPajak::where('id', $objekPajak->id)
            ->update([
                'jenis_pajak' => $request->jenis_pajak,
                'bidang_usaha' => $request->bidang_usaha,
                'nomor' => $request->nomor,
                'nama' => $request->nama_op,
                'alamat' => $request->alamat_op,
                'rt' => $request->rt_op,
                'rw' => $request->rw_op,
                'kecamatan' => $request->kecamatan_op,
                'kelurahan' => $request->kelurahan_op,
                'no_telp' => $request->no_telp_op,
                'no_hp' => $request->no_hp_op,
                'kode_pos' => $request->kode_pos_op,
                'nama_pj' => $request->nama_pj,
                'alamat_pj' => $request->alamat_pj
            ]);
        return redirect('/admin/editUploadFile')->with('status', 'Data Objek Pajak Berhasil Diubah!');
    }

    public function editUf(Request $request, objekPajak $objekPajak)
    {

        return view('admin.editUf', compact('objekPajak'));
    }

    public function updateUf(Request $request, objekPajak $objekPajak)
    {

        return redirect('/admin')->with('status', 'Data Objek Pajak Berhasil Diubah!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyWp(wajibPajak $wajibPajak)
    {
        wajibPajak::destroy($wajibPajak->id);
        return redirect('/admin')->with('status', 'Data Wajib Pajak Berhasil Dihapus!');
    }

    public function destroyOp(objekPajak $objekPajak)
    {
        objekPajak::destroy($objekPajak->id);
        return redirect('/admin')->with('status', 'Data Objek Pajak Berhasil Dihapus!');
    }
}
