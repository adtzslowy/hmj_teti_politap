<?php

if (!function_exists('any_guard_authenticated')) {
    function any_guard_authenticated(array $guards): bool
    {
        foreach($guards as $guard) {
            if (auth()->guard($guard)->check()){
                return true;
            }
        }
        return false;   
    }
}
