<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

     return view('user', compact('users'));
    }
    
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'name'    =>  'required',
                 'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'name'    =>  'required',
               
            ]);
        }

        $form_data = array(
            'name'       =>   $request->name,
            'images'      =>   $image_name
        );
  
        User::whereId($id)->update($form_data);

        return redirect('/users')->with('success', 'Data is successfully updated');
    }
    
    
    public function edit($id)
{
    $data = User::findOrFail($id);

    return view('user_edit', compact('data'));
}
    
    
    
}
