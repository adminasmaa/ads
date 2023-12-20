<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServicesRequest;
use App\Models\Services;
use App\Interface\ServicesRepositoryInterface;

class ServicesController extends Controller
{
    private $servicesRepository;

    public function __construct(ServicesRepositoryInterface $servicesRepository)
    {
        $this->servicesRepository = $servicesRepository;
    }

    public function index(){    
      return $this->servicesRepository->index();
    }
    public function create(){
        return $this->servicesRepository->create();

    }
    public function store(ServicesRequest $request){
       return $this->servicesRepository->store($request);
    }
    public function edit(Services $service){
        return $this->servicesRepository->edit($service);

    }
    public function update(ServicesRequest $request,Services $service){
        return $this->servicesRepository->update($request,$service);
    }
    public function destroy(Services $service){
        return $this->servicesRepository->destroy($service);
    }

}
