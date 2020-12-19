<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Program extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'programs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'code',
        'category',
        'faculty_id',
        'level_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function programTimeTables()
    {
        return $this->hasMany(TimeTable::class, 'program_id', 'id');
    }

    public function programSubjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function programsElectiveGroups()
    {
        return $this->belongsToMany(ElectiveGroup::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function colleges()
    {
        return $this->belongsToMany(College::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
