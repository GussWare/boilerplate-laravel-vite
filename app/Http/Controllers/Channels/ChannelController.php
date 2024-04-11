<?php

namespace App\Http\Controllers\Channels;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Channels\ChannelService;
use App\Services\Channels\ChannelDataGrid;
use App\Dtos\ChannelDto;
use App\Repositories\ChannelRepository;
use App\Http\Requests\Validations\Channels\CreateChannelRequest;
use App\Http\Requests\Validations\Channels\UpdateChannelRequest;
use Illuminate\Support\Facades\Log;


class ChannelController extends Controller
{
    protected $channelService;

    public function __construct()
    {
        $channelRepository = new ChannelRepository();

        $this->channelService = new ChannelService($channelRepository);
    }

    public function index()
    {
        return view('channels.index');
    }

    public function pagination(Request $request)
    {
        $notificationDataGrid = new ChannelDataGrid();

        $data = $this->channelService->pagination($notificationDataGrid);

        return $data;
    }

    public function create()
    {
        return view('channels.create');
    }

    public function store(CreateChannelRequest $request)
    {
        $dto = new ChannelDto($request->all());

        $result = $this->channelService->create($dto);

        return response()->json($result);
    }

    public function edit($id)
    {
        $channel = $this->channelService->findById($id);

        return view('channels.edit', compact('channel'));
    }

    public function update(UpdateChannelRequest $request, $id)
    {
        $dto = new ChannelDto($request->all());

        $result = $this->channelService->update($id, $dto);

        return response()->json($result);
    }


    public function destroy($id)
    {
        $result = $this->channelService->delete($id);

        return response()->json($result);
    }
}
