<?php

namespace YourVendor\ZatcaLaravel\Contracts;

use Carbon\Carbon;

interface ZatcaInvoiceInterface
{
    /**
     * Get invoice ID
     */
    public function getId(): int;

    /**
     * Get invoice number
     */
    public function getInvoiceNumber(): string;

    /**
     * Get invoice creation date
     */
    public function getCreatedAt(): Carbon;

    /**
     * Get invoice subtotal (before tax)
     */
    public function getSubTotal(): float;

    /**
     * Get total tax amount
     */
    public function getTotalTaxAmount(): float;

    /**
     * Get invoice total (including tax)
     */
    public function getTotal(): float;

    /**
     * Get payment method
     */
    public function getPaymentMethod(): ?string;

    /**
     * Get invoice items
     */
    public function getItems(): array;

    /**
     * Get ZATCA UUID
     */
    public function getZatcaUuid(): ?string;

    /**
     * Set ZATCA UUID
     */
    public function setZatcaUuid(string $uuid): void;

    /**
     * Get ZATCA hash
     */
    public function getZatcaHash(): ?string;

    /**
     * Set ZATCA hash
     */
    public function setZatcaHash(string $hash): void;

    /**
     * Get ZATCA XML
     */
    public function getZatcaXml(): ?string;

    /**
     * Set ZATCA XML
     */
    public function setZatcaXml(string $xml): void;

    /**
     * Get ZATCA QR code
     */
    public function getZatcaQrCode(): ?string;

    /**
     * Set ZATCA QR code
     */
    public function setZatcaQrCode(string $qrCode): void;

    /**
     * Get ZATCA status
     */
    public function getZatcaStatus(): ?string;

    /**
     * Set ZATCA status
     */
    public function setZatcaStatus(string $status): void;

    /**
     * Get ZATCA errors
     */
    public function getZatcaErrors(): ?string;

    /**
     * Set ZATCA errors
     */
    public function setZatcaErrors(?string $errors): void;

    /**
     * Get ZATCA reported at timestamp
     */
    public function getZatcaReportedAt(): ?Carbon;

    /**
     * Set ZATCA reported at timestamp
     */
    public function setZatcaReportedAt(?Carbon $reportedAt): void;

    /**
     * Get ZATCA invoice counter
     */
    public function getZatcaInvoiceCounter(): ?int;

    /**
     * Set ZATCA invoice counter
     */
    public function setZatcaInvoiceCounter(int $counter): void;

    /**
     * Save the invoice
     */
    public function save(): bool;
}