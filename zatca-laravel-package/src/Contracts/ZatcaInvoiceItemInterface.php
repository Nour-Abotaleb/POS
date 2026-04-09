<?php

namespace YourVendor\ZatcaLaravel\Contracts;

interface ZatcaInvoiceItemInterface
{
    /**
     * Get item ID
     */
    public function getId(): int;

    /**
     * Get item name
     */
    public function getName(): string;

    /**
     * Get item quantity
     */
    public function getQuantity(): float;

    /**
     * Get item price (per unit)
     */
    public function getPrice(): float;

    /**
     * Get item total amount (quantity * price)
     */
    public function getAmount(): float;

    /**
     * Get item tax amount
     */
    public function getTaxAmount(): float;

    /**
     * Get item tax percentage
     */
    public function getTaxPercentage(): float;
}