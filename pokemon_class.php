<?php
class AttackPokemon
{
    public $atk_min;
    public $atk_max;
    public $sp_atk;
    public $sp_atk_chance;
    public function __construct($atk_min, $atk_max, $sp_atk, $sp_atk_chance)
    {
        $this->atk_min = $atk_min;
        $this->atk_max = $atk_max;
        $this->sp_atk = $sp_atk;
        $this->sp_atk_chance = $sp_atk_chance;
    }
}


