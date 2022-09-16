<?php

namespace App\Actions;
use App\Models\GameVideo;

class GetTeamsFromTitle
{
    public function __invoke(string $title): array
    {
        // Check if the fifth type (video games containing the word field)
        // return [$title, $title];
        // Check if it's the third type (finishing with 'TX? v TY?')
        if (strpos($title, ' V T') !== false && strpos($title, 'Field') == false) {
            $strpos = strpos($title, ' V T');
            $teams = substr($title, strlen($strpos));
            $team1 = substr($teams, 0, 1);
            $team2 = substr($teams, 5, 6);
            return [$team1, $team2];
        }


        if (strpos($title, 'Field') !== false && strpos($title, ' V T') == false && strpos($title, '& ') == false && (strpos($title, 'v T') !== false || strpos($title, 'V T') !== false)) {
            $strpos = strpos($title, 'Field');
            $teams = substr($title, strlen($strpos));
            $teams = substr($teams, $strpos+strlen('Field '));
            $team1 = str_replace('(', '', strtok($teams, 'v'));
            $team2 = str_replace(')', '', substr($teams, strpos($teams, "v ") + 1));
            return [$team1, $team2];
        }

        // Check if it's the second type (finishing with 'Team X v Team X')
        if (strpos($title, ' v Team') !== false) {
            $strpos = strpos($title, '(Team ');
            $teams = substr($title, strlen($strpos));
            $teams = substr($teams, $strpos+strlen('    '));
            $team1 = strtok($teams, 'v Team ');
            $team2 = str_replace(')', '', substr($teams, strpos($teams, "Team")+4));
            return [$team1, $team2];
        }

        // Check if it's the first type (finishing with 'X v X')
        if (strpos($title, ' v ') !== false) {
            $strpos = strpos($title, 'v');
            $teams = substr($title, strlen($strpos));
            $teams = substr($teams, $strpos+strlen('v '));
            $team1 = strtok($teams, 'v');
            $team2 = substr($teams, strpos($teams, "v ") + 1);
            return [$team1, $team2];
        }


        // Check if it's the fourth type ()
        if (strpos($title, ' (') !== false && strpos($title, ' v ') !== false) {
            $strpos = strpos($title, ' (');
            $teams = substr($title, strlen($strpos));
            $team1 = substr($teams, 0, 1);
            $team2 = substr($teams, 4, -9);
            return [$team1, $team2];
        }
        return ['null', 'null'];
    }
}
