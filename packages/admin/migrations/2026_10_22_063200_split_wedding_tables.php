<?php

defined('DS') or exit('No direct script access.');

/**
 * Memecah tabel wedding lama yang terlalu gemuk menjadi domain kecil.
 *
 * wedding_couples : hanya data mempelai.
 * wedding_events  : hanya detail acara.
 * wedding_options : konfigurasi kecil website, bukan data pasangan/acara.
 */
class Admin_Split_Wedding_Tables
{
    public function up()
    {
        $old_settings = Schema::has_table('wedding_settings') ? DB::table('wedding_settings')->first() : null;
        $old_events = Schema::has_table('wedding_events') ? DB::table('wedding_events')->order_by('sort_order')->get() : [];
        $now = date('Y-m-d H:i:s');

        Schema::create('wedding_couples', function ($table) {
            $table->increments('id');
            $table->string('groom_name', 200);
            $table->string('groom_title', 100);
            $table->string('groom_parents', 200);
            $table->string('groom_photo_url', 500);
            $table->string('bride_name', 200);
            $table->string('bride_title', 100);
            $table->string('bride_parents', 200);
            $table->string('bride_photo_url', 500);
            $table->timestamps();
        });

        Schema::create('wedding_options', function ($table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->string('hero_date', 200);
            $table->string('event_target', 100);
            $table->string('whatsapp', 30);
            $table->string('audio_url', 500);
            $table->timestamps();
        });

        // Simpan tabel event lama sementara agar dapat dibuat ulang dengan schema sederhana.
        $legacy_events = 'wedding_events_legacy_split';
        if (Schema::has_table('wedding_events')) {
            Schema::rename('wedding_events', $legacy_events);
        }

        Schema::create('wedding_events', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('date_label', 200);
            $table->string('time_label', 100);
            $table->string('venue', 200);
            $table->string('address', 500);
            $table->string('maps_url', 500);
            $table->integer('sort_order');
            $table->timestamps();
        });

        DB::table('wedding_couples')->insert([
            'groom_name' => $old_settings ? $old_settings->groom_name : 'Raden Raka',
            'groom_title' => $old_settings ? $old_settings->groom_title : '',
            'groom_parents' => $old_settings ? $old_settings->groom_parents : '',
            'groom_photo_url' => $old_settings ? $old_settings->groom_photo_url : '',
            'bride_name' => $old_settings ? $old_settings->bride_name : 'Rara Sekar',
            'bride_title' => $old_settings ? $old_settings->bride_title : '',
            'bride_parents' => $old_settings ? $old_settings->bride_parents : '',
            'bride_photo_url' => $old_settings ? $old_settings->bride_photo_url : '',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('wedding_options')->insert([
            'title' => 'Raka & Sekar',
            'hero_date' => $old_settings ? $old_settings->hero_date : '',
            'event_target' => $old_settings ? $old_settings->event_target : '',
            'whatsapp' => $old_settings ? $old_settings->whatsapp : '',
            'audio_url' => $old_settings ? $old_settings->audio_url : '',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        if (0 === count($old_events)) {
            $old_events = [
                (object) ['name' => 'Akad Nikah', 'date_label' => 'Minggu, 20 Oktober 2026', 'time_label' => '08.00 — 10.00 WIB', 'venue' => 'Pendopo Agung', 'address' => 'Jl. Parangtritis No. 88, Yogyakarta', 'sort_order' => 1],
                (object) ['name' => 'Resepsi', 'date_label' => 'Minggu, 20 Oktober 2026', 'time_label' => '11.00 — 14.00 WIB', 'venue' => 'Pendopo Agung', 'address' => 'Jl. Parangtritis No. 88, Yogyakarta', 'sort_order' => 2],
            ];
        }

        foreach ($old_events as $event) {
            DB::table('wedding_events')->insert([
                'name' => $event->name,
                'date_label' => $event->date_label,
                'time_label' => $event->time_label,
                'venue' => $event->venue,
                'address' => $event->address,
                'maps_url' => $old_settings ? $old_settings->maps_url : '',
                'sort_order' => $event->sort_order,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        if (Schema::has_table('wedding_settings')) {
            Schema::drop('wedding_settings');
        }
    }

    public function down()
    {
        Schema::drop_if_exists('wedding_events');
        Schema::drop_if_exists('wedding_options');
        Schema::drop_if_exists('wedding_couples');
    }
}
