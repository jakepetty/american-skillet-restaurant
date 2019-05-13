<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected static function processImage($model)
    {
        $image = \Request::file('image');
        if ($image) {
            $dir = public_path(sprintf('img/%s', $model->table));
            if (!is_dir($dir)) {
                mkdir($dir);
            }
            $ext = $image->getClientOriginalExtension();
            foreach ($model->images as $size => $res) {
                $img = sprintf('%s/%s_%s.%s', $dir, $model->id, $size, $ext);
                \Image::make($image->getPathname())->fit($res['w'], $res['h'])->save($img, 100);
            }
            $model->ext = $ext;
            $model->unsetEventDispatcher();
            $model->save();
        }
    }
    protected static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            self::processImage($model);
        });
        self::saved(function ($model) {
            self::processImage($model);
        });
        self::deleted(function ($model) {
            foreach ($model->images as $size => $res) {
                $file = public_path(sprintf('img/%s/%s_%s.%s', $model->table, $model->id, $size, $model->ext));
                if (is_file($file)) {
                    unlink($file);
                }
            }
        });
    }
}
