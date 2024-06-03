<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bitacora
 *
 * @property $id
 * @property $servicio_id
 * @property $fecha
 * @property $descripcion
 * @property $comentario
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Servicio $servicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bitacora extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['servicio_id', 'fecha', 'descripcion', 'comentario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicio()
    {
        return $this->belongsTo(\App\Models\Servicio::class, 'servicio_id', 'id');
    }
    

}
