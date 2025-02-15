<?php

class SkinViewer2D
{
    private static $slimDetectPixel = array(42, 51); // x,y 

    private static $skinProps = array(
        0 => array('base' => 64, 'ratio' => 2),
        1 => array('base' => 64, 'ratio' => 1),
    );

    private static $cloakProps = array(
        0 => array('base' => 64, 'ratio' => 2),
        1 => array('base' => 22, 'ratio' => 1.29),
    );

    public static function createHead($way_skin, $size = 32)
    {
        $img = @imagecreatefrompng($way_skin);
        if (!$img) return false;

        $av = imagecreatetruecolor($size, $size);
        
        imagealphablending($av, true);
        imagesavealpha($av, true);
        
        $transparent = imagecolorallocatealpha($av, 0, 0, 0, 127);
        imagefill($av, 0, 0, $transparent);

        imagecopyresized($av, $img, 0, 0, 8, 8, $size, $size, 8, 8);
        
        imagecopyresized($av, $img, 0, 0, 40, 8, $size, $size, 8, 8);
        
        imagedestroy($img);

        return $av;
    }

    public static function getImageDataUrl($img)
    {
        ob_start();
        imagepng($img);
        $imageData = ob_get_clean();
        return 'data:image/png;base64,' . base64_encode($imageData);
    }
}
