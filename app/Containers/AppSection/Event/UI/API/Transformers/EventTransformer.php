<?php

namespace App\Containers\AppSection\Event\UI\API\Transformers;

use App\Containers\AppSection\Event\Models\Event;
use App\Ship\Parents\Transformers\Transformer;

class EventTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(Event $event): array
    {
        $response = [
            'object' => $event->getResourceKey(),
            'id' => $event->getHashedKey(),

            'title' => $event->title,
            'sms_template' => $event->sms_template,

            'created_at' => $event->created_at,
            'updated_at' => $event->updated_at,
            'readable_created_at' => $event->created_at->diffForHumans(),
            'readable_updated_at' => $event->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $event->id,
            // 'deleted_at' => $event->deleted_at,
        ], $response);

        return $response;
    }
}
