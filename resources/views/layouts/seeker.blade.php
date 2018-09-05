<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="sor vichey">
        <title>Master Jobs Cambodia</title>
        <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
        <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('front/css/4-col-portfolio.css')}}" rel="stylesheet">
    </head>
    <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <?php $logo = DB::table('logos')->first(); ?>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('img/'.$logo->photo)}}" alt="logo" title="{{$logo->name}}" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav" id="menu_top">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">{{trans("labels.home")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('page/2')}}">{{trans("labels.about_us")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('page/3')}}">{{trans("labels.training")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('page/4')}}">{{trans("labels.recruitment")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('seeker/login')}}">{{trans("labels.job_seeker")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('employer/login')}}">{{trans("labels.employer")}}</a>
                </li>
                @if(Session::has('seeker'))
                    <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="{{url('seeker/profile')}}" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, {{session('seeker')->first_name}}</a>
                        <div class="dropdown-menu " style="font-size: 13px;" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="{{url('seeker')}}">My Profile</a>
                            <a class="dropdown-item" href="{{url('seeker/cv')}}">My Resume</a>
                            <a class="dropdown-item" href="{{url('seeker/document')}}">My Document</a>
                            <a class="dropdown-item" href="{{url('seeker/reset-password')}}">Change Password</a>
                            <a class="dropdown-item text-danger" href="{{url('/seeker/logout')}}">Logout</a>
                        </div>
                    </li>
                @endif
            </ul>
            <li class="nav-item ml-auto">
                    <a class="nav-link" href="#" onclick="chLang(event,'kn')"><img src="{{asset('front/img/kh.png')}}" width="20"> ភាសាខ្មែរ</a>
                    <a class="nav-link" href="#" onclick="chLang(event,'en')"><img src="{{asset('front/img/en.png')}}" width="20"> English</a>
                </li>
            </div>
        </div>
    </nav>
    <?php 
    $slides = DB::table('slides')->orderBy('order', 'asc')->where('active',1)->get();
    $i = 1;
