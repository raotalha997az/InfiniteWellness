<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive-sm medicineTable">
            <table class="table table-striped" id="prescriptionMedicalTbl">
                <thead class="thead-dark">
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="">{{ __('messages.medicines') }}</th>
                        <th>Remaining Quantity</th>
                        <th class="">Dose</th>
                        <th class="">{{ __('messages.appointment.day') }}</th>
                        <th class="">{{ __('messages.prescription.time') }}</th>
                        <th class="">{{ __('messages.prescription.comment') }}</th>
                        <th class="">Route</th>
                        <th class="table__add-btn-heading text-center form-label fw-bolder text-gray-700 mb-3">
                            <a href="javascript:void(0)" type="button"
                                class="btn btn-primary text-star add-medicine-btn" id="addPrescriptionMedicineBtn">
                                {{ __('messages.common.add') }}
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="prescription-medicine-container">
                    @if (isset($prescription))
                    @php $indexs = 1; @endphp
                        @foreach ($PrescriptionMedicine as $index => $medicines)
                        <input type="hidden" name="category_id[]" value="{{ $medicines->category_id }}">
                            <tr>
                                <td>
                                    <select name="medicine[]" id="medicine{{ $indexs }}" onchange="SelectMedicine({{ $indexs }})"
                                    class="form-select prescriptionMedicineId">
                                    @foreach ($medicineList as $medic)
                                        <option value="{{ $medic['value']->id }}"
                                            data-totalQuantity="{{ $medic['value']->total_quantity }}"
                                            {{ $medic['value']->id == $medicines->medicine_id ? 'selected' : '' }}>
                                            {{ $medic['value']->name }}
                                        </option>
                                    @endforeach
                                </select>

                                </td>
                                <td>
                                    <span id="total_quantity{{ $indexs }}">{{$medicines->medicine['total_quantity'] ?? ''}}</span>
                                </td>
                                <td>
                                    {{ Form::text('dosage[]', $medicines->dosage, ['class' => 'form-control']) }}
                                </td>
                                <td>
                                    {{ Form::text('day[]', $medicines->day, ['class' => 'form-control']) }}
                                </td>
                                <td>
                                    {{ Form::select('time[]', \App\Models\Prescription::MEAL_ARR, $medicines->time, ['class' => 'form-select']) }}
                                </td>
                                <td>
                                    {{ Form::textarea('comment[]', $medicines->comment, ['class' => 'form-control', 'rows' => 1]) }}
                                </td>
                                <td>
                                    {{ Form::text('route[]', $medicines->route, ['class' => 'form-control']) }}
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" title="{{ __('messages.common.delete') }}"
                                        class="delete-prescription-medicine-item btn px-1 text-danger fs-3 pe-0">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @php $count = 1; @endphp
                        <tr>
                            <td>
                                <select name="medicine[]" id="medicine{{ $count }}" onchange="SelectMedicine({{ $count }})"
                                    class="form-select prescriptionMedicineId">
                                    <option value="" selected disabled>Select Medicine</option>
                                    @foreach ($medicines as $medicine)
                                        <option value="{{ $medicine->id }}"
                                            data-totalQuantity="{{ $medicine->total_quantity }}">
                                            {{ $medicine->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <span id="total_quantity{{ $count }}"></span>
                            </td>
                            <td>
                                {{ Form::text('dosage[]', null, ['class' => 'form-control']) }}
                            </td>
                            <td>
                                {{ Form::text('day[]', null, ['class' => 'form-control']) }}
                            </td>
                            <td>
                                {{ Form::select('time[]', \App\Models\Prescription::MEAL_ARR, null, ['class' => 'form-select']) }}
                            </td>
                            <td>
                                {{ Form::textarea('comment[]', null, ['class' => 'form-control', 'rows' => 1]) }}
                            </td>
                            <td>
                                {{ Form::text('route[]', null, ['class' => 'form-control']) }}
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" title="{{ __('messages.common.delete') }}"
                                    class="delete-prescription-medicine-item btn px-1 text-danger fs-3 pe-0">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    function SelectMedicine(id) {
        const selectMedicine = document.getElementById('medicine' + id);
        const totalQuantitySpan = document.getElementById('total_quantity' + id);
        const selectedOption = selectMedicine.options[selectMedicine.selectedIndex];
        const totalQuantity = selectedOption.getAttribute('data-totalQuantity');
        totalQuantitySpan.innerHTML = totalQuantity;
    }
</script>
<script id="prescriptionMedicineTemplate" type="text/x-jsrender">
    @if(isset($prescription))
    @php $indexs = 1; @endphp
                    @foreach($PrescriptionMedicine as $medicines)
                        <tr>
                            <td>
                                <select name="medicine[]" id="medicine{{ $indexs }}" onchange="SelectMedicine({{ $indexs }})"
                                class="form-select prescriptionMedicineId">
                                @foreach ($medicineList as $medic)
                                <option value="{{ $medic['value']->name }}"
                                    data-totalQuantity="{{ $medic['value']->total_quantity }}">
                                    {{ $medic['value']['name'] }}
                                </option>
                                @endforeach
                            </select>

                            </td>
                            <td>
                                <span id="total_quantity{{ $indexs }}">{{ $indexs }}</span>
                            </td>
                            <td>
                                {{ Form::text('dosage[]', $prescription->dosage, ['class' => 'form-control', 'id' => 'prescriptionMedicineNameId']) }}
                            </td>
                            <td>
                                {{ Form::text('day[]', $prescription->day, ['class' => 'form-control', 'id' => 'prescriptionMedicineDayId']) }}
                            </td>
                            <td>
                                {{ Form::select('time[]', \App\Models\Prescription::MEAL_ARR, $prescription->time,['class' => 'form-select prescriptionMedicineMealId']) }}
                            </td>
                            <td>
                                {{ Form::textarea('comment[]', $prescription->comment, ['class' => 'form-control', 'rows'=>1]) }}
                            </td>
                            <td>
                                {{ Form::text('route[]', null, ['class' => 'form-control']) }}
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" title="{{__('messages.common.delete')}}"
                                   class="delete-prescription-medicine-item btn px-1 text-danger fs-3 pe-0">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                {{$count = $count + 1 }}
                <tr>
                    <td>
                        <select name="medicine[]" id="medicine{{$count}}" onchange="SelectMedicine({{$count}})" class="form-select prescriptionMedicineId">
                            <option value="" selected disabled>Select Medicine</option>
                            @foreach ($medicines as $medicine)
                                <option value=" {{ $medicine->id }}" data-totalQuantity="{{ $medicine->total_quantity }}">
                                    {{ $medicine->name }}
                                </option>
                                @endforeach
                        </select>
                    </td>
                    <td>
                        <span  id="total_quantity{{$count}}"></span>
                    </td>
                    <td>
                        {{ Form::text('dosage[]', null, ['class' => 'form-control', 'id' => 'prescriptionMedicineNameId']) }}
                    </td>
                    <td>
                        {{ Form::text('day[]', null, ['class' => 'form-control', 'id' => 'prescriptionMedicineDayId']) }}
                    </td>
                    <td>
                        {{ Form::select('time[]', \App\Models\Prescription::MEAL_ARR, null,['class' => 'form-select prescriptionMedicineMealId']) }}
                    </td>
                    <td>
                        {{ Form::textarea('comment[]', null, ['class' => 'form-control', 'rows'=>1]) }}
                    </td>
                    <td>
                        {{ Form::text('route[]', null, ['class' => 'form-control']) }}
                    </td>
                    <td class="text-center">
                        <a href="javascript:void(0)" title=" {{__('messages.common.delete')}}"
                        class="delete-prescription-medicine-item btn px-1 text-danger fs-3 pe-0">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endif
</script>
