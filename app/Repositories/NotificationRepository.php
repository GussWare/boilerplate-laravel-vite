<?php 

namespace App\Repositories;

use App\Models\Notification;
use App\Interfaces\RepositoryInterface;

class NotificationRepository implements RepositoryInterface {
    
    public function findAll() {
        return Notification::all();
    }
    
    public function findById($id) {
        return Notification::find($id);
    }
    
    public function create($dto) {
        $data = $dto->toArray();
        return Notification::create($data);
    }
    
    public function update($id, $dto) {
        $data = $dto->toArray();
        return Notification::find($id)->update($data);
    }
    
    public function delete($id) {
        return Notification::destroy($id);
    }
}