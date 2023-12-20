<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionsRequest;
use App\Models\Subscriptions;
use App\Interface\SubscriptionsRepositoryInterface;

class SubscriptionsController extends Controller
{
    private $subscriptionsRepository;

    public function __construct(SubscriptionsRepositoryInterface $subscriptionsRepository)
    {
        $this->subscriptionsRepository = $subscriptionsRepository;
    }

    public function index(){
      return $this->subscriptionsRepository->index();
    }
    public function create(){
        return $this->subscriptionsRepository->create();

    }
    public function store(SubscriptionsRequest $request){
       return $this->subscriptionsRepository->store($request);
    }
    public function edit(Subscriptions $subscription){
        return $this->subscriptionsRepository->edit($subscription);

    }
    public function update(SubscriptionsRequest $request,Subscriptions $subscription){
        return $this->subscriptionsRepository->update($request,$subscription);
    }
    public function destroy(Subscriptions $subscription){
        return $this->subscriptionsRepository->destroy($subscription);
    }

}
