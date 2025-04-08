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

class pokemon
{
    public string $name;
    public string $image;
    public int $maxHP;
    public int $HP;
    public AttackPokemon $attackPokemon;
    public function __construct($name, $image, $HP, AttackPokemon $attackPokemon)
    {
        $this->name = $name;
        $this->image = $image;
        $this->HP = $HP;
        $this->maxHP = $HP;
        $this->attackPokemon = $attackPokemon;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getHP(): int
    {
        return $this->HP;
    }

    public function setHP(int $HP): void
    {
        $this->HP = $HP;
    }

    public function getAttackPokemon(): AttackPokemon
    {
        return $this->attackPokemon;
    }

    public function setAttackPokemon(AttackPokemon $attackPokemon): void
    {
        $this->attackPokemon = $attackPokemon;
    }
    public function IsDead(): bool
    {
        return $this->HP <= 0;
    }






}



