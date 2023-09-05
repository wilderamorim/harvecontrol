<?php

namespace Core\Support;

use Core\Views\ExtensionTrait;
use League\Plates\Extension\ExtensionInterface;

class Str implements ExtensionInterface
{
    use ExtensionTrait;

    /**
     * Truncate a string to a specified number of characters without cutting words.
     *
     * @param string $text The input string to be truncated.
     * @param int $maxLength The maximum number of characters to keep.
     * @param string $suffix (Optional) The text to append to the truncated string.
     * @return string The truncated string.
     */
    public static function truncate(string $text, int $maxLength, string $suffix = '...'): string
    {
        // Check if the string length is already less than or equal to the maximum length.
        if (mb_strlen($text) <= $maxLength) {
            return $text;
        }

        // Find the last space within the specified length.
        $lastSpace = mb_strrpos(mb_substr($text, 0, $maxLength), ' ');

        // Truncate the string at the last space (or maxLength if no space is found).
        $truncatedText = mb_substr($text, 0, $lastSpace);

        // Append the suffix.
        $truncatedText .= $suffix;

        return $truncatedText;
    }
}