<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;
use Illuminate\Support\Str;

class University extends Model implements HasMedia
{
    use HasAdvancedFilter, SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'universities';

    protected $appends = [
        'logo',
        'bg_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        // 'slug_name',
        'location',
        'desc',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // public function setNameAttribute($name){
    //     $this->attributes['slug_name'] = $this->uniqueSlug($name);
    // }

    // private function uniqueSlug($name){
    //     $slug = Str::slug($name, '-');
    //     $count = University::where('slug_name', 'LIKE', "{$slug}%")->count();
    //     $newCount = $count > 0 ? ++$count : '';
    //     return $newCount > 0 ? "$slug-$newCount" : $slug;
    // }

    public function path()
    {
        return url("/universities/{$this->id}-" . Str::slug($this->name));
    }

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getLogoAttribute()
    {
        return $this->getMedia('university_logo')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getBgImageAttribute()
    {
        return $this->getMedia('university_bg_image')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

}
