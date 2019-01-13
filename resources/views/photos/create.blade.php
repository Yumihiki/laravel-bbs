@extends('layouts.app')

@section('content')
<div>
    <h1>画像のアップロード</h1>

    <form action="{{ action('PhotosController@store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <fieldset>
        <div>
        <input type="file" name="image" id="file">

        @if ($errors->has('image'))
            {{ $errors->first('image') }}
        @endif
        </div>
    </fieldset>

    <input type="submit" value="アップロード">
    </form>
</div>

@endsection