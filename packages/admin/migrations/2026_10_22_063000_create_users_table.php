<?php

defined('DS') or exit('No direct script access.');

class Admin_Create_Users_Table
{
    /**
     * Buat tabel pengguna untuk autentikasi admin.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('email', 200);
            $table->string('password', 255);
            $table->string('role', 50);
            $table->timestamps();
            $table->unique('email');
        });

        $email = isset($_ENV['ADMIN_EMAIL']) ? trim($_ENV['ADMIN_EMAIL']) : '';
        $password = isset($_ENV['ADMIN_PASSWORD']) ? $_ENV['ADMIN_PASSWORD'] : '';

        if ('' !== $email && '' !== $password) {
            DB::table('users')->insert([
                'name' => 'Administrator',
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    /**
     * Hapus tabel pengguna.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop_if_exists('users');
    }
}
