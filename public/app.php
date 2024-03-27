<?php

/**
 * Creates a snippet
 *
 * @param array $context Contains configuration data which can be used to customize the snippet.
 *
 * @return string The HTML snippet.
 */
function createSnippet(array $context = [])
{
    return
        '
        <script src="<<<app-hosted-url>>>/script/hello.js?v={%%%mozver%%%}"></script>
        ';
}