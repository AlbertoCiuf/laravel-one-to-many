@extends('layouts.app')

@section('title')
 | Modifica {{$post->title}}
@endsection

@section('content')
<div class="container">
  <h1>Stai modificando: {{$post->title}}</h1>

  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{route('admin.posts.update', $post)}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" 
      class="form-control @error('title') is-invalid @enderror" 
      id="title" name="title" placeholder="Titolo del post" 
      value="{{old('title', $post->title)}}">

      @error('title')
      <div class="text-danger">
        {{$message}}
      </div>
      @enderror

    </div>

    <div class="mb-3">
      <label for="content" class="form-label">Contenuto</label>
      <textarea class="form-control @error('content') is-invalid @enderror" 
      id="content" name="content" rows="3" placeholder="Testo del post">{{old('content', $post->content)}}</textarea>

      @error('content')
      <div class="text-danger">
        {{$message}}
      </div>
      @enderror

    </div>

    <button type="submit" class="btn btn-primary">Invia</button>
    <button type="reset" class="btn btn-secondary">Reset</button>

  </form>

</div>
@endsection