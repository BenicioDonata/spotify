# Api Spotify

### Get an Artist's Albums

_1 - Primera paso es la obtención del token a través de la API pasando por el Header el tipo de Authorization Basic con un valor en base 64 del CLIENT ID y el SECRET ID y en el body el parámetro grant_type._

_2 - Luego de obtener el token seguimos con los siguientes ejemplos para el consumo del endpoint de la API para obtener el listado de álbumes._

_Ejemplo de como obtener el listado de albunes de un artista o banda, se pasa como parametro un id de tipo string:_

```json
{

"band_name" : "1vCWHaC5f2uS3yhpwWbIA6"
    
}
```

_Ejemplo del respuesta de la api al obtener el listado de albunes del artista o banda:_

```
[
{
"name": "TIM",
"release_date": "2019-06-06",
"total_tracks": 12
},
{
"name": "Stories",
"release_date": "2015-10-02",
"total_tracks": 16
},
{
"name": "Stories",
"release_date": "2015-10-02",
"total_tracks": 15
},
{
"name": "Stories",
"release_date": "2015-10-02",
"total_tracks": 14
},
{
"name": "The Days \/ Nights",
"release_date": "2014-01-01",
"total_tracks": 4
},
{
"name": "True: Avicii By Avicii",
"release_date": "2014-01-01",
"total_tracks": 9
},
{
"name": "True (Bonus Edition)",
"release_date": "2013-09-16",
"total_tracks": 15
},
{
"name": "True",
"release_date": "2013-01-01",
"total_tracks": 15
},
{
"name": "True",
"release_date": "2013-01-01",
"total_tracks": 10
},
{
"name": "Forever Yours (Avicii Tribute)",
"release_date": "2020-01-24",
"total_tracks": 1
},
{
"name": "Fades Away (feat. MishCatt) [Tribute Concert Version]",
"release_date": "2019-12-05",
"total_tracks": 1
},
{
"name": "Heaven (David Guetta & MORTEN Remix)",
"release_date": "2019-08-23",
"total_tracks": 2
},
{
"name": "Tough Love (Ti\u00ebsto Remix)",
"release_date": "2019-06-14",
"total_tracks": 2
},
{
"name": "SOS (Laidback Luke Tribute Remix)",
"release_date": "2019-05-17",
"total_tracks": 2
},
{
"name": "Tough Love (feat. Vargas & Lagola)",
"release_date": "2019-05-09",
"total_tracks": 1
},
{
"name": "SOS (feat. Aloe Blacc)",
"release_date": "2019-04-10",
"total_tracks": 1
},
{
"name": "Lonely Together (Remixes)",
"release_date": "2017-11-17",
"total_tracks": 4
},
{
"name": "Lonely Together (Acoustic)",
"release_date": "2017-10-27",
"total_tracks": 1
},
{
"name": "Without You (Remixes)",
"release_date": "2017-10-13",
"total_tracks": 5
},
{
"name": "AV\u012aCI (01)",
"release_date": "2017-08-10",
"total_tracks": 6
}
]
```

