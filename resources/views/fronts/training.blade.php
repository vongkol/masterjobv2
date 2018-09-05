@extends('layouts.front')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Training Courses</h3>
            <hr>
        </div>

        
    </div>
    <div class="row">
        @foreach($trainings as $t)
        <div class="col-sm-3">
            <img src="{{asset($t->featured_image)}}" alt="" width="100%">
            <p></p>
            <p>
                <a href="{{url('/front/training/'.$t->id)}}"><strong>{{$t->topic}}</strong></a>
            </p>
            <p class="text-justify">
                {{$t->short_description}}
            </p>
            <p>
                <a href="{{url('/front/training/'.$t->id)}}" class="btn btn-success btn-sm">Read More >></a>
            </p>
        </div>
        @endforeach
    </div>
    <p>&nbsp;</p>
@endsection
