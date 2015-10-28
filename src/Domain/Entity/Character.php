<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Character - contains basic data regarding the character
 * @package Mikron\HubFront\Domain\Entity
 */
class Character
{
    protected $advantages;
    protected $attributes;
    protected $contacts;
    protected $defences;
    protected $equipment;
    protected $income;
    protected $languages;
    protected $money;
    protected $name;
    protected $reputations;
    protected $rolls;
    protected $skillGroups;

    /**
     * Character constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->advantages = isset($data['advantages']) ? $data['advantages'] : [];
        $this->attributes = isset($data['attributes']) ? $data['attributes'] : [];
        $this->contacts = isset($data['contacts']) ? $data['contacts'] : [];
        $this->defences = isset($data['defences']) ? $data['defences'] : [];
        $this->equipment = isset($data['equipment']) ? $data['equipment'] : [];
        $this->income = isset($data['income']) ? $data['income'] : [];
        $this->languages = isset($data['languages']) ? $data['languages'] : [];
        $this->money = isset($data['money']) ? $data['money'] : [];
        $this->name = isset($data['name']) ? $data['name'] : "name not given";
        $this->reputations = isset($data['reputations']) ? $data['reputations'] : [];
        $this->rolls = isset($data['rolls']) ? $data['rolls'] : [];
        $this->skillGroups = isset($data['skillGroups']) ? $data['skillGroups'] : [];
    }

    public function getData()
    {
        return [
            'advantages' => $this->advantages,
            'attributes' => $this->attributes,
            'defences' => $this->defences,
            'contacts' => $this->contacts,
            'equipment' => $this->equipment,
            'income' => $this->income,
            'languages' => $this->languages,
            'money' => $this->money,
            'name' => $this->name,
            'reputations' => $this->reputations,
            'rolls' => $this->rolls,
            'skillGroups' => $this->skillGroups,
        ];
    }
}
