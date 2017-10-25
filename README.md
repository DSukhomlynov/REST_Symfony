# REST test work 
Установка:<br>
1.Развернуть на своем localhost клонируя репозиторий<br>
2.Обновить в composer с помощью - composer update<br>
3.Создать бд - php bin/console doctrine:database:create<br>
4.В корне лежит база данных rest.sql. Импортировать ее в созданную базу вручную<br>
5.Запустить сервер через консоль - php bin\console server:run<br>
6.Тестирование по адресу - http://localhost:8000/<br><br>

Реализовано 5 методов:<br>
1)http://localhost:8000/users/Registration<br>
2)http://localhost:8000/users/Auth<br>
3)http://localhost:8000/users/addOrder<br>
4)http://localhost:8000/users/setOrderStatus<br>
5)http://localhost:8000/users/getMapInfo<br>