<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'active_url' => 'attribute:  ليست عنوان URL صالحًا.',
    'after' => 'يجب أن تكون :attribute تاريخ بعد :date .',
    'after_or_equal' => 'يجب أن تكون :attribute تاريخًا أو يساوي :date .',
    'alpha' => 'قد تحتوي :attribute على أحرف فقط.',
    'alpha_dash' => 'قد تحتوي :attribute على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num' => 'قد تحتوي :attribute على أحرف وأرقام فقط.',
    'array' => 'يجب أن تكون :attribute صفيفًا.',
    'before' => 'يجب أن تكون :attribute تاريخ قبل :date .',
    'before_or_equal' => ' يجب أن تكون :attribute ة تاريخ قبل أو يساوي :date .',
    'between' => [
        'numeric' => 'يجب أن تكون :attribute بين :min و :max .',
        'file' => 'يجب أن تكون :attribute بين: min و :max kilobytes .',
        'string' => 'يجب أن تكون :attribute بين :min و :max حروف .',
        'array' => 'يجب أن تكون :attribute بين :min و :max items .',
    ],
    'boolean' => 'يجب أن يكون حقل :attribute true أو false.',
    'confirmed' => 'لا يتطابق تأكيد :attribute.',
    'date' => ':attribute ليس تاريخًا صالحًا.',
    'date_equals' => ':يجب أن تكون :attribute تاريخ يساوي: date.',
    'date_format' => 'attribute: لا تتوافق مع التنسيق: التنسيق.',
    'different' => ' يجب أن تكون :attribute و أخرى مختلفة.',
    'digits' => 'يجب أن تكون :attribute ضغط :digits.',
    'digits_between' => 'يجب أن تكون :attribute بين :min و :max digits .',
    'dimensions' => 'attribute: لها أبعاد صورة غير صالحة.',
    'distinct' => 'يحتوي حقل :attribute قيمة مكررة.',
    'email' => 'يجب أن تكون :attribute عنوان بريد إلكتروني صالح.',
    'ends_with' => 'يجب أن تنتهي :attribute بإحدى القيم :values  القيم.',
    'exists' => 'attribute: المحددة غير صالحة.',
    'file' => 'يجب أن تكون :attribute ملفًا.',
    'filled' => 'يجب أن يحتوي حقل :attribute على قيمة.',
    'gt' => [
        'numeric' => 'يجب أن تكون :attribute أكبر من  :value .',
        'file' => 'يجب أن تكون :attribute :greater من القيمة بالكيلوبايت.',
        'string' => 'يجب أن تكون :attribute أكبر من :value الأحرف.',
        'array' => 'يجب أن تحتوي :attribute على عناصر أكثر من :value.',
    ],
    'gte' => [
        'numeric' => 'يجب أن تكون :attribute أكبر من أو تساوي :value.',
        'file' => 'يجب أن تكون :attribute أكبر من أو تساوي :value كيلو بايت.',
        'string' => 'يجب أن تكون :attribute أكبر من أو تساوي :value الشخصيات.',
        'array' => 'يجب أن تحتوي :attribute على عناصر أو أكثر :value .',
    ],
    'image' => 'يجب أن تكون :attribute صورة.',
    'in' => 'attribute: المحددة غير صالحة.',
    'in_array' => 'حقل :attribute غير موجود في :other .',
    'integer' => 'يجب أن تكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن تكون :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن تكون :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن تكون :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن تكون :attribute سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => 'يجب أن تكون :attribute أقل من :value.',
        'file' => 'يجب أن تكون :attribute أقل من :value بالكيلوبايت.',
        'string' => 'يجب أن تكون :attribute أقل من أحرف :value .',
        'array' => 'يجب أن تحتوي :attribute على عناصر أقل من :value .',
    ],
    'lte' => [
        'numeric' => 'attribute: يجب أن تكون أقل من أو تساوي: value.',
        'file' => 'يجب أن تكون :attribute أقل من أو تساوي :value بالكيلوبايت.',
        'string' => 'يجب أن تكون :attribute أقل من أو تساوي أحرف :value .',
        'array' => 'يجب ألا تحتوي :attribute على أكثر من عناصر :value .',
    ],
    'max' => [
        'numeric' => 'لا يجوز أن تكون :attribute أكبر من :max .',
        'file' => 'قد لا تكون :attribute أكبر من كيلوبايت :max أقصى.',
        'string' => ':لا يجوز أن تكون :attribute أكبر من: max الأقصى لعدد الأحرف.',
        'array' => 'لا يجوز أن تحتوي :attribute على أكثر من :max الأقصى للعناصر.',
    ],
    'mimes' => 'يجب أن تكون :attribute ملفًا من النوع :values .',
    'mimetypes' => 'يجب أن تكون :attribute ملفًا من النوع :values .',
    'min' => [
        'numeric' => 'يجب أن تكون :attribute: min على الأقل.',
        'file' => 'يجب أن تكون :attribute: min minobobes على الأقل.',
        'string' => 'يجب أن تكون :attribute الأقل :min  الأحرف.',
        'array' => 'يجب أن تحتوي :attribute على الأقل عناصر :min .',
    ],
    'not_in' => 'attribute: المحددة غير صالحة.',
    'not_regex' => 'تنسيق :attribute غير صالح.',
    'numeric' => 'يجب أن تكون :attribute رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب أن يكون حقل :attribute موجودًا.',
    'regex' => 'تنسيق :attribute غير صالح.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'حقل :attribute مطلوب عندما يكون :other يكون :value .',
    'required_unless' => 'حقل :attribute مطلوب إلا إذا كان :other يكون :value .',
    'required_with' => 'حقل :attribute مطلوب عند وجود القيم.',
    'required_with_all' => 'حقل :attribute مطلوب عندما :values موجودة.',
    'required_without' => 'حقل :attribute مطلوب عندما :values غير موجودة.',
    'required_without_all' => 'حقل :attribute مطلوب عند عدم وجود أي من :values .',
    'same' => 'يجب أن تتطابق :attribute و :other .',
    'size' => [
        'numeric' => 'يجب أن تكون :attribute سيز :size .',
        'file' => 'يجب أن تكون :attribute بالكيلوبايت :size .',
        'string' => 'يجب أن تكون :attribute الأحرف: :size .',
        'array' => 'يجب أن تحتوي :attribute على :size عناصر .',
    ],
    'starts_with' => 'يجب أن تبدأ attribute: بإحدى القيم التالية :values .',
    'string' => 'يجب أن تكون :attribute سلسلة.',
    'timezone' => 'يجب أن تكون :attribute منطقة صالحة.',
    'unique' => 'ال :attribute لقد اتخذت بالفعل.',
    'uploaded' => 'فشل :attribute في التحميل.',
    'url' => 'تنسيق :attribute غير صالح.',
    'uuid' => 'يجب أن تكون :attribute UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],

        //doctor opd charge keys
        'doctor_id' => [
            'unique' => 'تم أخذ اسم الطبيب بالفعل.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' => __('messages.user.email'),
        'last_name' => __('messages.user.last_name'),
        'first_name' => __('messages.user.first_name'),
        'password' => __('messages.department'),
        'gender' => __('messages.user.gender'),
        'city' => __('messages.user.city'),
        'zip' => __('messages.user.zip'),
        'name' => __('messages.common.name'),
        'status' => __('messages.account.status'),
        'description' => __('messages.account.description'),
        'patient_id' => __('messages.invoice.patient_id'),
        'receipt_no' => __('messages.advanced_payment.receipt_no'),
        'amount' => __('messages.advanced_payment.amount'),
        'date' => __('messages.advanced_payment.date'),
        'vehicle_number' => __('messages.ambulance.vehicle_number'),
        'vehicle_model' => __('messages.ambulance.vehicle_model'),
        'driver_contact' => __('messages.ambulance.driver_contact'),
        'year_made' => __('messages.ambulance.year_made'),
        'driver_license' => __('messages.ambulance.driver_license'),
        'doctor_id' => __('messages.ipd_patient.doctor_id'),
        'opd_date' => __('messages.appointment.opd_date'),
        'bed_type' => __('messages.bed.bed_type'),
        'charge' => __('messages.bed.charge'),
        'bed_id' => __('messages.bed.bed_id'),
        'case_id' => __('messages.bed_assign.case_id'),
        'assign_date' => __('messages.bed_assign.assign_date'),
        'discharge_date' => __('messages.bed_assign.discharge_date'),
        'title' => __('messages.document.title'),
        'bill_date' => __('messages.bill.bill_date'),
        'qty' => __('messages.bill.qty'),
        'price' => __('messages.bill.price'),
        'blood_group' => __('messages.user.blood_group'),
        'remained_bags' => __('messages.hospital_blood_bank.remained_bags'),
        'bags' => __('messages.blood_donation.bags'),
        'last_donate_date' => __('messages.blood_donation.last_donate_date'),
        'issue_date' => __('messages.blood_issue.issue_date'),
        'remarks' => __('messages.blood_issue.remarks'),
        'charge_type' => __('messages.charge_category.charge_type'),
        'code' => __('messages.charge.code'),
        'standard_charge' => __('messages.charge.standard_charge'),
        'currency_name' => __('messages.currency.currency_name'),
        'currency_code' => __('messages.currency.currency_code'),
        'currency_icon' => __('messages.currency.currency_icon'),
        'sr_no' => __('messages.employee_payroll.sr_no'),
        'payroll_id' => __('messages.employee_payroll.payroll_id'),
        'type' => __('messages.account.type'),
        'month' => __('messages.employee_payroll.month'),
        'year' => __('messages.employee_payroll.year'),
        'net_salary' => __('messages.employee_payroll.net_salary'),
        'basic_salary' => __('messages.employee_payroll.basic_salary'),
        'message' => __('messages.enquiry.message'),
        'expense_head' => __('messages.expense.expense_head'),
        'invoice_number' => __('messages.expense.invoice_number'),
        'short_description' => __('messages.short_description'),
        'about_us_title' => __('messages.front_setting.about_us_title'),
        'about_us_mission' => __('messages.front_setting.about_us_mission'),
        'about_us_image' => __('messages.front_setting.about_us_image'),
        'income_head' => __('messages.incomes.income_head'),
        'service_tax' => __('messages.insurance.service_tax'),
        'insurance_no' => __('messages.insurance.insurance_no'),
        'insurance_code' => __('messages.insurance.insurance_code'),
        'discount' => __('messages.insurance.discount'),
        'disease_name' => __('messages.insurance.diseases_name'),
        'disease_charge' => __('messages.insurance.diseases_charge'),
        'invoice_date' => __('messages.invoice.invoice_date'),
        'quantity' => __('messages.service.quantity'),
        'total_payments' => __('messages.dashboard.total_payments'),
        'gross_total' => __('messages.ipd_bill.gross_total'),
        'discount_in_percentage' => __('messages.ipd_bill.discount_in_percentage'),
        'tax_in_percentage' => __('messages.ipd_bill.tax_in_percentage'),
        'other_charges' => __('messages.ipd_bill.other_charges'),
        'net_payable_amount' => __('messages.ipd_bill.net_payable_amount'),
        'charge_type_id' => __('messages.ipd_patient_charges.charge_type_id'),
        'charge_category_id' => __('messages.ipd_patient_charges.charge_category_id'),
        'charge_id' => __('messages.ipd_patient_charges.charge_id'),
        'applied_charge' => __('messages.ipd_patient_charges.applied_charge'),
        'instruction' => __('messages.ipd_patient_consultant_register.instruction'),
        'instruction_date' => __('messages.ipd_patient_consultant_register.instruction_date'),
        'report_type' => __('messages.ipd_patient_diagnosis.report_type'),
        'report_date' => __('messages.ipd_patient_diagnosis.report_date'),
        'bed_type_id' => __('messages.ipd_patient.bed_type_id'),
        'weight' => __('messages.ipd_patient.weight'),
        'height' => __('messages.ipd_patient.height'),
        'bp' => __('messages.ipd_patient.bp'),
        'payment_mode' => __('messages.ipd_payments.payment_mode'),
        'notes' => __('messages.document.notes'),
        'category_id' => __('messages.ipd_patient_prescription.category_id'),
        'issued_by' => __('messages.issued_item.issued_by'),
        'issued_date' => __('messages.issued_item.issued_date'),
        'return_date' => __('messages.issued_item.return_date'),
        'unit' => __('messages.item.unit'),
        'consultation_title' => __('messages.live_consultation.consultation_title'),
        'consultation_date' => __('messages.live_consultation.consultation_date'),
        'consultation_duration_minutes' => __('messages.live_consultation.consultation_duration_minutes'),
        'type_number' => __('messages.live_consultation.type_number'),
        'to' => __('messages.common.to'),
        'subject' => __('messages.email.subject'),
        'selling_price' => __('messages.medicine.selling_price'),
        'buying_price' => __('messages.medicine.buying_price'),
        'side_effects' => __('messages.medicine.side_effects'),
        'salt_composition' => __('messages.medicine.salt_composition'),
        'appointment_date' => __('messages.opd_patient.appointment_date'),
        'rate' => __('messages.package.rate'),
        'test_name' => __('messages.radiology_test.test_name'),
        'short_name' => __('messages.radiology_test.short_name'),
        'test_type' => __('messages.radiology_test.test_type'),
        'policy_no' => __('messages.patient_admission.policy_no'),
        'fee' => __('messages.case.fee'),
        'payment_date' => __('messages.payment.payment_date'),
        'pay_to' => __('messages.payment.pay_to'),
        'from_title' => __('messages.postal.from_title'),
        'to_title' => __('messages.postal.to_title'),
        'reference_no' => __('messages.postal.reference_no'),
        'subcategory' => __('messages.radiology_test.subcategory'),
        'available_on' => __('messages.schedule.available_on'),
        'available_from' => __('messages.schedule.available_from'),
        'available_to' => __('messages.schedule.available_to'),
        'per_patient_time' => __('messages.schedule.per_patient_time'),
        'app_name' => __('messages.setting.app_name'),
        'company_name' => __('messages.setting.company_name'),
        'favicon' => __('messages.setting.favicon'),
        'zoom_api_key' => __('messages.live_consultation.zoom_api_key'),
        'zoom_api_secret' => __('messages.live_consultation.zoom_api_secret'),
        'dose_given_date' => __('messages.vaccinated_patient.dose_given_date'),
        'manufactured_by' => __('messages.vaccination.manufactured_by'),
        'brand' => __('messages.vaccination.brand'),
        'purpose' => __('messages.visitor.purpose'),
        'no_of_person' => __('messages.visitor.number_of_person'),
        'in_time' => __('messages.visitor.in_time'),
        'out_time' => __('messages.visitor.out_time'),
    ],

];