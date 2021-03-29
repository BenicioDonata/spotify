# Api Spotify
Challenge Aivo | Oportunidad Back End PHP

_1 - Primera paso es la obtención del token a través de la API pasando por el Header el tipo de Authorization Basic con un valor en base 64 del CLIENT ID y el SECRET ID y en el body el parámetro grant_type._

_2 - Luego de obtener el token seguimos con los siguientes ejemplos para el consumo del endpoint de la API para obtener el listado de álbumes._

_Ejemplo de como obtener el listado de albunes de un artista o banda, se pasa como parametro de tipo string:_

```json
{

"band_name" : "las pastillas del abuelo"
    
}
```

_Ejemplo del respuesta de la api al obtener el listado de albunes del artista o banda:_

```
[
    {
        "name": "Las Pastillas del Abuelo",
        "release_date": "2006",
        "total_tracks": 12,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b2737f39f9822cb3794442322a70"
        }
    },
    {
        "name": "Paradojas",
        "release_date": "2015-10-23",
        "total_tracks": 12,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b273ecad4ede5962e85c6391fe88"
        }
    },
    {
        "name": "2020",
        "release_date": "2020-11-13",
        "total_tracks": 10,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b273dde1c62f72d240ad3b9c4176"
        }
    },
    {
        "name": "Desaf\u00edos",
        "release_date": "2015-08-25",
        "total_tracks": 13,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b27313557a104cadb4b9868f1bd2"
        }
    },
    {
        "name": "Por Colectora",
        "release_date": "2005-10-01",
        "total_tracks": 12,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b2730e1cc83e61285410446b1906"
        }
    },
    {
        "name": "El Favor",
        "release_date": "2019-11-20",
        "total_tracks": 1,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b2733545c1a1a8cff9c8bc45803a"
        }
    },
    {
        "name": "Versiones",
        "release_date": "2010",
        "total_tracks": 10,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b2734cb0c37844d05acc6d405867"
        }
    },
    {
        "name": "Vivo De Pastillas: Locura Y Realidad (Live In Buenos Aires \/ 2016)",
        "release_date": "2017-11-10",
        "total_tracks": 18,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b273139bed0e823fe7e9691ea587"
        }
    },
    {
        "name": "El Barrio en Sus Pu\u00f1os",
        "release_date": "2014-09-08",
        "total_tracks": 12,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b27393834232f53be27647cbfcc4"
        }
    },
    {
        "name": "10 A\u00f1os en Vivo en el Luna (En Vivo)",
        "release_date": "2013-03-11",
        "total_tracks": 10,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b27374ef41f715b6822793cb2843"
        }
    },
    {
        "name": "Incontinencia Verbal",
        "release_date": "2019-03-29",
        "total_tracks": 1,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b273f740dc70a40c78394ec71db7"
        }
    },
    {
        "name": "M\u00e1s Lejos",
        "release_date": "2019-08-16",
        "total_tracks": 1,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b27397c1bb4e1e0467407c3b2db8"
        }
    },
    {
        "name": "Interpretaci\u00f3n",
        "release_date": "2020-04-20",
        "total_tracks": 1,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b2738a1f1ec12da02d14b7fba6b3"
        }
    },
    {
        "name": "En Vivo en la Kermesse",
        "release_date": "2012-11-18",
        "total_tracks": 7,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b273bc9df3cac1d85d138bfff68d"
        }
    },
    {
        "name": "Inercia",
        "release_date": "2015-09-08",
        "total_tracks": 1,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b2732b4f87ad444ec4afc1106e12"
        }
    },
    {
        "name": "Realidad (En Vivo Estadio Unico 2017) (with Las Pastillas Del Abuelo)",
        "release_date": "2018-05-24",
        "total_tracks": 1,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b27306d959e58eb9669b81e1c75e"
        }
    },
    {
        "name": "Absolutismos\u2026",
        "release_date": "2017-09-01",
        "total_tracks": 1,
        "cover": {
            "height": 640,
            "width": 640,
            "url": "https:\/\/i.scdn.co\/image\/ab67616d0000b273d3e6381390238656f420b156"
        }
    }
]
```
_Ejemplo de no body en el request:_

```
{
    
}
```

_Respuesta de error al no enviar body en el request:_

```
{
   "success": false,
   "http_code": 400,
   "detail": "BAD REQUEST"
}
```
_Ejemplo de parametro vacio en el request:_

```
{

"band_name" : ""
    
}
```

_Respuesta de error al recibir un parametro vacio en el body:_

```
{
    "success": false,
    "http_code": 500,
    "detail": "INTERNAL SERVER ERROR"
}
```

### By Manuel Contrera
