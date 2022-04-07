<?php

namespace DantSu\FrenchCadastralMapStaticAPI;

use \DantSu\OpenStreetMapStaticAPI\OpenStreetMap;
use \DantSu\PHPImageEditor\Image;

/**
 * DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap is a PHP library created for easily get static image from French Cadastral Government map with markers and lines.
 *
 * @package DantSu\FrenchCadastralMapStaticAPI
 * @author Franck Alary
 * @access public
 * @see https://github.com/DantSu/php-osm-static-api/blob/master/docs/classes/DantSu/OpenStreetMapStaticAPI/OpenStreetMap.md For documentation
 * @see https://github.com/DantSu/php-french-cadastral-map-static-api Github page of this project
 */
class FrenchCadastralMap extends OpenStreetMap
{
    const LAYER_AMORCES_CAD = 'AMORCES_CAD';
    const LAYER_CADASTRAL_PARCEL = 'CP.CadastralParcel';
    const LAYER_SUBFISCAL = 'SUBFISCAL';
    const LAYER_CLOTURE = 'CLOTURE';
    const LAYER_DETAIL_TOPO = 'DETAIL_TOPO';
    const LAYER_HYDRO = 'HYDRO';
    const LAYER_BUILDING = 'BU.Building';
    const LAYER_BORNE_REPERE = 'BORNE_REPERE';
    const LAYER_VOIE_COMMUNICATION = 'VOIE_COMMUNICATION';
    const LAYER_LIEUDIT = 'LIEUDIT';


    /**
     * @var int Code insee of the city
     */
    private $insee;
    /**
     * @var string[] Selected layers
     */
    private $layers = [];
    /**
     * @var bool is displaying OpenStreetMap
     */
    private $displayOpenStreetMap = false;


    /**
     * FrenchCadastralMap constructor.
     * @param int $insee Code insee of the city
     * @param LatLng $centerMap Latitude and longitude of the map center
     * @param int $zoom Zoom
     * @param int $imageWidth Width of the generated map image
     * @param int $imageHeight Height of the generated map image
     */
    public function __construct(int $insee, LatLng $centerMap, int $zoom, int $imageWidth, int $imageHeight)
    {
        $this->insee = $insee;
        parent::__construct($centerMap, $zoom, $imageWidth, $imageHeight);
    }

    /**
     * Define cadastral layers to display.
     * @param string[] $layers Array of constants `FrenchCadastralMap::LAYER_...`
     * @return $this Fluent interface
     */
    public function setLayers(array $layers): FrenchCadastralMap
    {
        $this->layers = $layers;
        return $this;
    }

    /**
     * Display or not OpenStreetMap in background.
     * @param bool $displayOpenStreetMap Set true to display OpenStreetMap in background
     * @return $this Fluent interface
     */
    public function setDisplayOpenStreetMap(bool $displayOpenStreetMap): FrenchCadastralMap
    {
        $this->displayOpenStreetMap = $displayOpenStreetMap;
        return $this;
    }

    /**
     * Get attribution text
     * @return string Attribution text
     */
    protected function getAttributionText(): string
    {
        return 'cadastre.gouv.fr' . ($this->displayOpenStreetMap ? ' - ' . parent::getAttributionText() : '');
    }

    /**
     * Get only the map image.
     * @see https://github.com/DantSu/php-image-editor See more about DantSu\PHPImageEditor\Image
     * @return Image An instance of DantSu\PHPImageEditor\Image
     */
    protected function getMapImage(): Image
    {
        $mapData = $this->getMapData();

        if ($this->displayOpenStreetMap) {
            $image = parent::getMapImage();
        } else {
            $image =
                Image::newCanvas($mapData->getOutputSize()->getX(), $mapData->getOutputSize()->getY())
                    ->drawRectangle(0, 0, $mapData->getOutputSize()->getX(), $mapData->getOutputSize()->getY(), 'FFFFFF');
        }

        $cadastralMap = new Image();
        if ($cadastralMap->path(
            'https://inspire.cadastre.gouv.fr/scpc/' . ($this->insee < 10000 ? '0' . $this->insee : $this->insee) . '.wms?' .
            'service=wms&' .
            'version=1.3&' .
            'request=GetMap&' .
            'layers=' . \implode(',', \array_unique($this->layers)) . '&' .
            'styles=&' .
            'width=' . $mapData->getOutputSize()->getX() . '&' .
            'height=' . $mapData->getOutputSize()->getY() . '&' .
            'format=image/png&' .
            'transparent=true&' .
            'crs=EPSG:4326&' .
            'bbox=' . $mapData->getLatLngBottomLeft()->getLat() . ',' . $mapData->getLatLngBottomLeft()->getLng() . ',' . $mapData->getLatLngTopRight()->getLat() . ',' . $mapData->getLatLngTopRight()->getLng()
        )) {
            $image->pasteOn($cadastralMap);
        }

        return $image;
    }

}
