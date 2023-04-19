<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\HelperApi;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use HelperApi;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments =  $this->HttpOptionsRequest()
            ->get($this->urlApiComments());

        return response()->json(
            json_decode($comments->body(), true)
        );
    }


    public function store(Request $request)
    {
        $comment = $this->HttpOptionsRequest()
        ->post($this->urlApiComments(), [
            'post_id' => $request->post_id,
            'name' => fake()->name(),
            'email' => fake()->email(),
            'body' => fake()->paragraph()
        ]);
        return $comment;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = $this->HttpOptionsRequest()
            ->get($this->urlApiComments() . $id);

        return response()->json(
            json_decode($comment->body(), true)
        );
    }

}
