@extends('layout')
@section('content')
@use('App\Models\User', 'User')
@use('App\Models\Article', 'Article')

@if(session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Article Name</th>
      <th scope="col">Description</th>
      <th scope="col">Author</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $comment)
    <tr>
      <th scope="row">{{$comment->created_at}}</th>
      <td><a href="/article/{{ $comment->article_id }}">{{Article::findOrFail($comment->article_id)->name}}</a></td>
      <td>{{$comment->desc}}</td>
      <td>{{ User::findOrFail($comment->user_id)->name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $comments->links() }}
@endsection