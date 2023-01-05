<?php
/**
 * Created by PhpStorm.
 * User: Alexsander
 * Date: 13.09.2017
 * Time: 10:37
 */

namespace App\Traits;

//use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;


trait UploadImages
{
    private $disk = 'uploads';
    private $entity_name;


    /**
     * This function use settings from model variable $uploads
     * Example:
     * $uploads = [
     *     '[field_name]' => [
     *          '[folder_name]' => '[width]x[height]@[quality],
     *      ]
     * ]
     *
     *
     * @param $value  - input field value
     * @param string $attributeName - database field name
     * @param string $fake    -   fake field name
     * @return string
     */
    public function upload($value, $attributeName = 'image', $fake = null)
    {
        if( !$attributeName )
            return $value;

        $entity = $this->entity_name ?: $this->getEntityName();

        $old_image = $this->getOldValue($attributeName, $fake);

        // Upload settings
        $uploads = $fake ? $this->uploads[$attributeName][$fake] : $this->uploads[$attributeName];

        // check if value was not changed
        $value_unchanged = !is_object($value) && !starts_with($value, 'data:image') ? true : false;

        // if the image was erased or changed, then erase old images
        if ($value == null || !$value_unchanged)
        {
            $filenameOld = basename($old_image);
            if($filenameOld)
            {
                // Delete original image
                $this->deleteImage($entity, $filenameOld, $uploads);
            }

            // return if no new image
            if($value == null)
                return $value;
        }

        // Keep old link
        if ( $value_unchanged )
        {
            // Return null if no file extension in path
            if( !$this->getExtension($value) )
                return null;

            // keep old link
            return basename($value);
        }

        // Upload new images by size
        $extension = $this->getExtension($value) ?: 'jpg';
        // Make the image
        $baseImage = \Image::make($value);

        // Generate a filename
        $filename = md5($value.time() . $attributeName . $fake).'.' . $extension;

        // Upload original
        \Storage::disk($this->disk)->put($entity . '/original/' .$filename, $baseImage->stream());

        foreach( $uploads as $sizeName => $size )
        {
            $path       = implode('/', [$entity, $sizeName]) . '/';
            $sizeAr     = explode('@', $size);
            $quality    = strpos($size, '@') ? intval($sizeAr[1]) : 100;
            $sizeAr     = explode('x', $sizeAr[0]);
            $width      = $sizeAr[0];
            $height     = $sizeAr[1];
            $image      = $baseImage;

            // Resize kipping aspect ration
            if( $image->width() < $image->height() )
            {
                if($image->width() > $width)
                {
                    $image->resize($width, null, function($constraint)
                    {
                        $constraint->aspectRatio();
                    });
                }
            }
            else
            {
                if($image->height() > $height)
                {
                    $image->resize(null, $height, function($constraint)
                    {
                        $constraint->aspectRatio();
                    });
                }
            }

            $background = \Image::canvas($width, $height);
            if($extension != 'png')
                $background->fill('#fff');
            $background->insert($image, 'center');

            // Crop
//            $background->crop($width, $height);

            // Upload
            \Storage::disk($this->disk)->put($path .$filename, $background->stream($extension, $quality));

            // the image will be replaced with an optimized version which should be smaller
//            ImageOptimizer::optimize('/' . $this->disk . $path . $filename);


        }

        return $filename;
    }


    private function getEntityName()
    {
        if( !$this->entity_name )
        {
            if( isset($this->crud->entity_name) )
            {
                $this->entity_name = $this->crud->entity_name;
            }
            else
            {
                $entityTemp = explode("\\", get_class($this));
                $this->entity_name = mb_strtolower(array_pop($entityTemp));
            }
        }

        return $this->entity_name;
    }

    private function getExtension($value)
    {
        if(is_object($value))
        {
            $value = $value->getMimeType(); // for jpg returns image/jpg
        }
        if(strpos($value, 'image/jpg') !== false)
        {
            return 'jpg';
        }
        elseif(strpos($value, 'image/png') !== false)
        {
            return 'png';
        }
        else
        {
            $pathinfo = pathinfo($value);
            return isset($pathinfo['extension']) && in_array($pathinfo['extension'], ['jpg', 'png'])
                ? $pathinfo['extension']
                : false;
        }
    }

    private function getOldValue($attributeName, $fake)
    {
        if($fake)
        {
            $value = is_array($this->$attributeName) ? $this->$attributeName : json_decode($this->$attributeName);
            if( !isset($value[$fake]) )
                return null;
            else
                return $value[$fake];

        }
        else
            return $this->$attributeName;
    }

    public function deleteImage($entity, $filenameOld, $uploads)
    {
        \Storage::disk($this->disk)->delete($entity . '/original/' .$filenameOld);

        foreach(array_keys($uploads) as $d)
        {
            \Storage::disk($this->disk)->delete($entity. "/" . $d . "/" . $filenameOld);
        }
    }
}