<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Distributor;

class DistributorSeeder extends Seeder
{
    public function run()
    {
        Distributor::create([
            'name' => 'PT. Myfood Indonesia',
            'email' => 'info@myfood.co.id',
            'address' => 'Jl. Simpang Darmo Permai Selatan I No.21, Pradahkalikendal, Kec. Dukuhpakis, Surabaya, Jawa Timur 60226, Indonesia',
            'phone_number' => '+62 31 8290606',
        ]);

        Distributor::create([
            'name' => 'Covenant Tech Indonesia',
            'email' => 'info@covenanttech.co.id',
            'address' => 'Graha BIP, Kav 23 lantai 6, Jl. Gatot Subroto, Jakarta',
            'phone_number' => '+62 21 29322777',
        ]);

        Distributor::create([
            'name' => 'PT. Multi Sari Pangan',
            'email' => 'info@multisaripangan.com',
            'address' => 'Kompleks Multi Sari Pangan, PT, Jl. Irigasi, RT.002/RW.003, Ragemanunggal, Kec. Setu, Kabupaten Bekasi, Jawa Barat 17320, Indonesia',
            'phone_number' => '+62 21 87907979',
        ]);

        Distributor::create([
            'name' => 'Inter Buana Mandiri',
            'email' => 'info@ibmindonesia.com',
            'address' => 'Wisma Gemini, Jl. Gembong No.4 B2, Kapasan, Kec. Simokerto, Surabaya, Jawa Timur 60141, Indonesia',
            'phone_number' => '+62 31 5361313',
        ]);

        Distributor::create([
            'name' => 'GarudaFood',
            'email' => 'marketing@garudafood.co.id',
            'address' => 'Jl. Bintaro Raya No. 10A, Jakarta Selatan, Jakarta 12240, Indonesia',
            'phone_number' => '+62 21 7383400',
        ]);
    }
}
