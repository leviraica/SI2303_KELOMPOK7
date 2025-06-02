<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Distributor;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $distributorA = Distributor::firstOrCreate(
            ['name' => 'PT. Myfood Indonesia'],
            ['address' => 'Alamat Myfood', 'phone_number' => '123456789',  'email' => 'myfood@gmail.com']
        );

        $distributorB = Distributor::firstOrCreate(
            ['name' => 'Covenant Tech Indonesia'],
            ['address' => 'Alamat Covenant Tech', 'phone_number' => '987654321',  'email' => 'covent_tech@gmail.com']
        );

        $distributorC = Distributor::firstOrCreate(
            ['name' => 'PT. Multi Sari Pangan'],
            ['address' => 'Alamat Multi Sari Pangan', 'phone_number' => '555555555',  'email' => 'multiSari@gmail.com']
        );

        $distributorD = Distributor::firstOrCreate(
            ['name' => 'Inter Buana Mandiri'],
            ['address' => 'Alamat Inter Buana', 'phone_number' => '666666666',  'email' => 'buana@gmail.com']
        );

        $distributorE = Distributor::firstOrCreate(
            ['name' => 'GarudaFood'],
            ['address' => 'Alamat GarudaFood', 'phone_number' => '777777777',  'email' => 'garudafood@gmail.com']
        );

        // Menambahkan produk untuk PT. Myfood Indonesia
        Product::create([
            'name' => 'Produk A1 - Myfood',
            'description' => 'Produk Makanan Sehat A1 dari PT. Myfood Indonesia.',
            'price' => 100000,
            'distributor_id' => $distributorA->id,  // Menautkan dengan PT. Myfood Indonesia
            'stock' => 100,
        ]);

        Product::create([
            'name' => 'Produk A2 - Myfood',
            'description' => 'Produk Makanan Sehat A2 dari PT. Myfood Indonesia.',
            'price' => 120000,
            'distributor_id' => $distributorA->id,
            'stock' => 100,
        ]);

        Product::create([
            'name' => 'Produk A3 - Myfood',
            'description' => 'Produk Makanan Sehat A3 dari PT. Myfood Indonesia.',
            'price' => 130000,
            'distributor_id' => $distributorA->id,
            'stock' => 100,
        ]);

        // Menambahkan produk untuk Covenant Tech Indonesia
        Product::create([
            'name' => 'Produk B1 - Covenant Tech',
            'description' => 'Produk Elektronik B1 dari Covenant Tech Indonesia.',
            'price' => 200000,
            'distributor_id' => $distributorB->id,
            'stock' => 150,
        ]);

        Product::create([
            'name' => 'Produk B2 - Covenant Tech',
            'description' => 'Produk Elektronik B2 dari Covenant Tech Indonesia.',
            'price' => 250000,
            'distributor_id' => $distributorB->id,
            'stock' => 150,
        ]);

        Product::create([
            'name' => 'Produk B3 - Covenant Tech',
            'description' => 'Produk Elektronik B3 dari Covenant Tech Indonesia.',
            'price' => 300000,
            'distributor_id' => $distributorB->id,
            'stock' => 150,
        ]);

        // Menambahkan produk untuk PT. Multi Sari Pangan
        Product::create([
            'name' => 'Produk C1 - Multi Sari Pangan',
            'description' => 'Produk Makanan C1 dari PT. Multi Sari Pangan.',
            'price' => 90000,
            'distributor_id' => $distributorC->id,
            'stock' => 200,
        ]);

        Product::create([
            'name' => 'Produk C2 - Multi Sari Pangan',
            'description' => 'Produk Makanan C2 dari PT. Multi Sari Pangan.',
            'price' => 110000,
            'distributor_id' => $distributorC->id,
            'stock' => 200,
        ]);

        Product::create([
            'name' => 'Produk C3 - Multi Sari Pangan',
            'description' => 'Produk Makanan C3 dari PT. Multi Sari Pangan.',
            'price' => 120000,
            'distributor_id' => $distributorC->id,
            'stock' => 200,
        ]);

        // Menambahkan produk untuk Inter Buana Mandiri
        Product::create([
            'name' => 'Produk D1 - Inter Buana Mandiri',
            'description' => 'Produk Komputer D1 dari Inter Buana Mandiri.',
            'price' => 300000,
            'distributor_id' => $distributorD->id,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Produk D2 - Inter Buana Mandiri',
            'description' => 'Produk Komputer D2 dari Inter Buana Mandiri.',
            'price' => 350000,
            'distributor_id' => $distributorD->id,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Produk D3 - Inter Buana Mandiri',
            'description' => 'Produk Komputer D3 dari Inter Buana Mandiri.',
            'price' => 400000,
            'distributor_id' => $distributorD->id,
            'stock' => 50,
        ]);

        // Menambahkan produk untuk GarudaFood
        Product::create([
            'name' => 'Produk E1 - GarudaFood',
            'description' => 'Produk Makanan Ringan E1 dari GarudaFood.',
            'price' => 50000,
            'distributor_id' => $distributorE->id,
            'stock' => 300,
        ]);

        Product::create([
            'name' => 'Produk E2 - GarudaFood',
            'description' => 'Produk Makanan Ringan E2 dari GarudaFood.',
            'price' => 60000,
            'distributor_id' => $distributorE->id,
            'stock' => 300,
        ]);

        Product::create([
            'name' => 'Produk E3 - GarudaFood',
            'description' => 'Produk Makanan Ringan E3 dari GarudaFood.',
            'price' => 70000,
            'distributor_id' => $distributorE->id,
            'stock' => 300,
        ]);
    }
}
