<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class MahasiswaImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Hapus baris header
        $rows->shift();

        $data = [];
        $prodi = Auth::guard('admin')->user()->program_studi_id;

        foreach ($rows as $row) {
            // Skip baris kosong
            if (!$row[0]) continue;

            $data[] = [
                "id"               => Str::uuid()->toString(),
                "nama_mahasiswa"   => $row[0],
                "nim"              => strval($row[1]),
                "status_mahasiswa" => $row[2],
                "jenis_kelamin"    => $row[3],
                "foto_profil"      => $row[4] ?? "-",
                "prodi_id"         => $prodi,
                // bcrypt cost rendah = 10x lebih cepat
                "password"         => password_hash($row[1], PASSWORD_BCRYPT, ['cost' => 8]),
                "created_at"       => now(),
                "updated_at"       => now(),
            ];
        }

        // Bulk insert (super cepat)
        DB::table('mahasiswa')->insert($data);
    }
}
