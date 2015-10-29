<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Article;
use App\User;


class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //
        return view('backend/backendindex');
    }

    
    public function createUser(Request $request)
    {
        //
        // dd($request->user());
        if($request->url() == url('backend/create-user')){

            if($request->isMethod('post')){
                $v = \Validator::make($request->input(), [
                'name' =>'required|min:2|max:50',
                ]);

                if($v->fails()){
                    return redirect()
                        ->back()
                        ->withErrors($v->errors())
                        ->withInput();
                }else{

                    //buat objek dari User
                    $records = new User;

                    //$records->kolom = ambil dari view
                    $records->name = $request->input('name');
                    $records->email = $request->input('email');
                    $records->password = bcrypt($request->input('password'));
                    
                    //jalankan simpan
                    $records->save();
                       
                    return redirect('backend/tableusers')->with('flash_message','User succesfully added!');//yang ada pada routes

                }

            } /*/if(isMethod('post'))*/
            return view('backend/createUser');    
        }
        
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function showTable(Request $request)
    {
        //
        //for users table
        if($request->url() == url('backend/tableusers')){
            $users_record = User::all();

            return view('backend/tableusers', compact('users_record'));      
        }

        //for articles table
        if($request->url() == url('backend/tablearticles')){
            $articles_record = Article::all();

            return view('backend/tablearticles', compact('articles_record'));


        }        
    }

    
    public function edit($id)
    {
        //
    }

   
    public function updateUser(Request $request, $id)
    {
        //
        $record = User::find($id);
        // return view('edit',compact('record'));

        if($request->isMethod('post')){
            //cek form is there a password changed
            if ($request->has('password')) {
                $v= \Validator::make($request->input(),[
                    'name' =>'required|min:2|max:50',
                    'password' => 'required|min:4|max:8',
                    'password_confirmation' => 'required|same:password',
                    'role' => 'required',
                ]);
            }else{
                $v= \Validator::make($request->input(),[
                    'name' =>'required|min:2|max:50',
                    'role' => 'required',
                ]);
            } /* /else */

            if($v->fails()){
                return redirect()
                ->back()
                ->withErrors($v->errors())
                ->withInput();

            }else{
                
                $record = User::find($id);
                //upload image function

                if ($request->hasFile('photo')) {
                    $foto            = $request->file('photo');
                    $destinationPath = public_path() . '/assets/img/profpic'; // upload path
                    $tmp             = explode('.', $foto->getClientOriginalName());
                    $ext             = $tmp[count($tmp) - 1];
                    $fileName        = 'profpic-'.$request->user()->name . '-' . $request->user()->id. '.' . $ext; // renameing image
                    
                    try {
                        $foto->move($destinationPath, $fileName); // uploading file to given path270x360
                        $foto = Image::make($destinationPath.'/'.$fileName)->resize(240, 240, function ($constraint) {
                            $constraint->upsize();
                        })->save(); 
                        
                        $record->profpic = $fileName;
                    } catch (FileException $e) {
                        $v->add('file', 'Couldn\'t upload file because writing file in upload directory was denied. Please contact your NOC.');
                        return redirect()->back()->withErrors()->withInput();
                    }
                }

                // $records->kolom = ambil dari view
                $record->name = $request->input('name');
                $record->email = $request->input('email');
                $record->role = $request->input('role');
                
                if($request->has('password')){
                    $record->password = bcrypt($request->input('password'));
                }               
                //jalankan simpan
                $record->save();
                return redirect('backend/tableusers')->with('flash_message','User succesfully updated!');
            }
        } /*if($request->isMethod('post'))*/

        return view('backend/updateuser', compact('record'));
    }

    function updateArticle(Request $request){

        if($request->isMethod('post')){
            dd($request->input('editor1'));
        }
        return view('backend/createarticle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request, $id)
    {
        //
        
        if($request->url() == url('backend/delete-user/'.$id)){
            $record = User::find($id);
            $record->delete();
            return redirect('backend/tableusers')->with('flash_message','User succesfully deleted!');
        }
    }
}
