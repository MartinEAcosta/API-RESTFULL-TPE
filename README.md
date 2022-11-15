# API-RESTFULL-TPE

GET : http://localhost/web/TPE-2/api/products
GET BY ID : http://localhost/web/TPE-2/api/products/:ID
DELETE : http://localhost/web/TPE-2/api/products/:ID
FILTER : http://localhost/web/TPE-2/api/products?filter=2
ORDER Y SORT : http://localhost/web/TPE-2/api/products?sort=id&order=DESC
POST : 
http://localhost/web/TPE-2/api/products
          {
        "p_name": "Ejemplo",
        "price": 100,
        "p_description": "Inalambrico",
        "stock": 16,
        "img": "image/ejemplo.png",
        "id_category": 1
    }
PUT: http://localhost/web/TPE-2/api/products/:ID








{
    "id_category": 13,
    "c_name": "PC"
}