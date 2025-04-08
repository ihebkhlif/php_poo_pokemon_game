<?php

$selectedPokemon1 = null;
$selectedPokemon2 = null;

//retrieve the pokemon from the select form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pokemon1"])) {
        $selected_Pokemon_Name1 = htmlspecialchars($_POST["pokemon1"]);
        foreach ($pokemon_table as $pokemon) {
            if (trim($pokemon->getName()) === trim($selected_Pokemon_Name1)) {
                $selectedPokemon1 = $pokemon;
                break;
            }
        }
    }

    if (isset($_POST["pokemon2"])) {
        $selected_Pokemon_Name2 = htmlspecialchars($_POST["pokemon2"]);
        foreach ($pokemon_table as $pokemon) {
            if (trim($pokemon->getName()) === trim($selected_Pokemon_Name2)) {
                $selectedPokemon2 = $pokemon;
                break;
            }
        }
    }
}

if ($selectedPokemon1 && $selectedPokemon2) {
?>

    <script>
        document.querySelector('.lobby_audio').pause();
        var startAudio = document.querySelector('.start_audio');
        startAudio.volume = 0.1;
        startAudio.play();
        var battleAudio = document.querySelector('.battle_audio');
        battleAudio.volume = 0.1;
        battleAudio.play();
    </script>
    <tr>
        <td>
            <p style="color:dark; font-size:18px">Your Pokémon is: <strong><?php echo $selectedPokemon1->getName(); ?></strong></p>
            <p style="color:dark; font-size:18px">HP: <strong><?php echo $selectedPokemon1->getHP(); ?></strong></p>
            <p style="color:dark; font-size:18px">Min Atk: <strong><?php echo $selectedPokemon1->attackPokemon->atk_min; ?></strong></p>
            <p style="color:dark; font-size:18px">Max Atk: <strong><?php echo $selectedPokemon1->attackPokemon->atk_max; ?></strong></p>
            <p style="color:dark; font-size:18px">Sp Atk: <strong><?php echo $selectedPokemon1->attackPokemon->sp_atk; ?></strong></p>
            <p style="color:dark; font-size:18px">Sp Atk Chance: <strong><?php echo $selectedPokemon1->attackPokemon->sp_atk_chance; ?></strong></p>
        </td>
        <td>
            <p style="color:dark; font-size:18px">Your opponent's Pokémon is: <strong><?php echo $selectedPokemon2->getName(); ?></strong></p>
            <p style="color:dark; font-size:18px">HP: <strong><?php echo $selectedPokemon2->getHP(); ?></strong></p>
            <p style="color:dark; font-size:18px">Min Atk: <strong><?php echo $selectedPokemon2->attackPokemon->atk_min; ?></strong></p>
            <p style="color:dark; font-size:18px">Max Atk: <strong><?php echo $selectedPokemon2->attackPokemon->atk_max; ?></strong></p>
            <p style="color:dark; font-size:18px">Sp Atk: <strong><?php echo $selectedPokemon2->attackPokemon->sp_atk; ?></strong></p>
            <p style="color:dark; font-size:18px">Sp Atk Chance: <strong><?php echo $selectedPokemon2->attackPokemon->sp_atk_chance; ?></strong></p>
        </td>
    </tr>

    <tr>
        <td style="background-image:url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/2fb2821a-1406-4a1d-9b04-6668f278e944/d843fov-5ad2d436-789b-48f4-91ac-7a553ca26306.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzJmYjI4MjFhLTE0MDYtNGExZC05YjA0LTY2NjhmMjc4ZTk0NFwvZDg0M2Zvdi01YWQyZDQzNi03ODliLTQ4ZjQtOTFhYy03YTU1M2NhMjYzMDYucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.4WU23QrSu_7CD6c4MJIYPEeIvE5o8maEEkqYM40mwus); background-size: cover; background-position: center;">
            <?php
            $hp_bar = $selectedPokemon1->generateHpBar();
            echo $hp_bar;
            ?>
            <img src=" <?php echo htmlspecialchars($selectedPokemon1->getImage()) ?> " alt='Pokemon Image' class='img-fluid'>
        </td>
        <td style="background-image:url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/2fb2821a-1406-4a1d-9b04-6668f278e944/d843fov-5ad2d436-789b-48f4-91ac-7a553ca26306.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzJmYjI4MjFhLTE0MDYtNGExZC05YjA0LTY2NjhmMjc4ZTk0NFwvZDg0M2Zvdi01YWQyZDQzNi03ODliLTQ4ZjQtOTFhYy03YTU1M2NhMjYzMDYucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.4WU23QrSu_7CD6c4MJIYPEeIvE5o8maEEkqYM40mwus); background-size: cover; background-position: center;">
            <?php
            $hp_bar = $selectedPokemon2->generateHpBar();
            echo $hp_bar;
            ?>
            <img src=" <?php echo htmlspecialchars($selectedPokemon2->getImage()) ?> " alt='Pokemon Image' class='img-fluid'>
        </td>
    </tr>
<?php
    include "battle.php";
}


?>