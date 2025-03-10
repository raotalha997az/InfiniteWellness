<?php

namespace App\Http\Livewire;

use App\Models\OpdDiagnosis;
use App\Models\dentalOpdDiagnosis;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\dentalOpdDiagnosesTable;
use Rappasoft\LaravelLivewireTables\Views\Column;

class dentalOpdDiagnosesTable extends LivewireTableComponent
{
    protected $model = OpdDiagnosis::class;

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public $opdDiagnoses;

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public function mount(string $opdDiagnoses): void
    {
        $this->opdDiagnoses = $opdDiagnoses;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('dental_opd_diagnoses.created_at', 'desc')
            ->setQueryStringStatus(false);
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('report_type') || $column->isField('opd_patient_department_id') || $column->isField('description')) {
                return [
                    'class' => 'pt-5',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [

            Column::make('Diagnosis', 'description')
                ->view('opd_patient_departments.columnsDiagnoses.description'),
            // Column::make(__('messages.ipd_patient_diagnosis.report_type'), 'report_type')
            //     ->searchable()
            //     ->sortable(),
            Column::make('Created Date', 'report_date')
                ->view('opd_patient_departments.columnsDiagnoses.report_date'),
            // Column::make(__('messages.ipd_patient_diagnosis.document'), 'opd_patient_department_id')
            //     ->view('opd_patient_departments.columnsDiagnoses.document'),
            
            Column::make(__('messages.common.action'), 'id')->view('opd_diagnoses.dentalAction'),

        ];
    }

    public function builder(): Builder
    {
    
        $query = dentalOpdDiagnosis::where('opd_patient_department_id', $this->opdDiagnoses);
        // $query = DB::table('dental_opd_diagnoses')->where('opd_patient_department_id', $this->opdDiagnoses);

        return $query;
    }
}
