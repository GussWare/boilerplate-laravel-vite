<?php 

namespace App\Interfaces;

interface RepositoryInterface {
    
    public function findAll();
    
    public function findById(int $id);
    

    public function create(object $dto);
    

    public function update(int $id, object $dto);
    
    public function delete($id);
    
}