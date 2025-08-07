<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Session;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {           
        if(Auth::user()->role == 'admin'){
            $data['resultRows'] = User::where('role','=','user')->orderBy('id', 'DESC')->get();
        }else{
            //\DB::enableQueryLog();
            $data['resultRows'] = User::whereIn('id',User_client::where('client_id','=',Auth::user()->id)->pluck('user_id'))->orderBy('id', 'DESC')->get();
            //dd(\DB::getQueryLog()); 
        }
        $data['title']='User List';
        $data['pageTitle']='User List';
        $data['breadcrumb']='User List';
        return view('backend/user/user-list')->with($data);
    }

    /**
     * Add the user.
     *
     */
    public function create(request $request)
    { 
        $title = 'Add User';
        return view('backend/user/add-user', compact(['title']));
    } 

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|string|max:50',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10',
            'designation' => 'required',
            'joining' => 'required',
            'status' => 'required',
        ]);

        $user = new User([
                'name' => $request['name'],
                'role' => 'user',
                'gender' => $request['gender'],
                'email' => $request['email'],
                'password' => Hash::make(Str::random(12)),
                'mobile' => $request['mobile'],
                'designation' => $request['designation'],
                'joining_date' => $request['joining'],
                'status' => $request['status'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        $result = $user->save();
        if($result){
                Session::flash('success', 'User created successfully!'); 
                return redirect('users');
            }else{
                Session::flash('error', 'Failed,Pleasy try latter!'); 
            }
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
       // return view('backend/user/user-list', compact('user'));
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function edit(User $user)
    {
        $title = 'Edit User';
        return view('backend/user/edit-user', compact(['title','user']));
    }

    public function update(Request $request, User $user)
    { 
        $validated = $request->validate([            
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required|string|max:50',
            'gender' => 'required',
            'mobile' => 'required|digits:10',
            'designation' => 'required',
            'joining' => 'required',
            'status' => 'required',
        ]);
//dd($validated);
       // $user->update($validated);

            $user->name = $request['name'];
            //$data['resultRows']->client_id = $request['client'];
            $user->gender = $request['gender'];
            $user->email = $request['email'];
            $user->mobile = $request['mobile'];
            $user->designation = $request['designation'];
            $user->joining_date =  $request['joining'];
            $user->status =  $request['status'];
            $user->updated_at = date('Y-m-d H:i:s');
            $result = $user-> update();
            if($result){
                Session::flash('success', 'User updated successfully!'); 
                return redirect('user');
            }else{
                Session::flash('error', 'Updation failed,Pleasy try latter!'); 
            }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
