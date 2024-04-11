<?php 

namespace App\Repositories;

use App\Models\Channel;
use App\Interfaces\RepositoryInterface;

class ChannelRepository implements RepositoryInterface {
    
    public function findAll() {
        return Channel::all();
    }
    
    public function findById($id) {
        return Channel::find($id);
    }
    
    public function create($obj) {
        $data = $obj->toArray();
        return Channel::create($data);
    }
    
    public function update($id, $obj) {
        $data = $obj->toArray();
        return Channel::find($id)->update($data);
    }
    
    public function delete($id) {
        return Channel::destroy($id);
    }
}