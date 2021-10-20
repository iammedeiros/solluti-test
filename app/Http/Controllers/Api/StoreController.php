<?php

namespace App\Http\Controllers\Api;

use App\API\ApiError;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\StoreRepositoryInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $repository;

    public function __construct(StoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $data = ['data' => $this->repository->findAll()];

        return response()->json($data, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->repository->store($request->all());

            return response()->json(['data' => ['msg' => 'Loja criada com sucesso.']], 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 502);
            }

            return response()->json(ApiError::errorMessage(
                'Houve um erro ao realizar a operação.',
                1010
            ), 502);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->findById($id);

        if (!$product)
            return response()->json(ApiError::errorMessage('Loja não encontrada.', 404), 404);

        $data = ['data' => $product];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if (!$this->repository->update($id, $request->all()))
                return response()->json(ApiError::errorMessage('Loja não encontrada.', 404), 404);

            return response()->json(['data' => ['msg' => 'Loja atualizada com sucesso.']], 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 502);
            }

            return response()->json(ApiError::errorMessage(
                'Houve um erro ao realizar a operação.',
                1011
            ), 502);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (!$this->repository->destroy($id))
                return response()->json(ApiError::errorMessage('Loja não encontrada.', 404), 404);

            return response()->json(
                ['data' => ['msg' => 'Loja excluída com sucesso.']],
                200
            );
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 502);
            }

            return response()->json(ApiError::errorMessage(
                'Houve um erro ao realizar a operação.',
                1012
            ), 502);
        }
    }
}
