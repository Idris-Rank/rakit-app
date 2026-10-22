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
        $couple = DB::table('wedding_couples')->first();
        $options = DB::table('wedding_options')->first();
        $events = DB::table('wedding_events')->order_by('sort_order')->get();
        $story = DB::table('wedding_stories')->where('is_active', '=', 1)->first();
        $galleries = DB::table('wedding_galleries')->where('is_active', '=', 1)->order_by('sort_order')->get();

        if (is_null($couple) || is_null($options)) {
            return Response::error('500');
        }

        $primary_event = count($events) > 0 ? $events[0] : null;

        return view('wedding.index', [
            'couple' => [
                'groom' => $couple->groom_name,
                'groom_title' => $couple->groom_title,
                'groom_parents' => array_pad(explode(' & ', $couple->groom_parents), 2, ''),
                'groom_photo_url' => $couple->groom_photo_url,
                'bride' => $couple->bride_name,
                'bride_title' => $couple->bride_title,
                'bride_parents' => array_pad(explode(' & ', $couple->bride_parents), 2, ''),
                'bride_photo_url' => $couple->bride_photo_url,
            ],
            'event' => [
                'date' => $options->hero_date,
                'venue' => $primary_event ? $primary_event->venue : '',
                'address' => $primary_event ? $primary_event->address : '',
                'maps_url' => $primary_event ? $primary_event->maps_url : '',
                'target' => $options->event_target,
            ],
            'events' => $events,
            'audio_url' => $options->audio_url,
            'whatsapp' => $options->whatsapp,
            'title' => $options->title,
            'story' => $story,
            'galleries' => $galleries,
        ]);
    }
}
