<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     *
     *  @OA\Post(path="/auth/login",
     *     tags={"auth"},
     *     summary="Auth user",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="email",
     *                   description="User email",
     *                   type="string",
     *                   example="admin@admin.com"
     *               ),
     *               @OA\Property(
     *                   property="password",
     *                   description="User password",
     *                   type="string",
     *                   example="123456789"
     *               ),
     *           )
     *       )
     *   ),
     *     @OA\Response(response=200, description="Successful created",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                 @OA\Property(
     *                     property="access_token",
     *                     type="string",
     *                     example="token"
     *                 ),
     *                 @OA\Property(
     *                     property="token_type",
     *                     type="string",
     *                     example="bearer"
     *                 ),
     *                 @OA\Property(
     *                     property="expires_in",
     *                     type="integer",
     *                     example="3600"
     *                 ),
     *            ),
     *             )
     *         ),),
     *     @OA\Response(response=401, description="Unauthorized",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *             @OA\Items(
     *                type="object",
     *                 @OA\Property(
     *                     property="error",
     *                     type="string",
     *                     example="Unauthorized"
     *                 ),
     *            ),
     *             )
     *         ),),
     * )
     *
     *
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
