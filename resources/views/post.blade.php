@extends('layouts.maina')

@section('form')
    @include('layouts.header')
    <form action="{{route('message.post')}}"method="post">
        @csrf
        <label> Отправить пост </label>
        <input type="text" name="title" placeholder="Название вашего поста">
        <textarea type="text" name="content" placeholder="Например: Сегодня прекрасная погода"></textarea>
    </form>
@endsection
