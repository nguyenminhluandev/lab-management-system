@extends('layouts.app')

@section('title', isset($user) ? 'Cập nhật người dùng' : 'Thêm người dùng')

@section('content')
<h4>{{ isset($user) ? 'Cập nhật người dùng' : 'Thêm người dùng' }}</h4>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST"
      action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}">
    @csrf
    @if(isset($user)) @method('PUT') @endif

    @include('admin.users.form', ['user' => $user ?? null])
</form>
@endsection
