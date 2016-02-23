<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Auth;
use Session;
use Validator;
use Hash;
use App\User;
use Storage;
use File;

class PostsController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index',
            'show',
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $posts = Post::with('category')->AdminIndex()->get();
            $view = 'admin.posts.index';
        } else {
            $posts = Post::with('category')->Published()->get();
            $view = 'posts.index'; 
        }

        return view($view, compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('posts.show', compact('post', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        $a = Storage::disk('local')->publicUrl('news/'.$post->slug.'/'.$post->image);
        //Storage::url('news/'.$post->slug.'/'.$post->image);
        dd($a);

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
        $post = Post::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:6',
            'content' => 'required|min:10'
        ]);
        if($validator->fails()) {
            return redirect(route('admin.news.edit', $id))->withErrors($validator->errors());
        } else {
            $postRequest = $request->all();
            if($request->file('image')->getRealPath()) {
                $file = $request->file('image');
                $folder = 'news/'.$post->slug;
                $fileName = $post->id.'.'.$file->getClientOriginalExtension();
                Storage::disk('local')->put($folder.'/'.$fileName,  File::get($file));
                $postRequest['image'] = $fileName;
            }

            $post->update($postRequest);
            $tags = ($request->get('tags')) ? $request->get('tags') : array();
            $post->tags()->sync($tags);

            return redirect(route('admin.news.edit', $id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        print_r($post);
        die();
    }


    /*** AJAX ***/

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePostOnline(Request $request)
    {
        $data = new \stdClass();
        if($request->ajax()){
            $postId = $request->input('postId');
            $online = $request->input('online');
            $upOnline = ($online == 1) ? 0 : 1;
            $data->message = "Échec de la mise à jour !";

            $post = Post::findOrFail($postId);
            $post->online = $upOnline;
            if($upOnline == 1): $post->published_at = date('Y-m-d'); endif;
            if($post->save()) {
                $data->message = "Mise à jour effectuée !"; 
            }
            return response()->json([
                'data' => $data
            ]);
        }
    }
}