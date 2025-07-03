<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Panel;
use Illuminate\Support\Facades\File;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use Notifiable, HasRoles;

    protected $emailList = [
        'gmail.com',
        'yahoo.com',
        'hotmail.com',
        'outlook.com',
    ];

    protected $fillable = [
        'name',
        'id',
        'email',
        'avatar',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getEmailDomain($email)
    {
        $array = explode('@', $email);
        return $array[1];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return in_array($this->getEmailDomain($this->email), $this->emailList); // && $this->hasVerifiedEmail();
        }

        return true;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        if ($this->avatar == null) {
            $defaultAvatarProvider = new \Filament\AvatarProviders\UiAvatarsProvider();
            return $defaultAvatarProvider->get($this);
        } else {
            return asset('storage/' . $this->avatar);
        }
    }

    public function delete()
    {
        if (!is_null(File::exists('storage/' . $this->avatar))) {
            File::delete('storage/' . $this->avatar);
        }

        Parent::delete();
    }
}
