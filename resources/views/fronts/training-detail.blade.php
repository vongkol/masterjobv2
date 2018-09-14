@extends('layouts.front')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-title">Topic - {{$training->topic}}</h4>
        </div>
    </div>
    <div class="row">
       <div class="col-sm-8">
            <div class="form-group row">
                <label for="" class="control-label col-sm-3">Training Date</label>
                <div class="col-sm-9">
                    : <strong>{{$training->training_date}}</strong>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3">Training Location</label>
                <div class="col-sm-9">
                    : <strong>{{$training->location}}</strong>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3">Speaker</label>
                <div class="col-sm-9">
                    : <strong>{{$training->speaker}}</strong>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3">Short Description</label>
                <div class="col-sm-9">
                    : <strong>{{$training->short_description}}</strong>
                </div>
            </div>
       </div>
       <div class="col-sm-4">
           <img src="{{asset($training->featured_image)}}" alt="" width="100%">
       </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <hr>
            <h4><u>Description</u></h4>
            {!!$training->description!!}
        </div>
    </div>
    <p>&nbsp;</p>
@endsection
