<?php
namespace App\Http\Controllers\Notifications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LogNotification\LogNotificationService;
use App\Services\LogNotification\LogNotificationDataGrid;
use App\Repositories\LogRepository;


class LogNotificationController extends Controller
{
    protected $logNotificationService;

    public function __construct()
    {
        $logRepository = new LogRepository();
        $this->logNotificationService = new LogNotificationService($logRepository);
    }

    public function pagination(Request $request)
    {
        $notificationId = (int) $request->route('id');
        
        $logDataGrid = new LogNotificationDataGrid();
        $data = $this->logNotificationService->pagination($logDataGrid,$notificationId);

        return $data;
    }
}
