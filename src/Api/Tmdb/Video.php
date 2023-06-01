<?php

namespace App\Api\Tmdb;

class Video extends AbstractApi
{
    public function getVideo($movieId) : array|null
    {
        $videos = $this->get(sprintf('movie/%s/videos', $movieId));

        return $videos['results'][0] ?? null;
    }
}
