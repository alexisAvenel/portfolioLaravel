<?php

namespace App\Http\Controllers\Admin;

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
use File;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->AdminIndex()->get();

        return view('admin.posts.index', compact('posts'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:6',
            'content' => 'required|min:10',
            'resumed' => 'max:100'
        ]);
        if($validator->fails()) {
            return redirect(route('admin.news.create'))->withErrors($validator->errors());
        } else {
            $postRequest = $request->all();
            if($postRequest) {
                if($request->hasFile('image')) {
                    $file = $request->file('image');
                    $folder = base_path() . '/public/uploads/news/'.str_slug($postRequest['title']).'/';
                    $fileName = str_slug($postRequest['title']).'.'.$file->getClientOriginalExtension();
                    
                    $file->move($folder, $fileName);

                    $postRequest['image'] = $fileName;
                }
                if($postRequest['online'] == 1): $postRequest['published_at'] = date('Y-m-d H:i:s'); endif;
                Post::create($postRequest);
            }
            return redirect(route('admin.news.index'));
        }
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
            'content' => 'required|min:10',
            'resumed' => 'max:100'
        ]);
        if($validator->fails()) {
            return redirect(route('admin.news.edit', $id))->withErrors($validator->errors());
        } else {
            $postRequest = $request->all();
            if($postRequest) {
                $fileName = $post->image;
                if($request->hasFile('image')) {
                    $file = $request->file('image');
                    $folder = base_path() . '/public/uploads/news/'.str_slug($post->title).'/';
                    $fileName = str_slug($post->title).'.'.$file->getClientOriginalExtension();
                    
                    $file->move($folder, $fileName);
                    $postRequest['image'] = $fileName;
                }

                if(!empty($post->slug) && str_slug($postRequest['title']) != $post->slug) {
                    File::makeDirectory(base_path() . '/public/uploads/news/'.str_slug($postRequest['title']), 0775, true);
                    File::move(base_path() . '/public/uploads/news/' . $post->slug . '/' . $fileName, base_path() . '/public/uploads/news/' . str_slug($postRequest['title']) . '/' . $fileName);
                    File::deleteDirectory(base_path() . '/public/uploads/news/' . $post->slug);
                }

                if($postRequest['online'] == 1): $post->published_at = date('Y-m-d H:i:s'); endif;
                $post->update($postRequest);
                $tags = ($request->get('tags')) ? $request->get('tags') : array();
                $post->tags()->sync($tags);                
            }

            return redirect(route('admin.news.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = new \stdClass();
        $post = Post::findOrFail($id);
        if(!$post) {
            return $data->message = "Échec de la suppression : Article introuvable !";
        }
        if(!empty($post->image) || $post->image != NULL) {
            $successFile = File::deleteDirectory(base_path() . '/public/uploads/news/'.$post->slug);
        }
        if(isset($successFile) && !$successFile) {
            return $data->message = "Échec de la suppression : Image de l'article introuvable !";
        }
        $success = $post->delete();
        if(!$success) {
            return $data->message = "Échec de la suppression !";
        }
        $data->message = "Suppression de l'article effectuée !";
        return response()->json([
            'data' => $data
        ]);
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