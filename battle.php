<tr>
    <td colspan="2">
        <h2 style="color:red">Let the battle begin!</h2>
    </td>
</tr>

<?php
$time_counter = 0; // to control the time of the animation
$round_counter = 1;

while (!$selectedPokemon1->IsDead() && !$selectedPokemon2->IsDead()) {
    $time_counter_sec = $time_counter * 2000;
    $pokemon_attack_class = "atk_$round_counter"; //class for the td of attacks for the 1st pokemon
    $pokemon2_attack_class = "atk_" . ($round_counter + 99); //added 99 to avoid collision with pokemon_attack_class
    $round_class = "round_$round_counter"; //class for the td of the round number
    $damage1 = $selectedPokemon1->attack($selectedPokemon2);
    if (!$selectedPokemon2->IsDead()) {
        $damage2 = $selectedPokemon2->attack($selectedPokemon1);
    } else {
        $damage2 = 0;
    }
    $pokemon_display_class = "pokemon_display_class_$round_counter"; //class for the td of the pokemon images
?>

    <tr>
        <td colspan="2" style="display:none;" class="<?= $round_class ?>"></td>
    </tr>
    <script>
        setTimeout(function() {
            const round = document.querySelector('.<?= $round_class ?>');
            round.innerHTML += '<p>Round <?= $round_counter ?> :</p>';
            round.style.display = '';
            round.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }, <?= 2000 + $time_counter_sec ?>);
    </script>
    <tr style='display:none;' class='<?= $pokemon_display_class ?>'>
        <td style="background-image:url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/2fb2821a-1406-4a1d-9b04-6668f278e944/d843fov-5ad2d436-789b-48f4-91ac-7a553ca26306.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzJmYjI4MjFhLTE0MDYtNGExZC05YjA0LTY2NjhmMjc4ZTk0NFwvZDg0M2Zvdi01YWQyZDQzNi03ODliLTQ4ZjQtOTFhYy03YTU1M2NhMjYzMDYucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.4WU23QrSu_7CD6c4MJIYPEeIvE5o8maEEkqYM40mwus); background-size: cover; background-position: center;">
            <div><?php echo $selectedPokemon1->generateHpBar() ?></div>
            <img src='<?php echo htmlspecialchars($selectedPokemon1->getImage()) ?>' alt='Pokemon Image' class='img-fluid'>
        </td>
        <td style="background-image:url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/2fb2821a-1406-4a1d-9b04-6668f278e944/d843fov-5ad2d436-789b-48f4-91ac-7a553ca26306.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzJmYjI4MjFhLTE0MDYtNGExZC05YjA0LTY2NjhmMjc4ZTk0NFwvZDg0M2Zvdi01YWQyZDQzNi03ODliLTQ4ZjQtOTFhYy03YTU1M2NhMjYzMDYucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.4WU23QrSu_7CD6c4MJIYPEeIvE5o8maEEkqYM40mwus); background-size: cover; background-position: center;">
            <div><?php echo $selectedPokemon2->generateHpBar() ?></div>
            <img src='<?php echo htmlspecialchars($selectedPokemon2->getImage()) ?>' alt='Pokemon Image' class='img-fluid'>
        </td>
    </tr>
    
