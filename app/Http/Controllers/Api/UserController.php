<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\HelperApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    use HelperApi;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =  $this->HttpOptionsRequest()
            ->get($this->urlApiUsers());

        return response()->json(
            json_decode($users->body(), true)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = $this->HttpOptionsRequest()
            ->post($this->urlApiUsers(), [
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'status' => 'active'
            ]);


        // Cadastra um novo post para o usuário cadastrado
        $post = $this->HttpOptionsRequest()
            ->post($this->urlApiPosts(), [
                'user_id' => $user['id'],
                'title' => fake()->city(),
                'body' => fake()->paragraph(),
            ]);

        // Cadastra um novo comentário para o post cadastrado    
        $comment = $this->HttpOptionsRequest()
            ->post($this->urlApiComments(), [
                'post_id' => $post['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'body' => fake()->paragraph()
            ]);

        // Cadastra um novo comentário publico
        $todo = $this->HttpOptionsRequest()
            ->post($this->urlApiTodos(), [
                'user_id' => $user['id'],
                'title' => fake()->text(5),
                'due_on' => \Carbon\Carbon::now(),
                'status' => "completed"
            ]);
            
        return response()->json([
            'id_user' => $user['id'],
            'id_post' => $post['id'],
            'id_comment' => $comment['id'],
            'id_comment_list_public' => $todo['id']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = $this->HttpOptionsRequest()
            ->get($this->urlApiUsers() . $id);

        return response()->json(
            json_decode($user->body(), true)
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user = $this->HttpOptionsRequest()
            ->put($this->urlApiUsers() . $id, [
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'status' => $request->status
            ]);

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->HttpOptionsRequest()
            ->delete($this->urlApiUsers() . $id);
        return response()->json([], 204);
    }


    /**
     * Exibe os posts do usuário
     */
    public function getPostsUser($id)
    {
        $posts = $this->HttpOptionsRequest()
            ->get($this->urlApiPostsUser($id));
        return $posts;
    }


    /**
     * Exibe o comentário da lista pública dos posts
     */
    public function getCommentsPublicUser($id)
    {
        $todos = $this->HttpOptionsRequest()
            ->get($this->urlApiTodosUser($id));
        return $todos;
    }
}
