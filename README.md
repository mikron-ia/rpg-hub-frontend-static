# RPG hub
[![Build Status](https://travis-ci.org/mikron-ia/rpg-hub-frontend-static.svg?branch=master)](https://travis-ci.org/mikron-ia/rpg-hub-frontend-static)
[![Code Climate](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static/badges/gpa.svg)](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static)
[![Test Coverage](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static/badges/coverage.svg)](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static/coverage)

A system for role-playing game story/campaign/epic management. This repository contains the frontend in a PHP version.

## Background
[Role-playing games](https://en.wikipedia.org/wiki/Role-playing_game) are a very wide category, ranging from very simplistic systems to extremely complex mechanical solutions. What they do have in common, though, is the story - you can play a game without mechanics, but even a primitive dungeon crawl is going to have some story. Managing this story, its cast, threads, and - if present - mechanical components - is the role of this project.

This project is a part of a larger whole. It is supposed to draw data from sources lile [Silex-based backend](https://github.com/mikron-ia/rpg-hub-backend) or [Yii-based backend](https://github.com/mikron-ia/rpg-hub) - assuming they have compatible APIs. Originally, this page was supposed to be writen in AngularJS; at the moment, this is the only front, and AngularJS is not developed - [its skeleton is to be found here](https://github.com/mikron-ia/rpg-hub-frontend).

The project is written in PHP with Silex. Data to display is retrieved in JSON from API provided by backend.

Due to current need that is driving this development, architecture is heavily biased towards one system. The styling and architecture will be made more universal in following releases.

## Installation guide
1. Clone the project via `git clone` with correct address to a desired directory of a web server
2. Run `composer install` in the project directory
3. Copy or rename the `deployment.example.php` file into `deployment.php`
4. Copy or rename the `epic.example.php` file into `epic.php`
5. Enter desired configuration, ie.:
    * Data source in `deployment.php`
    * System code and basic interface in `epic.php`
6. Ensure there is a correct `config/data/{system code}.php` file - it currently matters mainly for system-customized interface messages
7. Set document root to `public/` or redirect requests there 
8. Access via web server's URL
