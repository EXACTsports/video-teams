<?php

namespace App\Actions;

class GetTeamsFromTitle
{
    public function __invoke(string $title): array
    {
//    TODO: Extract the two teams that played in the game from the title of the video and return them as an array.
        // example: return [1, 3];
        // example: return ['A', 'F'];
        // return ['A', 'TODO'];

        $pattern = '/(\(\w+\s\d\s?\s(v|vs.)\s?\w+\s\d\))|\(\w+\s\d\s?\s(v|vs.)\s?\w+\s\d\)|(\d{1,2}\s?[v|V]\s?\d{1,2})|(\w*\s[v|V]\s\w*)/';
        preg_match_all($pattern, $title, $matches);

        if(!empty($matches[0]))
        {
            $zero = $matches[0][0];
            if($zero != "")
            {
                $word = $matches[0][0];
                // $word = str_replace("T","",$word);
                $word = str_replace("eam","",$word);
                $word = str_replace("s.","",$word);


                $arr = explode("V",$word);
                if(count($arr)==2)
                {
                    return [$arr[0],$arr[1]];
                }
                $arr = explode("v",str_replace(")","",str_replace("(","",$word)));
                if(count($arr)==2)
                {
                    return [$arr[0],$arr[1]];
                }
            }

        }
        else
        {
            return ["null","null"];
        }
    }
}
