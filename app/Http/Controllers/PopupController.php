<?php

namespace App\Http\Controllers;

use App\Http\Requests\PopupStoreRequest;
use App\Http\Requests\PopupUpdateRequest;
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

    public function store(PopupStoreRequest $request, Popup $popup): JsonResponse
    {
        $newPopup = $popup->new($request->validated());

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

    public function update(PopupUpdateRequest $request, Popup $popup): JsonResponse
    {
        $updated = Popup::where("idem", $popup->idem)
            ->update($request->validated());

        return response()->json([
            "popup" => $popup->refresh(),
        ], 200);
    }

    public function destroy(Popup $popup)
    {
        //
    }
}
