<?php

defined('DS') or exit('No direct script access.');

class Main_Controller extends Base_Controller
{
    /**
     * Handle GET /.
     *
     * @return View
     */
    public function action_index()
    {
        return view('wedding.index', [
            'couple' => [
                'groom' => 'Raden Raka',
                'bride' => 'Rara Sekar',
            ],
            'event' => [
                'date' => 'Minggu, 20 Oktober 2026',
                'venue' => 'Pendopo Agung, Yogyakarta',
                'target' => '2026-10-20T08:00:00+07:00',
            ],
            'audio_url' => $_ENV['AUDIO_URL'] ?? '',
        ]);
    }
}
