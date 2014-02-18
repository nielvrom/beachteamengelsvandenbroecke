<?php

namespace Beachteam\BeachteamBundle\Namer;

use Oneup\UploaderBundle\Uploader\File\FileInterface;
use Oneup\UploaderBundle\Uploader\Naming\NamerInterface;

class CatNamer implements NamerInterface
{
    public function name(FileInterface $file)
    {
        $i = 0;
        $array = (array) $file;

        foreach($array as $key => $value){
            if($i == 1){
                $filename = $value;
            }
            $i++;
        }

        return $filename;
    }
}