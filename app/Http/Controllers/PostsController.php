<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::latest()->paginate(5);
        
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'title'     => 'required',
            'content'   => 'required',
        ]);

        Posts::create($request->all());

        return redirect()->route('posts.index')->with('success','Data tanya jawab baru berhasil ditambahkan!');
    }
    
    public function show( $id)
    {
        return view('posts.show', ['posts' => Posts::findOrFail($id)]);
    }

    public function edit($id)
    {
        $posts = Posts::findOrFail($id);

        return view('posts.edit',compact('posts'));
    }
  
    public function update(Request $request, Posts $posts)
    {
        $request->validate([
            'title'     => 'required',
            'content'   => 'required',
        ]);
         
        $posts->update($request->all());
         
        return redirect()->route('posts.index')
                        ->with('success','Data tanya jawab berhasil diubah!');
    }
  
    public function destroy($id)
    {
        $posts = Posts::destroy($id);
  
        return redirect()->route('posts.index')
                        ->with('success','Data tanya jawab berhasil dihapus!');
    }
}
