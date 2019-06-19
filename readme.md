Framwork: Lumen

** ENDPOINTS:

POSTMAN Collection: https://www.getpostman.com/collections/335dbb9667a1d5435c46

GET /pizzas
POST /pizzas/create
POST /pizzas/edit
GET /pizzas/remove/{id} // It's best to use POST. I'm using GET with parameter just to illustrate

GET /customers

GET /orders
POST /orders/create


** STEPS

* Configure the .env file
* Run: php artisan migrate to create migrations