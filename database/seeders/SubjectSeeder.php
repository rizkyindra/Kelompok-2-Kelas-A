<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['semester' => 1, 'name' => 'Fisika Dasar'],
            ['semester' => 1, 'name' => 'Pengantar Teknik Industri'],
            ['semester' => 1, 'name' => 'Sistem Lingkungan Industri'],
            ['semester' => 1, 'name' => 'Kewarganegaraan'],
            ['semester' => 1, 'name' => 'Menggambar Teknik'],
            ['semester' => 1, 'name' => 'Kalkulus I'],
            ['semester' => 1, 'name' => 'Pengantar Ilmu Ekonomi'],
            ['semester' => 1, 'name' => 'Kimia Dasar'],
            ['semester' => 2, 'name' => 'Mekanika Teknik'],
            ['semester' => 2, 'name' => 'Biologi'],
            ['semester' => 2, 'name' => 'Material Teknik'],
            ['semester' => 2, 'name' => 'Fisika Dasar II'],
            ['semester' => 2, 'name' => 'Psikologi Industri'],
            ['semester' => 2, 'name' => 'Programa Komputer'],
            ['semester' => 2, 'name' => 'Kalkulus II'],
            ['semester' => 2, 'name' => 'Pengantar Rekayasa dan Desain'],
            ['semester' => 2, 'name' => 'Analisis dan Estimasi Biaya'],
            ['semester' => 3, 'name' => 'Matematika Optimisasi'],
            ['semester' => 3, 'name' => 'Proses Manufaktur 1'],
            ['semester' => 3, 'name' => 'Ekonomi Teknik'],
            ['semester' => 3, 'name' => 'Aljabar Linear'],
            ['semester' => 3, 'name' => 'Elemen Mesin'],
            ['semester' => 3, 'name' => 'Elektronika Industri'],
            ['semester' => 3, 'name' => 'Teori Probabilitas'],
            ['semester' => 3, 'name' => 'Ergonomi'],
            ['semester' => 4, 'name' => 'Organisasi dan Manajemen Industri'],
            ['semester' => 4, 'name' => 'Penelitian Operasional I '],
            ['semester' => 4, 'name' => 'Proses Manufaktur II'],
            ['semester' => 4, 'name' => 'Statistika '],
            ['semester' => 4, 'name' => 'Analisis dan Perancangan Sistem Kerja '],
            ['semester' => 4, 'name' => 'Keselamatan dan Kesehatan Kerja'],
            ['semester' => 4, 'name' => 'Analisis dan Perancangan Sistem Informasi '],
            ['semester' => 4, 'name' => 'Pancasila'],
            ['semester' => 5, 'name' => 'Perencanaan dan pengendalian produksi'],
            ['semester' => 5, 'name' => 'Bahasa Indonesia'],
            ['semester' => 5, 'name' => 'Pemasaran'],
            ['semester' => 5, 'name' => 'Otomasi sistem produksi'],
            ['semester' => 5, 'name' => 'Pengendalian & penjaminan mutu'],
            ['semester' => 5, 'name' => 'Penelitian Operasional II'],
            ['semester' => 5, 'name' => 'Pemodelan Sistem'],
            ['semester' => 6, 'name' => 'Ergonomi Fisik'],
            ['semester' => 6, 'name' => 'Teori Persediaan'],
            ['semester' => 6, 'name' => 'Sinulasi komputer'],
            ['semester' => 6, 'name' => 'Perancangan Tata Letak fasilitas'],
            ['semester' => 6, 'name' => 'Perancangan alat bantu produksi'],
            ['semester' => 6, 'name' => 'Manajemen sumber daya manusia'],
            ['semester' => 6, 'name' => 'Biomekanika kerja'],
            ['semester' => 6, 'name' => 'Analisis Multivariat'],
            ['semester' => 6, 'name' => 'Kewirusahaan berbasis teknologi'],
            ['semester' => 6, 'name' => 'Manajemen rantai pasok yang berkelanjutan'],
            ['semester' => 7, 'name' => 'Rekayasa rantai pasok'],
            ['semester' => 7, 'name' => 'Manajemen proyek'],
            ['semester' => 8, 'name' => 'Panduan Tugas Akhir'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}






