@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Detail Training&nbsp;&nbsp;
                    <a href="{{url('/training')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                   <div class="row">
                       <div class="col-sm-8">
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Training Topic</label>
                                <div class="col-sm-9">
                                    : <strong>{{$training->topic}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Training Date</label>
                                <div class="col-sm-9">
                                    : <strong>{{$training->training_date}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Training Location</label>
                                <div class="col-sm-9">
                                    : <strong>{{$training->location}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Speaker</label>
                                <div class="col-sm-9">
                                    : <strong>{{$training->speaker}}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Short Description</label>
                                <div class="col-sm-9">
                                    : <strong>{{$training->short_description}}</strong>
                                </div>
                            </div>
                       </div>
                       <div class="col-sm-4">
                           <h4>Featured Image</h4>
                           <p></p>
                           <img src="{{asset($training->featured_image)}}" alt="" width="200">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-12">
                           <h4>Description</h4>
                           {!!$training->description!!}
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 170;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
   var roxyFileman = "{{asset('fileman/index.html?integration=ckeditor')}}"; 

  CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'});
</script> 
@endsection