@extends('layouts.front')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 pd-0">
                    <h5>Jobs By Category</h5>
                    <ul class="list-group">
                        @foreach($categories as $cat)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{url('/category/'.$cat->id)}}"><img src="{{asset('img/tag.jpg')}}" width="13"> &nbsp;{{$cat->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9 rp">
                    <h5>List of Jobs</h5>
                    <div class="border">
                    @if(count($jobs)<=0)
                        <div class="row">
                            <div class="col-sm-12 text-center"><br>
                                <h5 class="text-danger">This category has no job posting!</h5> 
                            </div>
                        </div>
                    @endif
                    @foreach($jobs as $job)
                        <div class="row">
                            <div class="col-sm-12">
                            <a href="{{url('/job/'.$job->id)}}" style="text-decoration: none;"  target="_blank">
                                <aside class="job-title new-job">
                                   <span class="blue-job">{{$job->job_title}}</span>
                                    @if($job->create_at>=date('Y-m-d', strtotime(date('Y-m-d') . '- 7 day')))&nbsp;&nbsp;
                                    <img src="{{asset('img/new.png')}}">
                                    @endif
                                    <aside>
                                        <span class="txt-gray">{{$job->cname}}</span>
                                    </aside>
                                </aside>
                                <aside>
                                    <span class="text-prmary"><i class="fa fa-bullseye"></i> {{$job->catname}}</span>&nbsp;&nbsp;
                                   <span class="text-danger"><i class="fa fa-calendar-times-o"></i> {{trans("labels.close_on")}} {{$job->closing_date}}</span> &nbsp;&nbsp;<i class="fa fa-map-marker text-success"></i> 
                                   <span class="text-success">{{$job->location}}</span>
                                </aside>
                            </a>
                                <hr>
                            </div>
                        </div>
                    @endforeach <br>
                    {{$jobs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section><br>
@endsection
@section('customer')
    <div class="container">
        <div class="row">
            <div class="well-custom text-center bold orange our-partner">
                {{trans("labels.our_customer")}}
            </div>
            <div class="slide-partner-img">
                <div id="carousel0"  class="owl-carousel owl-theme">
                    <?php
                    // get customers
                    $customers = DB::table('partners')
                        ->where('type', 'customer')
                        ->where('active',1)
                        ->orderBy('sequence')
                        ->get();
                    ?>
                    @foreach($customers as $cus)
                        <div class="item text-center">
                            <img src="{{asset('partners/'.$cus->logo)}}" alt="{{$cus->name}}" class="img-responsive" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <section class="container well-custom">
        <div class="row">
            <div class="col-sm-12">
                <?php
                // get bottom advertisement
                $bottom_ads = DB::table('advertisements')
                    ->where('active', 1)
                    ->where('position','Bottom')
                    ->orderBy('order_number')
                    ->get();
                ?>
                @foreach($bottom_ads as $bads)
                    <div class="col-md-2 col-sm-2 padding-top-and-button">
                        <img src="{{asset('ads/'.$bads->photo)}}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection