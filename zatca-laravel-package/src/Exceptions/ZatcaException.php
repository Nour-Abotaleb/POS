<?php

namespace YourVendor\ZatcaLaravel\Exceptions;

use Exception;

class ZatcaException extends Exception
{
    protected $zatcaErrors;

    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null, array $zatcaErrors = [])
    {
        parent::__construct($message, $code, $previous);
        $this->zatcaErrors = $zatcaErrors;
    }

    /**
     * Get ZATCA specific errors
     */
    public function getZatcaErrors(): array
    {
        return $this->zatcaErrors;
    }

    /**
     * Set ZATCA specific errors
     */
    public function setZatcaErrors(array $errors): void
    {
        $this->zatcaErrors = $errors;
    }

    /**
     * Get formatted error message with ZATCA errors
     */
    public function getFormattedMessage(): string
    {
        $message = $this->getMessage();
        
        if (!empty($this->zatcaErrors)) {
            $message .= "\nZATCA Errors: " . json_encode($this->zatcaErrors, JSON_PRETTY_PRINT);
        }
        
        return $message;
    }
}