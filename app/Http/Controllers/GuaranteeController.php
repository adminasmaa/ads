<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\GuaranteeRequest;
use App\Models\guarantee;
use App\Interface\GuaranteeRepositoryInterface;
use App\Http\Controllers\Controller;
class GuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $guaranteeRepository;

    public function __construct(GuaranteeRepositoryInterface $guaranteeRepository)
    {
        $this->guaranteeRepository =$guaranteeRepository ;
    }

    public function index()
    {
        //
        return $this->guaranteeRepository->index();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuaranteeRequest $request)
    {
        //
        return $this->guaranteeRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guarantee  $guarantee
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guarantee  $guarantee
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guarantee  $guarantee
     * @return \Illuminate\Http\Response
     */
    public function update(GuaranteeRequest $request, guarantee $guarantee)
    {
        //

        return $this->guaranteeRepository->update($request,$guarantee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guarantee  $guarantee
     * @return \Illuminate\Http\Response
     */
    public function destroy(guarantee $guarantee)
    {
        //
        return $this->guaranteeRepository->destroy($guarantee);

    }
}
