@extends('layouts.frontend-main')
@push('add-css')
@endpush
@section('content')
    <section>
        <div class="container">
            <div class="inner-title">
                <h2 class="h4 mb-0">{{ $title }}</h2>
            </div>
            <ol>
                <li>
                    <strong>Pengisian Formulir Pengaduan:</strong>
                    <ol type="a">
                        <li>Whistleblower mengakses sistem Whistleblowing System Internal BPKHTL.</li>
                        <li>Whistleblower mengisi formulir pengaduan dengan informasi terkait pelanggaran yang dilaporkan.</li>
                        <li>Informasi yang dimasukkan mencakup deskripsi pelanggaran, waktu, tempat, serta bukti atau saksi yang ada.</li>
                        <li>Whistleblower memberikan nama anonim atau kode pengenal untuk identifikasi.</li>
                    </ol>
                </li>
                <li>
                    <strong>Verifikasi dan Evaluasi:</strong>
                    <ol type="a">
                        <li>Tim yang ditunjuk memverifikasi dan mengevaluasi pengaduan yang masuk.</li>
                        <li>Mereka memeriksa keabsahan informasi, memvalidasi bukti, dan melakukan penyelidikan awal untuk menentukan langkah selanjutnya.</li>
                    </ol>
                </li>
                <li>
                    <strong>Penyelidikan:</strong>
                    <ol type="a">
                        <li>Jika pengaduan terindikasi memiliki dasar yang kuat, tim akan melakukan penyelidikan lebih lanjut.</li>
                        <li>Penyelidikan melibatkan pengumpulan informasi tambahan, wawancara dengan saksi, analisis dokumen, dan langkah-langkah investigatif lainnya.</li>
                    </ol>
                </li>
                <li>
                    <strong>Tindakan dan Penyelesaian:</strong>
                    <ol type="a">
                        <li>Jika pelanggaran terbukti, langkah tindakan disesuaikan dengan kebijakan dan regulasi yang berlaku.</li>
                        <li>Tindakan yang mungkin diambil termasuk pemberian sanksi, penyelesaian masalah internal, perbaikan proses, atau proses hukum jika diperlukan.</li>
                    </ol>
                </li>
                <li>
                    <strong>Komunikasi dan Pemantauan:</strong>
                    <ol type="a">
                        <li>Whistleblower akan tetap anonim dan menerima pembaruan mengenai status pengaduan.</li>
                        <li>Proses komunikasi dan pemantauan dilakukan secara rahasia untuk memastikan keamanan informasi yang terkait dengan pengaduan.</li>
                    </ol>
                </li>
                <li>
                    <strong>Pengawasan dan Evaluasi:</strong>
                    <ol type="a">
                        <li>Sistem Whistleblowing System Internal BPKHTL akan dipantau dan dievaluasi secara berkala untuk meningkatkan efektivitasnya.</li>
                        <li>Evaluasi juga dilakukan terhadap proses pengaduan dan penanganan kasus untuk memastikan kepatuhan terhadap standar dan kebijakan yang berlaku.</li>
                    </ol>
                </li>
            </li>
            <li>
                <strong>Perlindungan dan Kerahasiaan:</strong>
                <ol type="a">
                    <li>Identitas whistleblower dan informasi anonimnya dilindungi dengan ketat sesuai dengan kebijakan dan peraturan yang berlaku.</li>
                    <li>Kerahasiaan informasi pelapor dijaga untuk mencegah tindakan balasan atau pembalasan.</li>
                </ol>
            </li>
            <li>
                <strong>Pelaporan dan Transparansi:</strong>
                <ol type="a">
                    <li>Hasil dari pengaduan dan tindakan yang diambil dicatat dan dilaporkan secara berkala kepada pihak yang berwenang.</li>
                    <li>Laporan ini mencakup jumlah pengaduan, jenis pelanggaran, langkah penyelesaian, dan hasil yang dicapai.</li>
                </ol>
            </li>
            </ol>
            <p>
                Alur di atas menjelaskan bagaimana pengaduan tanpa registrasi melalui sistem Whistleblowing System Internal BPKHTL diproses dengan menjaga anonimitas nama whistleblower.</p>            



        </div>
    </section>
@endsection
@push('add-js')
@endpush
