<?php

/**
 * Data file for Eclipse Phase RPG system
 * http://eclipsephase.com/
 * Data used in accord with http://creativecommons.org/licenses/by-nc-sa/3.0/us/
 */

return [
    'interface' => [
        "titleSuffix" => "Data Hub",
        "welcome" => "Welcome to The Data Hub!",
    ],
    'dataPatterns' => [
        'character' => [
            'advantages' => [], // traits - advantages & disadvantages
            'attributes' => [], // basic attributes
            'basics' => [], // names, descriptions, etc.
            'contacts' => [], // friends & allies
            'damage' => [], // more permanent damage
            'descriptions' => [], // descriptions detailed
            'development' => [], // development history
            'equipment' => [], // items on person
            'expenses' => [], // regular expenses
            'help' => [], // helpful information to display on page
            'income' => [], // regular income
            'money' => [], // cash at hand
            'motivations' => [], // character motivations
            'name' => "", // used name
            'person' => [], //person data
            'public' => [], // public information
            'rolls' => [], // most commonly used rolls
            'skillGroups' => [], // thematic skill groups
            'skills' => [], // skills
            'sleights' => [], // async powers
            'weapons' => [], // specific category of equipment - tools for combat
            'variables' => [], // often changing values, like counters
            'xp' => [], // experience
        ],
        'person' => [
            "name" => "", // name
            'descriptions' => [], // listing of descriptions
            'reputations' => [], // listing of party reputation
            'reputationEvents' => [], // listing of party reputation history
            'help' => [], // helpful information to display on page
        ],
        'group' => [
            'members' => [], // list of party members
            'reputations' => [], // listing of party reputation
            'reputationEvents' => [], // listing of party reputation history
            'membersReputations' => [], // list of party members' reputation
            'pastMembers' => [], // retired or dead members
            'absentMembers' => [], // suspended or currently absent members
            'help' => [], // helpful information to display on page
        ],
        'epic' => [
            "name" => "", // epic name
            "current" => [], // current story
            "stories" => [], // stories description
            "help" => [], // help boxes
        ],
        'event' => [],
        'story' => [
            "name" => "", // story name
            "key" => "", // story key
            "parameters" => [], // details
            "short" => "", // recap
            "long" => "", // full
            'help' => [], // helpful information to display on page
        ]
    ],
];
