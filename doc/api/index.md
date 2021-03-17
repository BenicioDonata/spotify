# Api Unnax

### PayOut

_pk = Número generado automaticamente con la creacion del registro._


- **Crear registro en PayOut**

  - Method : POST
  - URL: /api/service/payout
  
  

  | Attribute                   | Type                 | Required | Description                                               | Example                          |
  | :---------------------------| :--------------------| :--------| :---------------------------------------------------------| :--------------------------------|
  | `omburequest_id `           | integer              | Si       | Fk de la tabla solicitudes (order code).                  | 1                                |
  | `amount`                    | integer              | Si       | Cantidad en unidades de centavos.                         | 10050 (100,50)                   |
  | `currency`                  | string               | Si       | 'EUR' por defecto. Código de tres letras según ISO 4217.  | EUR                              |
  | `customer_code`             | string               | Si       | Número de documento de identidad del cliente.             | 12345679                         |
  | `concept`                   | string               | Si       | Concepto de pedido personalizado.                         | Transfer                         |
  | `destination_account`       | String               | Si       | Hash de la cuenta de destino.                             | ES8699992021230310034482         |
  | `owner`                     | String               | Si       | Proveedor.                                                | Fastcredit                       |
  | `customer`                  | string               | Si       | Cliente.                                                  | Test                             |

_Ejemplo de creacion de un registro:_

```json
{
    "amount" : 700,
    "customer_names" : "Name Surname", 
    "customer_code" : "12345679", 
    "order_code" : "9", 
    "concept" : "Transfer",
    "destination_account" : "ES8699992021230310034482",
    "owner": "fastcredit",
    "customer": "test"
}
```

_Ejemplo de respuesta a la creacion de registro:_

```json
  {
      "success": true,
      "code": 0,
      "locale": "en",
      "message": "OK",
      "data": {
          "item": {
              "omburequest_id": 9,
              "amount": 700,
              "currency": "EUR",
              "customer_code": "12345679",
              "concept": "Transfer",
              "destination_account": "ES8699992021230310034482",
              "owner": "fastcredit",
              "customer": "test",
              "updated_at": "2021-03-08T01:51:31.000000Z",
              "created_at": "2021-03-08T01:51:31.000000Z",
              "id": 6,
              "omburequest": {
                  "id": 9,
                  "negocio_id": 3,
                  "marca_id": null,
                  "ws_usuario_id": 3,
                  "fechahora": "2021-01-29 11:23:53",
                  "estado": "HAB",
                  "estado_solicitud": "PEND",
                  "prestamo_id": null,
                  "data": "{\"monto\": \"5000\", \"plazo\": \"7\", \"plan_id\": \"2\"}",
                  "usuario_id": null,
                  "fechahora_modif": "2021-01-29 11:23:53",
                  "comentario": null
              }
          }
      }
  }
```


_Ejemplo de respuesta cuando el código de orden bancaria ya existe en el banco para transferir:_

```json
{
    "success": false,
    "code": 400,
    "locale": "en",
    "message": "Bank order code already exists",
    "data": null,
    "debug": []
}
```

_Ejemplo de respuesta cuando se envia un request sin datos:_

```json
{
    "success": false,
    "code": 411,
    "locale": "en",
    "message": "Data was expected in the request.",
    "data": null,
    "debug": []
}
```


_Ejemplo de envio de datos en el request sin uno de los campos requeridos:_

```json
{
    "amount" : "800" ,
    "customer_names" : "Name Surname2", 
    "customer_code" : "", 
    "order_code" : "9", 
    "concept" : "Transfer",
    "destination_account" : "ES8699992021230310034482",
    "owner": "fastcredit",
    "customer": "test"
}
```


_Ejemplo de respuesta cuando no envia uno de de los datos requeridos en el request:_

```json
{
    "success": false,
    "code": 411,
    "locale": "en",
    "message": "Data was expected in the request.",
    "data": null,
    "debug": []
}
```

----
