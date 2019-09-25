# UEFA-Champions-League-Team-Generator
In the annual football competition UEFA Champions League, the group stage comprises of 32 football clubs.

In the year 2018, the following teams qualified:
- Club (Country)
- Real Madrid (ESP)
- Atlético Madrid (ESP)
- Bayern München (GER)
- Barcelona (ESP)
- Juventus (ITA)
- Paris Saint-Germain (FRA)
- Manchester City (ENG)
- Lokomotiv Moskva (RUS)
- Borussia Dortmund (GER)
- Porto (POR)
- Manchester United (ENG)
- Shakhtar Donetsk (UKR)
- Napoli (ITA)
- Tottenham Hotspur (ENG)
- Roma (ITA)
- Liverpool (ENG)
- Schalke (GER)
- Lyon (FRA)
- Monaco (FRA)
- CSKA Moskva (RUS)
- Valencia (ESP)
- Viktoria Plzeň (CZE)
- Club Brugge (BEL)
- Galatasaray (TUR)
- Internazionale Milano (ITA)
- Hoffenheim (GER)
- Benfica (POR)
- Ajax (NED)
- PSV Eindhoven (NED)
- Young Boys (SUI)
- Crvena zvezda (SRB)
- AEK Athens (GRE)

# Problem Statement
Goal is to create a web app which randomly generates 8 groups with 4 teams each.

# Rules
- Group names should be “Group A”, “Group B”, “Group C” and so on.
- A group cannot have more than one team from the same country.
- Top 8 teams in the list are the winners of their respective domestic leagues / winners of last year’s UEFA competitions. The first team of every group must be a domestic league champion.
- The program should be able to generate a fresh new list via an API.
- The program should output a list of teams under each group title.

# Application Stack
- Laravel 6.0.3
- MongoDB 3.2.22
- PHP 7.2.22

# Setup Instructions
This step assumes that you have already have above mentioned PHP and MongoDB version installed and configured.

First and Foremost!
Run  composer install in root folder of application to install dependecies and update these configs in .env file

```sh
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=mongodb
DB_HOST=localhost
DB_PORT=27017
DB_DATABASE=uefa
DB_USERNAME=
DB_PASSWORD=
```
> php artisan config:clear <br> To get rid of old config cache.

1. Generate Migrations
    > php artisan migrate
        <br>As database used here is MongoDB this step is not necessary but still created migrations, maybe sometime we'll port this for MySQL as well

2. Run Seeders
    > php artisan db:seed --class=TeamsTableSeeder
        <br>This will seed basic team data into database (Name, Country, Logos) 
3. Run Application on server
    > php artisan serve <br>
    Though there are serveral ways of setting up a Laravel application on servers we are using Php artisan serve (PHP builtin server) just for testing and easy starting your project it should not be used in real website deployment.
    <br> This will output an URL 
    <br> http://127.0.0.1:XXXX
    
    
There we go this is all in our application setup, easy, Right! :)

If all steps were right you will be able to see this Screen. Please check below link for screenshot
https://drive.google.com/file/d/1Irp4O9Hsf_cOcwhp30eKYJsES6TI7Mfi/view?usp=sharing

** At first you will see all teams under single Unnamed group. Just hit Shuffle button, this will distribute teams into groups

# Technical Aspects Covered
- Laravel ORM
- Laravel + MongoBD (jenssegers/laravel-mongodb)
- Laravel Migrations
- Laravel Resources
- Laravel Seeders
- Laravel API's
- Laravel's Blade Template 
