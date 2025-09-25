<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::upsert([
            [
                'key' => 'twitter_link',
                'label' => 'Lien Twitter',
                'value' => '',
            ],
            [
                'key' => 'instagram_link',
                'label' => 'Lien Instagram',
                'value' => '',
            ],
            [
                'key' => 'facebook_link',
                'label' => 'Lien Facebook',
                'value' => '',
            ],
            [
                'key' => 'mentions_legals_link',
                'label' => 'Lien des mentions légales',
                'value' => '',
            ],
            [
                'key' => 'rgpd_link',
                'label' => 'Lien des réglementations européennes',
                'value' => '',
            ],
        ], 'key');
    }
}
