<?php
require_once '../../vendor/autoload.php';

use \DantSu\OpenStreetMapStaticAPI\OpenStreetMap;
use \DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer;
use \DantSu\OpenStreetMapStaticAPI\LatLng;
use \DantSu\OpenStreetMapStaticAPI\Polygon;
use \DantSu\OpenStreetMapStaticAPI\Markers;

\header('Content-type: image/png');
(new OpenStreetMap(new LatLng(44.351933, 2.568113), 17, 600, 400))
    ->addLayer(
        new FrenchCadastralTileLayer(
            12202,
            [
                FrenchCadastralTileLayer::LAYER_AMORCES_CAD,
                FrenchCadastralTileLayer::LAYER_CADASTRAL_PARCEL,
                FrenchCadastralTileLayer::LAYER_SUBFISCAL,
                // CadastralTileLayer::LAYER_CLOTURE,
                FrenchCadastralTileLayer::LAYER_DETAIL_TOPO,
                FrenchCadastralTileLayer::LAYER_HYDRO,
                FrenchCadastralTileLayer::LAYER_BUILDING,
                FrenchCadastralTileLayer::LAYER_BORNE_REPERE,
                // CadastralTileLayer::LAYER_VOIE_COMMUNICATION,
                // CadastralTileLayer::LAYER_LIEUDIT
            ]
        )
    )
    ->addMarkers(
        (new Markers(__DIR__ . '/resources/marker.png'))
            ->setAnchor(Markers::ANCHOR_CENTER, Markers::ANCHOR_BOTTOM)
            ->addMarker(new LatLng(44.351933, 2.568113))
            ->addMarker(new LatLng(44.351510, 2.570020))
            ->addMarker(new LatLng(44.351873, 2.566250))
    )
    ->addDraw(
        (new Polygon('FF0000', 2, '00FF00CC'))
            ->addPoint(new LatLng(44.351172, 2.571092))
            ->addPoint(new LatLng(44.352097, 2.570045))
            ->addPoint(new LatLng(44.352665, 2.568107))
            ->addPoint(new LatLng(44.352887, 2.566503))
            ->addPoint(new LatLng(44.352806, 2.565972))
            ->addPoint(new LatLng(44.351517, 2.565672))
    )
    ->getImage()
    ->displayPNG();


