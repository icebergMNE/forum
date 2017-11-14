@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="">
                            {{ $thread->creator->name }} posted:
                        </a>
                        {{ $thread->title }}
                    </div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row" style="color: #ffb836;">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        @auth
            <div class="row" style="color: #333333">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{ $thread->path() . '/replies' }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="have soething to say?" rows="5">
                            </textarea>
                            <button type="submit" class="btn btn-default">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="row" style="color: #333333;text-align: center">
                <div class="col-md-8 col-md-offset-2">
                    <p>please <a href="{{ route('login') }}">sing in</a> to participate in conversation!</p>
                </div>
            </div>
        @endauth
        <div class="row" style="padding-bottom: 200px;"></div>
    </div>
@endsection
