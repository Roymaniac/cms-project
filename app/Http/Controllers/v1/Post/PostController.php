<?php

namespace App\Http\Controllers\v1\Post;

use Illuminate\Http\Request;
use App\Helpers\ApiConstants;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Services\PostServices\PostService;

class PostController extends Controller
{
    
    //
    protected $post;

    public function __construct(PostService $post)
    {
        return $this->post = $post;
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            return $this->post->listPost();
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {
            return $this->post->storePost($request);
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        try{
            return $this->post->editPost($request, $id);
        }  catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, string $id)
    {

        try {
            return $this->post->destroyPost($id);
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }

}
