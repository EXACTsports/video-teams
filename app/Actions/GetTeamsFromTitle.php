<?php

namespace App\Actions;

class GetTeamsFromTitle
{
    public function __invoke(string $title): array
    {
        //check if brackets return null
        if (!preg_match('!\(([^\)]+)\)!', $title, $match)) {
            return [null, null];
        }
        $string = explode(')', (explode('(', $title)[1]))[0];

        //check if string has letter T.
        if (str_contains($string, 'T')) {
            $teams = explode(' v ', $string);
            $data = [];
            foreach ($teams as $team) {
                $st = trim($team, "T");
                $data[] = $st;
            }
            return array_values($data);
        }
        //for the rest of the TEAMS.
        $teams = explode(' v ', $string);
        $data = [];
        foreach ($teams as $team) {
            $st = substr($team, 0, 1);
            $data[] = $st;
        }
        return array_values($data);
    }
}
