<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['trainings'] = DB::table('trainings')->orderBy('id', 'desc')->paginate(18);
        return view('trainings.index', $data);
    }
    public function create()
    {
        return view('trainings.create');
    }
    public function save1(Request $r)
    {
        $data = array(
            'topic' => $r->topic,
            'location' => $r->location,
            'speaker' => $r->speaker,
            'training_date' => $r->training_date,
            'short_description' => $r->short_description,
            'description' => $r->description
        );
        if($r->featured_image)
        {
            $data['featured_image'] = $r->file('featured_image')->store('uploads/trainings', 'custom');
        }
        $i = DB::table('trainings')->insert($data);
        if($i)
        {
            $r->session()->flash('sms', 'New Training has been created successfully!');
            return redirect('/training/create');
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new training. Please check your input again!');
            return redirect('/training/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['training'] = DB::table('trainings')->where('id', $id)->first();
        return view('trainings.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'topic' => $r->topic,
            'location' => $r->location,
            'speaker' => $r->speaker,
            'training_date' => $r->training_date,
            'short_description' => $r->short_description,
            'description' => $r->description
        );
        if($r->featured_image)
        {
            $data['featured_image'] = $r->file('featured_image')->store('uploads/trainings', 'custom');
        }
        $i = DB::table('trainings')->where('id', $r->id)->update($data);
        if($i)
        {
            $r->session()->flash('sms', 'All changes have been saved successfully!');
            return redirect('/training/edit/'.$r->id);
        }
        else{
            $r->session()->flash('sms1', 'Fail to save changes, you maynot make any change!');
            return redirect('/training/edit/'.$r->id);
        }
    }
    public function view($id)
    {
        $data['training'] = DB::table('trainings')->where('id', $id)->first();
        return view('trainings.detail', $data);
    }
}
