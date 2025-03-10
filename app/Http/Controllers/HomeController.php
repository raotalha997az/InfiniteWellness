<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bed;
use App\Models\Pos;
use App\Models\Bill;
use App\Models\Nurse;
use App\Models\Doctor;
use App\Models\Module;
use App\Models\Enquiry;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\PosReturn;
use Illuminate\View\View;
use App\Models\Appointment;
use App\Models\NoticeBoard;
use Illuminate\Http\Request;
use App\Models\AdvancedPayment;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\Factory;
use App\Repositories\DashboardRepository;

class HomeController extends AppBaseController
{
    private $dashboardRepository;

    /**
     * Create a new controller instance.
     */
    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->middleware('auth');
        $this->dashboardRepository = $dashboardRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Factory|View
     */
    public function index()
    {

        return view('home');
    }

    /**
     * @return Factory|View
     */
    public function dashboard()
    {
        
            //    $data['invoiceAmount'] = Invoice::sum('amount');
        $doctorTodayAppointments = null;
        $doctorWeekAppointments = null;
        $doctorMonthAppointments = null;
        $today = Carbon::now();
        $weekStart = Carbon::now()->startOfWeek()->startOfDay(); // Monday 00:00:00
        $weekEnd = Carbon::now()->endOfWeek()->endOfDay(); // Sunday 23:59:59

        $monthStart = $today->copy()->startOfMonth()->startOfDay();
        $monthEnd = $today->copy()->endOfMonth()->endOfDay();

        $PosAmount = Pos::where('is_paid', 1)->sum('total_amount');
        $billAmount = Bill::sum('amount');
        $PosReturn = PosReturn::sum('total_amount');
        $totalAmount = $PosAmount + $billAmount - $PosReturn;
        $data['invoiceAmount'] = totalAmount();
        $data['billAmount'] = $totalAmount;
        $data['paymentAmount'] = Payment::sum('amount');
        $data['advancePaymentAmount'] = AdvancedPayment::sum('amount');
        $data['doctors'] = Doctor::count();
        $data['patients'] = Patient::count();
        $data['nurses'] = Nurse::count();
        $data['availableBeds'] = Bed::whereIsAvailable(1)->count();
        $data['noticeBoards'] = NoticeBoard::take(5)->orderBy('id', 'DESC')->get();
        $data['enquiries'] = Enquiry::where('status', 0)->latest()->take(5)->get();
        $data['currency'] = Setting::CURRENCIES;
        $modules = Module::pluck('is_active', 'name')->toArray();

        $doctor = Doctor::where('doctor_user_id',auth()->user()->id)->first();
        if ($doctor) {
            // dd($doctor->id);
            // $doctorTodayAppointments = Appointment::where('doctor_id', $doctor->id)->whereDate('opd_date', date('Y-m-d'))->count();
            $doctorTodayAppointments = Appointment::where('doctor_id', $doctor->id)->whereDate('opd_date', $today->toDateString())->count();
            $doctorWeekAppointments = Appointment::where('doctor_id', $doctor->id)->whereBetween('opd_date', [$weekStart, $weekEnd])->count();  
            $doctorMonthAppointments = Appointment::where('doctor_id', $doctor->id)->whereBetween('opd_date', [$monthStart, $monthEnd])->count();
        }

        return view('dashboard.index', compact('data', 'modules','doctorTodayAppointments', 'doctorWeekAppointments', 'doctorMonthAppointments'));
    }

    /**
     * @return JsonResponse
     */
    public function incomeExpenseReport(Request $request)
    {
        $data = $this->dashboardRepository->getIncomeExpenseReport($request->all());

        return $this->sendResponse($data, 'Income and Expense report retrieved successfully.');
    }
}
