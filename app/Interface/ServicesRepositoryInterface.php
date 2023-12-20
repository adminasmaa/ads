<?php


namespace App\Interface;
use App\Http\Requests\ServicesRequest;
use App\Models\Services;


interface ServicesRepositoryInterface
{
   public function index();
   public function create();

    public function store(ServicesRequest $request);
    public function edit(Services $subscription);
    public function update(ServicesRequest $request,Services $subscription);
    public function destroy(Services $subscription);

}