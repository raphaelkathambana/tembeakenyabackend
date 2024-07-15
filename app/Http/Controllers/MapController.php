<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapData;
use App\Models\Hike;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
    public function getLandmarks()
    {
        $landmarks = MapData::all();
        return response()->json($landmarks);
    }

    public function getRoute(Request $request, $id)
    {
        $hike = Hike::find($id);

        if (!$hike) {
            return response()->json(['error' => 'Hike not found'], 404);
        }

        $mapData = $hike->mapData;

        $response = Http::get('https://api.mapbox.com/directions/v5/mapbox/walking/' . $mapData->longitude . ',' . $mapData->latitude . ';' . $request->longitude . ',' . $request->latitude, [
            'access_token' => env('MAPBOX_ACCESS_TOKEN'),
            'annotations' => 'distance,duration',
            'continue_straight' => true,
            'geometries' => 'geojson',
            'language' => 'en',
            'overview' => 'full',
            'steps' => true
        ]);
        if ($response->successful()) {
            $route = $response->json();
            return response()->json([
                'hike' => $hike,
                'route' => $route
            ]);
        } else {
            return response()->json(['error' => 'Unable to fetch route'], 500);
        }
    }
}
