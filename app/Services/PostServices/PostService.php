<?php

namespace App\Services\PostServices;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\ApiConstants;

/**
 * Class Post Service
 * @package App\Services
 */

class PostService
{

    /**
     * Gets a list of all post
     * @return \App\Models\Post[]
     */

     public function listPost()
     {
         try {
             $data = Post::all();
             return validResponse('Post Retrieved', $data);

         } catch (\Exception $e) {
             //exception $e;
             return problemResponse($e->getMessage(), ApiConstants::SERVER_ERR_CODE);
         }
     }

    /**
     * auto generate slug
     * @param string $name
     * @return string
     */
     protected function generateSlug(string $name): string
     {
         return strtoupper($name);
     }

      /**
     * Creates a new post
     * @param  \App\Http\Requests\PostRequest $request
     * @return \App\Models\Post
     */
    public function storePost(PostRequest $request)
    {
        $data = $request->validated();
        try {
            $data['slug'] = $this->generateSlug($data['title']);
            $store = Post::create($data);
            return validResponse('Post Created', $store);
        } catch (\Exception $e) {
            return problemResponse($e->getMessage(), ApiConstants::SERVER_ERR_CODE);

        }

    }

    /**
     * Updates the post associated with `$id`
     * @param  \App\Http\Requests\PostRequest $request
     * @param  string $id
     * @return \App\Models\Post
     */
    public function editPost(PostRequest $request, $id)
    {

        $data = $request->validated();
        try {
            $post = Post::findOrFail($id);

            if(strcmp($post['title'], $data['title']) !== 0) {
                $data['slug'] = $this->generateSlug($data['title']);
            }
            $edit = $post->update($data);
            return validResponse('Post updated', $edit);
        } catch (\Exception $e) {
            return problemResponse($e->getMessage(), ApiConstants::SERVER_ERR_CODE);
        }
    }

    /**
     * Deletes the post associated with `$id`
     * @param  string $id
     * @return int
     */
    public function destroyPost($id)
    {
        try {
            $data = Post::where('id', $id)
            ->delete();
            return validResponse('Post deleted', $data);
        } catch (\Exception $e) {
            return problemResponse($e->getMessage(), ApiConstants::SERVER_ERR_CODE);

        }
    }

}
