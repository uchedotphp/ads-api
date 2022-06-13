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
        Popup::where("idem", $popup->idem)
            ->update($request->validated());

        return response()->json([
            "popup" => $popup->refresh(),
        ]);
    }

    public function destroy(Popup $popup): JsonResponse
    {
        $popup->delete();
        return response()->json([
            "popup" => $popup->refresh(),
        ]);
    }

    public function fetch(Request $request): JsonResponse
    {
        $idem = $request->route("idem");
        $popup = Popup::where("idem", $idem)->firstOrFail();

        return response()->json([
            "popup" => $popup,
        ]);
    }
}
