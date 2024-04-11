<?php 

namespace App\Interfaces;

use App\Abstracts\DataGridAbsctract;

interface ServiceInterface {

    public function pagination(DataGridAbsctract $dataGridAbsctract);
    
    public function findAll();
    
    public function findById(int $id);
    

    public function create(object $dto);
    

    public function update(int $id, object $dto);
    
    public function delete($id);
    
}