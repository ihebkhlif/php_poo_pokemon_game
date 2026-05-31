# PHP OOP Pokémon Game

A Pokémon battle game implementation using Object-Oriented Programming (OOP) principles in PHP.

## 📋 Project Overview

This project demonstrates core OOP concepts through the development of an interactive Pokémon game. Players can engage in turn-based battles with various Pokémon, each with unique abilities, stats, and types.

## 🏗️ Project Structure

```
php_poo_pokemon_game/
├── README.md
├── classes/                          # Core OOP classes
│   ├── Pokemon.php                   # Base Pokémon class
│   ├── Type.php                      # Pokémon type system
│   ├── Battle.php                    # Battle mechanics
│   ├── Trainer.php                   # Trainer management
│   └── Move.php                      # Move/Attack definitions
├── index.php                         # Application entry point
├── config.php                        # Configuration and constants
└── assets/                           # Game resources (optional)
    ├── images/                       # Pokémon sprites
    └── data/                         # Pokémon data files
```

## 🛠️ Technology Stack

- **Language**: PHP 7.4+
- **Paradigm**: Object-Oriented Programming (OOP)
- **Architecture Pattern**: Class-based design with inheritance and polymorphism

## 📚 Key OOP Concepts Used

### 1. **Classes**
- `Pokemon`: Represents individual Pokémon with properties (name, level, HP, attacks, type)
- `Trainer`: Manages trainer data and Pokémon roster
- `Battle`: Orchestrates battle logic and turn management
- `Type`: Defines Pokémon types and type advantages
- `Move`: Represents attacks/moves with damage calculations

### 2. **Inheritance**
- Pokémon types may extend a base Pokémon class with type-specific behaviors
- Specialized Pokémon inherit common attributes from the base class

### 3. **Encapsulation**
- Private and protected properties protect internal state
- Public methods provide controlled access to object data
- Getters and setters manage property access

### 4. **Polymorphism**
- Different Pokémon types may override move execution differently
- Type advantages calculated polymorphically based on move types

### 5. **Composition**
- `Trainer` class contains a collection of `Pokemon` objects
- `Battle` class uses `Pokemon` and `Move` objects

## 🎮 Game Features

- **Pokémon Management**: Create and manage Pokémon with individual stats
- **Type System**: Rock-Paper-Scissors style type advantages
- **Battle Mechanics**: Turn-based combat with attack calculations
- **Trainer System**: Manage trainer data and Pokémon teams
- **Damage Calculation**: Dynamic damage based on stats, types, and moves

## 🚀 How to Run

### Prerequisites
- PHP 7.4 or higher
- Web server (Apache, Nginx) or PHP built-in server

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

## 📖 Usage Example

```php
// Create Pokémon
$pikachu = new Pokemon("Pikachu", 50, "Electric");
$charizard = new Pokemon("Charizard", 50, "Fire");

// Create trainers
$trainer1 = new Trainer("Ash");
$trainer1->addPokemon($pikachu);

$trainer2 = new Trainer("Gary");
$trainer2->addPokemon($charizard);

// Start battle
$battle = new Battle($trainer1, $trainer2);
$battle->start();
```

## 📝 Code Organization Best Practices

- **Single Responsibility Principle**: Each class has one reason to change
- **DRY (Don't Repeat Yourself)**: Common logic abstracted into base classes
- **Clear Naming**: Class and method names clearly describe their purpose
- **Documentation**: Comments explain complex logic

## 🎯 Learning Outcomes

This project teaches:
- Class design and structure
- Inheritance hierarchies
- Method overriding
- Property access modifiers
- Object composition
- Practical OOP design patterns

## 🤝 Contributing

Feel free to fork and submit pull requests with improvements or additional features.

## 📄 License

This project is open source and available under the MIT License.

## 👨‍💻 Author

**ihebkhlif**

---

**Last Updated**: 2026
