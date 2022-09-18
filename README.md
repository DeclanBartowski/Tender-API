## Libs

- [jwt-auth](hhttps://github.com/tymondesigns/jwt-auth)
- [thephpleague/csv](https://github.com/thephpleague/csv)
- [L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger)

## Swagger Doc

[/api/documentation](http://127.0.0.1:8000/api/documentation)

## .env

CSV_NAME=test_task_data.csv

JWT_SECRET=4i33goYTtroSJPcHkcRmzWA783VgsI5ICO7bHTqwrsVDoGXtQcTtkCN20QmcntWH

## Start

php artisan migrate --seed

User:  email:admin@admin.com password:123456789

php artisan tenders:load  - for load CSV

##Routes

GET get All /api/tenders (params name, date)

GET get tender by code /api/tenders/{tender}

POST addTender /api/tenders/

