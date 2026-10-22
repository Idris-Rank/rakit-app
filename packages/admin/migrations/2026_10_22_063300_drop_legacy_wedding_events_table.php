<?php

defined('DS') or exit('No direct script access.');

class Admin_Drop_Legacy_Wedding_Events_Table
{
    public function up()
    {
        Schema::drop_if_exists('wedding_events_legacy_split');
    }

    public function down()
    {
        // Legacy transition data is intentionally not recreated.
    }
}
