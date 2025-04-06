<?php
class Stock {
    public function getAll() {
        return [
            ["item" => "Cake", "quantity" => 20],
            ["item" => "Bread", "quantity" => 15]
        ];
    }

    public function update($data) {
        // Simulated update
    }
}
