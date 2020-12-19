<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Subject extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'subjects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_SELECT = [
        'theory'               => 'Theory',
        'practical'            => 'Practical',
        'theory_and_practical' => 'Theory and Practical',
        'project'              => 'Project',
    ];

    protected $fillable = [
        'semester',
        'year',
        'category',
        'code',
        'title',
        'type',
        'credits',
        'classroom_hours',
        'tutorial_hours',
        'lab_hours',
        'theory_exam_hours',
        'practical_exam_hours',
        'theory_intl_marks',
        'theory_intl_passing_marks',
        'theory_ext_marks',
        'theory_ext_passing_marks',
        'practical_intl_marks',
        'practical_intl_passing_marks',
        'practical_ext_marks',
        'practical_ext_passing_marks',
        'total_marks',
        'total_passing_marks',
        'elective',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    public function elective_groups()
    {
        return $this->belongsToMany(ElectiveGroup::class);
    }
}
