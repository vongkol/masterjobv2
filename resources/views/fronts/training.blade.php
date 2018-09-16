@extends('layouts.front')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Training Courses</h3>
        </div>
        <div class="col-md-12" style="font-size: 17px;">
        <ul>
                <li>
            During of our many years expereince with HR 
            Function in training and development, 
            we are qualified to conduct training as well as consultant
            on languages, AML soft skill and Specific Skills. On the other hand,
            we also provide customized training batch to suit individual company's needs.
            </li>
                </ul>
        </div>
        <div class="col-md-12">
           <hr>
        </div>
        <div class="col-md-12" style="font-size: 17px;">
            <h3 class="text-primary"> Why Training Programs Fail</h3>
            <ul>
                <li>
                    - No training goals are set
                </li>
                <li>
                    - Training goals are not in line with company goals
                </li>
                <li>
                - No accountability measurements are set up for trainers or trainees
                </li>
                <li>
                - Training is regarded as a one-time event and not as an ongoing need
                </li>
                <li>
                - Little or no support is given from upper
                </li>
                </ul>
            </div>
        </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Title</th>
                <th>Short Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trainings as $t)
            <tr>
               
                <td><a href="{{url('/front/training/'.$t->id)}}"><img src="{{asset($t->featured_image)}}" alt="" width="100"></div></td>
                <td><a href="{{url('/front/training/'.$t->id)}}"><strong>{{$t->topic}}</strong></a></td>
                <td> {{$t->short_description}}</td>
             
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12">
            <p>&nbsp;</p>
            {{$trainings->links()}}
        </div>
    </div>
    <p>&nbsp;</p>
@endsection
