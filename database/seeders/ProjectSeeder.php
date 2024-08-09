<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Project\Dimension::insert([
            ['jenjang' => \App\Enums\Level::SMP->value, 'deskripsi' => 'Beriman, Bertakwa Kepada Tuhan Yang Maha Esa, dan Berakhlak Mulia'],
            ['jenjang' => \App\Enums\Level::SMP->value, 'deskripsi' => 'Berkebhinekaan Global'],
            ['jenjang' => \App\Enums\Level::SMP->value, 'deskripsi' => 'Bergotong-Royong'],
            ['jenjang' => \App\Enums\Level::SMP->value, 'deskripsi' => 'Mandiri'],
            ['jenjang' => \App\Enums\Level::SMP->value, 'deskripsi' => 'Bernalar Kritis'],
            ['jenjang' => \App\Enums\Level::SMP->value, 'deskripsi' => 'Kreatif'],
        ]);

        \App\Models\Project\Element::insert([
            ['dimension_id' => '1', 'deskripsi' => 'Akhlak Beragama'],
            ['dimension_id' => '1', 'deskripsi' => 'Akhlak Pribadi'],
            ['dimension_id' => '1', 'deskripsi' => 'Akhlak Kepada Manusia'],
            ['dimension_id' => '1', 'deskripsi' => 'Akhlak Kepada Alam'],
            ['dimension_id' => '1', 'deskripsi' => 'Akhlak Bernegara'],
            ['dimension_id' => '2', 'deskripsi' => 'Mengenal dan menghargai budaya'],
            ['dimension_id' => '2', 'deskripsi' => 'Komunikasi dan interaksi antar budaya'],
            ['dimension_id' => '2', 'deskripsi' => 'Refleksi dan bertanggung jawab terhadap pengalaman kebinekaan'],
            ['dimension_id' => '2', 'deskripsi' => 'Berkeadilan sosial'],
            ['dimension_id' => '3', 'deskripsi' => 'Kolaborasi'],
            ['dimension_id' => '3', 'deskripsi' => 'Kepedulian'],
            ['dimension_id' => '3', 'deskripsi' => 'Berbagi'],
            ['dimension_id' => '4', 'deskripsi' => 'Pemahaman diri dan situasi yang dihadapi'],
            ['dimension_id' => '4', 'deskripsi' => 'Regulasi diri'],
            ['dimension_id' => '5', 'deskripsi' => 'Memperoleh dan memproses informasi dan gagasan'],
            ['dimension_id' => '5', 'deskripsi' => 'Menganalisis dan mengevaluasi penalaran dan prosedurnya'],
            ['dimension_id' => '5', 'deskripsi' => 'Refleksi pemikiran dan proses berpikir'],
            ['dimension_id' => '6', 'deskripsi' => 'Menghasilkan gagasan yang orisinal'],
            ['dimension_id' => '6', 'deskripsi' => 'Menghasilkan karya dan tindakan yang orisinal'],
            ['dimension_id' => '6', 'deskripsi' => 'Memiliki keluwesan berpikir dalam mencari alternatif solusi permasalahan'],
        ]);

        \App\Models\Project\Subelement::insert([
            ['element_id' => '1', 'deskripsi' => 'Mengenal dan Mencintai Tuhan Yang Maha Esa'],
            ['element_id' => '1', 'deskripsi' => 'Pemahaman Agama/Kepercayaan'],
            ['element_id' => '1', 'deskripsi' => 'Pelaksanaan Ritual Ibadah'],
            ['element_id' => '2', 'deskripsi' => 'Integritas'],
            ['element_id' => '2', 'deskripsi' => 'Merawat diri secara fisik, mental dan spiritual'],
            ['element_id' => '3', 'deskripsi' => 'Mengutamakan persamaan dengan orang lain dan menghargai perbedaan'],
            ['element_id' => '3', 'deskripsi' => 'Berempati kepada orang lain'],
            ['element_id' => '4', 'deskripsi' => 'Memahami Keterhubungan Ekosistem Bumi'],
            ['element_id' => '4', 'deskripsi' => 'Menjaga Lingkungan Alam Sekitar'],
            ['element_id' => '5', 'deskripsi' => 'Melaksanakan Hak dan Kewajiban sebagai Warga Negara Indonesia'],
            ['element_id' => '6', 'deskripsi' => 'Mendalami budaya dan identitas budaya'],
            ['element_id' => '6', 'deskripsi' => 'Mengeksplorasi dan membandingkan pengetahuan budaya, kepercayaan, serta praktiknya'],
            ['element_id' => '6', 'deskripsi' => 'Menumbuhkan rasa menghormati terhadap keanekaragaman budaya'],
            ['element_id' => '7', 'deskripsi' => 'Berkomunikasi antar budaya'],
            ['element_id' => '7', 'deskripsi' => 'Mempertimbangkan dan menumbuhkan berbagai perspektif'],
            ['element_id' => '8', 'deskripsi' => 'Refleksi terhadap pengalaman kebinekaan'],
            ['element_id' => '8', 'deskripsi' => 'Menghilangkan stereotip dan prasangka'],
            ['element_id' => '8', 'deskripsi' => 'Menyelaraskan perbedaan budaya'],
            ['element_id' => '9', 'deskripsi' => 'Aktif membangun masyarakat yang inklusif, adil, dan berkelanjutan'],
            ['element_id' => '9', 'deskripsi' => 'Berpartisipasi dalam proses pengambilan keputusan bersama'],
            ['element_id' => '9', 'deskripsi' => 'Memahami peran individu dalam demokrasi'],
            ['element_id' => '10', 'deskripsi' => 'Kerja sama'],
            ['element_id' => '10', 'deskripsi' => 'Komunikasi untuk mencapai tujuan bersama'],
            ['element_id' => '10', 'deskripsi' => 'Saling-ketergantungan positif'],
            ['element_id' => '10', 'deskripsi' => 'Koordinasi Sosial'],
            ['element_id' => '11', 'deskripsi' => 'Tanggap terhadap lingkungan Sosial'],
            ['element_id' => '11', 'deskripsi' => 'Persepsi sosial'],
            ['element_id' => '12', 'deskripsi' => 'Berbagi'],
            ['element_id' => '13', 'deskripsi' => 'Mengenali kualitas dan minat diri serta tantangan yang dihadapi'],
            ['element_id' => '13', 'deskripsi' => 'Mengembangkan refleksi diri'],
            ['element_id' => '14', 'deskripsi' => 'Regulasi emosi'],
            ['element_id' => '14', 'deskripsi' => 'Penetapan tujuan belajar, prestasi, dan pengembangan diri serta rencana strategis untuk mencapainya'],
            ['element_id' => '14', 'deskripsi' => 'Menunjukkan inisiatif dan bekerja secara mandiri'],
            ['element_id' => '14', 'deskripsi' => 'Mengembangkan pengendalian dan disiplin diri'],
            ['element_id' => '14', 'deskripsi' => 'Percaya diri, tangguh (resilient), dan adaptif'],
            ['element_id' => '15', 'deskripsi' => 'Mengajukan pertanyaan'],
            ['element_id' => '15', 'deskripsi' => 'Mengidentifikasi, mengklarifikasi, dan mengolah informasi dan gagasan'],
            ['element_id' => '16', 'deskripsi' => 'Menganalisis dan mengevaluasi penalaran dan prosedurnya'],
            ['element_id' => '17', 'deskripsi' => 'Merefleksi dan mengevaluasi pemikirannya sendiri'],
            ['element_id' => '18', 'deskripsi' => 'Menghasilkan gagasan yang orisinal'],
            ['element_id' => '19', 'deskripsi' => 'Menghasilkan karya dan tindakan yang orisinal'],
            ['element_id' => '20', 'deskripsi' => 'Memiliki keluwesan berpikir dalam mencari alternatif solusi permasalahan'],
        ]);

        \App\Models\Project::create(['tapel_id' => 1, 'tema' => '5', 'kegiatan' => 'Pemilihan Ketua Osis', 'deskripsi' => 'Melatih siswa untuk menjadi warga negara yang baik dalam berdemokrasi', 'subelement_1' => '10', 'subelement_2' => '21', 'subelement_3' => '23']);
        \App\Models\Project::create(['tapel_id' => 1, 'tema' => '2', 'kegiatan' => 'Melestarikan Budaya Lokal', 'deskripsi' => 'Membuat mural bersama-sama di tembok sekolah yang kurang terawat agar lebih semarak dengan tema kehidupan masyarakat setempat', 'subelement_1' => '11', 'subelement_2' => '41', 'subelement_3' => '18']);
        \App\Models\Project::create(['tapel_id' => 1, 'tema' => '1', 'kegiatan' => 'Daur Ulang Sampah Plastik', 'deskripsi' => 'Menjaga lingkungan tetap lestari sekaligus menghasilkan karya kreatif yang bermanfaat', 'subelement_1' => '9', 'subelement_2' => '5', 'subelement_3' => '26']);
    }
}
