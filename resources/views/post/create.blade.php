@extends('layouts.app')

@section('content')
<div class="container">

      <div class="card">
        <div class="card-header">
          Gawe Post
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="post-title" class="form-label">Judul Postingan</label>
                  <input type="text" class="form-control" id="post-title" aria-describedby="emailHelp" name="title">
                  <div id="emailHelp" class="form-text">Buat semenarik mungkin</div>
                </div>
                <div class="mb-3">
                  <label for="caption" class="form-label">Caption</label>
                  <textarea type="text" class="form-control" id="caption" name="caption"></textarea>
                </div>
                <div class="mb-3">
                  <label for="File" class="form-label">Gambar Postingan</label>
                  <input type="file" class="form-control" id="File" accept="jpg,jpeg,image/png,image/jpeg" name="image">
                </div>
                <button type="submit" class="btn text-white" style="background-color: #2F4F4F">Submit</button>
              </form>
        </div>
      </div>
</div>
@endsection
