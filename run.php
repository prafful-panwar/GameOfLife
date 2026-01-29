<?php

require_once 'GameOfLife.php';

// Initialize Game
$cols = 25;
$rows = 25;
$game = new GameOfLife($cols, $rows);

// Setup Glider in the middle
// Glider pattern:
// . O .
// . . O
// O O O
$centerX = (int) ($cols / 2);
$centerY = (int) ($rows / 2);

$game->setAlive($centerX, $centerY - 1);       // . O .
$game->setAlive($centerX + 1, $centerY);       // . . O
$game->setAlive($centerX - 1, $centerY + 1);   // O . . (Left)
$game->setAlive($centerX, $centerY + 1);       // . O . (Middle)
$game->setAlive($centerX + 1, $centerY + 1);   // . . O (Right)

// Simulation Loop
$generations = 50;
for ($i = 0; $i <= $generations; $i++) {
    // Clear screen (Linux/Mac)
    system('clear');

    echo "Generation: $i\n";
    echo $game->render();

    // Calculate next generation
    $game->nextGeneration();

    // Sleep for a bit to make it visible
    sleep(1);
}
