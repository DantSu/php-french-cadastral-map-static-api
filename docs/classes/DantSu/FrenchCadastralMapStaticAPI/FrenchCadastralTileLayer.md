
# FrenchCadastralTileLayer

DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer define french cadastral tile server and related configuration



* Full name: `\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer`
* Parent class: [TileLayer](../../../classes.md)

**See Also:**

* https://github.com/DantSu/php-french-cadastral-map-static-api - Github page of this project



## Constants

| Constant | Value |
|:---      |:---   |
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_AMORCES_CAD`|&#039;AMORCES_CAD&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_CADASTRAL_PARCEL`|&#039;CP.CadastralParcel&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_SUBFISCAL`|&#039;SUBFISCAL&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_CLOTURE`|&#039;CLOTURE&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_DETAIL_TOPO`|&#039;DETAIL_TOPO&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_HYDRO`|&#039;HYDRO&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_BUILDING`|&#039;BU.Building&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_BORNE_REPERE`|&#039;BORNE_REPERE&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_VOIE_COMMUNICATION`|&#039;VOIE_COMMUNICATION&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralTileLayer::LAYER_LIEUDIT`|&#039;LIEUDIT&#039;|

## Methods

- [__construct](#-__construct) 
- [getTileUrl](#-gettileurl) 
- [getAttributionText](#-getattributiontext) 

### ->__construct

CadastralTileLayer constructor








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `insee` | **int** | Code insee of the city |
| `cadastralLayers` | **string[]** | Array of cadastral layers. Use constants `FrenchCadastralTileLayer::LAYER_...` |




---
### ->getTileUrl

Get tile url for coordinates and zoom level








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **int** | x coordinate |
| `y` | **int** | y coordinate |
| `z` | **int** | zoom level |


#### Return Value:

 **string** : tile url



---
### ->getAttributionText

Get attribution text









#### Return Value:

 **string** : Attribution text



---


---
> Automatically generated from source code comments on 2022-11-02 using [phpDocumentor](http://www.phpdoc.org/)
