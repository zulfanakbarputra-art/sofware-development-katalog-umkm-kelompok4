<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        if (Product::exists() || Setting::exists()) {
            return;
        }

        Setting::create([
            'whatsapp_number' => '6281234567890',
            'address' => 'Dusun Sumberejo, Desa Tanjung, Kec. Pagu, Kab. Kediri, Jawa Timur',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.104002188322!2d112.06657101167687!3d-7.778796292208586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785a17886cfdcf%3A0x6ef0f92d700a9351!2sIndo%20Jamur%20Crispy!5e0!3m2!1sen!2sus!4v1794461304546!5m2!1sen!2sus',
            'opening_hours' => 'Setiap Hari, 07.00 - 20.00 WIB',
        ]);

        $sizes = [
            ['200 gr', 'eceran', 20000],
            ['250 gr', 'eceran', 25000],
            ['500 gr', 'eceran', 50000],
            ['1 kg', 'kiloan', 90000],
        ];

        $products = [
            [
                'Jamur Crispy', 'tersedia', 'jamur-crispy.webp',
                'Jamur tiram segar dibalut tepung bumbu, digoreng sampai renyah. Gurih dan pas untuk teman santai.',
            ],
            [
                'Jamur Kuping Crispy', 'tersedia', 'jamur-kuping-crispy.webp',
                'Jamur kuping dengan tekstur kriuk di luar dan sedikit kenyal di dalam. Bumbunya meresap sampai gigitan terakhir.',
            ],
            [
                'Usus Crispy', 'habis', 'usus-crispy.webp',
                'Usus ayam yang dibersihkan dengan teliti, dibumbui, lalu digoreng kering. Renyah dan bikin nagih.',
            ],
            [
                'Pare Crispy', 'tersedia', 'pare-crispy.webp',
                'Irisan pare tipis yang digoreng renyah dengan rasa pahit yang lembut. Varian sayur yang beda dari biasanya.',
            ],
        ];

        foreach ($products as [$name, $status, $photo, $description]) {
            Storage::disk('public')->put(
                'products/'.$photo,
                file_get_contents(database_path('seeders/images/'.$photo))
            );

            $product = Product::create([
                'name' => $name,
                'description' => $description,
                'photo' => 'products/'.$photo,
                'status' => $status,
            ]);

            foreach ($sizes as [$size, $saleType, $price]) {
                $product->sizes()->create([
                    'size' => $size,
                    'sale_type' => $saleType,
                    'price' => $price,
                ]);
            }
        }
    }
}
