<?php

namespace App\Services\Notifications;

use App\Services\Users\UserService;
use App\Services\LogNotification\LogNotificationService;
use App\Libraries\FactoryLibrary;
use App\Libraries\DictionaryLibrary;
use App\Dtos\LogNotificationDto;

use Illuminate\Support\Facades\Log;

class NotificationProcessSendMessages
{
    protected $userService;
    protected $logNotificationService;
    protected $dictionaryLibrary;
    protected $factoryLibrary;

    public function __construct(UserService $userService, LogNotificationService $logNotificationService, DictionaryLibrary $dictionaryLibrary, FactoryLibrary $factoryLibrary)
    {
        $this->userService = $userService;
        $this->logNotificationService = $logNotificationService;
        $this->factoryLibrary = $factoryLibrary;
        $this->dictionaryLibrary = $dictionaryLibrary;
    }


    public function send($notification)
    {
        $config = config("factory.channels", null);

        if (!$config) {
            throw new \Exception("No se encontraron canales configurados");
        }

        foreach ($config as $key => $channel) {
            $objChannel = $this->factoryLibrary->create($channel['class']);

            if ($objChannel) {
                $this->dictionaryLibrary->addItem($key, $objChannel);
            }
        }

        $users = $this->userService->findByCategories([$notification->category_id]);

        foreach ($users as $user) {
            foreach ($user->channels as $channel) {
                if (isset($channel->slug) && $channel->slug) {
                    $objChannel = $this->dictionaryLibrary->getItem($channel->slug);

                    if ($objChannel) {
                        $response = $objChannel->send($user, $notification);

                        $dto = new LogNotificationDto();
                        $dto->notification_id = $notification->id;
                        $dto->user_id = $user->id;
                        $dto->channel_id = $channel->id;
                        $dto->response = $response;
                        $dto->status = true;

                        $this->logNotificationService->create($dto);
                    }
                }
            }
        }

        return true;
    }
}
