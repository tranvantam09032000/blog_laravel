<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\Tags;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Softdeletes;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::where('status', '=',1  )->paginate(7);
     
        return View('Admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tags::all();
        $category = Category::all();
        return View('Admin.post.create', compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title' =>'required|min:1',
            'category_id' =>'required',
            'image' =>'required',
            'content' =>'required'
        ]);
$image = $request->image;
$new_image = time().$image->getClientOriginalName();
        $post = Posts::create([
            'title' =>$request->title,
            'category_id' =>$request->category_id,
            'image' =>'public/uploads/posts/' . $new_image,
            'content' =>$request->content,
            'slug' => Str::slug($request->title),
            'users_id' => auth::id()
        ]);
        $post->tags()->attach($request->tags);
        $image ->move('public/uploads/posts/',$new_image);
        return redirect()->back()->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $tags = Tags::all();
        $post = Posts::findorfail($id);
        $category = Category::all();
        return View('Admin.post.edit', compact('post','tags','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' =>'required|min:1',
            'category_id' =>'required',
            'content' =>'required'
        ]);

        $post = Posts::findorfail($id);

        if($request->has('image')){
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image ->move('public/uploads/posts/',$new_image);

            $post_data = [
                'title' =>$request->title,
                'category_id' =>$request->category_id,
                'image' =>'public/uploads/posts/' . $new_image,
                'content' =>$request->content,
                'slug' => Str::slug($request->title)
            ];
        }
        else{
            $post_data = [
                'title' =>$request->title,
                'category_id' =>$request->category_id,
                'content' =>$request->content,
                'slug' => Str::slug($request->title)
            ];
        }
      
       
        $post->tags()->sync($request->tags);
        $post->update($post_data);
       
        return redirect()->route('post.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findorfail($id);
       
       
     
        $post->status = 0;
        $post->save();
        return redirect()->back()->with('success','Xóa thành công!');
    }
    public function show_delete(){
         $post = Posts::where('status', '=',0  )->paginate(7);
        
        //  $post = Posts::onlyTrashed()->paginate(7);
        return View('Admin.post.show_delete',compact('post'));
        
    }

    public function restore($id){
        $post = Posts::findorfail($id);
       
       
     
        $post->status = 1;
        $post->save();
        return redirect()->back()->with('success','Phục hồi thành công!');
    }

    
    public function kill($id){
        $post = Posts::findorfail($id);
        $post->delete();
        return redirect()->back()->with('success','Xóa thành công!');
    }
}
