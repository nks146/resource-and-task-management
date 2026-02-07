<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Session;
use Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Add the project.
     *
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $data['resultRows'] = Project::orderBy('id', 'DESC')->get();
        }else{
            $data['resultRows'] = Project::where('client_id','=',Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        $data['title']='Project List';
        $data['pageTitle']='Project List';
        $data['breadcrumb']='Project List';
        return view('backend/project/project-list')->with($data);
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {   
        $data['client_list'] = User::where('status','=','1')->where('role','=','client')->orderBy('name', 'ASC')->get();
        $data['title']='Add Project';
        return view('backend/project/add-project')->with($data);
    }

    /**
     * Add the user.
     *
     */
    public function store(request $request)
    {
        if($request->isMethod('post')){ 
            $request->validate([
                'project_name' => ['required', 'string', 'unique:projects,project_name'],
                'client' => ['required', 'string'],
            ]);
            $project = new Project([
                'project_name' => $request['project_name'],
                'client_id' => $request['client'],
                'estimated_time' => $request['estimated_time'],
                'comment' => $request['comment'],
                'start_date' => $request['start_date'],
                'status' => $request['status'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $result = $project->save();
            if($result){
                Session::flash('success', 'Project created successfully!'); 
                return redirect('project');
            }else{
                Session::flash('error', 'Failed,Pleasy try latter!'); 
            }
        }
        /*$data['client_list'] = User::where('status','=','1')->where('role','=','client')->orderBy('name', 'ASC')->get();
        $data['Title']='Add Project';
        $data['pageTitle']='Add Project';
        $data['breadcrumb']='Add Project';
		return view('backend/project/add-project')->with($data);*/
}

/**
 * Show the form for editing the specified project.
 */
public function edit($id)
    {
        $data['project'] = Project::findOrFail($id);
        $data['client_list'] = User::where('status','=','1')->where('role','=','client')->orderBy('name', 'ASC')->get();
        $data['title'] = 'Edit Project';
        return view('backend/project/edit-project')->with($data);
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, $id)
    {
        if($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('patch')){
            $request->validate([
                'project_name' => ['required', 'string', 'unique:projects,project_name,'.$id],
                'client' => ['required', 'string'],
            ]);
            $project = Project::findOrFail($id);
            $project->project_name = $request->input('project_name');
            $project->client_id = $request->input('client');
            $project->estimated_time = $request->input('estimated_time');
            $project->comment = $request->input('comment');
            $project->start_date = $request->input('start_date');
            $project->status = $request->input('status');
            $project->updated_at = date('Y-m-d H:i:s');
            if($project->save()){
                Session::flash('success', 'Project updated successfully!');
                return redirect('projects');
            }else{
                Session::flash('error', 'Failed, please try later!');
                return back()->withInput();
            }
        }
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if(!$project){
            Session::flash('error', 'Project not found!');
            return redirect('project');
        }
        if($project->delete()){
            Session::flash('success', 'Project deleted successfully!');
        }else{
            Session::flash('error', 'Failed to delete project!');
        }
        return redirect('project');
    }
}
