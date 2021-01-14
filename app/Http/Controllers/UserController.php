<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
    }


    /**
     * Update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        
        $request->validate([
         'name' => 'required|regex:/^[\pL\s\-]+$/u',
         'email' => 'required|string|email|max:255|unique:users,email,'.$id,
         'is_admin' => 'required|digits_between:0,1'
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;

        if ($user->save()){
            return redirect()->back()->with('success','Update Successfully');
        }else{
            return 'Failed to update Post';
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        
        User::where('id', $id) -> delete();

        return redirect()->back()->with('success', 'Deleted');
    }



    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = auth()->user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile');

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminManageUsers()
    {
        $users = User::all();

        return view('manageusers', compact('users'));
    }

}
