<?php

class Skill
{
    private $id;
    private $label;
    private array $type; // array [$faith => 1.1]
    private bool $isMultiTarget;
    private int $coolDown;
    private int $currentCoolDown = 0;

    public function __construct(int $id, string $label, array $type, bool $isMultiTarget, int $coolDown)
    {
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->isMultiTarget = $isMultiTarget;
        $this->coolDown = $coolDown;
    }

    public function isAvailable()
    {
        if ($this->currentCoolDown < $this->coolDown) {
            return false;
        }

        return true;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTimeleft()
    {
        return $this->coolDown - $this->currentCoolDown;
    }

    public function calculDamage(Character $character)
    {
        if (!$this->isAvailable()) {
            return 0;
        }

        $damages = 0.0;
        foreach ($this->type as $key => $multiplier) {
            if (isset($character->$key) && !empty($character->$key)) {
                $damages += $character->$key * $multiplier;
            }
        }

        $this->currentCoolDown = 0;

        return $damages;
    }

    public function reducesTimeLeft()
    {
        $this->currentCoolDown++;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getIsMultiTarget()
    {
        return $this->isMultiTarget;
    }
}
