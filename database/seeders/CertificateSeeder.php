<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificate;
use File;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/colour.json');
        $data = json_decode($json);
        $certificate = [
                // Master Certificate
                'name' => 'Master Template',
                'code' => 'mastertemp',
                'file_certificate' => 'master.jpg',
                'file_font' => ["SourceSansPro-Regular.ttf","Whisper-Regular.ttf"],
                'font_colour' => $data,
                'status' => 'active',
        ];
            Certificate::create($certificate);
    }
}
