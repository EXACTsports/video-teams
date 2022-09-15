<?php

namespace App\Actions;

class GetTeamsFromTitle
{
    public function __invoke(string $title): array
    {
        // TODO: Extract the two teams that played in the game from the title of the video and return them as an array.
        // example: return [1, 3];
        // example: return ['A', 'F'];
        $pattern = '/((\w+\s|\d)|[(]\w+\s\w+\s)[vV][sS]?.?(\s\w+\s\w+[)]|(\d|\s\w+))/';
        preg_match($pattern, $title, $matches);

        // $matches
        // 1. Array ( [0] => 2v3 [1] => 2 [2] => 2 [3] => 3 [4] => 3 )
        // 2. Array ( [0] => 1 v 3 [1] => 1 [2] => 1 [3] => 3 [4] => 3 )
        // 3. Array ( [0] => (Team 2 vs. Team 1) [1] => (Team 2 [2] => [3] => Team 1) )
        // 4. Array ( [0] => T7 V T9 [1] => T7 [2] => T7 [3] => T9 [4] => T9 )

        if($matches) {
            return [str_replace("(", "", $matches[1]), str_replace(")", "", $matches[3])];
        } else {
            return [null, null];
        }
    }
}
