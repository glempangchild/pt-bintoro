<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostController extends Controller
{
    public function index (){
        $result['data'] = Post::all();
        return view('admin.post', $result);
    }
    public function addPost(){
        return view('admin.addPost');
    }
    public function addProc(Request $request){
        $request->validate([
            'judul' => 'required',
            'artikel' => "required",
        ]);
        $model = new Post();
        $model->judul = $request->judul;
        $model->artikel = $request->artikel;
        $model->created_by = auth()->user()->role;
        $model->save();

        $request->session()->flash('message','Data ditambahkan');
        return redirect('/post');
        
    }
    public function editPost(Request $request, $id){
        $model = Post::find($id);
        $created_by = $model->created_by;
        $role = auth()->user()->role;
        if ($created_by == 'ADMIN' AND  $role == 'STAFF') {
            $request->session()->flash('message','Staff tidak bisa mengedit milik admin');
            return redirect('/post');
        }
        $post = Post::find($id);
        return view('admin.editPost', compact('post'));
    }
    public function editProc(Request $request){
        $model = Post::find($request->id);
        $model->judul = $request->judul;
        $model->artikel = $request->artikel;
        $model->created_by = auth()->user()->role;
        $model->save();

        $request->session()->flash('message','Data diubah');
        return redirect('/post');
    }
    public function deleteProc(Request $request, $id){
        $model = Post::find($id);
        $created_by = $model->created_by;
        $role = auth()->user()->role;
        if ($created_by == 'ADMIN' AND  $role == 'STAFF') {
            $request->session()->flash('message','Staff tidak bisa menghapus milik admin');
            return redirect('/post');
        }
        $model->delete();
        $request->session()->flash('message','Post Terhapus');
        return redirect('/post');
    }
    public function landing(){
        
    }
}
