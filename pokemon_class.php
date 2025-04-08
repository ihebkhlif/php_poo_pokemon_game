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

    public function attack($enemy): int
    {
        $damage = rand($this->attackPokemon->atk_min, $this->attackPokemon->atk_max);
        if (rand(1, 100) <= $this->attackPokemon->sp_atk_chance) {
            $damage = ($this->attackPokemon->sp_atk) * $damage;
            $enemy->HP -= $damage;
            $enemy->HP = max($enemy->HP, 0);
        } else {
            $enemy->HP -= $damage;
            $enemy->HP = max($enemy->HP, 0);
        }
        return $damage;
    }

    public function effectiveness($enemy): int
    {
        return 2;
    }
    public function generateHpBar()
    {
        if ($this->maxHP == 0) {
            $hpPercentage = 0;
        } else {
            $hpPercentage = round(($this->HP / $this->maxHP) * 100);
        }

        $hpPercentage = max(0, min(100, $hpPercentage));

        if ($hpPercentage < 25) {
            $barColor = '#da251c';
        } elseif ($hpPercentage < 50) {
            $barColor = '#f8c301';
        } else {
            $barColor = '#00923f';
        }

        return '
    <div style="background-color:#c2c2c2; border:2px solid black; border-radius:15px; overflow:hidden;position:relative;">
        <div style="background-color:' . $barColor . '; width:' . $hpPercentage . '%; height:100%; position:absol width:200px; height:25px; ute; top:0; left:0;"></div>
        <div style="position:absolute; top:0; left:0; width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:white; font-weight:bold; z-index:1;">
            ' . $hpPercentage . '% HP
        </div>
    </div>';
    }
}
class fire_type extends pokemon
{
    public function __construct($name, $image, $HP, AttackPokemon $attackPokemon)
    {
        parent::__construct($name, $image, $HP, $attackPokemon);
    }
    public function attack($enemy): int
    {
        $damage = rand($this->attackPokemon->atk_min, $this->attackPokemon->atk_max);
        if ($enemy instanceof water_type) {
            $damage *= 0.5;
        } elseif ($enemy instanceof grass_type) {
            $damage *= 2;
        } elseif ($enemy instanceof fire_type) {
            $damage *= 0.5;
        }
        if (rand(1, 100) <= $this->attackPokemon->sp_atk_chance) {
            $damage = ($this->attackPokemon->sp_atk) * $damage;
            $enemy->HP -= $damage;
            $enemy->HP = max($enemy->HP, 0);
        } else {
            $enemy->HP -= $damage;
            $enemy->HP = max($enemy->HP, 0);
        }
        return $damage;
    }
    public function effectiveness($enemy): int
    {
        if ($enemy instanceof water_type) {
            return 0;
        } elseif ($enemy instanceof grass_type) {
            return 1;
        } elseif ($enemy instanceof fire_type) {
            return 0;
        }
        return 2;
    }
}
class water_type extends pokemon
{
    public function __construct($name, $image, $HP, AttackPokemon $attackPokemon)
    {
        parent::__construct($name, $image, $HP, $attackPokemon);
    }
    public function attack($enemy): int
    {
        $damage = rand($this->attackPokemon->atk_min, $this->attackPokemon->atk_max);
        if ($enemy instanceof fire_type) {
            $damage *= 2;
        } elseif ($enemy instanceof grass_type) {
            $damage *= 0.5;
        } elseif ($enemy instanceof water_type) {
            $damage *= 0.5;
        }
        if (rand(1, 100) <= $this->attackPokemon->sp_atk_chance) {
            $damage = ($this->attackPokemon->sp_atk) * $damage;
            $enemy->HP -= $damage;
            $enemy->HP = max($enemy->HP, 0);
        } else {
            $enemy->HP -= $damage;
            $enemy->HP = max($enemy->HP, 0);
        }
        return $damage;
    }
    public function effectiveness($enemy): int
    {
        if ($enemy instanceof fire_type) {
            return 1;
        } elseif ($enemy instanceof grass_type) {
            return 0;
        } elseif ($enemy instanceof water_type) {
            return 0;
        }
        return 2;
    }
}
class grass_type extends pokemon
{
    public function __construct($name, $image, $HP, AttackPokemon $attackPokemon)
    {
        parent::__construct($name, $image, $HP, $attackPokemon);
    }
    public function attack($enemy): int
    {
        $damage = rand($this->attackPokemon->atk_min, $this->attackPokemon->atk_max);
        if ($enemy instanceof fire_type) {
            $damage *= 0.5;
        } elseif ($enemy instanceof water_type) {
            $damage *= 2;
        } elseif ($enemy instanceof grass_type) {
            $damage *= 0.5;
        }
        if (rand(1, 100) <= $this->attackPokemon->sp_atk_chance) {
            $damage = ($this->attackPokemon->sp_atk) * $damage;
            $enemy->HP -= $damage;
            $enemy->HP = max($enemy->HP, 0);
        } else {
            $enemy->HP -= $damage;
            $enemy->HP = max($enemy->HP, 0);
        }
        return $damage;
    }
    public function effectiveness($enemy): int
    {
        if ($enemy instanceof fire_type) {
            return 0;
        } elseif ($enemy instanceof water_type) {
            return 1;
        } elseif ($enemy instanceof grass_type) {
            return 0;
        }
        return 2;
    }
}
