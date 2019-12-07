<?php

function menuOpen($path)
{
    return request()->is($path) ? 'menu-open' : '';
}

function active($path)
{
    return request()->is($path) ? 'active' : '';
}
