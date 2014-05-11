Symfony app with REST API and Backbone
======================================

### !!! This project is still in development !!!

### Installation

```
php composer.phar install
```

```
php app/console doctrine:database:create
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load
```

```
php app/console server:run
```

```
http://localhost:8000
```

### Test API

```
http://localhost:8000/api/v1/users/user
```

Logged user:

```
http://localhost:8000/api/v1/me
```
