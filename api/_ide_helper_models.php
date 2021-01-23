<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\BotUser
 *
 * @property int $id
 * @property string $username
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BotUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|BotUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotUser whereUsername($value)
 */
	class BotUser extends \Eloquent {}
}

namespace App{
/**
 * App\Script
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UserScript[] $userScripts
 * @property-read int|null $user_scripts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Script newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Script newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Script query()
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereUpdatedAt($value)
 */
	class Script extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $api_token
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\UserScript
 *
 * @property int $id
 * @property int $userID
 * @property int $scriptID
 * @property-read \App\Script|null $script
 * @property-read \App\User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript whereScriptID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript whereUserID($value)
 */
	class UserScript extends \Eloquent {}
}

