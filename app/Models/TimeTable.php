<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class TimeTable extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'time_tables';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'program_id',
        'semester',
        'year',
        'exam_available_days_id',
        'start_time',
        'academic_year_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function exam_available_days()
    {
        return $this->belongsTo(ExamAvailableDay::class, 'exam_available_days_id');
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
}
