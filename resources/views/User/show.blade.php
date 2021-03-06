@extends('layouts.app')

@section('content')

                <div class="d-inline-flex">
                    <div class="p-3 d-flex flex-column">
                        
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 font-weight-bold">{{ $user->name }}</h4>
                        </div>
                    </div>
                    <div class="p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex">
                            <div>
                                @if ($user->id === Auth::user()->id)
                                    <a href="{{ url('users/' .$user->id .'/edit') }}" class="btn btn-primary">プロフィールを編集する</a>
                                @else
                                    @if ($is_following)
                                        <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">フォロー解除</button>
                                        </form>
                                    @else
                                        <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-primary">フォローする</button>
                                        </form>
                                    @endif

                                    @if ($is_followed)
                                        <span class="mt-2 px-1 bg-secondary text-light">フォローされています</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">diary数</p>
                                <span>{{ $diary_count }}</span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">フォロー数</p>
                                <span>{{ $follow_count }}</span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">フォロワー数</p>
                                <span>{{ $follower_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($timelines))
            @foreach ($timelines as $timeline)
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $timeline->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        
                        
                        <div class="content">
                            <h1 class="title">{{$timeline->title }}</h1>
                            <h3>Date</h3>
                            <p>{{ $timeline->date }}</p>
                            <p>誰と: {{ $timeline->with }}</p>
                            <table class="template table-bordered table-hover">
                                <thead>
                                   <tr>
                                    <th class="col-md-1 text-center"><h2>Time</h2></th>
                        　           <th class="col-md-1 text-center"><h2>Subtitle</h2></th>
                        　           <th class="col-md-2 text-center"><h2>Text</h2></th>
                        　           <th class="col-md-4 text-center"><h2>Image</h2></th
                                   </tr> 
                                </thead>
                                @foreach ($timeline->templates as $template)
                                <tbody>
                                   <tr>
                                       <td>{{ $template->time }}</td>
                                       <td>{{ $template->subtitle }}</td>
                                       <td>{{ $template->text }}</td>
                                       <td><img src="https://diary-backet.s3.ap-northeast-1.amazonaws.com/{{ $template->image_path }}" width="600" height="300"></td>
                                   </tr>
                                </tbody>
                                @endforeach
                        　  </table>
                        　  
                        </div>
                        
                        <div class="card-footer py-1 d-flex justify-content-end bg-white">
                          
                            <div class="d-flex align-items-center">
                                @if (!in_array(Auth::user()->id, array_column($timeline->favorites->toArray(), 'user_id'), TRUE))
                                    <form method="POST" action="{{ url('favorites/') }}" class="mb-0">
                                        @csrf

                                        <input type="hidden" name="diary_id" value="{{ $timeline->id }}">
                                        <button type="submit" class="btn p-0 border-0 text-primary">イイね<i class="far fa-heart fa-fw"></i></button>
                                    </form>
                                @else
                                    <form method="POST"action="{{ url('favorites/delete/'.array_column($timeline->favorites->toArray(), 'id', 'user_id')[Auth::user()->id]) }}" class="mb-0">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn p-0 border-0 text-danger">イイね<i class="fas fa-heart fa-fw"></i></button>
                                    </form>
                                @endif
                                <p class="mb-0 text-secondary">{{ count($timeline->favorites) }}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $timelines->links() }}
    </div>
    <div class="footer">
            <a href="/">戻る</a>
    </div>
</div>
@endsection