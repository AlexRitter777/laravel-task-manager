<?php

namespace App\Enums;

enum TaskStatus : string
{

    case TODO = 'todo';
    case DOING = 'doing';
    case DONE = 'done';


    public function label(): string
    {
        return match ($this) {
            self::TODO => 'Todo',
            self::DOING => 'Doing',
            self::DONE => 'Done',
        };
    }

    public static function values() : array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) =>
            [
                $case->value => $case->label()
            ])
            ->toArray();

        //or old foreach...
    }

}
