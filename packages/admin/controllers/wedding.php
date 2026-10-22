<?php

defined('DS') or exit('No direct script access.');

class Admin_Wedding_Controller extends Controller
{
    public function action_login()
    {
        if ('POST' !== Request::method()) {
            return View::make('admin::login', ['page_title' => 'Login Admin']);
        }

        try {
            if (Auth::attempt(['username' => Input::get('email'), 'password' => Input::get('password')])) {
                return Redirect::to('admin');
            }
        } catch (\Throwable $exception) {
            return View::make('admin::login', [
                'page_title' => 'Login Admin',
                'error' => 'Autentikasi gagal diproses. Periksa konfigurasi database dan akun admin.',
            ]);
        }

        return View::make('admin::login', [
            'page_title' => 'Login Admin',
            'error' => 'Email atau password tidak valid.',
            'email' => Input::get('email'),
        ]);
    }

    public function action_logout()
    {
        Auth::logout();
        return Redirect::to('admin/login');
    }

    public function action_index()
    {
        return View::make('admin::dashboard', [
            'page_title' => 'Dashboard Admin',
            'sections' => [
                ['title' => 'Data Mempelai', 'description' => 'Nama, foto, orang tua, dan biodata.', 'status' => 'Siap diatur'],
                ['title' => 'Rangkaian Acara', 'description' => 'Akad, resepsi, waktu, dan lokasi.', 'status' => 'Siap diatur'],
                ['title' => 'Pengaturan Undangan', 'description' => 'Judul, countdown, WhatsApp, dan musik.', 'status' => 'Siap diatur'],
                ['title' => 'RSVP & Ucapan', 'description' => 'Konfirmasi kehadiran dan buku tamu.', 'status' => 'Belum dibuat'],
            ],
        ]);
    }

    public function action_settings()
    {
        $couple = DB::table('wedding_couples')->first();
        $options = DB::table('wedding_options')->first();
        $events = DB::table('wedding_events')->order_by('sort_order')->get();
        $story = DB::table('wedding_stories')->first();
        $galleries = DB::table('wedding_galleries')->order_by('sort_order')->get();
        $media = DB::table('wedding_media')->order_by('id', 'desc')->get();

        if ('POST' === Request::method()) {
            foreach (['groom_name', 'bride_name', 'hero_date', 'event_target', 'whatsapp'] as $field) {
                if (!Input::has($field)) {
                    return $this->settings_view($couple, $options, $events, $story, $galleries, $media, null, 'Field '.str_replace('_', ' ', $field).' wajib diisi.');
                }
            }

            DB::table('wedding_couples')->where('id', '=', $couple->id)->update([
                'groom_name' => trim(Input::get('groom_name')),
                'groom_title' => trim(Input::get('groom_title')),
                'groom_parents' => trim(Input::get('groom_parents')),
                'groom_photo_url' => trim(Input::get('groom_photo_url')),
                'bride_name' => trim(Input::get('bride_name')),
                'bride_title' => trim(Input::get('bride_title')),
                'bride_parents' => trim(Input::get('bride_parents')),
                'bride_photo_url' => trim(Input::get('bride_photo_url')),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            DB::table('wedding_options')->where('id', '=', $options->id)->update([
                'title' => trim(Input::get('title')),
                'hero_date' => trim(Input::get('hero_date')),
                'event_target' => trim(Input::get('event_target')),
                'whatsapp' => trim(Input::get('whatsapp')),
                'audio_url' => trim(Input::get('audio_url')),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $posted_events = Input::get('events', []);
            foreach ($events as $event) {
                if (!isset($posted_events[$event->id])) continue;
                $value = $posted_events[$event->id];
                DB::table('wedding_events')->where('id', '=', $event->id)->update([
                    'name' => trim($value['name']),
                    'date_label' => trim($value['date_label']),
                    'time_label' => trim($value['time_label']),
                    'venue' => trim($value['venue']),
                    'address' => trim($value['address']),
                    'maps_url' => trim($value['maps_url']),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

            DB::table('wedding_stories')->where('id', '=', $story->id)->update([
                'eyebrow' => trim(Input::get('story_eyebrow')), 'title' => trim(Input::get('story_title')),
                'body' => trim(Input::get('story_body')), 'quote' => trim(Input::get('story_quote')),
                'image_url' => trim(Input::get('story_image_url')), 'image_alt' => trim(Input::get('story_image_alt')),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $posted_galleries = Input::get('galleries', []);
            foreach ($galleries as $gallery) {
                if (!isset($posted_galleries[$gallery->id])) continue;
                $value = $posted_galleries[$gallery->id];
                DB::table('wedding_galleries')->where('id', '=', $gallery->id)->update([
                    'image_url' => trim($value['image_url']), 'alt_text' => trim($value['alt_text']),
                    'caption' => trim($value['caption']), 'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

            $couple = DB::table('wedding_couples')->first();
            $options = DB::table('wedding_options')->first();
            $events = DB::table('wedding_events')->order_by('sort_order')->get();
            $story = DB::table('wedding_stories')->first();
            $galleries = DB::table('wedding_galleries')->order_by('sort_order')->get();
            $media = DB::table('wedding_media')->order_by('id', 'desc')->get();
            return $this->settings_view($couple, $options, $events, $story, $galleries, $media, 'Pengaturan berhasil disimpan.', null);
        }

        return $this->settings_view($couple, $options, $events, $story, $galleries, $media, null, null);
    }

    protected function settings_view($couple, $options, $events, $story, $galleries, $media, $success = null, $error = null)
    {
        return View::make('admin::settings', [
            'page_title' => 'Pengaturan Undangan',
            'couple' => $couple,
            'options' => $options,
            'events' => $events,
            'story' => $story,
            'galleries' => $galleries,
            'media' => $media,
            'success' => $success,
            'error' => $error,
        ]);
    }
}
