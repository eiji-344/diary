@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>マイページ</h1>
            <h1>Diary Name</h1>
            <div id="test"  >test</div>
            <div class='diaries'>
                @foreach ($diaries as $diary)
                    <div class='diary'>
                        <h2><p class='body'>{{ $diary->date }}</p></h2>
                        <h2><a href="/diaries/{{ $diary->id }}">{{ $diary->title }}</a></h2>
                        @foreach ($diary->templates as $template)
                        <div class="address"  >{{ $template->address }}</div>
                        @endforeach
                    </div>
            @endforeach
            </div>
            {{--<button onclick="getDomElementModule.getClasses('address')">住所を取得</button>--}}
            
            <div id="map" style="height:500px">
	        </div>
	        
	        
	        
	        
	        
            
            {{--　自分の投稿やフォローしているアカウントを見れるようにする --}}
            <!--<div class="card">-->
            <!--    <div class="card-header">Dashboard</div>-->

            <!--    <div class="card-body">-->
            <!--        @if (session('status'))-->
            <!--            <div class="alert alert-success" role="alert">-->
            <!--                {{ session('status') }}-->
            <!--            </div>-->
            <!--        @endif-->

            <!--        You are logged in!-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
</div>
@endsection
