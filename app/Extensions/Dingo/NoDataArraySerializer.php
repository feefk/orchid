<?php
/**
 * Created by PhpStorm.
 * User: feefk
 * Date: 31/03/2017
 * Time: 7:26 PM
 */

namespace App\Extensions\Dingo;

use League\Fractal\Serializer\ArraySerializer;

class NoDataArraySerializer extends ArraySerializer
{
    /**
     * Serialize a collection.
     *
     * @param string $resourceKey
     * @param array  $data
     *
     * @return array
     */
    public function collection($resourceKey, array $data)
    {
        return ($resourceKey) ? [$resourceKey => $data] : $data;
    }

    /**
     * Serialize an item.
     *
     * @param string $resourceKey
     * @param array  $data
     *
     * @return array
     */
    public function item($resourceKey, array $data)
    {
        return ($resourceKey) ? [$resourceKey => $data] : $data;
    }
}