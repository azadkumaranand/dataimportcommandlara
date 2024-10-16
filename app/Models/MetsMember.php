<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetsMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dpr_license', 'cpnum', 'last_name', 'first_name', 'mi', 'address',
        'city', 'state', 'country', 'zipcode', 'region', 'modified_region',
        'cell_no', 'work_no', 'fax', 'email', 'additional_region',
        'membership_number', 'employer_name', 'employer_category',
        'cca_number', 'plant_doctor', 'no_email_blast', 'no_label',
        'consulting_type', 'member_year', 'renewal_year', 'year', 'pd_code',
        'status', 'licensee_category', 'course_date', 'pca', 'pcacat', 'pi',
        'picat', 'qal', 'qalcat', 'qac', 'qaccat', 'mrrnew', 'pmpupd', 'hours'
    ];

    protected $casts = [
        'modified_region' => 'integer',
        'employer_category' => 'integer',
        'plant_doctor' => 'boolean',
        'no_email_blast' => 'boolean',
        'no_label' => 'boolean',
        'status' => 'integer',
        'course_date' => 'date',
        'mrrnew' => 'date',
        'pmpupd' => 'datetime',
    ];

    public function info()
    {
        return $this->hasMany(MetsMemberInfo::class, 'member_id');
    }
}
