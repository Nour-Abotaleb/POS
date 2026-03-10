<?php

namespace App\Helper;

class ZatcaHelper
{
    /**
     * Generate ZATCA-compliant QR code data using TLV encoding
     * 
     * @param string $sellerName - Seller's name (Tag 1)
     * @param string $vatNumber - VAT registration number (Tag 2)
     * @param string $timestamp - Invoice timestamp in ISO 8601 format (Tag 3)
     * @param string $totalWithVat - Total amount including VAT (Tag 4)
     * @param string $vatAmount - VAT amount (Tag 5)
     * @return string Base64 encoded TLV data
     */
    public static function generateQRCode($sellerName, $vatNumber, $timestamp, $totalWithVat, $vatAmount)
    {
        $tlvData = '';
        
        // Tag 1: Seller Name
        $tlvData .= self::encodeTLV(1, $sellerName);
        
        // Tag 2: VAT Number
        $tlvData .= self::encodeTLV(2, $vatNumber);
        
        // Tag 3: Timestamp
        $tlvData .= self::encodeTLV(3, $timestamp);
        
        // Tag 4: Total with VAT
        $tlvData .= self::encodeTLV(4, $totalWithVat);
        
        // Tag 5: VAT Amount
        $tlvData .= self::encodeTLV(5, $vatAmount);
        
        return base64_encode($tlvData);
    }
    
    /**
     * Encode a single TLV (Tag-Length-Value) entry
     * 
     * @param int $tag - Tag number
     * @param string $value - Value to encode
     * @return string Binary TLV data
     */
    private static function encodeTLV($tag, $value)
    {
        $length = strlen($value);
        return chr($tag) . chr($length) . $value;
    }
}