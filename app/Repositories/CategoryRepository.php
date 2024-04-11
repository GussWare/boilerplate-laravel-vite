<?php 

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\RepositoryInterface;

class CategoryRepository implements RepositoryInterface{
    
    public function findAll() {
        return Category::all();
    }
    
    public function findById($id) {
        return Category::find($id);
    }
    
    public function create($obj) {
        $data = $obj->toArray();
        return Category::create($data);
    }
    
    public function update($id, $obj) {
        $data = $obj->toArray();
        return Category::find($id)->update($data);
    }
    
    public function delete($id) {
        return Category::destroy($id);
    }
}