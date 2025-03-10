<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DoctorTable extends LivewireTableComponent
{
    public $buttonComponent = 'doctors.add-button';

    public $filterButtonComponent = 'doctors.filter-button';

    public $FilterComponent = ['doctors.filter-button', Doctor::STATUS_ARR];

    protected $model = Doctor::class;

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('doctors.created_at', 'desc')
            ->setQueryStringStatus(false);

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('specialist') || $column->isField('qualification') || $column->isField('status')) {
                return [
                    'class' => 'p-5',
                ];
            }

            return [];
        });
    }

    public function changeFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->statusFilter = $value;
        $this->setBuilder($this->builder());
    }

    public function columns(): array
    {
        if (! Auth::user()->hasRole('Patient|Doctor|Case Manager|Nurse|Lab Technician|Pharmacist')) {
            $this->showButtonOnHeader = true;
            $this->showFilterOnHeader = true;
            $actionBtn = Column::make(__('messages.common.action'),
                'id')->view('doctors.action');
            $qualification = Column::make(__('messages.user.qualification'), 'doctorUser.qualification')
                ->view('doctors.templates.columns.qualification')
                ->sortable();
        } else {
            $this->showButtonOnHeader = false;
            $this->showFilterOnHeader = false;
            $actionBtn = Column::make(__('messages.common.action'), 'id')->hideIf(1);
            $qualification = Column::make(__('messages.user.qualification'),
                'doctorUser.qualification')->sortable()->hideIf(1);
        }

        $status = Auth::user()->hasRole('CSR');

        if($status == true){
            return [

                Column::make(__('messages.case.doctor'), 'doctorUser.first_name')
                    ->view('doctors.templates.columns.name')
                    ->searchable()
                    ->sortable(),
                Column::make(__('messages.doctor.specialist'), 'specialist')
                    ->searchable()
                    ->sortable(),
                $qualification,
            ];
        }else{


            return [

            Column::make(__('messages.case.doctor'), 'doctorUser.first_name')
                ->view('doctors.templates.columns.name')
                ->searchable()
                ->sortable(),
            Column::make(__('messages.doctor.specialist'), 'specialist')
                ->searchable()
                ->sortable(),
            $qualification,
            Column::make(__('messages.common.status'), 'doctorUser.status')
                ->view('doctors.templates.columns.status'),
            $actionBtn,
        ];
    }
    }

    public function builder(): Builder
    {
        /** @var Doctor $query */
        $role = Auth::user()->roles()->first();
        if($role->name == "Doctor"){
            $query = Doctor::query()->select('doctors.*')->where('doctor_user_id', Auth::user()->id)->with('doctorUser');

        }else if ($role->name == "Admin") {
            $query = Doctor::query()->select('doctors.*')->with('doctorUser');

        }
        else if ($role->name == "CSR") {
            $query = Doctor::query()->select('doctors.*')->with('doctorUser');

        }
        else if ($role->name == "Receptionist") {
            $query = Doctor::query()->select('doctors.*')->with('doctorUser');

        }
        else if ($role->name == "Nurse") {
            $query = Doctor::query()->select('doctors.*')->with('doctorUser');

        }
        $query->when(isset($this->statusFilter), function (Builder $q) {
            if ($this->statusFilter == 2) {
            }
            if ($this->statusFilter == 0) {
                $q->where('status', 1);
            }
            if ($this->statusFilter == 1) {
                $q->where('status', 0);
            }
        });

        return $query;
    }
}
