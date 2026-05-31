# PHP OOP Pokémon Game

A simple Pokémon battle game built with PHP using Object-Oriented Programming principles.

## 📋 Project Overview

This project demonstrates fundamental OOP concepts through an interactive turn-based Pokémon battle system. Players can select two Pokémon and watch them battle with type-based advantage mechanics.

## 🏗️ Project Structure

```
php_poo_pokemon_game/
├── README.md
├── index.php                     # Main entry point - Pokémon selection interface
├── pokemon_class.php             # Core classes and type definitions
├── battle.php                    # Battle logic and animations
├── show_pokemon.php              # Pokémon display/selection logic
└── soundeffects/                 # Sound effects for battles
```

## 🛠️ Technology Stack

- **Language**: PHP 7.4+
- **Paradigm**: Object-Oriented Programming (OOP)
- **Frontend**: HTML, CSS, JavaScript
- **Features**: Type-based damage calculation, animated battle display

## 📚 Core Classes

### 1. **AttackPokemon**
Represents attack statistics for a Pokémon:
- `atk_min` & `atk_max`: Damage range
- `sp_atk`: Special attack multiplier
- `sp_atk_chance`: Chance to trigger special attack

### 2. **Pokemon (Base Class)**
Main Pokémon class with properties:
- `name`: Pokémon name
- `image`: Image URL
- `HP` & `maxHP`: Health points
- `attackPokemon`: Attack statistics object

Key methods:
- `attack($enemy)`: Calculate and apply damage
- `IsDead()`: Check if defeated
- `generateHpBar()`: Visual HP bar display
- `effectiveness($enemy)`: Calculate type advantage

### 3. **Type Classes** (Inheritance)
Specialized Pokémon types with type advantage mechanics:

- **fire_type**: Effective against grass, weak to water
- **water_type**: Effective against fire, weak to grass
- **grass_type**: Effective against water, weak to fire

Each type overrides the `attack()` method to apply type multipliers:
- 2x damage (super effective)
- 0.5x damage (not very effective)
- 1x damage (normal)

## 🎮 Game Flow

1. **Selection Phase** (index.php)
   - User selects two Pokémon to battle
   - Pokémon are instantiated with their stats

2. **Battle Phase** (battle.php)
   - Turn-based combat system
   - Each round: Pokémon 1 attacks → Pokémon 2 attacks
   - Type advantages applied to damage calculations
   - Battle continues until one Pokémon is defeated
   - Animated display with sound effects

3. **Display** (show_pokemon.php)
   - Shows available Pokémon for selection
   - Displays real-time HP bars during battle

## 🎯 Key Features

- **Type System**: Fire, Water, and Grass types with advantage mechanics
- **Damage Calculation**: Random damage with special attack chance
- **Type Effectiveness**: Modifiers based on matchups
- **Visual HP Bar**: Color-coded health display (red/yellow/green)
- **Animations**: Timed battle sequence with smooth scrolling
- **Sound Effects**: Audio feedback for attacks and outcomes

## 🚀 How to Run

### Prerequisites
- PHP 7.4 or higher
- Web server or PHP built-in server

### Installation

1. Clone the repository:
```bash
git clone https://github.com/ihebkhlif/php_poo_pokemon_game.git
cd php_poo_pokemon_game
```

2. Run with PHP built-in server:
```bash
php -S localhost:8000
```

3. Open in browser:
```
http://localhost:8000
```

## 💻 Usage Example

```php
// Create Pokémon
$attack_stats = new AttackPokemon(
    atk_min: 10,      // minimum damage
    atk_max: 20,      // maximum damage
    sp_atk: 1.5,      // special attack multiplier
    sp_atk_chance: 30 // 30% chance for special attack
);

$pikachu = new fire_type(
    name: "Pikachu",
    image: "url_to_image",
    HP: 100,
    attackPokemon: $attack_stats
);

// Check if defeated
if ($pikachu->IsDead()) {
    echo "Pikachu has been defeated!";
}

// Calculate damage with type advantage
$damage = $pikachu->attack($enemy_pokemon);
```

## 🔧 OOP Concepts Used

- **Inheritance**: Type classes extend base Pokemon class
- **Encapsulation**: Properties with getters/setters
- **Polymorphism**: Attack method overridden in type classes
- **Constructor**: Initialize objects with stats
- **Method Overriding**: Type-specific damage calculations

## 📝 Notes

- Type advantage calculations: Fire > Grass > Water > Fire (rock-paper-scissors style)
- Special attacks trigger randomly with set probability
- Battle animations use JavaScript timers for visual display
- HP is capped at 0 (no negative values)

---

**Last Updated**: 2026
