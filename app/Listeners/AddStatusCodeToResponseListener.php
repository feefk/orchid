<?php

namespace App\Listeners;

use Dingo\Api\Event\ResponseWasMorphed;

class AddStatusCodeToResponseListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ResponseWasMorphed  $event
     * @return void
     */
    public function handle(ResponseWasMorphed $event)
    {
        $content = $event->response->getContent();
        // 如果返回值不是数组,则返回
        if (!is_array($content)) {
            return;
        }

        if (!isset($content['status_code'])) {
            $event->response->setContent(array_merge(['data' => $content], ['status_code' => 0, 'message' => 'success!']));
        }

        if (isset($content['status_code']) && isset($content['code'])) {
            $event->response->statusCode(200);
            $statusCode = $content['code'];
            unset($content['code']);
            $event->response->setContent(['status_code' => $statusCode, 'message' => $content['message']]);
        }
    }
}
