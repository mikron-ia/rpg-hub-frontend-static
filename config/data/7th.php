<?php

/**
 * Data file for 7th Sea RPG system, a creation of John Wick, originally published by Alderac Entertainment Group
 * http://www.alderac.com/7thsea/
 * No copyright infringement intended, no copyrighted content used
 */

return [
    'interface' => [
        'titleSuffix' => 'The Tavern',
        'welcome' => 'Welcome to The Tavern!',
    ],
    'dataPatterns' => [
        'character' => [
            'advantages' => [], // traits - advantages & disadvantages
            'attributes' => [], // basic attributes
            'basics' => [], // names, descriptions, etc.
            'catches' => [], // catches: backgrounds, motivations...
            'contacts' => [], // friends & allies
            'damage' => [], // more permanent damage
            'defences' => [], // hit difficulties
            'descriptions' => [], // descriptions detailed
            'development' => [], // development history
            'equipment' => [], // items on person
            'expenses' => [], // regular expenses
            'help' => [], // helpful information to display on page
            'income' => [], // regular income
            'languages' => [], // languages known
            'money' => [], // cash at hand
            'name' => "", // used name
            'person' => [], //person data
            'public' => [], // public information
            'professions' => [], // used together skill groups with skills
            'rolls' => [], // most commonly used rolls
            'skillGroups' => [], // thematic skill groups
            'skills' => [], // skills
            'stunts' => [], // one-of kind tricks
            'weapons' => [], // specific catergory of equipment - tools for combat
            'variables' => [], // often changing values, like counters
            'xp' => [], // experience
        ],
        'person' => [
            "name" => "", // epic name
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
            "help" => [], // help boxes
        ]
    ],
];
