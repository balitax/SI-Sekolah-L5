<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this templates file, choose Tools | Templates
 * and open the templates in the editor.
 */

$env = $app->detectEnvironment(function()
{
    return getenv('APP_ENV') ?: 'production';
});