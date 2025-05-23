<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Estudiante extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_completo',
        'doc_tipo',
        'doc_numero',
        'fecha_de_nacimiento',
        'direccion',
        'sede_id',
        'empresa_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_de_nacimiento' => 'date',
        'sede_id' => 'integer',
        'empresa_id' => 'integer',
    ];

    public function certificado(): HasOne
    {
        return $this->hasOne(Certificado::class);
    }

    public function sede(): BelongsTo
    {
        return $this->belongsTo(Sede::class);
    }

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(Curso::class);
    }
}
