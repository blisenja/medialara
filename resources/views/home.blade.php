@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selamat Welcome, {{ Auth::user()->name }}
                <p class="text-body-secondary">{{ Auth::user()->email }}</p></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <h2>Mulai Buat Postinganmu</h2>
                    <a href="{{ route('post.create') }}" class="btn text-white" style="background-color: #2F4F4F"><i class="bi bi-plus-circle-dotted">Buat Postingan</i></a>
                </div>
            </div><br><br>
            <h3 class="text-center">Statistika</h3><br>
            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Total postinganmu</h5>
                      <div class="row w-100 flex justify-content-between">
                        <div class="col-6">
                            <h1>{{ Auth::user()->posts->count() }}</h1>
                        </div>
                        <div class="col-6">
                            <h1>
                                <i class="bi bi-camera2"></i>
                            </h1>
                        </div>
                      </div>
                      <p class="card-text">Statistik jumlah postinganmu ini</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Lihat postinganmu</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="{{ route('post.index') }}" class="btn btn-primary" style="background-color: #2F4F4F">Lihat Postingan</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
