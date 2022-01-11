<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //es como un select * from posts
        $posts = Post::orderBy('id', 'desc')->paginate(3);
         return view('dashboard.post.index', ['posts' =>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.create', ['post' => new Post(), "categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        //Muestra los datos que se mandan en el campo title del formulario
        //echo "Hola mundo: " . $request->input('title');
        //ver contenido del arreglo
       //dd($request->validated());
       //echo "Hola mundo: " . request("title");
       /*$request->validate([
            'title'=>'required|min:5|max:500',
            //'url_clean'=>'required|min:5|max:500'
            'content'=>'required|min:5'
       ]);*/
       //echo "Hola mundo: " . $request->title;
       //invica la validacion
       Post::create($request->validated());
       //mensaje de confirmacion de que se creo el post correctamente
       return back()->with('status', 'Datos Incertados Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);
        return view('dashboard.post.show', ["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.edit', ["post"=>$post, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->update($request->validated());
       //mensaje de confirmacion de que se creo el post correctamente
       return back()->with('status', 'Datos Actualizados Correctamente!');
    }
    public function image(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240' //10Mb
        ]);

        $filename = time() . "." . $request->image->extension();
        $request->image->move(public_path('images'), $filename);
        //echo "Hola Mundo ". $filename;
        PostImage::create(['image'=> $filename, 'post_id'=>$post->id]);
        return back()->with('status', 'Imagen cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Datos Eliminados Correctamente!');
    }
}