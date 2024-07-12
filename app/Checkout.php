<?php

class Checkout {
    private array $pricingRules;
    private array $scannedItems;

    public function __construct(array $pricingRules) {
        $this->pricingRules = $pricingRules;
        $this->scannedItems = [];
    }

    public function scan(string $item): void
    {
        // Add the scanned item to the array
        $this->scannedItems[] = $item;
    }

    public function calculateTotal(): int
    {
        $totalPrice = 0;
        foreach ($this->scannedItems as $item) {
            if (isset($this->pricingRules[$item])) {
                $unitPrice = $this->pricingRules[$item];
                $totalPrice += $this->applySpecialRules($item, $unitPrice);
            } else {
                echo "Warning: Item '$item' not found in pricing rules.\n";
            }
        }
        return $totalPrice;
    }

    private function applySpecialRules(string $item, int $unitPrice): int
    {
        // Apply special pricing rules (e.g., 2 for £1.25, buy 3 get 1 free)
        // Implement your logic here based on the pricing rules
        // ...
        return $unitPrice; // Placeholder for now
    }
}

// Example usage:
$pricingRules = [
    'A' => 50,
    'B' => 75,
    'C' => 25,
    'D' => 150,
    'E' => 200,
    // Add other pricing rules here
];

$checkout = new Checkout($pricingRules);
$checkout->scan('B');
$checkout->scan('A');
$checkout->scan('B');

$total = $checkout->calculateTotal();
echo "Total price: $total pence\n";