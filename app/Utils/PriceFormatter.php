<?php
namespace App\Utils;

class PriceFormatter
{
    /**
     * Format the price with currency symbol and decimal places.
     *
     * @param float $price
     * @param string $currency
     * @param int $decimalPlaces
     * @return string
     */
    public static function formatPrice($price, $currency = 'USD', $decimalPlaces = 2)
    {
        $formattedPrice = number_format($price, $decimalPlaces);

        // Add currency symbol based on currency code
        $currencySymbol = self::getCurrencySymbol($currency);

        return $currencySymbol . $formattedPrice;
    }

    /**
     * Get currency symbol based on currency code.
     *
     * @param string $currencyCode
     * @return string
     */
    protected static function getCurrencySymbol($currencyCode)
    {
        // Define currency symbols for various currencies
        $currencySymbols = [
            'USD' => '$',
            'EUR' => '€',
            // Add more currency symbols as needed
        ];

        // Return the currency symbol if found, otherwise return empty string
        return isset($currencySymbols[$currencyCode]) ? $currencySymbols[$currencyCode] : '';
    }
}
