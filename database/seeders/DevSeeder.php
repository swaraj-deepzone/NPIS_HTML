<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DevSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\refAgensi::create([
            'kod_agensi' => '1',
            'nama_agensi' => 'Agensi1',
            'penerangan_agensi' => 'test description',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\refBahagian::create([
            'kod_bahagian' => '1',
            'nama_bahagian' => 'Bahagian1',
            'penerangan_bahagian' => 'test description',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\refDaerah::create([
            'kod_daerah' => '1',
            'nama_daerah' => 'Ampang',
            'penerangan_daerah' => 'test description',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\refGredJawatan::create([
            'kod_gred_jawatan' => '1',
            'nama_gred_jawatan' => 'Gred1',
            'penerangan_gred_jawatan' => 'test description',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\refJabatan::create([
            'kod_jabatan' => '1',
            'nama_jabatan' => 'Jabatan1',
            'penerangan_jabatan' => 'test description',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\refJawatan::create([
            'kod_jawatan' => '1',
            'nama_jawatan' => 'Jawantan1',
            'penerangan_jawatan' => 'test description',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\refJenisPengguna::create([
            'kod_jenis_pengguna' => '1',
            'nama_jenis_pengguna' => 'Pengguna JPS',
            'penerangan_jenis_pengguna' => 'Pengguna JPS',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\refJenisPengguna::create([
            'kod_jenis_pengguna' => '2',
            'nama_jenis_pengguna' => 'Agensi Luar',
            'penerangan_jenis_pengguna' => 'Agensi Luar',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\refNegeri::create([
            'kod_negeri' => '1',
            'nama_negeri' => 'Selangor',
            'penerangan_negeri' => 'test description',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\refNegeri::create([
            'kod_negeri' => '2',
            'nama_negeri' => 'Kuala Lumpur',
            'penerangan_negeri' => 'test description',
            'dibuat_oleh' => 1,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_oleh' => 1,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_hidden' => 0,
            'row_status' => 1,
        ]);

        \App\Models\User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@app.com',
            'password' => Hash::make('password'),
            'no_ic' => '1234567',
            'jenis_pengguna_id' => 1,
            'no_telefon' => '23423423',
            'jawatan_id' => 1,
            'jabatan_id' => 1,
            'gred_jawatan_id' => 1,
            //'kementerian' => $data['kementerian'],
            'bahagian_id' => 1,
            'negeri_id' => 1,
            'daerah_id' => 1,
            'catatan' => 'descriptiopj',
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
