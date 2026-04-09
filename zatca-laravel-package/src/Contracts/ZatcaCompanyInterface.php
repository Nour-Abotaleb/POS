<?php

namespace YourVendor\ZatcaLaravel\Contracts;

interface ZatcaCompanyInterface
{
    /**
     * Get company ID
     */
    public function getId(): int;

    /**
     * Get company name
     */
    public function getCompanyName(): string;

    /**
     * Get VAT number
     */
    public function getVatNumber(): string;

    /**
     * Get commercial registration number
     */
    public function getCommercialRegistration(): ?string;

    /**
     * Get company address
     */
    public function getAddress(): ?string;

    /**
     * Get company city
     */
    public function getCity(): ?string;

    /**
     * Get company zip code
     */
    public function getZipCode(): ?string;

    /**
     * Get ZATCA private key
     */
    public function getZatcaPrivateKey(): ?string;

    /**
     * Get ZATCA certificate
     */
    public function getZatcaCertificate(): ?string;

    /**
     * Get ZATCA secret key
     */
    public function getZatcaSecret(): ?string;

    /**
     * Get ZATCA API environment
     */
    public function getZatcaApiEnvironment(): string;

    /**
     * Get ZATCA CSID
     */
    public function getZatcaCsid(): ?string;
}