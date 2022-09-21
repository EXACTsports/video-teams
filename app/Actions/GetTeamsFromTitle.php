<?php

namespace App\Actions;

class GetTeamsFromTitle
{
    public function __invoke(string $title): array
    {

        // TODO: Extract the two teams that played in the game from the title of the video and return them as an array.
        // example: return [1, 3];
        // example: return ['A', 'F'];
        // return ['A', 'TODO'];
        $pattern = '/([a-zA-Z0-9]+\s[vV][sS]?\s?[A-Za-z0-9]+)|([(][A-Za-z0-9]+\s?[0-9]?\s?[vV][sS]?.?\s?[A-Za-z0-9]+\s?[0-9]?[)])/';
        preg_match_all($pattern, $title, $matches);
        if(!empty($matches[0]))
        {
            $zero = $matches[0][0];
            if($zero != "")
            {
                if(str_contains($zero,"Las Vegas"))
                {
                    return ["null","null"];
                }
                if(str_contains($zero,"Team"))
                {
                    try {
                        //code...
                        $arr = explode("vs.",$zero);
                        if(count($arr)==2)
                        {
                            $team1 = str_replace("(","",$arr[0]);
                            $team1 = str_replace("Team","",$team1);
                            $team2 = str_replace(")","",$arr[1]);
                            $team2 = str_replace("Team","",$team2);
                            return [$team1,$team2];
                        }
                        $arr = explode("v",$zero);
                        if(count($arr)==2)
                        {
                            $team1 = str_replace("(","",$arr[0]);
                            $team1 = str_replace("Team","",$team1);
                            $team2 = str_replace(")","",$arr[1]);
                            $team2 = str_replace("Team","",$team2);
                            return [$team1,$team2];
                        }
                    } catch (\Throwable $th) {
                        //throw $th;
                        dd("what",$zero);
                    }

                }
                else if(str_contains($zero,"T"))
                {
                    try {
                        //code...
                        $arr = explode("vs",$zero);
                        if(count($arr)==2)
                        {
                            $occur = 0;
                            $team1 = str_replace("(","",$arr[0]);
                            $team1 = str_replace("T","",$team1,$occur);
                            if($occur == 2)
                            {
                                $team1 = "T";
                            }
                            $team2 = str_replace(")","",$arr[1]);
                            $team2 = str_replace("T","",$team2,$occur);
                            if($occur == 2)
                            {
                                $team2 = "T";
                            }
                            return [$team1,$team2];
                        }
                        $arr = explode("v",$zero);
                        if(count($arr)==2)
                        {
                            $occur = 0;
                            $team1 = str_replace("(","",$arr[0]);
                            $team1 = str_replace("T","",$team1,$occur);
                            if($occur == 2)
                            {
                                $team1 = "T";
                            }
                            $team2 = str_replace(")","",$arr[1]);
                            $team2 = str_replace("T","",$team2,$occur);
                            if($occur == 2)
                            {
                                $team2 = "T";
                            }
                            return [$team1,$team2];
                        }
                        $arr = explode("V",$zero);
                        if(count($arr)==2)
                        {
                            $occur = 0;
                            $team1 = str_replace("(","",$arr[0]);
                            $team1 = str_replace("T","",$team1,$occur);
                            if($occur == 2)
                            {
                                $team1 = "T";
                            }
                            $team2 = str_replace(")","",$arr[1]);
                            $team2 = str_replace("T","",$team2,$occur);
                            if($occur == 2)
                            {
                                $team2 = "T";
                            }
                            return [$team1,$team2];
                        }
                    } catch (\Throwable $th) { 
                        dd("what",$zero);
                    }
                }
                else
                {

                    $arr = explode("v",str_replace(")","",str_replace("(","",$zero)));
                    if(count($arr)==2)
                    {
                        return [$arr[0],$arr[1]];
                    }

                    $arr = explode("V",$zero);

                    if(count($arr)==2)
                    {
                        return [$arr[0],$arr[1]];
                    }
                }
            }

        }
        else
        {
            return ["null","null"];
        }
    }
}
