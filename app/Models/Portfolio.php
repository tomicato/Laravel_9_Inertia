<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'anons', 'description', 'main_photo', 'price'];

    public static function add($fields)
    {
        $portfolio = new self();
        $portfolio->fill($fields);
       // $portfolio->main_photo = $name;
        $portfolio->save();
        return $portfolio;
    }

    public function uploadPhoto($portfolio, $photo)
    {
        if ($photo == null) return;
        $this->removePhoto($photo);
        $filename = $photo->getClientOriginalName();
        $photo->move(public_path('uploads/portfolio'), $filename);
        $portfolio->main_photo = $filename;
        $portfolio->save();

    }

    public function removePhoto($photo = null)
    {
        $path = public_path('uploads/portfolio/') . $photo->getClientOriginalName();
        if (file_exists($path) && $photo != null) {
            unlink($path);
        }
    }

    public function deletePhoto($photo_name)
    {
        if ($photo_name == null) return;
        $path = public_path('uploads/portfolio/') . $photo_name;
        if (file_exists($path) && $photo_name != null) {
            unlink($path);
        }
    }
}
