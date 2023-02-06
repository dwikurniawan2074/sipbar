<?php

namespace App\Controllers\Api;

use App\Models\ModelBarang;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController{
    use ResponseTrait;

    public function show($id = null){
        $model = new ModelBarang();
        $data_barang = $model->find($id);

        return $this->respond($data_barang);
    }
}

?>