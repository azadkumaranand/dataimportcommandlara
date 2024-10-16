<?php

namespace App\Imports;

use App\Models\MetsMember;
use App\Models\MetsMemberInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MetsDataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        DB::transaction(function () use ($row) {
            $member = MetsMember::create([
                'dpr_license' => $row['dpr_license'] ?? null,
                'cpnum' => $row['cpnum'] ?? null,
                'last_name' => $row['last_name'] ?? null,
                'first_name' => $row['first_name'] ?? null,
                'mi' => $row['mi'] ?? null,
                'address' => $row['address'] ?? null,
                'city' => $row['city'] ?? null,
                'state' => $row['state'] ?? null,
                'country' => $row['country'] ?? null,
                'zipcode' => $row['zipcode'] ?? null,
                'region' => $row['region'] ?? null,
                'modified_region' => $row['modified_region'] ?? 0,
                'cell_no' => $row['cell_no'] ?? null,
                'work_no' => $row['work_no'] ?? null,
                'fax' => $row['fax'] ?? null,
                'email' => $row['email'] ?? null,
                'additional_region' => $row['additional_region'] ?? null,
                'membership_number' => $row['membership_number'] ?? null,
                'employer_name' => $row['employer_name'] ?? null,
                'employer_category' => $row['employer_category'] ?? 0,
                'cca_number' => $row['cca_number'] ?? null,
                'plant_doctor' => $row['plant_doctor'] ?? false,
                'no_email_blast' => $row['no_email_blast'] ?? false,
                'no_label' => $row['no_label'] ?? false,
                'consulting_type' => $row['consulting_type'] ?? null,
                'member_year' => $row['member_year'] ?? null,
                'renewal_year' => $row['renewal_year'] ?? null,
                'year' => $row['year'] ?? null,
                'pd_code' => $row['pd_code'] ?? null,
                'status' => $row['status'] ?? 0,
                'licensee_category' => $row['licensee_category'] ?? null,
                'pca' => $row['pca'] ?? null,
                'pcacat' => $row['pcacat'] ?? null,
                'pi' => $row['pi'] ?? null,
                'picat' => $row['picat'] ?? null,
                'qal' => $row['qal'] ?? null,
                'qalcat' => $row['qalcat'] ?? null,
                'qac' => $row['qac'] ?? null,
                'qaccat' => $row['qaccat'] ?? null,
                'mrrenew' => $row['mrrenew'] ? Carbon::parse($row['mrrenew']) : null,
                'pmpupd' => $row['pmpupd'] ? Carbon::parse($row['pmpupd']) : null,
                'hours' => $row['hours'] ?? null,
            ]);

            // Process comma-separated data for mets_members_info
            $membershipYears = explode(',', $row['membershipyears'] ?? '');
            $paidDates = explode(',', $row['paiddate'] ?? '');
            $membershipTypes = explode(',', $row['membershiptype'] ?? '');
            $assoccodes = explode(',', $row['assoccodes'] ?? '');
            
            $maxCount = max(count($membershipYears), count($paidDates), count($membershipTypes), count($assoccodes));
            Log::info($maxCount);
            for ($i = 0; $i < $maxCount; $i++) {
                MetsMemberInfo::create([
                    'member_id' => $member->id,
                    'cpnum' => $row['cpnum'] ?? null,
                    'membership_year' => $membershipYears[$i] ?? null,
                    'paid_date' => isset($paidDates[$i]) ? Carbon::parse($paidDates[$i])->format('Y-m-d') : null,
                    'membership_type' => $membershipTypes[$i] ?? null,
                    'assoccode' => $assoccodes[$i] ?? null,
                ]);
            }
        });

        return null; // Return null as we're handling the creation manually
    }
}
