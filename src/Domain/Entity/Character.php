<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Character - contains basic data regarding the character
 * @package Mikron\HubFront\Domain\Entity
 */
class Character
{
    protected $name;
    protected $attributes;
    protected $advantages;
    protected $skillGroups;
    protected $reputations;
    protected $contacts;
    protected $equipment;
    protected $money;
    protected $rolls;
    protected $income;

    /**
     * Character constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->name = isset($data['name']) ? $data['name'] : "name not given";
        $this->attributes = isset($data['attributes']) ? $data['attributes'] : [];
        $this->advantages = isset($data['advantages']) ? $data['advantages'] : [];
        $this->skillGroups = isset($data['skillGroups']) ? $data['skillGroups'] : [];
        $this->reputations = isset($data['reputations']) ? $data['reputations'] : [];
        $this->contacts = isset($data['contacts']) ? $data['contacts'] : [];
        $this->equipment = isset($data['equipment']) ? $data['equipment'] : [];
        $this->income = isset($data['income']) ? $data['income'] : [];
        $this->money = isset($data['money']) ? $data['money'] : [];
        $this->rolls = isset($data['rolls']) ? $data['rolls'] : [];
    }

    public function getData()
    {
        return [
            'name' => $this->name,
            'attributes' => $this->attributes,
            'advantages' => $this->advantages,
            'skillGroups' => $this->skillGroups,
            'reputations' => $this->reputations,
            'contacts' => $this->contacts,
            'equipment' => $this->equipment,
            'income' => $this->income,
            'money' => $this->money,
            'rolls' => $this->rolls
        ];
    }
}
