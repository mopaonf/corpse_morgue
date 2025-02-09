<?php 
namespace App\Http\Controllers;

use App\Models\Obituary;
use App\Models\Funeral;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'obituariesCount' => Obituary::count(),
            'funeralsCount' => Funeral::count(),
            'appointmentsCount' => Appointment::count(),
            'obituariesGrowth' => $this->calculateGrowth(Obituary::class),
            'upcomingFunerals' => Funeral::where('date', '>=', now())->count(),
            'todayAppointments' => Appointment::whereDate('date', now()->toDateString())->count(),
            'monthlyRevenue' => $this->calculateMonthlyRevenue(),
            'revenueGrowth' => $this->calculateRevenueGrowth(),
            'recentActivities' => $this->getRecentActivities(),
        ];

        return view('admin.dashboard', $data);
    }

    private function calculateGrowth($model)
    {
        $currentMonth = $model::whereMonth('created_at', now()->month)->count();
        $lastMonth = $model::whereMonth('created_at', now()->subMonth()->month)->count();
        if ($lastMonth == 0) {
            return $currentMonth > 0 ? 100 : 0;
        }
        return (($currentMonth - $lastMonth) / $lastMonth) * 100;
    }

    private function calculateMonthlyRevenue()
    {
        // Implement your logic to calculate monthly revenue
        return 5000000; // Example value
    }

    private function calculateRevenueGrowth()
    {
        // Implement your logic to calculate revenue growth
        return 10; // Example value
    }

    private function getRecentActivities()
    {
        // Implement your logic to get recent activities
        return collect([
            (object)[
                'type_color' => 'bg-blue-500',
                'icon' => 'O',
                'description' => 'New obituary added for John Doe',
                'created_at' => now()->subMinutes(10),
            ],
            (object)[
                'type_color' => 'bg-green-500',
                'icon' => 'F',
                'description' => 'Funeral scheduled for Jane Smith',
                'created_at' => now()->subHours(2),
            ],
        ]);
    }

    public function obituaries()
    {
        $obituaries = Obituary::latest()->paginate(10);
        return view('admin.obituaries.index', compact('obituaries'));
    }

    public function funerals()
    {
        $funerals = Funeral::with('obituary')->latest()->paginate(10);
        return view('admin.funerals.index', compact('funerals'));
    }

    public function appointments()
    {
        $appointments = Appointment::with('funeral')->latest()->paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }

    public function createObituary(Request $request)
    {
        $obituary = Obituary::create($request->all());
        return response()->json($obituary);
    }

    public function updateObituary(Request $request, $id)
    {
        $obituary = Obituary::findOrFail($id);
        $obituary->update($request->all());
        return response()->json($obituary);
    }

    public function deleteObituary($id)
    {
        $obituary = Obituary::findOrFail($id);
        $obituary->delete();
        return response()->json('Obituary deleted successfully');
    }

    public function createFuneral(Request $request)
    {
        $funeral = Funeral::create($request->all());
        return response()->json($funeral);
    }

    public function updateFuneral(Request $request, $id)
    {
        $funeral = Funeral::findOrFail($id);
        $funeral->update($request->all());
        return response()->json($funeral);
    }

    public function deleteFuneral($id)
    {
        $funeral = Funeral::findOrFail($id);
        $funeral->delete();
        return response()->json('Funeral deleted successfully');
    }

    public function createAppointment(Request $request)
    {
        $appointment = Appointment::create($request->all());
        return response()->json($appointment);
    }

    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());
        return response()->json($appointment);
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json('Appointment deleted successfully');
    }

    public function createObituaryForm()
    {
        return view('admin.obituaries.create');
    }

    public function createFuneralForm()
    {
        $obituaries = Obituary::all();
        return view('admin.funerals.create', compact('obituaries'));
    }

    public function createAppointmentForm()
    {
        $funerals = Funeral::with('obituary')->get();
        return view('admin.appointments.create', compact('funerals'));
    }

    public function generateReport()
    {
        return view('admin.reports.generate');
    }

    public function reports()
    {
        return view('admin.reports.index');
    }

    public function downloadReport(Request $request)
    {
        $request->validate([
            'report_type' => 'required|string',
            'date_range' => 'required|string',
            'format' => 'required|in:pdf,excel,csv',
            'start_date' => 'required_if:date_range,custom|date',
            'end_date' => 'required_if:date_range,custom|date|after_or_equal:start_date',
        ]);

        // Implement report generation logic here
        // Return the generated report file
        return response()->download('path/to/generated/report');
    }
}
