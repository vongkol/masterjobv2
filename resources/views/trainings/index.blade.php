@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Training List&nbsp;&nbsp;
                    <a href="{{url('/training/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Topic</th>
                                <th>Training Date</th>
                                <th>Location</th>
                                <th>Speaker</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $pagex = @$_GET['page'];
                                if(!$pagex)
                                    $pagex = 1;
                                $i = 18 * ($pagex - 1) + 1;
                            ?>
                            @foreach($trainings as $par)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <a href="{{url('/training/view/'.$par->id)}}" target="_blank">{{$par->topic}}</a>
                                    </td>
                                    <td>{{$par->training_date}}</td>
                                    <td>{{$par->location}}</td>
                                    <td>{{$par->speaker}}</td>
                                    <td>
                                        <a href="{{url('/training/edit/'.$par->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/training/delete/'.$par->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $trainings->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection