## Files mainly touched

├── README.md\
├── app\
├── artisan\
├── bootstrap\
├── resources\
│   ├── css\
│   ├── js\
│   ├── sass\
│   └── views\
│   └── movie.blade.php ---------------------Main View\
├── routes\
│   ├── api.php\
│   ├── channels.php\
│   ├── console.php\
│   └── web.php ---------------------------------Main API\

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

## Other comments

Honestly, I haven't used laravel framework before. Give the fact I don't have much time to complete the task, this project is way from perfect. I'm more than happy to improve my skills in future if you would recognize my learning skills and potential.
