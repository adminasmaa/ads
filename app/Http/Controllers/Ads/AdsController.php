<?php

namespace App\Http\Controllers\Ads;

use App\Http\Controllers\Controller;
use App\Http\Requests\ads\adsRequest;
//use App\Http\Requests\A\BillRequest;
use App\Interface\Ads\AdsRepositoryInterface;
use App\Models\Ads\AdsType;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    private $adsRepository;

    public function __construct(AdsRepositoryInterface $adsRepository)
    {
        $this->adsRepository = $adsRepository;
    }
    public function index()
    {
        return $this->adsRepository->index();
    }
    public function stat($id)
    {
        return $this->adsRepository->stat($id);
    }

    public function stat_all($id)
    {
        return $this->adsRepository->stat_all($id);
    }
    public function stat_all_details($date, $id2, $id)
    {
        return $this->adsRepository->stat_all_details($date, $id2, $id);
    }
    public function create()
    {
        return $this->adsRepository->create();

    }
    public function store(adsRequest $request)
    {
        return $this->adsRepository->store($request);
    }
    public function show($id)
    {
        return $this->adsRepository->show($id);
    }
    public function edit($adsType)
    {
        return $this->adsRepository->edit($adsType);

    }

    public function visitors_all(Request $request)
    {
        return $this->adsRepository->visitors_all($request);
    }
    public function visitors(Request $request)
    {
        return $this->adsRepository->visitors($request);
    }
    public function update(adsRequest $request, AdsType $adsType)
    {
        return $this->adsRepository->update($request, $adsType);
    }
    public function destroy($adsType)
    {
        return $this->adsRepository->destroy($adsType);
    }
}
