<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;


class PostController extends Controller
{
    //
    public function createPost(){
        return view('career.create');
    }
    public function storePost(Request $request){
        $request->validate([
            'title' =>'required|string|max:255|unique:posts,title',
        ]);
        $post = Post::create([
            'title' =>$request->title,
        ]);
        if($post){
            //echo "success";
            return to_route('career.index')->with('success','post added successfully');
        }else{
           // echo "fail";
            return to_route('career.create')->with('error','Field is required');
        }
    }

    public function postList(Request $request){
        $keyword = $request->input('keyword');
        $query = Post::query();

        $posts = Post::orderby('id','DESC')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'like', '%'.$keyword.'%');
        })->get();
        return view('career.index', compact('posts'));
    }

    public function editPost($id){
        $post = Post::find($id);
        return view('career.edit')->with(['post'=>$post]);
    }

    public function updatePost(Request $request, $id){
        $post = Post::find($id);
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'title')->ignore($id),
                ],
        ]);
        Post::where('id', $id)->update([
            'title' => $request->title,
        ]);


        return to_route('career.index', ['id' => $id])->with([
            'post' => $post,
            'success' => 'posts has been updated successfully',
        ]);
    }
    public function destroyPost($id){
        $post = Post::where('id',$id)->delete();
        if($post){
            return redirect()->route('career.index')->with('status','post deleted sucessfully');
        }else{
            return back()->with('error', 'please provide the valid credentials');
        }
    }
    public function changePostStatus(Request $request) {
        $post = Post::find($request->id);
        $status = (int) $post->status == 1 ? 0 : 1;
        Post::where('id', $request->id)->update([
            'status' => $status,
        ]);
        return json_encode(['message' => 'Post status updated sucessfully']);
    }


}
