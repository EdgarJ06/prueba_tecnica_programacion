<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Servicio
 *
 * @property $id
 * @property $equipo_id
 * @property $tecnico_id
 * @property $estado_id
 * @property $fecha_recepcion
 * @property $problema_reportado
 * @property $diagnostico
 * @property $solucion
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Equipo $equipo
 * @property Estado $estado
 * @property Tecnico $tecnico
 * @property Bitacora[] $bitacoras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['equipo_id', 'tecnico_id', 'estado_id', 'fecha_recepcion', 'problema_reportado', 'diagnostico', 'solucion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipo()
    {
        return $this->belongsTo(\App\Models\Equipo::class, 'equipo_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo(\App\Models\Estado::class, 'estado_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tecnico()
    {
        return $this->belongsTo(\App\Models\Tecnico::class, 'tecnico_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bitacoras()
    {
        return $this->hasMany(\App\Models\Bitacora::class, 'id', 'servicio_id');
    }
    

}
