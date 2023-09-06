<?php

namespace Core\Support;

use Core\Views\AbstractExtension;

class Str extends AbstractExtension
{
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
        if (mb_strlen($text) <= $maxLength) {
            return $text;
        }

        $lastSpace = mb_strrpos(mb_substr($text, 0, $maxLength), ' ');
        $truncatedText = mb_substr($text, 0, $lastSpace);
        $truncatedText .= $suffix;

        return $truncatedText;
    }
}