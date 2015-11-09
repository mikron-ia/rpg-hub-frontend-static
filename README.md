# RPG hub
[![Build Status](https://travis-ci.org/mikron-ia/rpg-hub-frontend-static.svg?branch=master)](https://travis-ci.org/mikron-ia/rpg-hub-frontend-static)
[![Code Climate](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static/badges/gpa.svg)](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static)
[![Test Coverage](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static/badges/coverage.svg)](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static/coverage)

A system for role-playing game story/campaign/epic management. This repository is the frontend - PHP Version.

## Background
[Role-playing games](https://en.wikipedia.org/wiki/Role-playing_game) are a very wide category, ranging from very simplistic systems to extremely complex mechanical solutions. What they do have in common, though, is the story - you can play a game without mechanics, but even a primitive dungeon crawl is going to have some story. Managing this story, its cast, threads, and - if present - mechanical components - is the role of this project.

The project is currently split in three parts - [backend](https://github.com/mikron-ia/rpg-hub-backend) and two variants of the frontend - this and [AngularJS, undeveloped yet, version](https://github.com/mikron-ia/rpg-hub-frontend). Reason for twofold version of frontend is simple: I need a functional page ASAP, and have too little time to write AngularJS code with any decency. 

This version of frontend is being written in PHP with Silex. Data to fuel the frontend will be retrieved from API provided by backend.

Due to current need that is driving this development, architecture is heavily biased towards 7th Sea system (a creation of John Wick, originally published by Alderac Entertainment Group). No copyrighted terms are in use, though.
The styling and architecture will be made more universal with future development.

## Installation guide
1. Clone the project via `git clone` with correct address to a desired directory of a web server
2. Run `composer install` in the project directory
3. Copy or rename the `deployment.php.example` file into `deployment.php`
4. Copy or rename the `epic.php.example` file into `epic.php`
5. Enter desired configuration, ie.:
    * Data source in `deployment.php`
    * System code and basic interface in `epic.php`
6. Ensure there is a correct `config/data/{system code}.php` file - it currently matters mainly for system-customized interface messages
7. Set document root to `public/` or redirect requests there 
8. Access via web server's URL
