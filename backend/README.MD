# Tech Showcase

## Notes

* Using [Laravel](https://github.com/laravel/laravel)
* Create a model and view that;
   * Collects the [NSW government school enrolments by head count (2004-2016)](https://data.cese.nsw.gov.au/data/dataset/nsw-government-school-enrolments-by-head-count)
   * Presents the above data (done login using u - jason.rgd@gmail.com p - testtest)
   * Refreshes the data if it is older than a defined period, (you can define the period) (done, defined in backend/config/schooldata.php)
* Implement tests to validate key aspects of the above, (_a_ test, at least) (not yet done)
* Add a method that allows a logged in user to view information about the dataset, (eg; when it was last downloaded, how many records, etc). (done)
* Provide basic usage instructions so we know what you've done (done in how to run code section below)

## How to run code
* paste .env file provided into backend/ folder
* run docker-compose up -d --build 
* run composer install (docker exec -it techshowcase_php-fpm_1 php composer.phar install)
* goto localhost:8321 in your browser
* login using  u - jason.rgd@gmail.com p - testtest

## Where to find my code 
* backend/tests/
* backend/app/Repositories
* backend/app/Library
* backend/app/Controllers/HomeController
* backend/app/Providers/AppServiceProvider

## Assumptions

* Laravel was selected as a quick and easy method of providing me with a basic framework to start with as I felt I can perform the above tasks more effectively.
* for the requirements a database wasn't need as statistics could be stored in cache and retrieved. However, I am assuming a hypothetical scenario
  where the data collection retrieves more data after every fixed interval = ttl and we store these new statistic in database so we know variance in data over time.
  Obviously logic of updating the same record would then have to be changed which can be easily changed in SchoolStatsRepository
* I have mainly tried to demonstrate a 12 factor style app, proper documentation, tests, seperation of concerns, use of docker
