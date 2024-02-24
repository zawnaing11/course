<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function allCategories()
    {
        return Category::latest()->paginate(10);
    }

    public function storeCategory($data)
    {
        return Category::create($data);
    }

    public function findCategory($id)
    {
        return Category::findOrFail($id);
    }

    public function updateCategory($data, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
    }

    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}
