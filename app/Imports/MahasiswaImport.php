<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            "nama_mahasiswa" => $row["nama_mahasiswa"] ?? null,
            "nim" => $row["nim"] ?? null,
            "status_mahasiswa" => $row["status_mahasiswa"] ?? null,
            "jenis_kelamin" => $row["jenis_kelamin"] ?? null,
            "tempat_lahir" => $row["tempat_lahir"] ?? null,
            "tanggal_lahir" => $row["tanggal_lahir"] ?? null,
            "agama" => $row["agama"] ?? null,
            "nomor_telepon" => $row["nomor_hp"] ?? null,
            "email_kampus" => $row["email_kampus"] ?? null,
            "email_pribadi" => $row["email_pribadi"] ?? null,
            "foto_profil" => $row["foto_profil"] ?? null,
            "password" => isset($row["nim"]) ? bcrypt($row["nim"]) : bcrypt("default123"),
        ]);
    }
}
