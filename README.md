# Simple CRM
A complete small crm with feature of company and employee listing.


### Prerequisites
What things you need to install this project and how to setup the project on local
- PHP `[8.0 or above]`
- Composer `[2.0 or above]`
- MySql `[mysqlnd 7.4.33 or above]`
- NPM

### Step To Install

Follow each and every step to go seamless installation of admin panel

- Git Clone the project in your directory
- Go to that directory `cd practicle-jbsolution`
- Install dependency `composer install`
- Install JS dependency `npm install && npm run dev` (optional)
- Copy ENV file `cp .env.example .env`
- Change Database Details inside `.env` file
- Perform `php artisan migrate`
- Perform `php artisan db:seed`
- Perform `php artisan key:generate` 
- Perform `php artisan storage:link`
- All Set ! Now run the server using `php artisan serve`

### Plugins

Laravel Core Admin is currently extended with the following plugins.
Instructions on how to use them in your own application are linked below.

| Plugin | README |
| ------ | ------ |
| Laravel AdminLTE | https://github.com/jeroennoten/Laravel-AdminLTE |
| Laravel Datatable | https://yajrabox.com/docs/laravel-datatables/10.0 |



### Security Vulnerabilities
If you discover a security vulnerability within this app, please send an e-mail to Tarang Panchal via [tarang.webinfosolutions@gmail.com](mailto:tarang.webinfosolutions@gmail.com). All security vulnerabilities will be promptly addressed.

