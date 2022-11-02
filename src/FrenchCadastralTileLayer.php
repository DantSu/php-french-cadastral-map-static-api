<?php

namespace DantSu\FrenchCadastralMapStaticAPI;

use DantSu\OpenStreetMapStaticAPI\MapData;
use DantSu\OpenStreetMapStaticAPI\TileLayer;

/**
 * DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer define french cadastral tile server and related configuration
 *
 * @package DantSu\FrenchCadastralMapStaticAPI
 * @author Franck Alary
 * @access public
 * @see https://github.com/DantSu/php-french-cadastral-map-static-api Github page of this project
 */
class FrenchCadastralTileLayer extends TileLayer
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
    protected $insee;
    /**
     * @var string[] Selected cadastral layers
     */
    protected $cadastralLayers;


    /**
     * CadastralTileLayer constructor
     * @param int $insee Code insee of the city
     * @param string[] $cadastralLayers Array of cadastral layers. Use constants `FrenchCadastralTileLayer::LAYER_...`
     */
    public function __construct(
        int   $insee,
        array $cadastralLayers = [
            FrenchCadastralTileLayer::LAYER_AMORCES_CAD,
            FrenchCadastralTileLayer::LAYER_CADASTRAL_PARCEL,
            FrenchCadastralTileLayer::LAYER_SUBFISCAL,
            FrenchCadastralTileLayer::LAYER_CLOTURE,
            FrenchCadastralTileLayer::LAYER_DETAIL_TOPO,
            FrenchCadastralTileLayer::LAYER_HYDRO,
            FrenchCadastralTileLayer::LAYER_BUILDING,
            FrenchCadastralTileLayer::LAYER_BORNE_REPERE,
            FrenchCadastralTileLayer::LAYER_VOIE_COMMUNICATION,
            FrenchCadastralTileLayer::LAYER_LIEUDIT
        ]
    )
    {
        parent::__construct('', '', '');
        $this->insee = $insee;
        $this->cadastralLayers = $cadastralLayers;
    }

    /**
     * Get tile url for coordinates and zoom level
     * @param int $x x coordinate
     * @param int $y y coordinate
     * @param int $z zoom level
     * @return string tile url
     */
    public function getTileUrl(int $x, int $y, int $z): string
    {
        return
            'https://inspire.cadastre.gouv.fr/scpc/' . ($this->insee < 10000 ? '0' . $this->insee : $this->insee) . '.wms?' .
            'service=wms&' .
            'version=1.3&' .
            'request=GetMap&' .
            'layers=' . \implode(',', \array_unique($this->cadastralLayers)) . '&' .
            'styles=&' .
            'width=256&' .
            'height=256&' .
            'format=image/png&' .
            'transparent=true&' .
            'crs=EPSG:4326&' .
            'bbox=' . MapData::yTileToLat($y, 256, $z) . ',' . MapData::xTileToLng($x, 0, $z) . ',' . MapData::yTileToLat($y, 0, $z) . ',' . MapData::xTileToLng($x, 256, $z);
    }

    /**
     * Get attribution text
     * @return string Attribution text
     */
    public function getAttributionText(): string
    {
        return 'cadastre.gouv.fr';
    }
}
