<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\HelperApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    use HelperApi;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =  $this->HttpOptionsRequest()
            ->get($this->urlApiPosts());

        return response()->json(
            json_decode($posts->body(), true)
        );
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = $this->HttpOptionsRequest()
            ->get($this->urlApiPosts() . $id);

        return response()->json(
            json_decode($post->body(), true)
        );
    }


    
    public function getCommentsPost($id)
    {
        $comment = $this->HttpOptionsRequest()
            ->get($this->urlApiCommentsPost($id));
        return $comment;
    }
}
