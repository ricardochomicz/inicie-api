<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\HelperApi;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    use HelperApi;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos =  $this->HttpOptionsRequest()
            ->get($this->urlApiTodos());

        return response()->json(
            json_decode($todos->body(), true)
        );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->HttpOptionsRequest()
            ->delete($this->urlApiTodos() . $id);
        return response()->json([], 204);
    }
}
