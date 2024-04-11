<?php
namespace App\Http\Controllers\Notifications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryService;
use App\Services\Users\UserService;
use App\Services\LogNotification\LogNotificationService;
use App\Services\Notifications\NotificationService;
use App\Services\Notifications\NotificationDataGrid;
use App\Services\Notifications\NotificationProcessSendMessages;
use App\Repositories\LogRepository;
use App\Repositories\UserRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\CategoryRepository;
use App\Dtos\NotificationDto;
use App\Libraries\FactoryLibrary;
use App\Libraries\DictionaryLibrary;

class NotificationController extends Controller
{
    protected $notificationService;
    protected $categoryService;
    protected $notificationProccessSend;

    public function __construct()
    {
        $userRepository = new UserRepository();
        $categoryRepository = new CategoryRepository();
        $logRepository = new LogRepository();
        $notificationRepository = new NotificationRepository();
        
        $factoryLibrary = new FactoryLibrary();
        $dictionaryLibrary = new DictionaryLibrary();

        $userService = new UserService($userRepository);
        $logNotificationService = new LogNotificationService($logRepository);
        
        $this->categoryService = new CategoryService($categoryRepository);
        $this->notificationService = new NotificationService($notificationRepository);
        $this->notificationProccessSend = new NotificationProcessSendMessages($userService, $logNotificationService, $dictionaryLibrary, $factoryLibrary);
    }

    public function index()
    {
        return view('notifications.index');
    }

    public function pagination()
    {
        $notificationDataGrid = new NotificationDataGrid();

        $data = $this->notificationService->pagination($notificationDataGrid);

        return $data;
    }

    public function create()
    {
        $categories = $this->categoryService->findAll();

        return view('notifications.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $dto = new NotificationDto($request->all());

        $result = $this->notificationService->create($dto);

        if($result) {
            $this->notificationProccessSend->send($result);
        }

        return response()->json($result);
    }

    public function edit($id)
    {
        $notification = $this->notificationService->findById($id);
        $categories = $this->categoryService->findAll();

        return view('notifications.edit', compact('notification', 'categories'));
    }
}
