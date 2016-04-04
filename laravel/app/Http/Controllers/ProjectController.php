<?php

namespace App\Http\Controllers;

use Storage;
use Project;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProjectController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        view('admin/projects/index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        view('admin/projects/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|max:255',
    		'url' => 'required|url',
    		'image' => 'required|image'
    	]);

    	Storage::put($this->request->input('name'), $this->request->file('image')->getRealPath());

    	Project::create([
    		'name' => $this->request->input('name'),
    		'url' => $this->request->input('url'),
    		'image_path' => 'assets/img/'.$this->request->input('name')
    	]);

        redirect()->action('ProjectController@index')->with('status', 'Project added!');
    }
}
