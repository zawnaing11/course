<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->allCategories();

        return view('backend.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name'], '-');

        $this->categoryRepo->storeCategory($validated);

        return redirect()->route('categories.index')
            ->with('alert.success', 'Category Created Successfully');
    }

    public function edit($id)
    {
        $category = $this->categoryRepo->findCategory($id);

        return view('backend.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name'], '-');

        $this->categoryRepo->updateCategory($validated, $id);

        return redirect()->route('categories.index')
            ->with('alert.success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $this->categoryRepo->destroyCategory($id);

        return redirect()->route('categories.index')
            ->with('alert.success', 'Category Deleted Successfully');
    }
}
