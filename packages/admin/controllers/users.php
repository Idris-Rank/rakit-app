<?php

defined('DS') or exit('No direct script access.');

class Admin_Users_Controller extends Controller
{
    public function action_index()
    {
        return View::make('admin::users.index', [
            'page_title' => 'Users',
            'users' => DB::table('users')->order_by('id', 'desc')->get(),
        ]);
    }

    public function action_create()
    {
        return View::make('admin::users.form', ['page_title' => 'Tambah User']);
    }

    public function action_store()
    {
        $name = trim(Input::get('name'));
        $email = trim(Input::get('email'));
        $role = trim(Input::get('role', 'admin'));
        $password = Input::get('password');

        if ('' === $name || '' === $email || '' === $password) {
            return View::make('admin::users.form', ['page_title' => 'Tambah User', 'error' => 'Nama, email, dan password wajib diisi.', 'user' => (object) compact('name', 'email', 'role')]);
        }

        if (DB::table('users')->where('email', '=', $email)->first()) {
            return View::make('admin::users.form', ['page_title' => 'Tambah User', 'error' => 'Email sudah digunakan.', 'user' => (object) compact('name', 'email', 'role')]);
        }

        DB::table('users')->insert(['name' => $name, 'email' => $email, 'role' => $role, 'password' => Hash::make($password), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        return Redirect::to('admin/users');
    }

    public function action_edit($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();
        return is_null($user) ? Response::error('404') : View::make('admin::users.form', ['page_title' => 'Edit User', 'user' => $user]);
    }

    public function action_update($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();
        if (is_null($user)) return Response::error('404');

        $values = ['name' => trim(Input::get('name')), 'email' => trim(Input::get('email')), 'role' => trim(Input::get('role', 'admin')), 'updated_at' => date('Y-m-d H:i:s')];
        if ('' !== trim(Input::get('password'))) $values['password'] = Hash::make(Input::get('password'));
        DB::table('users')->where('id', '=', $id)->update($values);
        return Redirect::to('admin/users');
    }

    public function action_delete($id)
    {
        if ((int) Auth::user()->id === (int) $id) return Redirect::to('admin/users');
        DB::table('users')->where('id', '=', $id)->delete();
        return Redirect::to('admin/users');
    }
}
