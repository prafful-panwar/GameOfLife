<?php

class GameOfLife
{
    private $cols;
    private $rows;
    private $grid;

    public function __construct(int $cols, int $rows)
    {
        $this->cols = $cols;
        $this->rows = $rows;
        $this->grid = array_fill(
            start_index: 0,
            count: $rows,
            value: array_fill(0, $cols, 0)
        );
    }

    public function setAlive(int $col, int $row)
    {
        // Check if row and col are valid keys
        if (isset($this->grid[$row][$col])) {
            $this->grid[$row][$col] = 1;
        }
    }

    public function render()
    {
        $output = "";

        // Loop through each row
        foreach ($this->grid as $row) {
            // Loop through each cell (column) in the row
            foreach ($row as $cell) {
                $output .= $cell ? '* ' : '. ';
            }
            $output .= PHP_EOL;
        }
        return $output;
    }

    public function nextGeneration()
    {
        $newGrid = [];

        // Loop through every coordinate
        for ($row = 0; $row < $this->rows; $row++) {
            for ($col = 0; $col < $this->cols; $col++) {

                // Get neighbor count for the current cell
                $neighbors = $this->countNeighbors($col, $row);

                // - If alive (1): Lives if 2 or 3 neighbors.
                // - If dead (0): Lives if 3 neighbors.
                $isAlive = $this->grid[$row][$col];

                if ($isAlive && ($neighbors < 2 || $neighbors > 3)) {
                    // Under population or Overcrowding: Dies
                    $newGrid[$row][$col] = 0;
                } elseif (!$isAlive && $neighbors === 3) {
                    // Reproduction: Becomes Alive
                    $newGrid[$row][$col] = 1;
                } else {
                    // Stasis: Keeps current state
                    $newGrid[$row][$col] = $isAlive;
                }
            }
        }
        $this->grid = $newGrid;
    }

    private function countNeighbors($currentCol, $currentRow)
    {
        $count = 0;

        $offsets = [
            [-1, -1],
            [-1, 0],
            [-1, 1],

            [0, -1],
            [0, 1],

            [1, -1],
            [1, 0],
            [1, 1]
        ];

        foreach ($offsets as $offset) {
            $neighborCol = $currentCol + $offset[0];
            $neighborRow = $currentRow + $offset[1];

            $count += $this->grid[$neighborRow][$neighborCol] ?? 0;
        }
        return $count;
    }
}
