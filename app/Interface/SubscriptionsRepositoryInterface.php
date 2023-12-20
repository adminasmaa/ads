<?php


namespace App\Interface;
use App\Http\Requests\SubscriptionsRequest;
use App\Models\Subscriptions;


interface SubscriptionsRepositoryInterface
{
   public function index();
   public function create();

    public function store(SubscriptionsRequest $request);
    public function edit(Subscriptions $subscription);

    public function update(SubscriptionsRequest $request,Subscriptions $subscription);

    public function destroy(Subscriptions $subscription);

}