<?php

defined('DS') or exit('No direct script access.');

class Admin_Create_Wedding_Content_Tables
{
    public function up()
    {
        Schema::create('wedding_settings', function ($table) {
            $table->increments('id');
            $table->string('groom_name', 200);
            $table->string('groom_title', 100);
            $table->string('groom_parents', 200);
            $table->string('groom_photo_url', 500);
            $table->string('bride_name', 200);
            $table->string('bride_title', 100);
            $table->string('bride_parents', 200);
            $table->string('bride_photo_url', 500);
            $table->string('hero_date', 200);
            $table->string('event_target', 100);
            $table->string('venue', 200);
            $table->string('address', 500);
            $table->string('maps_url', 500);
            $table->string('whatsapp', 30);
            $table->string('audio_url', 500);
            $table->timestamps();
        });

        Schema::create('wedding_events', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('date_label', 200);
            $table->string('time_label', 100);
            $table->string('venue', 200);
            $table->string('address', 500);
            $table->boolean('featured');
            $table->integer('sort_order');
            $table->timestamps();
        });

        $now = date('Y-m-d H:i:s');
        DB::table('wedding_settings')->insert([
            'groom_name' => 'Raden Raka',
            'groom_title' => 'Putra pertama',
            'groom_parents' => 'Bapak Suryanto & Ibu Ratih',
            'groom_photo_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=500&q=80',
            'bride_name' => 'Rara Sekar',
            'bride_title' => 'Putri kedua',
            'bride_parents' => 'Bapak Haryono & Ibu Lestari',
            'bride_photo_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=500&q=80',
            'hero_date' => 'Minggu, 20 Oktober 2026',
            'event_target' => '2026-10-20T08:00:00+07:00',
            'venue' => 'Pendopo Agung, Yogyakarta',
            'address' => 'Jl. Parangtritis No. 88, Yogyakarta',
            'maps_url' => 'https://maps.google.com/?q=Yogyakarta',
            'whatsapp' => '6281234567890',
            'audio_url' => isset($_ENV['AUDIO_URL']) ? $_ENV['AUDIO_URL'] : '',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('wedding_events')->insert([
            [
                'name' => 'Akad Nikah', 'date_label' => 'Minggu, 20 Oktober 2026', 'time_label' => '08.00 — 10.00 WIB',
                'venue' => 'Pendopo Agung', 'address' => 'Jl. Parangtritis No. 88, Yogyakarta', 'featured' => 0, 'sort_order' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'name' => 'Resepsi', 'date_label' => 'Minggu, 20 Oktober 2026', 'time_label' => '11.00 — 14.00 WIB',
                'venue' => 'Pendopo Agung', 'address' => 'Jl. Parangtritis No. 88, Yogyakarta', 'featured' => 1, 'sort_order' => 2,
                'created_at' => $now, 'updated_at' => $now,
            ],
        ]);
    }

    public function down()
    {
        Schema::drop_if_exists('wedding_events');
        Schema::drop_if_exists('wedding_settings');
    }
}
