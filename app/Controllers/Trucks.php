<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Trucks extends ResourceController
{
    protected $modelName = 'App\Models\Trucks';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function update($id = null){
	    $data = [
	        'name' => $this->request->getVar('name'),
	        'city'  => $this->request->getVar('city'),
	        'state'  => $this->request->getVar('state'),
	        'zip'  => $this->request->getVar('zip'),
	    ];
	    $this->model->update($id, $data);
	    $response = [
	      'status'   => 200,
	      'error'    => null,
	      'messages' => [
	          'success' => 'Row updated successfully'
	      ]
	  ];
	  return $this->respond($response);
	}

    public function delete($id = null){
    $data = $this->model->where('id', $id)->delete($id);
    if($data){
        $this->model->delete($id);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Row successfully deleted'
            ]
        ];
        return $this->respondDeleted($response);
	    }else{
	        return $this->failNotFound('No employee found');
	    }
	}

    // ...
}