<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Slug
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Mahasiswa extends Model
{
    use HasFactory;

    // Slug
    use Sluggable;
    use SluggableScopeHelpers;


    protected $table = 'mahasiswa';
    protected $guarded = ['id'];
    protected $fillable = [
        'nim',
        'id_dosen_wali',
        'foto_profile',
        'nama',
        'slug_mahasiswa',
        'fakultas',
        'prodi_id',
        'email'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function dosenWali(){
        return $this->belongsTo(Dosen::class, 'id_dosen_wali', 'nip_nrk');
    }

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'kode_prodi', 'id');
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug_mahasiswa' => [
                'source' => 'nama',
            ]
        ];
    }
}
