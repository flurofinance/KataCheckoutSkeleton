<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../Checkout.php';

class CheckoutTest extends TestCase
{
    public function testMissingItem(): void
    {
        $pricingRules = [
            'A' => 50,
            'B' => 75,
            'C' => 25,
            'D' => 150,
            'E' => 200,
            // Add other pricing rules here
        ];
        $checkout = new app\Checkout($pricingRules);
        $checkout->scan('Z');
        $this->assertSame(200, $checkout->calculateTotal());
    }
}