<?php
/**
 * Configuration file for map settings.
 *
 * This file contains the mapbox access token configuration.
 *
 * @return array
 */
return [
    /**
     * Configuration option for the Mapbox access token.
     *
     * This option retrieves the Mapbox access token from the environment variables.
     *
     * @return string The Mapbox access token.
     */
    'mapbox_access_token' => env('MAPBOX_ACCESS_TOKEN')
];
