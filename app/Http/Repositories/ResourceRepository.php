<?php

namespace App\Http\Repositories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Collection;

class ResourceRepository
{
    public function all(): Collection
    {
        return Resource::all();
    }

    public function getUsers(): Collection
    {
        return $this->all()->filter(function ($value, $key) {
            if (str_contains($value, 'user')) {
                return $value;
            }
        });
    }

    public function getNews(): Collection
    {
        return $this->all()->filter(function ($value, $key) {
            if (str_contains($value, 'news')) {
                return $value;
            }
        });
    }
}
