 # Food Atlas Back End
![Screen shot of landing page of Food Atlas](./food.png)

This is repo for the back end of [Food Atlas](https://laikathespacedog.github.io/food-atlas/#), a mini web app built with React that combines three of my greatest loves: travel, geography and food!

## Info
This API was built using Laravel 8 and is hosted using AWS EC2. The API can be accessed at https://food-atlas.laikathespacedog.co.uk.

## Local set up
To get set up with the project on your local machine I would recommend using using [Vagrant](https://www.vagrantup.com/). Once you've downloaded Vagrant, you can follow these instructions:

1.  Run `git clone git@github.com:LaikaTheSpaceDog/food-atlas-back-end.git <desired sub-directory>`. The project files will be cloned to your local repo.
2.   `CD` into the newly created project folder.
3.  Run `composer install` to download the required dependencies locally.
4.  Run `vendor/bin/homestead make` to copy relevant Homestead files into project directory.
5.  Change the second line of Homestead.yaml so it just uses 512mb: `memory: 512`
6.  Run `cp .env.example .env` to create a .env file
7.  In your newly created .env file, make the following changes:
   ````
   DB_DATABASE=homestead
   DB_USERNAME=root
   DB_PASSWORD=secret
   ````
9. Run `vagrant up` to get Vagrant up and running.
10. Once Vagrant has finished loading, in your browser go to the below to view the UI:
    1.  On Mac: http://homestead.test
    2.  On Windows: http://localhost:8000
11. Run `vagrant ssh` to SSH into the running Vagrant machine.
12. Run `cd code` to enter the code directory.
13. Run `artisan migrate` to run all migrations.

## Front End Repo
The repo for the front-end of this project can be found [here](https://github.com/LaikaTheSpaceDog/food-atlas).