<?php

final class AppsHelpers
{
    # Static Methods #

    public static function isValidHash(array $params, $hash, $secret)
    {
        if (isset($params['hash'])) {
            unset($params['hash']);
        }

        $params = http_build_query($params);
        $calculatedHash = hash_hmac('sha256', $params, $secret);

        return ($hash == $calculatedHash);
    }

    # End #
}

# Functions #

function say($variable, $language = 'en')
{
    // Creates a static cache for language data.
    static $languageCache = [];

    // Loads the missing language file in the cache.
    if (!isset($languageCache[$language])) {
        $languageFile = __DIR__ . '/../localization/' . $language . '/' . $language . '.php';
        if (file_exists($languageFile)) {
            include $languageFile;
            if (isset($Language) && is_array($Language)) {
                $languageCache[$language] = $Language;
            }
        }
    }

    // Switches to English in case of a missing language file.
    if (!isset($languageCache[$language])) {
        return say($variable);
    }

    // Gets the variable from the language data.
    if (isset($languageCache[$language][$variable])) {
        return $languageCache[$language][$variable];
    }
    else {
        if ($language != 'en') {
            return say($variable);
        }
    }

    // The variable does not exist in language files.
    return $variable;
}

function sayArr($variable, $language, $arr)
{
    if (is_string($arr)) {
        return $arr;
    } else if (!is_array($arr)) {
        return '';
    }

    // Check if $variable is an array.
    if (is_array($arr[$variable])) {
        // Check if the specified language is available.
        if (isset($arr[$variable][$language])) {
            return $arr[$variable][$language];
        } else {
            // If the specified language is not available, fall back to the first available language.
            reset($arr[$variable]);
            $firstVal = current($arr[$variable]);
            return $firstVal;
        }
    }

    // The variable does not exist or is not an array.
    return '';
}

function ifSetOr(array $array, $key, $default = null)
{
    return (isset($array[$key]) == true) ? $array[$key] : $default;
}

# End #