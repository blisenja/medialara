@extends('layouts.app')
@section('content')
    <h3 class="text-center">Seluruh Postinganmu</h3>
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="ratio ratio-4x3" style="background-image: url('{{ url($post->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="card-title">{{ $post->title }}</h3>
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical text-danger"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item text-primary" href="{{ route('post.view', ['id' => $post->id]) }}">Update</a></li>
                                            <li><a class="dropdown-item text-danger" href="{{ route('post.delete', ['id' => $post->id]) }}">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p class="text-body-secondary">{{ $post->caption }}</p>
                            <p class="text-body-tertiary">Diposting pada tanggal {{ \carbon\carbon::parse($post->created_at)->locale('id')->translatedFormat('j F, Y')}} Oleh {{ $post->user->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
