## Files mainly used

├── README.md
├── app
├── artisan
├── bootstrap
├── resources
│   ├── css
│   ├── js
│   ├── sass
│   └── views
│   └── movie.blade.php ---------------------Main View
├── routes
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php ---------------------------------Main API

## How to start the project locally

```Shell
cd movie-app
cp .env.example .env
php artisan key:generate
```

Add your api key to .env file, then

```Shell
php artisan serve
```

Go to link localhost:8000
