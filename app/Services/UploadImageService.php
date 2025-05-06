<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class UploadImageService
{
    public function uploadImage($url): bool
    {
        $user = Auth::user();
        $user->image = $url;

        $user->save();

        return true;
    }

    public function deleteUserImage(User $user): bool
    {
        if (!$user->image) {
            Log::warning("Попытка удалить аватар, которого нет у пользователя ID: {$user->id}");
            return false;
        }

            $user->image = null;
            $user->save();
        return false;
    }
}
