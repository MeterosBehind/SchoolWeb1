@extends('layouts.master')

@section('page-title', '報修系統')

@section('content')
    <div class="page-header">
        <h1>報修系統</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3>{{ $fun->name }}</h3>
            <div>
                <a href="{{ route('fixes.index') }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> 返回</a> <a class="btn btn-success" href="{{ route('fixes.create',$fun->id) }}" role="button"><span class="glyphicon glyphicon-plus"></span> 我要報修</a>
            </div>
        </div>
        <div class="panel-content">

            @foreach($fixes as $fix)
                <?php
                $content = str_replace(chr(13) . chr(10), '<br>', $fix->content);
                ?>
                <div>
                    @if($fix->done=="1")
                        <h4><span class="glyphicon glyphicon-ok-sign"></span> [已修復] {{ $fix->title }}</h4>
                    @else
                        <h4><span class="glyphicon glyphicon-paperclip"></span> {{ $fix->title }}</h4>
                    @endif

                    <hr>
                    {!! $content !!}<br>
                    {{ $fix->user->name }} - {{ $fix->created_at }}
                    @if($fix->fun->username == auth()->user()->username)
                        <?php
                            if($fix->done=="1"){
                                $checked="checked=checked";
                            }else{
                                $checked="";
                            }
                        ?>
                        <div>
                            <span class="glyphicon glyphicon-comment"></span> 回覆：
                            {{ Form::open(['route' => ['fixes.update',$fix->id], 'method' => 'PATCH']) }}
                            <table>
                                <tr>
                                    <td>
                                        完成：
                                    </td>
                                    <td>
                                        <input name="done" type="checkbox" value="1" style="zoom:200%" {{ $checked }}>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        留言：
                                    </td>
                                    <td>
                                        <input name="reply" type="test" value="{{ $fix->reply }}">
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-xs">送出</button>
                                    </td>
                                </tr>
                            </table>
                            {{ Form::close() }}
                        </div>
                    @else
                        <div>
                            <p class="text-danger"><span class="glyphicon glyphicon-comment"></span> 回覆：{{ $fix->reply }}</p>
                        </div>
                    @endif
                    <hr size="12px">
                </div>
            @endforeach
                <div>
                    {{ $fixes->links() }}
                </div>
        </div>
        <div class="panel-footer">
            負責人員：{{ $fun->username }}
        </div>
    </div>
@endsection