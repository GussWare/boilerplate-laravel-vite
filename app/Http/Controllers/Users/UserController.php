<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Users\UserService;
use App\Services\Users\UserDataGrid;
use App\Services\Channels\ChannelService;
use App\Services\Categories\CategoryService;
use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ChannelRepository;
use App\Http\Requests\Validations\Users\CreateUserRequest;
use App\Http\Requests\Validations\Users\UpdateUserRequest;
use App\Dtos\UserDto;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    protected $userService;
    protected $channelService;
    protected $categoryService;

    public function __construct()
    {
        $userRepository = new UserRepository();
        $channelService = new ChannelRepository();
        $CategoryRepository = new CategoryRepository();

        $this->userService = new UserService($userRepository);
        $this->channelService = new ChannelService($channelService);
        $this->categoryService = new CategoryService($CategoryRepository);
    }

    public function index()
    {
        return view('users.index');
    }

    public function pagination(Request $request)
    {
        $notificationDataGrid = new UserDataGrid();

        $data = $this->userService->pagination($notificationDataGrid);

        return $data;
    }

    public function create()
    {
        $categories = $this->categoryService->findAll();
        $channels = $this->channelService->findAll();

        return view('users.create', compact('categories', 'channels'));
    }

    public function store(CreateUserRequest $request)
    {
        $dto = new UserDto($request->all());

        $result = $this->userService->create($dto);

        return response()->json($result);
    }

    public function edit($id)
    {
        $user = $this->userService->findById($id);
        if(! $user) {
            throw new \Exception('User not found');
        }
        $categories = $this->categoryService->findAll();
        $channels = $this->channelService->findAll();

        return view('users.edit', compact('user', 'categories', 'channels'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $dto = new UserDto($request->all());

        $result = $this->userService->update($id, $dto);

        return response()->json($result);
    }


    public function destroy($id)
    {
        $result = $this->userService->delete($id);

        return response()->json($result);
    }
}
