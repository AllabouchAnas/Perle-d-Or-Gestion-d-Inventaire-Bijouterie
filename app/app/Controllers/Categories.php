<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Controller;

class Categories extends Controller
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    // 1. Display All Categories
    public function index()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/categories/index', $data);
    }

    // 3. Save New Category
    public function store()
    {
        $data = [
            'nom' => $this->request->getPost('nom'),
        ];

        if ($this->categoryModel->save($data)) {
            return redirect()->to('/categories')->with('success', 'Category created successfully.');
        } else {
            return redirect()->back()->with('errors', $this->categoryModel->errors())->withInput();
        }
    }

    // 5. Update Category
    public function update($id)
    {
        $data = [
            'id'  => $id,
            'nom' => $this->request->getPost('nom'),
        ];

        if ($this->categoryModel->save($data)) {
            return redirect()->to('/categories')->with('success', 'Category updated successfully.');
        } else {
            return redirect()->back()->with('errors', $this->categoryModel->errors())->withInput();
        }
    }

    // 6. Delete Category
    public function delete($id)
    {
        if ($this->categoryModel->delete($id)) {
            return redirect()->to('/categories')->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->to('/categories')->with('errors', 'Failed to delete category.');
        }
    }
}
