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

class Scholarship extends Model implements HasMedia
{
    use HasAdvancedFilter, SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'scholarships';

    // protected $appends = [
    //     'logo',
    // ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'scholar_type',
        'scholar_duration',
        'scholar_coverage',
        'starting_date',
        'teaching_lang',
        'original_tuition',
        'desc',
        'university_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function path()
    {
        return url("/scholarships/{$this->id}-" . Str::slug($this->scholar_type));
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
    
    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $thumbnailWidth  = 50;
    //     $thumbnailHeight = 50;

    //     $thumbnailPreviewWidth  = 120;
    //     $thumbnailPreviewHeight = 120;

    //     $this->addMediaConversion('thumbnail')
    //         ->width($thumbnailWidth)
    //         ->height($thumbnailHeight)
    //         ->fit('crop', $thumbnailWidth, $thumbnailHeight);
    //     $this->addMediaConversion('preview_thumbnail')
    //         ->width($thumbnailPreviewWidth)
    //         ->height($thumbnailPreviewHeight)
    //         ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    // }

    // public function getLogoAttribute()
    // {
    //     return $this->getMedia('company_logo')->map(function ($item) {
    //         $media                      = $item->toArray();
    //         $media['url']               = $item->getUrl();
    //         $media['thumbnail']         = $item->getUrl('thumbnail');
    //         $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

    //         return $media;
    //     });
    // }
}
