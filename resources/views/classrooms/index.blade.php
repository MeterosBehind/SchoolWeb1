@extends('layouts.master')

@section('page-title', '教室預約')

@section('content')
    <div class="page-header">
        <h1>教室預約</h1>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="{{ route('classrooms.index',date('Y-m-d')) }}">預約</a></li>
        <li><a href="">管理</a></li>
    </ul>
    <br><br>
    {{ Form::open(['route' => 'classrooms.index', 'method' => 'GET']) }}
        <label for="this_date">選擇教室：</label>
        <input>
        <label for="this_date">選擇日期：</label>
        <script src="{{ asset('js/cal/jscal2.js') }}"></script>
        <script src="{{ asset('js/cal/lang/cn.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cal/jscal2.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cal/border-radius.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cal/steel/steel.css') }}">
        <input id="this_date" name="this_date" value="{{ substr($dates['d0'],0,10) }}">
        <script>
            Calendar.setup({
                dateFormat : '%Y-%m-%d',
                inputField : 'this_date',
                trigger    : 'this_date',
                onSelect   : function() { this.hide();}
            });
        </script>
        <button class="btn btn-success btn">送出</button>
    {{ Form::close() }}
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>預約教室</h4>
                </div>
                <div class="panel-content">
                    <table class="table table-striped">
                        <thead><tr><th>日期</th>
                            <?php
                                $d = ['0'=>'星期日','1'=>'星期一','2'=>'星期二','3'=>'星期三','4'=>'星期四','5'=>'星期五','6'=>'星期六'];
                            ?>
                            @foreach($dates as $date)
                                <?php
                                    $this_day = explode("-",$date);
                                ?>
                                <th>{{ $this_day[1] }}-{{ $this_day[2] }}</th>
                            @endforeach
                        </tr><tr><th>節次</th>
                            @foreach($dates as $date)
                                <?php
                                $this_day = explode("-",$date);
                                ?>
                                <th>{{ $d[$this_day[3]] }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $rows=array("","","","","","","");
                            $cols=array('早修',1,2,3,4,'午休',5,6,7,8);
                        ?>
                        @foreach($cols as $v1)
                            <tr>
                                <th>{{ $v1 }}</th>
                            @foreach($rows as $v2)
                                    <td>{{ $v2 }}</td>
                            @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
@endsection