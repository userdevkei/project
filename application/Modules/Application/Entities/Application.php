<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Registrar\Entities\Courses;
use Modules\COD\Entities\CODLog;
use Modules\Registrar\Entities\Intake;
use Modules\Dean\Entities\DeanLog;
use Modules\Finance\Entities\FinanceLog;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

//    relationship between an applicant and a course

    public function applicant(){

       return $this->belongsTo(Applicant::class, 'user_id');
    }

//    relationship between an application and course

    public function courses(){

        return $this->belongsTo(Courses::class, 'course_id');

    }

//    application/intake relationship

        public function app_intake(){

            return $this->belongsTo(Intake::class, 'intake_id');

        }

//        application-admission relationship

    public function admApproval(){

        return $this->hasOne(AdmissionApproval::class, 'app_id');
    }

    public function admApprovals(){

        return $this->hasOne(AdmissionApproval::class, 'app_id');
    }

//    public function admitApproval(){
//        return $this->hasMany(AdmissionApproval::class, )
//    }

    protected static function newFactory()
    {
        return \database\factories\ApplicationFactory::new();
    }
}
