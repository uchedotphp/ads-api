<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            "popups" => Popup::paginate(30),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $newPopup = null;
        return response()->json([
            "popup" => $newPopup,
        ], 201);
    }

    public function show(Popup $popup): JsonResponse
    {
        return response()->json([
            "popup" => $popup,
        ]);
    }

    public function update(Request $request, Popup $popup): JsonResponse
    {
        return response()->json([
            "popup" => $popup,
        ], 200);
    }

    public function destroy(Popup $popup)
    {
        //
    }
}
