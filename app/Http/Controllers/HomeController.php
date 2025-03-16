<?php
namespace App\Http\Controllers;
use App\Mail\EmailSender;
use App\Models\DataPengaduan;
use App\Models\JenisLaporan;
use App\Models\PrioritasLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    public function index()
    {
        $title = 'Beranda';
        return view('pages.frontend.home', compact('title'));
    }
    public function pengaduan()
    {
        $title = 'Form Pengaduan Kendala';
        $jenisLaporan = JenisLaporan::where('status', 'AKTIF')->get();
        $prioritasLaporan = PrioritasLaporan::where('STATUS', 'AKTIF')->get();
        return view('pages.frontend.form-pengaduan', compact('title', 'jenisLaporan', 'prioritasLaporan'));
    }
    public function pantau_pengaduan(Request $request)
    {
        $title = 'Tracking Laporan ';
        $validator = Validator::make($request->all(), [
            'kode_unik' => 'required|min:10',
        ]);
        $kodeUnik = $request->input('kode_unik');
        $pengaduan = DataPengaduan::where('kode_unik', $kodeUnik)->first();
        return view('pages.frontend.tracking-laporan', compact('title', 'pengaduan'));
    }
    public function pengaduan_store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_pelapor' => 'required|min:3',
                'email' => 'required|email',
                'no_telephone' => 'required',
                'id_jenis_laporan' => 'required',
                'id_prioritas_laporan' => 'required',
                'uraian_kendala' => 'required',
                'file' => 'required|mimetypes:application/zip,application/x-rar-compressed,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/pdf,image/jpeg,image/png,video/x-msvideo,video/mp4,video/3gpp,audio/mpeg|max:5120',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $kode_unik = strtoupper(substr(Str::random(), 0, 10));
            // Uncomment this when you have set up your EmailSender class and mail sending
            // $data_pelapor = $request->input('nama_pelapor');
            // $data = [
            //     'name' => "Halo $data_pelapor",
            //     'body' => "Berikut adalah Kode Unik Untuk Melakukan Pelacakan Proses Laporan anda, kode unik anda adalah : $kode_unik ",
            // ];
            // Mail::to($request->input('email'))->send(new EmailSender($data));
            $file = $kode_unik . "-" . $request->file('file')->getClientOriginalName();
            $tujuan_upload = 'public/report/';
            $file_berkas = $request->file('file');
            $file_berkas->move($tujuan_upload, $file);
            DataPengaduan::create([
                'kode_unik' => $kode_unik,
                'id_jenis_laporan' => $request->input('id_jenis_laporan'),
                'id_prioritas_laporan' => $request->input('id_prioritas_laporan'),
                'nama_pelapor' => $request->input('nama_pelapor'),
                'email' => $request->input('email'),
                'no_telephone' => $request->input('no_telephone'),
                'uraian_kendala' => $request->input('uraian_kendala'),
                'file' => $file,
                'status' => "BARU",
            ]);
            return redirect()->back()->with('success', 'Laporan anda telah di kirim')->with('kode_unik', $kode_unik);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function kontak()
    {
        $title = 'Kontak dan Informasi';
        return view('pages.frontend.kontak', compact('title'));
    }
    public function tentang()
    {
        $title = 'Tentang Sistem WBS';
        return view('pages.frontend.tentang', compact('title'));
    }
    public function alur_pengaduan()
    {
        $title = 'Alur Pengaduan Tidak Pelanggaran';
        return view('pages.frontend.alur-pengaduan', compact('title'));
    }
}
