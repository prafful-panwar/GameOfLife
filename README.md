### Rules

1. **Under population**: Any live cell with fewer than two live neighbors dies as if caused by underpopulation.
2. **Survival**: Any live cell with two or three live neighbors lives on to the next generation.
3. **Overcrowding**: Any live cell with more than three live neighbors dies, as if by overcrowding.
4. **Reproduction**: Any dead cell with exactly three live neighbors becomes a live cell, as if by reproduction.

## Project Structure

- `GameOfLife.php`: Contains the `GameOfLife` class which implements the core logic and rules of the simulation.
- `run.php`: The entry point script that initializes the game with a "Glider" pattern and runs the simulation loop.

## How to Run

Ensure you have PHP installed on your machine.

1. Open your terminal.
2. Navigate to the project directory.
3. Run the simulation using the following command:

```bash
php run.php
```

The simulation will start, initializing a 25x25 grid with a Glider pattern in the center. It runs for 100 generations, clearing the console and updating the grid state every 0.2 seconds.

## Customization

You can modify `run.php` to:

- Change the grid size (`$cols` and `$rows`).
- Change the initial pattern (currently set to a Glider).
- Adjust the number of generations or the speed of the simulation.
