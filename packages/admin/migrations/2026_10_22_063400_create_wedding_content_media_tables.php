<?php

defined('DS') or exit('No direct script access.');

class Admin_Create_Wedding_Content_Media_Tables
{
    public function up()
    {
        Schema::create('wedding_stories', function ($table) {
            $table->increments('id');
            $table->string('eyebrow', 100);
            $table->string('title', 200);
            $table->text('body');
            $table->text('quote');
            $table->string('image_url', 500);
            $table->string('image_alt', 200);
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('wedding_galleries', function ($table) {
            $table->increments('id');
            $table->string('image_url', 500);
            $table->string('alt_text', 200);
            $table->string('caption', 300);
            $table->boolean('is_active');
            $table->integer('sort_order');
            $table->timestamps();
        });

        Schema::create('wedding_media', function ($table) {
            $table->increments('id');
            $table->string('type', 30);
            $table->string('disk', 50);
            $table->string('path', 500);
            $table->string('url', 500);
            $table->string('alt_text', 200);
            $table->string('mime_type', 100);
            $table->integer('size_bytes');
            $table->string('status', 30);
            $table->timestamps();
        });

        $now = date('Y-m-d H:i:s');
        DB::table('wedding_stories')->insert([
            'eyebrow' => 'Sebuah cerita',
            'title' => 'Dari salam menjadi janji.',
            'body' => 'Berawal dari pertemuan sederhana di sebuah sore di Yogyakarta, kami belajar bahwa cinta tumbuh dari perhatian-perhatian kecil. Dengan restu keluarga, kami melangkah menuju perjalanan baru.',
            'quote' => 'Tresna iku tuwuh saka ati.',
            'image_url' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1000&q=85',
            'image_alt' => 'Dekorasi pernikahan Jawa',
            'is_active' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('wedding_galleries')->insert([
            ['image_url' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1000&q=85', 'alt_text' => 'Dekorasi pernikahan Jawa', 'caption' => 'Hari bahagia kami', 'is_active' => 1, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['image_url' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1000&q=85', 'alt_text' => 'Momen pernikahan', 'caption' => 'Menyatukan dua hati', 'is_active' => 1, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('wedding_media')->insert([
            'type' => 'image', 'disk' => 'external', 'path' => '',
            'url' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1000&q=85',
            'alt_text' => 'Dekorasi pernikahan Jawa', 'mime_type' => 'image/jpeg', 'size_bytes' => 0,
            'status' => 'active', 'created_at' => $now, 'updated_at' => $now,
        ]);
    }

    public function down()
    {
        Schema::drop_if_exists('wedding_media');
        Schema::drop_if_exists('wedding_galleries');
        Schema::drop_if_exists('wedding_stories');
    }
}
