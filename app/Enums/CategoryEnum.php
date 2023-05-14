<?php

namespace App\Enums;

enum CategoryEnum: string
{
    case General = 'general';
    case Career = 'career';
    case Database = 'database';
    case Server = 'server';
    case DesignPattern = 'design pattern';
    case SoftSkill = 'soft skill';
}
