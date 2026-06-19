<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class SantriSeeder extends Seeder
{
    public function run(): void
    {
        $daftar_santri = [
            // KAMAR A - KELAS X
            ['nisn' => '004124001', 'nama_santri' => 'Ahmad Fauzi', 'kamar_kelas' => 'Kamar A / X-A'],
            ['nisn' => '004124002', 'nama_santri' => 'Muhammad Rizqi', 'kamar_kelas' => 'Kamar A / X-A'],
            ['nisn' => '004124003', 'nama_santri' => 'Zainal Abidin', 'kamar_kelas' => 'Kamar A / X-A'],
            ['nisn' => '004124004', 'nama_santri' => 'Muhammad Danial', 'kamar_kelas' => 'Kamar A / X-B'],
            ['nisn' => '004124005', 'nama_santri' => 'M. Nafis Umar', 'kamar_kelas' => 'Kamar A / X-B'],
            ['nisn' => '004124006', 'nama_santri' => 'Anas Ma\'ruf', 'kamar_kelas' => 'Kamar A / X-B'],

            // KAMAR B - KELAS X & XI
            ['nisn' => '004124007', 'nama_santri' => 'Ali Masykur', 'kamar_kelas' => 'Kamar B / X-C'],
            ['nisn' => '004124008', 'nama_santri' => 'Rifqi Hamdan', 'kamar_kelas' => 'Kamar B / X-C'],
            ['nisn' => '004124009', 'nama_santri' => 'Fathur Rahman', 'kamar_kelas' => 'Kamar B / XI-A'],
            ['nisn' => '004124010', 'nama_santri' => 'Bahrul Ulum', 'kamar_kelas' => 'Kamar B / XI-A'],
            ['nisn' => '004124011', 'nama_santri' => 'Muh. Asyraf', 'kamar_kelas' => 'Kamar B / XI-A'],
            ['nisn' => '004124012', 'nama_santri' => 'Dimas Prayoga', 'kamar_kelas' => 'Kamar B / XI-A'],

            // KAMAR C - KELAS XI
            ['nisn' => '004124013', 'nama_santri' => 'Faisal Ahmad', 'kamar_kelas' => 'Kamar C / XI-B'],
            ['nisn' => '004124014', 'nama_santri' => 'Gaza Al-Ghazali', 'kamar_kelas' => 'Kamar C / XI-B'],
            ['nisn' => '004124015', 'nama_santri' => 'Hamdan Yuwafi', 'kamar_kelas' => 'Kamar C / XI-B'],
            ['nisn' => '004124016', 'nama_santri' => 'Ibnu Sina', 'kamar_kelas' => 'Kamar C / XI-C'],
            ['nisn' => '004124017', 'nama_santri' => 'Khairul Anam', 'kamar_kelas' => 'Kamar C / XI-C'],
            ['nisn' => '004124018', 'nama_santri' => 'Luqman Hakim', 'kamar_kelas' => 'Kamar C / XI-C'],

            // KAMAR D - KELAS XII
            ['nisn' => '004124019', 'nama_santri' => 'M. Naufal Azmi', 'kamar_kelas' => 'Kamar D / XII-A'],
            ['nisn' => '004124020', 'nama_santri' => 'Nabil Mubarak', 'kamar_kelas' => 'Kamar D / XII-A'],
            ['nisn' => '004124021', 'nama_santri' => 'Oki Setiawan', 'kamar_kelas' => 'Kamar D / XII-A'],
            ['nisn' => '004124022', 'nama_santri' => 'Putra Pratama', 'kamar_kelas' => 'Kamar D / XII-B'],
            ['nisn' => '004124023', 'nama_santri' => 'Qomaruddin', 'kamar_kelas' => 'Kamar D / XII-B'],
            ['nisn' => '004124024', 'nama_santri' => 'Riza Umami', 'kamar_kelas' => 'Kamar D / XII-B'],

            // KAMAR E - KELAS XII
            ['nisn' => '004124025', 'nama_santri' => 'Sultan Iskandar', 'kamar_kelas' => 'Kamar E / XII-C'],
            ['nisn' => '004124026', 'nama_santri' => 'Taufiq Hidayat', 'kamar_kelas' => 'Kamar E / XII-C'],
            ['nisn' => '004124027', 'nama_santri' => 'Ubaidillah', 'kamar_kelas' => 'Kamar E / XII-C'],
            ['nisn' => '004124028', 'nama_santri' => 'Wildan mizan', 'kamar_kelas' => 'Kamar E / XII-C'],
            ['nisn' => '004124029', 'nama_santri' => 'Yusuf Mansur', 'kamar_kelas' => 'Kamar E / XII-C'],
            ['nisn' => '004124030', 'nama_santri' => 'Zulfikar Ali', 'kamar_kelas' => 'Kamar E / XII-C'],
        ];

        foreach ($daftar_santri as $santri) {
            Attendance::create([
                'nisn' => $santri['nisn'],
                'nama_santri' => $santri['nama_santri'],
                'kamar_kelas' => $santri['kamar_kelas'],
                'status' => 'Hadir', // Status awal default hadir semua
                'keterangan' => 'Data Awal'
            ]);
        }
    }
}