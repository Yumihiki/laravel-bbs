@extends('layout')

@section('content')
    <div ckass="container mt-4">
        <div class="border p-4">
            <!-- ここもどこに追加すべきか悩んだ -->
            <div class="mb-4 text-right">
                <a href="{{ route('posts.edit',['post' => $post]) }}" class="btn btn-primary">編集する</a>

                <form action="{{ route('posts.destroy', ['post' => $post]) }}" style="display: inline-block;" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">削除する</button>
            </form>
            </div>

            <h1 class="h5 mb-4">{{ $post->title }}</h1>

            <p class="mb-5"> {!! nl2br(e($post->body)) !!}</p>

            <section>
                <h2 class="h5 mb-4">コメント</h2>
                <form action="{{ route('comments.store') }}" class="mb-4" method="POST">
                    @csrf

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="body">本文</label>

                        <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? 'is-invalid': '' }}" rows="4">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">コメントする</button>
                    </div>
                </form>

                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2"> {!! nl2br(e($comment->body)) !!}</p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection