Symfony2 Web App with REST API
======================================

Using:
- RequireJS the javascript module loader.
- Bower for frontend package management.
- Node.js for realtime notifications.

### !!! This project is still in development !!!

### Installation

1 - Composer

```
php composer.phar install
```

```
php app/console doctrine:database:create
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load
```

2 - Javascript

```
npm install -g bower
```

```
npm install
```

```
bower install
```

3 - Run node.js server

```
node websocket/server.js
```

4 - Run server

```
php app/console server:run
```

5 - See the result

Open multiple browser windows to address `` http://localhost:8000/meetup `` and click the button

### Test API

```
http://localhost:8000/api/v1/users/user
```

With logged user:

```
http://localhost:8000/api/v1/me
```
