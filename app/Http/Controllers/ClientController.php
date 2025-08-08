<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Session;
use Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
       if(Auth::user()->role == 'admin'){
            $data['resultRows'] = User::where('role','=','client')->orderBy('id', 'DESC')->get();
        }else{
            //\DB::enableQueryLog();
            $data['resultRows'] = User::whereIn('id',User_client::where('client_id','=',Auth::user()->id)->pluck('user_id'))->orderBy('id', 'DESC')->get();
            //dd(\DB::getQueryLog()); 
        }
        $data['title']='Client List';
        $data['pageTitle']='Client List';
        $data['breadcrumb']='Client List';
        return view('backend/client/list')->with($data);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Client';
        return view('backend/client/add', compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'joining' => 'required',
            'status' => 'required',
        ]);

        $user = new User([
                'name' => $request['name'],
                'role' => 'client',
                'email' => $request['email'],
                'password' => Hash::make(Str::random(12)),
                'mobile' => $request['mobile'],
                'location' => $request['address'],
                'joining_date' => $request['joining'],
                'status' => $request['status'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        $result = $user->save();
        if($result){
                Session::flash('success', 'Client created successfully!'); 
                return redirect()->route('clients.index');
            }else{
                Session::flash('error', 'Failed,Pleasy try latter!'); 
            }
        //return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $client)
    {
        $title = 'Edit Client';
        return view('backend/client/edit', compact(['title','client']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $client)
    {
        $validated = $request->validate([            
            'email' => 'required|email|unique:users,email,' . $client->id,
            'name' => 'required|string|max:50',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'joining' => 'required',
            'status' => 'required',
        ]);

            $client->name = $request['name'];
            $client->email = $request['email'];
            $client->mobile = $request['mobile'];
            $client->location = $request['address'];
            $client->joining_date =  $request['joining'];
            $client->status =  $request['status'];
            $client->updated_at = date('Y-m-d H:i:s');
            $result = $client-> update();
            if($result){
                Session::flash('success', 'Client updated successfully!'); 
                return redirect()->route('clients.index');
            }else{
                Session::flash('error', 'Updation failed,Pleasy try latter!'); 
            }

        //return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
