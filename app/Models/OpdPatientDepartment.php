<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Str;

/**
 * App\Models\OpdPatientDepartment
 *
 * @property int $id
 * @property int $patient_id
 * @property string $opd_number
 * @property string|null $height
 * @property string|null $weight
 * @property string|null $bp
 * @property string|null $symptoms
 * @property string|null $notes
 * @property Carbon $appointment_date
 * @property int|null $case_id
 * @property bool|null $is_old_patient
 * @property int|null $doctor_id
 * @property int $standard_charge
 * @property int $payment_mode
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Doctor|null $doctor
 * @property-read mixed $payment_mode_name
 * @property-read Patient $patient
 * @property-read PatientCase|null $patientCase
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment query()
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereAppointmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereBp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereCaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereIsOldPatient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereOpdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment wherePaymentMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereStandardCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereSymptoms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpdPatientDepartment whereWeight($value)
 *
 * @mixin \Eloquent
 */
class OpdPatientDepartment extends Model
{
    public $table = 'opd_patient_departments';

    const PAYMENT_MODES = [
        1 => 'Cash',
        2 => 'Cheque',
        3 => 'Card',
    ];

    public $fillable = [
        'patient_id',
        'appointment_id',
        'opd_number',
        'height',
        'weight',
        'bp',
        'symptoms',
        'notes',
        'appointment_date',
        'case_id',
        'is_old_patient',
        'doctor_id',
        'standard_charge',
        'followup_charge',
        'advance_amount',
        'payment_mode',
        'currency_symbol',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'patient_id' => 'required',
        'case_id' => 'required',
        'appointment_date' => 'required',
        'doctor_id' => 'required',
        'standard_charge' => 'nullable',
        'followup_charge' => 'nullable',
        'payment_mode' => 'required',
        'weight' => 'numeric|max:200|nullable',
        'height' => 'numeric|max:7|nullable',
        'bp' => 'nullable|numeric|max:200',
    ];

    /**
     * @var array
     */
    protected $appends = ['payment_mode_name'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'patient_id' => 'integer',
        'opd_number' => 'string',
        'appointment_date' => 'datetime',
        'height' => 'integer',
        'weight' => 'integer',
        'bp' => 'integer',
        'symptoms' => 'string',
        'notes' => 'string',
        'case_id' => 'integer',
        'is_old_patient' => 'boolean',
        'doctor_id' => 'integer',
        'standard_charge' => 'integer',
        'payment_mode' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    /**
     * @return BelongsTo
     */
    public function patientCase()
    {
        return $this->belongsTo(PatientCase::class, 'case_id');
    }

    /**
     * @return BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function doctorName()
    {

        return $this->belongsTo(Doctor::class, 'doctor_id')->with('doctorUser');
    }

    /**
     * @return string
     */
    public static function generateUniqueOpdNumber()
    {
        $opdNumber = strtoupper(Str::random(8));
        $opdNumber = Carbon::now()->format('Y') . '-'.random_int(1000, 9999);
        while (true) {
            $isExist = self::whereOpdNumber($opdNumber)->exists();
            if ($isExist) {
                self::generateUniqueOpdNumber();
            }
            break;
        }

        return $opdNumber;
    }

    /**
     * @return mixed
     */
//     public function getPaymentModeNameAttribute()
//     {
//         return self::PAYMENT_MODES[$this->payment_mode];
//     }
public function getPaymentModeNameAttribute()
    {
        if (array_key_exists($this->payment_mode, self::PAYMENT_MODES)) {
            return self::PAYMENT_MODES[$this->payment_mode];
        } else {
            // Handle the case where the key does not exist
            return 'N/A';
        }
    }
}
