@layout('admin::layout')

@section('content')
<div class="mx-auto max-w-xl"><a href="{{ url('admin/users') }}" class="text-xs font-bold uppercase tracking-widest text-sogan">← Users</a><h1 class="mt-3 text-3xl font-bold">{{ $page_title }}</h1>
@if (isset($error))
<div class="mt-5 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700">{{ $error }}</div>
@endif
<form method="post" action="{{ isset($user) && isset($user->id) ? url('admin/users/'.$user->id) : url('admin/users') }}" class="mt-8 space-y-5 rounded-2xl bg-white p-6 shadow-sm"><label class="block text-sm font-semibold">Nama<input name="name" required value="{{ isset($user) ? $user->name : '' }}" class="mt-2 w-full rounded-lg border px-3 py-3 text-sm"></label><label class="block text-sm font-semibold">Email<input type="email" name="email" required value="{{ isset($user) ? $user->email : '' }}" class="mt-2 w-full rounded-lg border px-3 py-3 text-sm"></label><label class="block text-sm font-semibold">Role<select name="role" class="mt-2 w-full rounded-lg border px-3 py-3 text-sm"><option value="admin">admin</option></select></label><label class="block text-sm font-semibold">Password{{ isset($user) ? ' (kosongkan jika tidak diubah)' : '' }}<input type="password" name="password" {{ isset($user) ? '' : 'required' }} class="mt-2 w-full rounded-lg border px-3 py-3 text-sm"></label><button class="w-full rounded-lg bg-sogan px-5 py-3 text-sm font-semibold text-white">Simpan</button></form></div>
@endsection
