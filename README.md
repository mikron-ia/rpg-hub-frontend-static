# RPG hub
[![Build Status](https://travis-ci.org/mikron-ia/rpg-hub-frontend-static.svg?branch=master)](https://travis-ci.org/mikron-ia/rpg-hub-frontend-static)
[![Code Climate](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static/badges/gpa.svg)](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static)
[![Test Coverage](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static/badges/coverage.svg)](https://codeclimate.com/github/mikron-ia/rpg-hub-frontend-static/coverage)

A system for role-playing game story/campaign/epic management. This repository is the frontend - PHP Version.

## Background
[Role-playing games](https://en.wikipedia.org/wiki/Role-playing_game) are a very wide category, ranging from very simplistic systems to extremely complex mechanical solutions. What they do have in common, though, is the story - you can play a game without mechanics, but even a primitive dungeon crawl is going to have some story. Managing this story, its cast, threads, and - if present - mechanical components - is the role of this project.

The project is currently split in three parts - [backend](https://github.com/mikron-ia/rpg-hub-backend) and two variants of the frontend - this and [AngularJS, undeveloped yet, version](https://github.com/mikron-ia/rpg-hub-frontend). Reason for twofold version of frontend is simple: I need a functional page ASAP, and have too little time to write AngularJS code with any decency. 

This version of frontend is being written in PHP with Silex. Data to fuel the frontend will be retrieved from API provided by backend.

## Development
MVP is character data presentation.

### Required for v0.1
This could have been done from a boilerplate, and has inspired creation of one. 

* Working skeleton
* HTML basic layout + controllers to serve it
* Landing page with some explanation why there is nothing here

### Required for v0.2 - MVP / VP-0
This is a version designed for immediate use without any real security except obfuscation. The general idea is to  be 
able to provide a hash-based link to a player; player would be able to see their character sheet under the link - 
and not much more.

Required scenario: GM is able to put a JSON file containing character description in a server directory and then send
a link to the player, who in turn is going to be able to view their character in formatted and readable way. 

* Simple character data presentation - not navigable
* Reading from pre-generated JSON files
* Controller for hash-link

### Required for v0.3
* Ability to connect to backend API and pull data
* Authorisation - own system or using backend

### Required for v0.4 - VP-1
* Navigation system - ability to visit something else than hash-link

Required scenario: character data presented to correct person in expected manners. If person is not authorised, they
  should receive an error message.

### Required for v0.5
* Complete character data presentation, as backend data allows

## Installation guide
... will be created once the project does anything useful.
