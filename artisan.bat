@echo off
php artisan %*

@REM elseif ($command === 'seed') {
@REM     echo "Running seeders...\n";
@REM     (new Database\Migrations\UserSeeder())->run();
@REM }