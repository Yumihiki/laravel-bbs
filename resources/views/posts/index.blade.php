@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="mb-4">
            <a href="https://blog.hiroyuki90.com/articles/laravel-bbs/" class="btn btn-primary">参考サイト</a>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">投稿する</a>
        </div>
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-header">
                    {{ $post->category->name }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->body, 200))) !!}
                    </p>
                    <a href="{{ route('posts.show', ['post' => $post]) }}">続きを読む</a>

                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                        投稿者 {{ $post->user->name }}

                    </span>

                    @if ($post->comments_count)
                        <span class="badge badge-primary">
                            コメント {{ $post->comments_count }}件
                        </span>
                    @endif

                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mb-5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection