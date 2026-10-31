<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'whatsapp_number' => '6289681212927',
            'address' => 'Dusun Sumberjo, Desa Tanjung, Kec. Pagu, Kab. Kediri, Jawa Timur',
            'opening_hours' => '08.00 - 17.00',
        ]);

        $products = [
            ['Jamur Crispy', 'tersedia'],
            ['Jamur Kuping Crispy', 'tersedia'],
            ['Usus Crispy', 'habis'],
            ['Pare Crispy', 'tersedia'],
        ];

        foreach ($products as [$name, $status]) {
            $product = Product::create([
                'name' => $name,
                'description' => 'Deskripsi singkat '.$name.'.',
                'status' => $status,
            ]);

            $product->sizes()->createMany([
                ['size' => '200 gr', 'sale_type' => 'eceran', 'price' => 28000],
                ['size' => '250 gr', 'sale_type' => 'eceran', 'price' => 35000],
                ['size' => '500 gr', 'sale_type' => 'eceran', 'price' => 65000],
                ['size' => '1 kg',   'sale_type' => 'kiloan', 'price' => 125000],
            ]);
        }
    }
}
