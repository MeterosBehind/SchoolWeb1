@extends('layouts.master')

@section('page-title', '首頁')

@section('content')
    <div class="row">
        <div class="col-md-2">
            @foreach($blockLs as $blockL)
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ $blockL->name }}</div>
                    <div class="panel-body">
                        <ul>
                            @foreach($blockL->links as $link)
                                <li><a href="{{ $link->link }}" target="_blank">{{ $link->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="col-md-8">
            <?php $img = "/img/banner". rand(1,10) .".png" ?>
            <img class="img-responsive img-rounded" src="{{ asset($img) }}">
            <div class="page-header">
                <h1><a href="http://163.23.93.73/xoops2" target="_blank" class="btn btn-success btn-lg">->舊站入口<-</a></h1>
            </div>
            <div class="content">
                <h1>最新公告</h1>
            </div>
                @can('create', App\Models\Post::class)
                    <div class="text-right">
                        <a class="btn btn-success btn-xs" href="{{ route('posts.create') }}" role="button"><span class="glyphicon glyphicon-plus"></span>新增公告</a>
                    </div>
                @endcan
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>日期</th>
                        <th>公告標題</th>
                        <th>發佈者</th>
                        <th>分類</th>
                        <th>點閱</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <?php $updated = substr($post->published_at,0,10); ?>
                    <tr>
                        <th scope="row">{{ $updated }}</th>
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td><a href="{{ route('posts.index',['who_do'=>$post->who_do]) }}">{{ $post->who_do }}</a></td>
                        <td><a href="{{ route('posts.index',['category_id'=>$post->category_id]) }}">{{ $post->category->name }}</a></td>
                        <td>{{ $post->page_view }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav class="text-center" aria-label="Page navigation">
                    {{ $posts->links() }}
                </nav>

        </div>

        <div class="col-md-2">
            @foreach($blockRs as $blockR)
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ $blockR->name }}</div>
                    <div class="panel-body">
                        <ul>
                        @foreach($blockR->links as $link)
                                <li><a href="{{ $link->link }}" target="_blank">{{ $link->title }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br><br>
    @foreach($blockDs as $blockD)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{ $blockD->name }}</div>
                <div class="panel-body">
                    @foreach($blockD->links as $link)
                        <span class="glyphicon glyphicon-info-sign"></span><a href="{{ $link->link }}" target="_blank">{{ $link->title }}</a>　
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
