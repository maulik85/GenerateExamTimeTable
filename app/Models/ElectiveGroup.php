<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ElectiveGroup extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'elective_groups';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'offered_subjects_in_group',
        'max_subjects_allowed',
        'min_subjects_required',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function electiveGroupSubjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
