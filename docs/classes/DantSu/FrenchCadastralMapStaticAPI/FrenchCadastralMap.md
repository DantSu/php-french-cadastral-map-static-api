
# FrenchCadastralMap

DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap is a PHP library created for easily get static image from French Cadastral Government map with markers, lines, polygons and circles.



* Full name: `\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap`
* Parent class: [OpenStreetMap](../../../classes.md)

**See Also:**

* https://github.com/DantSu/php-osm-static-api/blob/master/docs/classes/DantSu/OpenStreetMapStaticAPI/OpenStreetMap.md - For documentation
* https://github.com/DantSu/php-french-cadastral-map-static-api - Github page of this project



## Constants

| Constant | Value |
|:---      |:---   |
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_AMORCES_CAD`|&#039;AMORCES_CAD&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_CADASTRAL_PARCEL`|&#039;CP.CadastralParcel&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_SUBFISCAL`|&#039;SUBFISCAL&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_CLOTURE`|&#039;CLOTURE&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_DETAIL_TOPO`|&#039;DETAIL_TOPO&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_HYDRO`|&#039;HYDRO&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_BUILDING`|&#039;BU.Building&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_BORNE_REPERE`|&#039;BORNE_REPERE&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_VOIE_COMMUNICATION`|&#039;VOIE_COMMUNICATION&#039;|
|`\DantSu\FrenchCadastralMapStaticAPI\FrenchCadastralMap::LAYER_LIEUDIT`|&#039;LIEUDIT&#039;|

## Methods

- [__construct](#-__construct) 
- [setLayers](#-setlayers) 
- [setDisplayOpenStreetMap](#-setdisplayopenstreetmap) 

### ->__construct

FrenchCadastralMap constructor.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `insee` | **int** | Code insee of the city |
| `centerMap` | **\DantSu\FrenchCadastralMapStaticAPI\LatLng** | Latitude and longitude of the map center |
| `zoom` | **int** | Zoom |
| `imageWidth` | **int** | Width of the generated map image |
| `imageHeight` | **int** | Height of the generated map image |




---
### ->setLayers

Define cadastral layers to display.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `layers` | **string[]** | Array of constants `FrenchCadastralMap::LAYER_...` |


#### Return Value:

 **$this** : Fluent interface



---
### ->setDisplayOpenStreetMap

Display or not OpenStreetMap in background.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `displayOpenStreetMap` | **bool** | Set true to display OpenStreetMap in background |


#### Return Value:

 **$this** : Fluent interface



---


---
> Automatically generated from source code comments on 2022-05-24 using [phpDocumentor](http://www.phpdoc.org/)
