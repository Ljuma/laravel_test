<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::paginate(4,"*","Page");
       $user=User::all();
      
    
       
        return view('blog.index',compact("post","user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    { 

        $id = auth()->user()->id;
        $user=User::findOrFail($id);
       

        
        if($file=$request->file('picture')){
            $name=$file->getClientOriginalName();
            $file->move('pictures',$name);
            $input=$name;
        }

        $post=Post::create([
            'title'             =>      $request->title,
            'short_description' =>      $request->short_description,
            'content'           =>      $request->content,
            'picture'           =>      $input,   
                   ]); 
         
        $user->posts()->save($post);    
         return redirect('/post');  
        
        
        
         }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post=Post::findOrFail($post);
        $id=$post->user_id;
        $user=User::findOrFail($id);
       
        return view('blog.post',compact('post','user'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $post=Post::findOrFail($post);
        return view('edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,$postt)
    {
    
$id = auth()->user()->id;
$user=User::findOrFail($id);
$post=Post::findOrFail($postt);
$old=$post->picture;
      
$post=Post::findOrFail($postt);
$post->title=$request->title;
$post->short_description=$request->short_description;
$post->content=$request->content;
                
$file=$request->file('picture');
if(!is_null($file)){
$name=$file->getClientOriginalName();
$file->move('pictures',$name);
$input=$name;
@unlink( 'pictures/'.$old);
$post->picture=$input;}

$user->posts()->save($post);
return redirect('/post');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {  
    $postt=Post::findOrFail($post);
    //@unlink( 'pictures/'.$postt->picture); 
    $postt->delete();
     return redirect('/post');
    }


    public function myPosts($id){
    $user=User::findOrFail($id);
    

     $role=$user->admin;

     if($role=="yes"){
        $post=Post::paginate(4,"*","Page");
     }else{
     $id=$user->id;
     $post= Post::where('user_id',$id)->paginate(4,"*","Page");
     }
     return view('mypost',compact("post"));
    

    }

    public function userProfile($id)
    {
    
        $user=User::findOrFail($id);
       
        return view('profile',compact('user'));
   
    }

    public function editUser($id)
    {
    
        $user=User::findOrFail($id);
       
        return view('editUser',compact('user'));
   
    }

    public function updateUser(UpdateUserRequest $request,$id)
    {
    
    $user=User::findOrFail($id);
    $old=$user->picture;
      
    $user=User::findOrFail($id);
    $user->name=$request->name;
    $user->email=$request->email;
    $user->about=$request->about;
                
    $file=$request->file('picture');
    if(!is_null($file)){
    $name=$file->getClientOriginalName();
    $file->move('storage/userPictures/'.$user->id."/",$name);
    $input=$name;
    @unlink( 'storage/userPictures/'.$user->id."/".$old);
    $user->picture=$input;}

    $user->save();
    return redirect('/post/profile/'.$user->id); 
    }




public function users()
    {
    
        $user=User::paginate(4,"*","Page");
       
        return view('users',compact('user'));
   
    }

    public function userDelete($id)
    {
    $adminId=auth()->user()->id;
    
    $post=Post::where('user_id','=',$id)->get();
    
    foreach($post as $p){
        $p->user_id=$adminId;
        $p->save();
    }

     User::whereId($id)->delete();
    return redirect('/post'); 
       
        
   
    }

}