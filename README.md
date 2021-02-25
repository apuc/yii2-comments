# Yii comments

### Установка

1. Клонируйте данный репозиторий.

2. Инициализируйте приложение:
```sh
$ php init
```

3. Установите зависимости:
```sh
$ composer install
```

4. Внесите изменения в конфигурацию базы данных в файле **common/config/main-local.php**.

5. Выполните миграции:
```sh
$ php yii migrate
```

### Запуск сокет-сервера
```sh
$ php yii server/start
```

### Вход в админ-панель

Адрес:
```sh
http://{site-name}/backend/web/site/login
```

Логин: admin <br />
Пароль: 12345678