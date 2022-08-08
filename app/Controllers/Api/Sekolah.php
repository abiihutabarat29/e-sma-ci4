<?php

namespace App\Controllers\Api;

use App\Models\SekolahModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;


class Sekolah extends ResourceController
{

    use ResponseTrait;

    public function show($id = null)
    {
        $model = new SekolahModel();
        $data = $model->find($id);
        return $this->respond($data);
    }
    //--------------------------------------------------------------------

}
