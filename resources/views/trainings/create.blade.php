@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Training&nbsp;&nbsp;
                    <a href="{{url('/training')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif

                    <form 
                        action="{{url('/training/save')}}" 
                        class="form-horizontal" 
                        enctype="multipart/form-data"  
                        method="post"
                    >
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="topic" class="control-label col-lg-1 col-sm-2">Topic <span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required autofocus name="topic" id="topic" class="form-control" value="{{old('topic')}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="training_date" class="control-label col-lg-1 col-sm-2">Training Date <span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="date" name="training_date" id="training_date" value="{{old('training_date')}}" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="control-label col-lg-1 col-sm-2">Location</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" name="location" id="location" class="form-control" value="{{old('location')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="speaker" class="control-label col-lg-1 col-sm-2">Speaker</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" name="speaker" id="speaker" class="form-control" value="{{old('speaker')}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="featured_image" class="control-label col-lg-1 col-sm-2">Featured Image</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="file" name="featured_image" id="featured_image" accept="image/*" onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="control-label col-lg-1 col-sm-2"></label>
                            <div class="col-lg-6 col-sm-8">
                                <img src="" id="img"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-lg-1 col-sm-2">Short Description</label>
                            <div class="col-lg-6 col-sm-8">
                                <textarea name="short_description" id="short_description" cols="30" rows="3" class="form-control">{{old('short_description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2"><strong>Description</strong></label>
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                                    <p></p>
                                    <p>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-danger" type="reset">Cancel</button>
                                    </p>
                            </div>
                        </div>
                       
                    </form>
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