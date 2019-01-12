@extends('layouts.app')

@section('content')
    <!--これをどこに記述したら良いのか分からなかった -->
    <div class="container mt-4">
        <div class="mb-4">
            <a href="https://blog.hiroyuki90.com/articles/laravel-bbs/" class="btn btn-primary">参考サイト</a>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">投稿を新規作成する</a>
        </div>
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->body, 200))) !!}
                    </p>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    <!-- ここもどこに記述すれば良かったのか分からなかった -->
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->body,200))) !!}
                    </p>
                    <a href="{{ route('posts.show', ['post' => $post]) }}">続きを読む</a>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
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