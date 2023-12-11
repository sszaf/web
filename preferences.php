<?php

function setPreferencesCookie($font, $fontColor, $bgColor) {
    $expirationTime = time() + (60); 

    setcookie("user_preferences[font]", $font, $expirationTime, "/");
    setcookie("user_preferences[font_color]", $fontColor, $expirationTime, "/");
    setcookie("user_preferences[bg_color]", $bgColor, $expirationTime, "/");
}

function getPreferencesFromCookie() {
    $userPreferences = array(
        'font' => 'Arial',
        'font_color' => '#000000',
        'bg_color' => '#FFFFFF'
    );

    if (isset($_COOKIE['user_preferences'])) {
        $cookiePreferences = $_COOKIE['user_preferences'];
        
        foreach ($userPreferences as $key => $value) {
            if (isset($cookiePreferences[$key])) {
                $userPreferences[$key] = $cookiePreferences[$key];
            }
        }
    }

    return $userPreferences;
}
