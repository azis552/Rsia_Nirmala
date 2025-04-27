<?php

if (!function_exists('escapeMarkdown')) {
    function escapeMarkdown($text)
    {
        $special_chars = ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'];
        foreach ($special_chars as $char) {
            $text = str_replace($char, '\\' . $char, $text);
        }
        return $text;
    }
}

if (!function_exists('getProfil')) {
    function getProfil()
    {
        return \App\Models\Profil::first();
    }
}
