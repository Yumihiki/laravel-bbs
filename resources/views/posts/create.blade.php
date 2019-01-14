@extends('layouts.app')

@section('content')
    <div ckass="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">投稿の新規作成</h1>

            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="title" name="title" class="form-control {{$errors->has('title')?'is-invalid':''}}" value="{{ old('title')}}" type="text">

                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category_id">カテゴリ</label>
                        <select name="category_id" type="text">
                            <option></option>
                            <option value="1" name="1">ポエム</option>
                            <option value="2" name="2">技術相談</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">画像</label>
                        <select name="image" type="file" id="file">
                        @if ($errors->has('image'))
                            {{ $errors->first('image') }}
                        @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="body">本文</label>

                        <textarea name="body" id="body" class="form-control {{ $errors->has('body')?'is-invalid':''}}" rows="4">{{ old('body') }}</textarea>

                        @if ($errors->has('body'))
                            <div class=" invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('top') }}" class="btn btn-secondary">キャンセル</a>
                    <button type="submit" class="btn btn-primary">投稿する</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection