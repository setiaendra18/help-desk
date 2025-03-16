<?php

namespace App\Http\Controllers;

use App\Models\DataPengaduan;
use App\Models\JenisLaporan;
use App\Models\JenisLaporan as ModelsJenisLaporan;
use App\Models\JenisPelanggaran;
use App\Models\PengaturanEmail;
use App\Models\PengaturanSistem;
use App\Models\PengaturanSlider;
use App\Models\PrioritasLaporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


use Throwable;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $baru = DataPengaduan::where('status', 'BARU')->count();
        $proses = DataPengaduan::where('status', 'DALAM PROSES')->count();
        $selesai = DataPengaduan::where('status', 'SELESAI')->count();
        $tidakValid = DataPengaduan::where('status', 'TIDAK VALID')->count();
        $diterima = DataPengaduan::where('status', 'DITERIMA')->count();
        $pengguna = User::where('level', 'admin')->count();

        $pengaduans = DataPengaduan::all();


        return view('pages.admin.dashboard', compact('title', 'baru', 'selesai', 'tidakValid', 'proses', 'diterima', 'pengguna', 'pengaduans'));
    }
    public function chartData()
    {
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June'],
            'datasets' => [
                [
                    'label' => 'Sales',
                    'data' => [12, 19, 3, 5, 2, 3],
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
        return response()->json($data);
    }
    //START DATA PENGADUANS
    public function index_data_pengaduan()
    {
        $title = 'Data Pengaduan Pelapor';
        $pengaduans = DataPengaduan::orderBy('created_at', 'asc')->get();
        return view('pages.admin.data_pengaduan.data_pengaduan', compact('title', 'pengaduans'));
    }
    public function data_pengaduan_edit(Request $request)
    {
        $pengaduans = DataPengaduan::find($request->input('id'));

        return response()->json($pengaduans);
    }
    public function data_pengaduan_update_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(auth()->user()->id);
        $pengaduans = DataPengaduan::find($request->input('id'));

        // Check if the record exists
        if (!$pengaduans) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $status = $request->input('status');

        // Check if an image file was uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = $status."_".$request->file('image')->getClientOriginalName();
            $tujuan_upload = 'public/report/status';
            $file_berkas = $request->file('image');
            $file_berkas->move($tujuan_upload, $file);

            if ($status == "DALAM PROSES") {
                $pengaduans->gambar_proses = $file;
            } elseif ($status == "SELESAI") {
                $pengaduans->gambar_selesai = $file;
            }
        }

        $pengaduans->status = $status;
        $pengaduans->id_petugas = $user->id;
        $pengaduans->save();
        return redirect()->back()->with('success', 'Data berhasil Diperbarui');
    }

    public function filter_data(Request $request)
    {
        $title = 'Data Pengaduan Pelapor';
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $pengaduans = DataPengaduan::whereBetween('created_at', [$start_date, $end_date])->get();
        return view('pages.admin.data_pengaduan.data_pengaduan', compact('title', 'pengaduans'));
        return view('your-view-name', ['filteredData' => $pengaduans]);
    }
    public function data_pengaduan_destroy(Request $request)
    {
        $pengaduans = DataPengaduan::find($request->input('id'));
        if ($pengaduans) {
            $pengaduans->delete();
            Session::flash('hapus', 'Data berhasil dihapus.');
        } else {
            Session::flash('error', 'Gagal menghapus data.');
        }
        return response()->json();
    }
    //AKHIR DATA PENGADUANS


    //FUNGSI JENIS PELANGGARAN
    public function index_jenis_laporan()
    {
        $title = 'Jenis laporan';
        $jenis_laporans = ModelsJenisLaporan::orderBy('jenis_laporan', 'asc')->get();
        return view('pages.admin.jenis_laporan.jenis_laporan', compact('title', 'jenis_laporans'));
    }
    public function jenis_laporan_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_laporan' => 'required|min:3',
            'deskripsi' => 'required|min:10',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        JenisLaporan::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil Ditambahkan atau Di Perbarui');
    }
    public function jenis_laporan_edit(Request $request)
    {
        $jenis_laporans = JenisLaporan::find($request->input('id'));
        return response()->json($jenis_laporans);
    }
    public function jenis_laporan_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_laporan' => 'required|min:3',
            'deskripsi' => 'required|min:10',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $jenis_laporan = JenisLaporan::find($request->input('id'));
        $jenis_laporan->jenis_laporan = $request->input('jenis_laporan');
        $jenis_laporan->deskripsi = $request->input('deskripsi');
        $jenis_laporan->status = $request->input('status');
        $jenis_laporan->save();
        return redirect()->back()->with('success', 'Data berhasil Diperbarui');
    }

    public function jenis_laporan_destroy(Request $request)
    {
        $jenis_laporans = JenisLaporan::find($request->input('id'));
        if ($jenis_laporans) {
            $jenis_laporans->delete();
            Session::flash('hapus', 'Data berhasil dihapus.');
        } else {
            Session::flash('error', 'Gagal menghapus data.');
        }
        return response()->json();
    }
    //END FUNGSI JENIS PELANGGARAN

    public function index_prioritas_laporan()
    {
        $title = 'Prioritas Laporan';
        $prioritas_laporans = PrioritasLaporan::orderBy('nama', 'asc')->get();
        return view('pages.admin.prioritas_laporan.prioritas_laporan', compact('title', 'prioritas_laporans'));
    }

    public function prioritas_laporan_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'deskripsi' => 'required|min:10',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        PrioritasLaporan::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil Ditambahkan atau Di Perbarui');
    }

    public function prioritas_laporan_edit(Request $request)
    {
        $prioritas_laporans = PrioritasLaporan::find($request->input('id'));
        return response()->json($prioritas_laporans);
    }

    public function prioritas_laporan_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'deskripsi' => 'required|min:10',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $prioritas_laporan = PrioritasLaporan::find($request->input('id'));
        $prioritas_laporan->nama = $request->input('nama');
        $prioritas_laporan->deskripsi = $request->input('deskripsi');
        $prioritas_laporan->status = $request->input('status');
        $prioritas_laporan->save();
        return redirect()->back()->with('success', 'Data berhasil Diperbarui');
    }

    public function prioritas_laporan_destroy(Request $request)
    {
        $prioritas_laporans = PrioritasLaporan::find($request->input('id'));
        if ($prioritas_laporans) {
            $prioritas_laporans->delete();
            Session::flash('hapus', 'Data berhasil dihapus.');
        } else {
            Session::flash('error', 'Gagal menghapus data.');
        }
        return response()->json();
    }


    //FUNGSI PENGGUNA
    public function index_pengguna()
    {
        $title = 'Data Pengguna';
        $pengguna = User::orderBy('name', 'asc')->get();
        return view('pages.admin.pengguna.pengguna', compact('title', 'pengguna'));
    }
    public function pengguna_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'telephone' => 'required',
            'level' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'telephone' => $request->input('telephone'),
            'level' => $request->input('level'),
        ]);
        return redirect()->back()->with('success', 'Data berhasil Ditambahkan atau Di Perbarui');
    }
    public function pengguna_edit(Request $request)
    {
        $pengguna = User::find($request->input('id'));
        return response()->json($pengguna);
    }
    public function pengguna_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'username' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'level' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $pengguna = User::find($request->input('id'));
        $pengguna->name = $request->input('name');
        $pengguna->username = $request->input('username');
        $pengguna->email = $request->input('email');
        $pengguna->telephone = $request->input('telephone');
        $pengguna->level = $request->input('level');
        $pengguna->save();
        return redirect()->back()->with('success', 'Data berhasil Diperbarui');
    }
    public function pengguna_destroy(Request $request)
    {
        $pengguna = User::find($request->input('id'));
        if ($pengguna) {
            $pengguna->delete();
            Session::flash('hapus', 'Data berhasil dihapus.');
        } else {
            Session::flash('error', 'Gagal menghapus data.');
        }
        return response()->json();
    }
    public function pengguna_update_password(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|min:5|confirmed',
        ]);
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
    //END PENGGUNA
    public function pengaturan_sistem()
    {
        $title = 'Pengaturan Sistem';
        $pengaturans_sistem = PengaturanSistem::first();
        return view('pages.admin.pengaturan.pengaturan_sistem.pengaturan_sistem', compact('title', 'pengaturans_sistem'));
    }


    public function pengaturan_sistem_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_sistem' => 'required|min:3',
            'nama_instansi' => 'required|min:3',
            'email' => 'required|email',
            'no_telephone' => 'required|min:8|max:13',
            'alamat' => 'required|min:10',
            'url_domain' => 'required|url',
            'author' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama_sistem' => $request->input('nama_sistem'),
            'nama_instansi' => $request->input('nama_instansi'),
            'no_telephone' => $request->input('no_telephone'),
            'email' => $request->input('email'),
            'url_domain' => $request->input('url_domain'),
            'alamat' => $request->input('alamat'),
            'author' => $request->input('author'),
        ];

        if ($request->hasFile('logo_images')) {
            $logo_sistem = $request->logo_images->getClientOriginalName();
            $tujuan_upload = 'public/images/logo';
            $file_berkas = $request->file('logo_images');
            $file_berkas->move($tujuan_upload, $logo_sistem);
            $data['logo_images'] = $logo_sistem;
        }

        if ($request->hasFile('background')) {
            $background = $request->background->getClientOriginalName();
            $tujuan_upload = 'public/images/background';
            $file_berkas = $request->file('background');
            $file_berkas->move($tujuan_upload, $background);
            $data['background'] = $background;
        }

        DB::table('pengaturans_sistem')->update($data);

        return redirect()->back()->with('success', 'Data Sistem berhasil diperbarui!');
    }


    //PENGATURAN - > EMAIL //
    public function pengaturan_email()
    {
        $title = 'Pengaturan Email';
        $pengaturans_email = PengaturanEmail::first();
        if (!$pengaturans_email) {
            $pengaturans_email = new PengaturanEmail(); // Buat objek baru jika data tidak ada
        }
        return view('pages.admin.pengaturan.emails.pengaturan_email', compact('title', 'pengaturans_email'));
    }
    public function pengaturan_email_update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'mailer' => 'required',
                'email' => 'required|email',
                'mail_host' => 'required',
                'encryption' => 'required',
                'username' => 'required',
                'password' => 'required',
                'port' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data[] = [
                'mailer' => $request->input('mailer'),
                'email' => $request->input('email'),
                'mail_host' => $request->input('mail_host'),
                'encryption' => $request->input('encryption'),
                'username' => $request->input('username'),
                'port' => $request->input('port'),
                'password' => $request->input('password'),
            ];
            DB::table('pengaturans_email')->upsert($data, ['mailer'], ['mail_host', 'email', 'mail_host', 'encryption', 'username', 'port', 'password']);
            // DB::table('pengaturans_email')->update($data);
            return redirect()->back()->with('success', 'Data Sistem berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (Throwable $e) {
            echo json_encode($e);
            die;
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.')->withInput();
        }
    }
    //PENGATURAN -> PENGATURAN SLIDERS

}
