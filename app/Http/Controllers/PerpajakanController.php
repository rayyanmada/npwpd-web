<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\wajibPajak;
use App\Models\objekPajak;
use App\Models\jenisPajak;
use App\Models\bidangUsaha;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class PerpajakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    // public function indexAdminOp()
    // {
    //     $wajibPajak = wajibPajak::all();
    //     $objekPajak = objekPajak::all();
    //     return view('admin.index-op', compact('wajibPajak', 'objekPajak'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createWp(Request $request)
    {
        // $request->session()->flush('formulir');
        // $request->session()->flush('formulir2');
        $kecamatan_wp = Kecamatan::all();
        $kelurahan_wp = Kelurahan::all();
        $data['formulir'] = $request->session()->get('formulir');
        return view('perpajakan.create-wp', compact('kecamatan_wp', 'kelurahan_wp'), $data);
    }

    public function cariKelurahan($id)
    {
        echo json_encode(Kelurahan::where('id_kecamatan', $id)->get());
    }

    public function cariBidangUsaha($id)
    {
        echo json_encode(bidangUsaha::where('id_jenis_pajak', $id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWp(Request $request)
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

        if (empty($request->session()->get('formulir'))) {
            $formulir = new wajibPajak();
            if (isset($request->kecamatan_wp) && isset($request->kelurahan_wp) && !isset($request->kecamatan2_wp) && !isset($request->kelurahan2_wp)) {
                $formulir->fill([
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
                $formulir->fill([
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
            $request->session()->put('formulir', $formulir);
        } else {
            $formulir = $request->session()->get('formulir');
            if (isset($request->kecamatan_wp) && isset($request->kelurahan_wp) && !isset($request->kecamatan2_wp) && !isset($request->kelurahan2_wp)) {

                $formulir->fill([
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
            } else if (isset($request->kecamatan2_wp) && isset($request->kelurahan2_wp) && !isset($request->kecamatan_wp) && !isset($request->kelurahan_wp)) {
                $formulir->fill([
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
            $request->session()->put('formulir', $formulir);
        }
        // dd($formulir);
        return redirect('/perpajakan/objekpajak');
    }

    public function createOp(Request $request)
    {
        $bidang_usaha = bidangUsaha::all();
        $jenis_pajak = jenisPajak::all();
        $kecamatan_op = Kecamatan::all();
        $kelurahan_op = Kelurahan::all();
        $data['formulir2'] = $request->session()->get('formulir2');
        return view('perpajakan.create-op', compact('kecamatan_op', 'kelurahan_op', 'jenis_pajak', 'bidang_usaha'), $data);
    }

    public function storeOp(Request $request)
    {
        $request->validate([
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
        ], [
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

        ]);
        if (empty($request->session()->get('formulir2'))) {
            $formulir = new objekPajak();
            $formulir->fill([
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
            $request->session()->put('formulir2', $formulir);
        } else {
            $formulir = $request->session()->get('formulir2');
            $formulir->fill([
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
            $request->session()->put('formulir2', $formulir);
        }
        // dd($formulir);
        // dump($formulir2);
        return redirect('/perpajakan/uploadfile');
    }

    public function createUf(Request $request)
    {
        $data['formulir2'] = $request->session()->get('formulir2');
        return view('perpajakan.uploadfile', $data);
    }

    public function storeUf(Request $request)
    {
        $formulir = $request->session()->get('formulir2');
        if (!isset($formulir->Ktp)) {
            $request->validate([
                'ktp' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ], [
                'ktp.required' => 'Foto KTP harus di upload'
            ]);
            $namaKtp = "KTP-" . time() . '.' . request()->ktp->getClientOriginalExtension();
            $request->ktp->storeAs('ktp', $namaKtp);
            $formulir = $request->session()->get('formulir2');
            $formulir->ktp = 'ktp/' . $namaKtp;
            $request->session()->put('formulir2', $formulir);
        }
        if (!isset($formulir->Sku)) {
            $request->validate([
                'sku' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ], [
                'sku.required' => 'Foto Surat Kepemilikan Usaha harus di upload'
            ]);
            $namaSku = "Surat Kepemilikan Usaha-" . time() . '.' . request()->sku->getClientOriginalExtension();
            $request->sku->storeAs('sku', $namaSku);
            $formulir = $request->session()->get('formulir2');
            $formulir->surat_milik_usaha = 'sku/' . $namaSku;
            $request->session()->put('formulir2', $formulir);
        }
        // dd($formulir);
        return redirect('/perpajakan/pernyataan');
    }

    public function createPernyataan(Request $request)
    {
        $data['formulir'] = $request->session()->get('formulir');
        $data2['formulir2'] = $request->session()->get('formulir2');
        return view('perpajakan.pernyataan', $data, $data2);
    }

    public function storeSemua(Request $request)
    {
        $formulir = $request->session()->get('formulir');
        $formulir2 = $request->session()->get('formulir2');
        $save = $formulir->save();
        sleep(1);
        $formulir2->id_wp = $formulir->id;
        $save2 = $formulir2->save();
        if ($save && $save2) {
            $request->session()->put('formulir');
            $request->session()->put('formulir2');
            return redirect('/perpajakan/selesai');
        }
    }

    public function createSelesai()
    {
        return view('perpajakan.selesai');
    }

    public function indexLogin()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
        dd('Berhasil login!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required' | 'email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function register()
    {
        return view('login.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    public function storeRegister()
    {
        return view('login.register');
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        //     'email' => 'required|email|Unique:users',
        //     'password' => 'required|min:5|max:255'
        // ]);
        // dd();
    }

    public function indexAdmin()
    {
        $wajibPajak = wajibPajak::all();
        $objekPajak = objekPajak::all();
        return view('admin.index', compact('wajibPajak', 'objekPajak'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function showWp(wajibPajak $wajibPajak)
    // {
    //     return view('admin.show-wp', compact('wajibPajak'));
    // }

    public function showWp(wajibPajak $wajibPajak)
    {
        return view('admin.showWp', compact('wajibPajak'));
    }
    public function showOp(objekPajak $objekPajak)
    {
        return view('admin.showOp', compact('objekPajak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editWp(wajibPajak $wajibPajak)
    {
        $kecamatan_wp = Kecamatan::all();
        $kelurahan_wp = Kelurahan::all();
        return view('admin.editWp', compact('wajibPajak', 'kecamatan_wp', 'kelurahan_wp'));
    }

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
