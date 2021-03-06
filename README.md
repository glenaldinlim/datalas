<p align="center"><img src="https://raw.githubusercontent.com/glenaldinlim/glenaldinlim/master/datalas/brand.png" width="400"></p>

## About Datalas

Datalas a.k.a Data Digital Komoditas is a web app that provide production statistic of variates commodity in Indoensia. This web app is a final project submission courses (INF304 - Rekayasa Perangkat Lunak & TEK305 - Pemrograman Berbasis Web).

### Team
- J3D119013 - Ananda Rizky Raihansyah
- J3D119017 - Aryo Bima Bhagaskara
- J3D119052 - Glenaldin Halim
- J3D119081 - Muhamad Bagas Adil Hakim
- J3D119084 - Muhammad Ashraf Mutawally
- J3D119110 - Ramadhan Kukuh Prakoso

## Technology Used

| Name                                   | Version |
| -------------------------------------- | ------- |
| [Laravel](https://laravel.com/)        | 8.x     |
| [Bootstrap](https://getbootstrap.com/) | 4.6.x   |
| [Jquery](https://jquery.com/)          | 3.2.1   |

## Third Party Package

| Name                                                                                      | Version |
| ----------------------------------------------------------------------------------------- | ------- |
| [Stisla Admin Template](https://getstisla.com/)                                           | 2.2.0   |
| [DataTables](https://datatables.net/)                                                     | 1.10.16 |
| [FontAwesome](https://fontawesome.com/)                                                   | 5.13.0  |
| [laravel-permission by spatie](https://spatie.be/docs/laravel-permission/v5/introduction) | ^5.1    |
| [laravel/ui](https://github.com/laravel/ui)                                               | ^3.3    |
and many more third party package

## Development Environment
When develop this web app, I use [Laragon](https://laragon.org/) as my local development tool. The webserver I use is Nginx and dbserver is MySQL.

## How to Use
1. Clone this repo to your local computer via git command or zip download
2. Run `composer install` on your cmd or terminal
3. Copy and rename `.env.example` file to `.env` on root folder
4. Open the `.env` file and then configure `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` field correspond to your development environment configuration
5. Run `php artisan key:generate` and `php artisan migrate --seed`
6. If you want to use laravel development server, you can run `php artisan serve`
7. Don't forget to modify API URL link at some page correspond to your development enviroment URL

### Access Account
| Email                  | Password | Role      | Scope       |
| ---------------------- | -------- | --------- | ----------- |
| cto@datalas.tech       | password | Bod       | Admin Panel |
| webmaster@datalas.tech | password | Webmaster | Admin Panel |
| admin@datalas.tech     | password | Admin     | Admin Panel |
| johndoe@datalas.tech   | password | Community | User Panel  |

When creation administator user, the default password is *d4t4las00*
