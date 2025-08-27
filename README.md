<p align="center"><a href="https://osadolor.tinnovations.com.ng" target="_blank"><img src="https://osadolor.tinnovations.com.ng/img/relicon.jpg" width="200" height="auto"></a></p>

## IGHIWIYISI, Anthony Osadolor

Dedicated, Patient and Focused, young adventurous Programmer, 
ready to touch the world. Believe the little act of kindness 
builds the most valued relationship. Simplicity is the Key to a 
Happy Life..

### Stacks

- **Backend : PHP / Laravel**
- **Frontend : Livewire Starter Kit - Blade, Tailwind CSS, Flux UI & Flowbite**

## Setup Guide
##### Setting up your workspace offline
##### Laravel Version => '12.26.2'
Before running this app locally make sure you have the following software installed:
<ul>
    <li>XAMPP/WAMP/LAMP or it's equivalent</li>
    <li>Composer</li>
    <li>NPM</li>
    <li>A Web Browser</li>
</ul>
Now, follow this steps:
<ol>
    <li>Go to https://github.com/TonyOsadolor/osadolorCV .</li>
    <li>Open your terminal, navigate to your preferred folder and Run: <code>git clone https://github.com/TonyOsadolor/osadolorCV.git</code>.</li>
    <li>Run <code>cd osadolorCV</code></li>
    <li>Run <code>composer install</code></li>
    <li>Run <code>npm install</code></li>
    <li>Run <code>npm run build</code></li>
    <li>Run <code>composer run dev</code></li>
    <li>Copy all the contents of the <code>.env.example</code> file. Create <code>.env</code> file and paste all the contents you copied from <code>.env.exmaple</code> file to your <code>.env</code> file.</li>
    <li>Run <code>php artisan key:generate --show</code> to retrieve a base64 encoded string; copy same and past in the Laravel's APP_KEY in <code>.env</code> or run <code>php artisan key:generate</code> to have the key generated and attach itself.</li>
    <li>Set your DB_DATABASE = <code>db_name</code> or whatever you prefer.</li>
    <li>If you are using XAMPP, run it as an administrator. Start Apache and Mysql. Go to <code>localhost/phpmyadmin</code> and create new database and name it <code>db_name</code>.</li>
    <li>If you use any other offline server client, simply setup your local database name <code>db_name</code>.</li>
    <li>Once you are done with the database set up, kindly run <code>php artisan migrate</code>.</li>
    <li>When you are done migrating the tables, run <code>php artisan db:seed</code> to see the default dependency models.</li>
    <li>Run php artisan serve from your terminal to start your local server at: <code>http://127.0.0.1:8000/admin</code> .</li>
    <li>Sign in with your seeded Admin details, and make add your changes..</code> .</li>
    <li>Open the Address in your native browser and signup, voula... you can start using the WebApp.</li>
</ol>


## Code of Conduct
In order to ensure that the Project is used for it rightful existence, please review and abide by the Code of Conduct.


## Security Vulnerabilities
If you discover a security vulnerability within Project, please send an e-mail to Anthony Osadolor via support@tinnovations.com.ng. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
