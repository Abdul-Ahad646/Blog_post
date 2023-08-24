<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{

    public function welcome(){
        $blogs=Blog::get();
        return view('welcome',compact('blogs'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::where('user_id',Auth::user()->id)->get();
       return view('/dashboard',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
         
            'title' => 'required',
            'description' => 'nullable'
        ]);
      $blogs=new Blog;
      $blogs->user_id=$request->input('user_id');
      $blogs->title=$request->input('title');
      $blogs->description=$request->input('description');
      $blogs->save();
      Toastr::success('create successfull', 'success', ["positionClass" => "toast-top-right", "closeButton"=>true, "progressBar"=> true,]);
      return redirect()->back()->with('success','create successfull');

     
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id=null)
    {
    
         $blog=Blog::find($id);

      
        return view('blog.edit',compact('blog') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
         
            'title' => 'required',
            'description' => 'nullable'
        ]);
      $blogs= Blog::find($id);
      $blogs->user_id=$request->input('user_id');
      $blogs->title=$request->input('title');
      $blogs->description=$request->input('description');
      $blogs->save();
      Toastr::success('Update successfull', 'success', ["positionClass" => "toast-top-right", "closeButton"=>true, "progressBar"=> true,]);
      return redirect()->back()->with('success','create successfull');

     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id=null)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect(route('dashboard'))->with('success', 'Product deleted Succesffully');
    }
    public function search(Request $request){
        
       $blogs=Blog::where('title', 'LIKE', '%'.$request->search.'%')->get();
       return view('welcome',compact('blogs'));
    }
}