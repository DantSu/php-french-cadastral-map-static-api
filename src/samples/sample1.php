<?php
require_once '../../vendor/autoload.php';
require_once '../FrenchCadastralMap.php';
require_once '../LatLng.php';
require_once '../Line.php';
require_once '../Markers.php';
require_once '../XY.php';

use \DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap;
use \DantSu\FrenchCadastralMapStaticAPI\LatLng;
use \DantSu\FrenchCadastralMapStaticAPI\Line;
use \DantSu\FrenchCadastralMapStaticAPI\Markers;

\header('Content-type: image/png');
(new FrenchCadastralMap(12202, new LatLng(44.351933, 2.568113), 17, 600, 400))
    ->setLayers([
        FrenchCadastralMap::LAYER_AMORCES_CAD,
        FrenchCadastralMap::LAYER_CADASTRAL_PARCEL,
        FrenchCadastralMap::LAYER_SUBFISCAL,
        // FrenchCadastralMap::LAYER_CLOTURE,
        FrenchCadastralMap::LAYER_DETAIL_TOPO,
        FrenchCadastralMap::LAYER_HYDRO,
        FrenchCadastralMap::LAYER_BUILDING,
        FrenchCadastralMap::LAYER_BORNE_REPERE,
        // FrenchCadastralMap::LAYER_VOIE_COMMUNICATION,
        // FrenchCadastralMap::LAYER_LIEUDIT
    ])
    ->setDisplayOpenStreetMap(true)
    ->addMarkers(
        (new Markers(__DIR__ . '/resources/marker.png'))
            ->setAnchor(Markers::ANCHOR_CENTER, Markers::ANCHOR_BOTTOM)
            ->addMarker(new LatLng(44.351933, 2.568113))
            ->addMarker(new LatLng(44.351510, 2.570020))
            ->addMarker(new LatLng(44.351873, 2.566250))
    )
    ->addLine(
        (new Line('FF0000', 2))
            ->addPoint(new LatLng(44.351172, 2.571092))
            ->addPoint(new LatLng(44.352097, 2.570045))
            ->addPoint(new LatLng(44.352665, 2.568107))
            ->addPoint(new LatLng(44.352887, 2.566503))
            ->addPoint(new LatLng(44.352806, 2.565972))
            ->addPoint(new LatLng(44.351517, 2.565672))
            ->addPoint(new LatLng(44.351172, 2.571092))
    )
    ->getImage()
    ->displayPNG();


