@extends('layouts.front')
@section('content')
<?php
    $count = DB::table('counters')->where('id', 1)->first();
    $cv = DB::table('resume')->where('active',1)->count();
    $job = DB::table('jobs')->where('active',1)->count();
?>
    <div class="counter">
        <div class="row">
            <div class="col-md-4 text-center"><div class="job-vdoo">Total Job Posting: {{$job}}</div></div>
            <div class="col-md-4  text-center"><div class="job-vdoo">Total CV Created: {{$cv}}</div></div>
            <div class="col-md-4  text-center"><div class="job-vdoo">Visitor Counter: {{$count->total}}</div></div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4 pd-0">
                <h5>Jobs By Category</h5>
            </div>
            @foreach($job_types as $typ)
                <li class="nav-item ml-auto"​ style="padding-right: 0">
                    <a class="jt" class="nav-link" href="{{url('job-type/'.$typ->id)}}">{{$typ->name}}!</a>
                </li> 
            @endforeach
        </div>
    </div>
    <div class="row row-vdoo">
        <div class="border-job col-md-9">
           <div class="row">
                @foreach($result as $cat)
                    <div class="col-md-6">
                        <div class="border">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12" >
                                    <a href="{{url('/category/'.$cat["id"])}}" class="a-block">
                                        <span class="gray">{{$cat['name']}}</span>
                                        <span class="orange float-right">{{$cat['total']}}</span>
                                    </a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3 training-course text-center">
            @foreach($training_courses as $tra)
                <div class="photo">
                    <a href="{{url($tra->url)}}" target="_blank">
                        <img src="{{asset('ads/'.$tra->photo)}}" width="100%">
                    </a>
                </div>
            @endforeach
            @foreach($video_trainings as $vid)
                <div class="photo">
                    <iframe width="100%" src="{{$vid->url}}" width="100%" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            @endforeach
        </div>
    </div>
    <p></p>
@endsection