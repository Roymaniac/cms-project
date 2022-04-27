<?php

namespace App\Services\CategoryServices;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\ApiConstants;


/**
 * Class PostCategoryService
 * @package App\Services
 */

class CategoryService
{

    /**
     * Gets a list of all post categories
     * @return \App\Models\Category[]
     */

     public function listPostCategories()
     {
         try {
             $data = Category::all();
             return validResponse('Post Catogories Retrieved', $data);

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
         return strtoupper($name).'-CATEGORY';
     }

      /**
     * Creates a new post category
     * @param  \App\Http\Requests\CategoryRequest $request
     * @return \App\Models\Category
     */
    public function storePostCategory(CategoryRequest $request)
    {
        $data = $request->validated();
        try {
            $data['slug'] = $this->generateSlug($data['name']);
            $store = Category::create($data);
            return validResponse('Post Catogory Created', $store);
        } catch (\Exception $e) {
            return problemResponse($e->getMessage(), ApiConstants::SERVER_ERR_CODE);

        }

    }

    /**
     * Updates the post category associated with `$id`
     * @param  \App\Http\Requests\CategoryRequest $request
     * @param  string $id
     * @return \App\Models\Category
     */
    public function editPostCategory(CategoryRequest $request, $id)
    {

        $data = $request->validated();
        try {
            $category = Category::findOrFail($id);

            if(strcmp($category['name'], $data['name']) !== 0) {
                $data['slug'] = $this->generateSlug($data['name']);
            }
            $edit = $category->update($data);
            return validResponse('Post Category updated', $edit);
        } catch (\Exception $e) {
            return problemResponse($e->getMessage(), ApiConstants::SERVER_ERR_CODE);
        }
    }

    /**
     * Deletes the post category associated with `$id`
     * @param  string $id
     * @return int
     */
    public function destroyPostCategory($id)
    {
        try {
            $data = Category::where('id', $id)
            ->delete();
            return validResponse('Post Category deleted', $data);
        } catch (\Exception $e) {
            return problemResponse($e->getMessage(), ApiConstants::SERVER_ERR_CODE);

        }
    }

}