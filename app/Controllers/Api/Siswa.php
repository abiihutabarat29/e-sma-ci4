<?php

namespace App\Controllers\Api;

use App\Models\SiswaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;


class Siswa extends ResourceController
{

    use ResponseTrait;

    public function show($id = null)
    {
        $model = new SiswaModel();
        $data = $model->find($id);
        return $this->respond($data);
    }
    //--------------------------------------------------------------------

}
