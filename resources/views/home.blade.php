@extends('layouts.app')

@section('content')

<div class="container">
    
    <h1>マイページ</h1>
    <h2 class="mb-3">Diary</h2>
        
    <div class='diaries row'>
        @foreach ($diaries as $diary)
            <div class='diary col-md-4 my-3'>
                <h3><p class='body'>{{ $diary->date }}</p></h2>
                <h2><a href="/diaries/{{ $diary->id }}">{{ $diary->title }}</a></h2>
                @foreach ($diary->templates as $template)
                <div class="address" hidden>{{ $template->address }}</div>
                @endforeach
            </div>
        @endforeach
        
        </div>
        <h2 class='mt-5'>思い出の地</h2>
        <div class="mt-3" id="map" style="height:500px"></div>
            
</div>
@endsection
