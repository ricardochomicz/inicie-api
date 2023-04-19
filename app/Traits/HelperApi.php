<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait HelperApi
{

    /**
     * url todos os usuários
     */
    public function urlApiUsers()
    {
        return 'https://gorest.co.in/public/v2/users/';
    }

    /**
     * url todos os posts do usuário
     */
    public function urlApiPostsUser($id)
    {
        return "https://gorest.co.in/public/v2/users/{$id}/posts";
    }


    /**
     * url todos os posts
     */
    public function urlApiPosts()
    {
        return 'https://gorest.co.in/public/v2/posts/';
    }


    /**
     * url todos os comentarios
     */
    public function urlApiComments()
    {
        return 'https://gorest.co.in/public/v2/comments/';
    }


    /**
     * url todos os comentarios do post
     */
    public function urlApiCommentsPost($id)
    {
        return "https://gorest.co.in/public/v2/posts/{$id}/comments";
    }


    /**
     * url todos os comentarios publicos
     */
    public function urlApiTodos()
    {
        return 'https://gorest.co.in/public/v2/todos/';
    }


    /**
     * url todos os comentarios publicos do usuario
     */
    public function urlApiTodosUser($id)
    {
        return "https://gorest.co.in/public/v2/users/{$id}/todos";
    }


    /**
     * @var Http method Http Client
     */
    private function HttpOptionsRequest()
    {
        return Http::withOptions(['verify' => false, 'headers' => ['Authorization' => $this->getToken()]]);
    }

    /**
     * Primary Token
     */
    private function getToken()
    {
        return "Bearer " . "51cefe5e7c9ba9763eda643f5ea46bbd59424f454e3c4bdc4278a8d1655de433";
    }
}