?>
<div class="container-fluit">   
    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach ($slides as $sli)
            @if($i == 1)
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{asset('img/'.$sli->photo)}}" alt="slide" width="100%">
                </div>
            @else 
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{asset('img/'.$sli->photo)}}" alt="slide" width="100%">
                </div>
            @endif
            <?php $i++;?>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
    <div class="container">
        <div class='row'>
            <div class='col-sm-12'>
                <form action="{{url('/job/search')}}" method="get" class="form-hozintal">
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="text" class="form-control search-box" placeholder="Keyword, Position, Location..." aria-label="Keyword, Position, Location..." aria-describedby="basic-addon2" name="q" id="q">
                    <div class="input-group-append">
                        <button class="btn btn-primary search-button" type="submit">{{trans('labels.search')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <p></p>
            </div>
        </div>
        <div class="col-md-12"> 
            <div class="row">
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="page-title">{{trans("labels.manage_account")}}</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{url('/seeker')}}">{{trans("labels.my_profile")}}</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{url('/seeker/cv')}}">{{trans("labels.my_resume")}}</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{url('/seeker/document')}}">{{trans("labels.my_document")}}</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{url('/seeker/reset-password')}}">{{trans("labels.change_password")}}</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{url('/seeker/logout')}}" class="text-danger">{{trans("labels.logout")}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-12 col-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
  <br>
    <div class="container">
        <h5>Cooperated Companies</h5> 
        <?php  
        $partners = DB::table('partners')
            ->orderBy('sequence', "asc")
            ->where('active',1)
            ->get();
        
        $companies = DB::table('coops')->where('active',1)->orderBy('sequence')->get();
      
        ?>    
        <div class="col-md-12 b">
            <div class="row">
                @foreach($companies as $com)
                    <div class="col-md-2 col-sm-2" align="center">
                        <div  class="border-com">
                            <a href="{{$com->url}}" target="_blank">
                                <img src="{{asset('uploads/coops/'.$com->logo)}}" class="img-height">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <p></p>
        <h5>Featured Companies</h5> 
        <?php
            $subs = DB::table('subscriptions')->where('package_id', 1)->where('active',1)->get();
            $arr = array();
            foreach($subs as $s)
            {
                array_push($arr, $s->employer_id);
            }
            $coms = DB::table('companies')->whereIn('employer_id',$arr)->orderBy('id','desc')->paginate(18);
        ?>
        <div class="col-md-12 b">
            <div class="row">
                @foreach($coms as $com)
                    <div class="col-md-2 col-sm-2" align="center">
                        <div  class="border-com">
                            <a href="{{$com->website}}" target="_blank">
                                <img src="{{asset('company/'.$com->logo)}}" class="img-height">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <p></p>
        <h5>Recruitment Agencies</h5>     
        <div class="col-md-12 b">
            <div class="row">
                @foreach($partners as $par)
                    <div class="col-md-2 col-sm-2 col-12" align="center">
                        <div  class="border-com">
                            <a href="{{$par->url}}" target="_blank">
                                <img src="{{asset('partners/'.$par->logo)}}" class="img-height">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <p></p>
    <?php  $posts = DB::Table('posts')->orderBy('id', 'desc')->where('active',1)->paginate(6);?>
    <div class="container">
        <h5>Resources Corner</h5>
        <div class="co-md-12 b">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-3 pd-r">
                            <div class="mr">
                                <a href="{{url('/resource/'.$post->id)}}" target="_blank">
                                    <img src="{{asset('/uploads/posts/'.$post->featured_image)}}" alt="" width="100%">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-9 pr">
                            <div class="">
                                <span><b><a href="{{url('/resource/'.$post->id)}}" target="_blank">{{$post->title}}</a></b></span> <br>
                                <span>{{$post->short_description}}</span> 
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
             <p></p>
            {{$posts->links()}}
        </div>
    </div>
    <p></p>
    <!-- /.container -->
    </div><!-- Footer -->
    
    <footer class="bg-default">
        <div class="container">
           <div class="col-md-12">
               <div class="row">
                <div class="col-md-4">
                    <h5 class="text-footer">Contact Us</h5>
                    <aside><i class="fa fa-phone"></i>&nbsp;&nbsp;855 93 909 242 / 855 17 909 938</aside> 
                    <aside><i class="fa fa-phone"></i>&nbsp;&nbsp;855 86 886 637 / 855 98 900 190</aside> 
                    <aside><i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:mtc@masterjobscambodia.com" class="text-white">mtc@masterjobscambodia.com</a></aside> 
                </div>
                <div class="col-md-4">
                    <h5 class="text-footer"> Our Services</h5>
                    <i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Announcement and Consultant  <br>
                    <i class="fa fa-compass"></i>&nbsp;&nbsp;Assisting Company Recruitment <br>
                    <i class="fa fa-edit"></i>&nbsp;&nbsp;Provide AML and Skills Training 
                   
                </div>
                   <?php $socials = DB::table('socials')->orderBy('order_number', 'asc')->where('active',1)->get();?>
                   <div class="col-md-4">
                       <h5 class="text-footer"> Socail Network</h5>
                       <aside>
                            @foreach($socials as $soc)
                            <a href="{{url($soc->url)}}" target="_blank">
                                <img src="{{asset('img/'.$soc->icon)}}" alt=""  style="border: 1px solid #ccc;">
                            </a>
                            @endforeach
                        </aside> 
                   </div>
               </div>
           </div>
        </div>
        </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
    <script>
        function chLang(evt, ln)
        {
            evt.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{url('/')}}" + "/language/" + ln,
                success: function(sms){
                    if(sms>0)
                    {
                        location.reload();
                    }
                }
            });
        }
    </script>
  </body>
</html>

 