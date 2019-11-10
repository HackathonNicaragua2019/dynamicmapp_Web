# Dynamicmapp ![GitHub tag (latest SemVer)](https://img.shields.io/github/v/tag/HackathonNicaragua2019/dynamicmapp_Web?sort=semver&style=plastic)
Sistema de gestión de transporte publico
## Documentación de API
### GeoJson
Este projecto utiliza el estandar GeoJson para obtener y enviar la información de geolocalización.
* Punto de geolocalización, ejemplos: `{"type":"Point","coordinates":[-74.98615270853043,40.74894149554006]}`
* Rutas, se define como un arreglo de puntos de geolocalización, ejemplo: `{"type":"LineString","coordinates":[[-74.98615270853043,40.74894149554006], [-74.98615270853043,40.74894149554006], [-74.98615270853043,40.74894149554006]]}`
### Rutas
Enpoints destinados al modulo de rutas:
* Crear
    * endpoint: `api/routes`
    * type: post
    * Parametros:
        * name: Campo de texto para nombrar la ruta
        * description: Campo de texto para describir la ruta
        * start: Punto de geolocalización
        * end: Punto de geolocalización
        * route: Arreglo de puntos de geolocalización
* Mostrar
    * endpoint: `api/routes/{id}`
    * type: get
* Editar
    * endpoint: `api/routes/{id}`
    * type: put
        * name: Campo de texto para nombrar la ruta
        * description: Campo de texto para describir la ruta
        * start: Punto de geolocalización
        * end: Punto de geolocalización
        * route: Arreglo de puntos de geolocalización
* Eliminar 
    * endpoint: `api/routes/{id}`
    * type: delete

### Buses
Enpoints destinados al modulo de buses:
* Crear
    * endpoint: `api/buses`
    * type: post
    * Parametros:
        * name: Nombre del autobús
        * license_plate: Placa del autobús
        * device_id: Id del dispositivo gps
* Mostrar
    * endpoint: `api/buses/{id}`
    * type: get
* Editar
    * endpoint: `api/buses/{id}`
    * type: put
        * name: Nombre del autobús
        * license_plate: Placa del autobús
        * device_id: Id del dispositivo gps
* Eliminar 
    * endpoint: `api/buses/{id}`
    * type: delete