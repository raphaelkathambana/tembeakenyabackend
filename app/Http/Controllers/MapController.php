<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapData;
use App\Models\Hike;
use Illuminate\Support\Facades\Config;
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
        $hike = Hike::findOrFail($id);
        $mapData = $hike->mapData;

        // Check if the request is for driving or walking
        $isDriving = $request->input('navigation_mode') == 'driving';

        if ($isDriving) {
            // Use Mapbox Directions API for driving navigation
            $response = Http::get('https://api.mapbox.com/directions/v5/mapbox/driving/' . $request->longitude . ',' . $request->latitude . ';' . $mapData->longitude . ',' . $mapData->latitude, [
                'annotations' => 'distance,duration',
                'continue_straight' => 'true',
                'geometries' => 'geojson',
                'language' => 'en',
                'overview' => 'full',
                'steps' => 'true',
                'access_token' => Config::get('map.mapbox_access_token'),
            ]);

        } else {
            // format the waypoints
            $coordinates = collect($mapData->waypoints)->map(function($waypoint) {
                return "{$waypoint['longitude']},{$waypoint['latitude']}";
            })->implode(';');
            // Use Mapbox Directions API for walking navigation
            $response = Http::get('https://api.mapbox.com/directions/v5/mapbox/walking/' .$coordinates, [
                'annotations' => 'distance,duration',
                'continue_straight' => 'true',
                'geometries' => 'geojson',
                'language' => 'en',
                'overview' => 'full',
                'steps' => 'true',
                'access_token' => Config::get('map.mapbox_access_token'),
            ]);
        }
        if ($response->successful()) {
            $route = $response->json();
            return response()->json([
                'hike' => $hike,
                'route' => $route
            ]);
        } else {
            return response()->json([
                'error' => 'Unable to fetch route from Mapbox',
                'status' => $response->status(),
                'message' => $response->body(),
                'link' => $response->effectiveUri(),
        ], 500);
        }
    }
}
