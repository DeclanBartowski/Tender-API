<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListSearchTenderRequest;
use App\Http\Requests\StoreTenderRequest;
use App\Http\Resources\TenderCollection;
use App\Http\Resources\TenderResource;
use App\Models\Tender;
use App\Services\TenderService;
use OpenApi\Annotations as OA;

class TenderController extends Controller
{
    /**
     * List Tenders
     *
     * @param ListSearchTenderRequest $request
     * @param TenderService $tenderService
     * @return TenderCollection
     *
     *
     * @OA\Get(path="/tenders",
     *     tags={"tenders"},
     *     summary="Show Tenders",
     *     security={{"bearerAuth":{}}},
     *   @OA\Parameter(
     *         name="name",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *         example="Лабороаторная посуда"
     *         )
     *     ),
     *
     *   @OA\Parameter(
     *         name="date",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             example="2022.01.01"
     *         )
     *     ),
     *
     *     @OA\Response(response=200, description="Successful",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                @OA\Property(
     *                     property="data",
     *                     type="object",
     *                @OA\Property(
     *                     property="external_id",
     *                     type="string",
     *                     example="152467180"
     *                 ),
     *                 @OA\Property(
     *                     property="number",
     *                     type="string",
     *                     example="17660-2"
     *                 ),
     *                 @OA\Property(
     *                     property="status",
     *                     type="string",
     *                     example="Закрыто"
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="Лабороаторная посуда"
     *                 ),
     *                 @OA\Property(
     *                     property="date",
     *                     type="string",
     *                     example="15.08.2022 19:25:14"
     *                 ),),),) ),),
     *     @OA\Response(response=401, description="Unauthorized",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                     example="Unauthorized"
     *                 ),  ), ) ), ),
     *
     *
     *     @OA\Response(response=422, description="Unprocessable Content",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                     example="The given data was invalid."
     *                 ),
     *
     *                 @OA\Property(
     *                     property="errors",
     *                     type="object",
     *                 @OA\Property(
     *                     property="date",
     *                     type="string",
     *                     example="The date does not match the format Y.m.d."
     *                 ),
     *                 ),
     *            ),
     *             )
     *         ),
     * ),
     *
     * )
     */
    public function index(ListSearchTenderRequest $request, TenderService $tenderService): TenderCollection
    {
        return new TenderCollection($tenderService->getList($request->validated()));
    }

    /**
     * Add tender
     *
     * @param StoreTenderRequest $storeTenderRequest
     * @param TenderService $tenderService
     * @return TenderResource
     *
     *
     *  @OA\Post(path="/tenders",
     *     tags={"tenders"},
     *     summary="Add Tender",
     *     security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="external_id",
     *                   description="External ID",
     *                   type="integer",
     *                   example="152467180"
     *               ),
     *               @OA\Property(
     *                   property="number",
     *                   description="Number tender",
     *                   type="string",
     *                   example="17660-2"
     *               ),
     *               @OA\Property(
     *                   property="status",
     *                   description="Status tender",
     *                   type="string",
     *                   example="Закрыто"
     *               ),
     *               @OA\Property(
     *                   property="name",
     *                   description="Name tender",
     *                   type="string",
     *                   example="Лабороаторная посуда"
     *               ),
     *               @OA\Property(
     *                   property="date",
     *                   description="Date tender",
     *                   type="string",
     *                   example="15.08.2022 19:25:14"
     *               ),
     *           )
     *       )
     *   ),
     *     @OA\Response(response=201, description="Successful created",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                @OA\Property(
     *                     property="data",
     *                     type="object",
     *                @OA\Property(
     *                     property="external_id",
     *                     type="string",
     *                     example="152467180"
     *                 ),
     *                 @OA\Property(
     *                     property="number",
     *                     type="string",
     *                     example="17660-2"
     *                 ),
     *                 @OA\Property(
     *                     property="status",
     *                     type="string",
     *                     example="Закрыто"
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="Лабороаторная посуда"
     *                 ),
     *                 @OA\Property(
     *                     property="date",
     *                     type="string",
     *                     example="15.08.2022 19:25:14"
     *                 ),),),) ),),
     *
     *     @OA\Response(response=401, description="Unauthorized",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                     example="Unauthorized"
     *                 ),
     *            ),
     *             )
     *         ),),
     *     @OA\Response(response=422, description="Unprocessable Content",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                     example="The given data was invalid."
     *                 ),
     *                 @OA\Property(
     *                     property="errors",
     *                     type="object",
     *                     @OA\Property(
     *                      property="external_id",
     *                      type="object",
     *                 @OA\Property(
     *                     type="string",
     *                     example="The external id has already been taken."
     *                 ),),),),)),),)
     *
     *
     */
    public function store(StoreTenderRequest $storeTenderRequest, TenderService $tenderService): TenderResource
    {
        return new TenderResource($tenderService->add($storeTenderRequest->validated()));
    }


    /**
     *
     * Get Tender By External ID
     *
     * @param Tender $tender
     * @return TenderResource
     *
     * @OA\Get(path="/tenders/{tender}",
     *     tags={"tenders"},
     *     summary="Show Tender by External_ID",
     *     security={{"bearerAuth":{}}},
     *   @OA\Parameter(
     *         name="tender",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             example="152467180"
     *         )
     *     ),
     *     @OA\Response(response=201, description="Successful created",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                @OA\Property(
     *                     property="data",
     *                     type="object",
     *                @OA\Property(
     *                     property="external_id",
     *                     type="string",
     *                     example="152467180"
     *                 ),
     *                 @OA\Property(
     *                     property="number",
     *                     type="string",
     *                     example="17660-2"
     *                 ),
     *                 @OA\Property(
     *                     property="status",
     *                     type="string",
     *                     example="Закрыто"
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="Лабороаторная посуда"
     *                 ),
     *                 @OA\Property(
     *                     property="date",
     *                     type="string",
     *                     example="15.08.2022 19:25:14"
     *                 ),),),) ),),
     *     @OA\Response(response=401, description="Unauthorized",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                     example="Unauthorized"
     *                 ),
     *            ),
     *             )
     *         ),
     * ),
     *
     *     @OA\Response(response=404, description="Not Found",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                     example="No query results for model [App\\Models\\Tender] 1524671802"
     *                 ),
     *            ),
     *             )
     *         ),
     * ),
     *
     * )
     */
    public function show(Tender $tender): TenderResource
    {
        return new TenderResource($tender);
    }
}
