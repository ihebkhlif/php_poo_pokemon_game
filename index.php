<?php
require "pokemon_class.php";

// for quick testing use pikachu,charmander,squirtle and bulbasaur because they have small hp

$atk1 = new AttackPokemon(10, 20, 2, 5);
$atk2 = new AttackPokemon(15, 25, 3, 7);
$atk3 = new AttackPokemon(20, 30, 4, 10);
$atk4 = new AttackPokemon(5, 15, 1, 3);

$pikachu = new pokemon("Pikachu", "https://img.pokemondb.net/sprites/home/normal/pikachu.png", 60, $atk1);
$Charmander = new fire_type("Charmander", "https://img.pokemondb.net/sprites/home/normal/charmander.png", 55, $atk1);
$Squirtle = new water_type("Squirtle", "https://img.pokemondb.net/sprites/home/normal/squirtle.png", 65, $atk1);
$Bulbasaur = new grass_type("Bulbasaur", "https://img.pokemondb.net/sprites/home/normal/bulbasaur.png", 70, $atk1);
$charizard = new fire_type("Charizard", "https://img.pokemondb.net/sprites/home/normal/charizard.png", 150, $atk3);
$blastoise = new water_type("Blastoise", "https://img.pokemondb.net/sprites/home/normal/blastoise.png", 160, $atk2);
$venusaur = new grass_type("Venusaur", "https://img.pokemondb.net/sprites/home/normal/venusaur.png", 170, $atk1);
$gengar = new pokemon("Gengar", "https://img.pokemondb.net/sprites/home/normal/gengar.png", 120, $atk3);
$dragonite = new pokemon("Dragonite", "https://img.pokemondb.net/sprites/home/normal/dragonite.png", 180, $atk2);
$lucario = new pokemon("Lucario", "https://img.pokemondb.net/sprites/home/normal/lucario.png", 140, $atk3);
$snorlax = new pokemon("Snorlax", "https://img.pokemondb.net/sprites/home/normal/snorlax.png", 200, $atk4);
$gyarados = new water_type("Gyarados", "https://img.pokemondb.net/sprites/home/normal/gyarados.png", 170, $atk2);
$alakazam = new pokemon("Alakazam", "https://img.pokemondb.net/sprites/home/normal/alakazam.png", 110, $atk3);

$pokemon_table = [
    $pikachu,
    $Charmander,
    $Squirtle,
    $Bulbasaur,
    $charizard,
    $blastoise,
    $venusaur,
    $gengar,
    $dragonite,
    $lucario,
    $snorlax,
    $gyarados,
    $alakazam
];



if (isset($_POST['reset'])) { ?>
    <script>
        var startAudio = document.querySelector('.start_audio');
        startAudio.pause();
        var battleAudio = document.querySelector('.battle_audio');
        battleAudio.pause();
    </script>
<?php
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Battle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        td {
            width: 50%;
        }
    </style>
</head>

<body>
        <!-- used audio -->
        <audio style="display: none;" class="lobby_audio" autoplay loop>
        <source src="soundeffects/lobby.mp3" type="audio/mpeg">
    </audio>
    <audio style="display: none;" class="normal">
        <source src="soundeffects/attack.mp3" type="audio/mpeg">
    </audio>
    <audio style="display: none;" class="lose">
        <source src="soundeffects/lose.mp3" type="audio/mpeg">
    </audio>
    <audio style="display: none;" class="start_audio">
        <source src="soundeffects/pokemon_start.mp3" type="audio/mpeg">
    </audio>
    <audio style="display: none;" class="battle_audio" volume="0.2">
        <source src="soundeffects/battle.mp3" type="audio/mpeg">
    </audio>
    <audio style="display: none;" class="super">
        <source src="soundeffects/super_eff.mp3" type="audio/mpeg">
    </audio>
    <audio style="display: none;" class="not_very">
        <source src="soundeffects/not_very_eff.mp3" type="audio/mpeg">
    </audio>
    <audio style="display: none;" class="victory">
        <source src="soundeffects/victory.mp3" type="audio/mpeg">
    </audio>


    <div class="container text-center">
        <div style="display:none" class='alert alert-danger alert-dismissible fade show mt-5' role='alert'>
            <strong>Please select 2 Pokémon.</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        <h1 class="mt-5">Pokemon Battle</h1>
        <form method="post">
            <button type="submit" name="reset">RESET</button>
        </form>
        <table class="table table-bordered mt-5">
            <tbody>
                <form method="post" class="pokemon-form">
                    <tr class="table-secondary">
                        <td>
                            <select name="pokemon1" id="pokemon1" class="form-select" aria-label="Default select example">
                                <option value="0" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "0") echo "selected"; ?>>Choose your Pokemon</option>
                                <option value="Pikachu" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Pikachu") echo "selected"; ?>>Pikachu</option>
                                <option value="Charmander" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Charmander") echo "selected"; ?>>Charmander</option>
                                <option value="Squirtle" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Squirtle") echo "selected"; ?>>Squirtle</option>
                                <option value="Bulbasaur" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Bulbasaur") echo "selected"; ?>>Bulbasaur</option>
                                <option value="Charizard" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Charizard") echo "selected"; ?>>Charizard</option>
                                <option value="Blastoise" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Blastoise") echo "selected"; ?>>Blastoise</option>
                                <option value="Venusaur" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Venusaur") echo "selected"; ?>>Venusaur</option>
                                <option value="Gengar" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Gengar") echo "selected"; ?>>Gengar</option>
                                <option value="Dragonite" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Dragonite") echo "selected"; ?>>Dragonite</option>
                                <option value="Lucario" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Lucario") echo "selected"; ?>>Lucario</option>
                                <option value="Snorlax" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Snorlax") echo "selected"; ?>>Snorlax</option>
                                <option value="Gyarados" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Gyarados") echo "selected"; ?>>Gyarados</option>
                                <option value="Alakazam" <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] == "Alakazam") echo "selected"; ?>>Alakazam</option>
                            </select>
                        </td>
                        </tr>
                    <tr class="table-secondary">
                        <td colspan="2">
                            <button
                                <?php if (isset($_POST['pokemon1']) && $_POST['pokemon1'] != "0" && isset($_POST['pokemon2']) && $_POST['pokemon2'] != "0") {
                                    echo "style='display:none'";
                                }
                                ?>
                                type="submit" class="btn btn-primary start">Start Battle</button>
                        </td>
                    </tr>
                </form>
                <?php
                include "show_pokemon.php";
                ?>
        </table>
    </div>
    </div>
    </div>

    <script>
        // show the alert box if no or 1 pokemon is selected
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector(".pokemon-form");
            const alertBox = document.querySelector(".alert");
            const start = document.querySelector(".start");
            const pokemon1 = document.querySelector("#pokemon1");
            const pokemon2 = document.querySelector("#pokemon2");
            form.addEventListener("submit", function(e) {

                e.preventDefault();
                var selectedPokemon1 = pokemon1.value;
                var selectedPokemon2 = pokemon2.value;

                if (selectedPokemon1 === "0" || selectedPokemon2 === "0") {
                    alertBox.style.display = "block";
                } else {
                    form.submit();
                }
            });
            pokemon1.addEventListener("change", function() {
                alertBox.style.display = "none";
            });
            pokemon2.addEventListener("change", function() {
                alertBox.style.display = "none";
            });
        });
        document.querySelector('.lobby_audio').volume = 0.2;
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>