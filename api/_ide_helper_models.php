<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BotExperience
 *
 * @property int $id
 * @property int $scriptID
 * @property int $botUserID
 * @property int $skillID
 * @property int $exp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience query()
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience whereBotUserID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience whereExp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience whereScriptID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience whereSkillID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotExperience whereUpdatedAt($value)
 */
	class BotExperience extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BotItem
 *
 * @property int $id
 * @property int $scriptID
 * @property int $botUserID
 * @property int $itemID
 * @property int $amount
 * @property int $itemStatusID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem whereBotUserID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem whereItemID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem whereItemStatusID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem whereScriptID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotItem whereUpdatedAt($value)
 */
	class BotItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BotLog
 *
 * @property int $id
 * @property int $scriptID
 * @property int $botUserID
 * @property string $version
 * @property string $mirror
 * @property string $log
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog whereBotUserID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog whereLog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog whereMirror($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog whereScriptID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotLog whereVersion($value)
 */
	class BotLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BotRuntime
 *
 * @property int $id
 * @property int $scriptID
 * @property int $botUserID
 * @property int $duration
 * @property string $version
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime query()
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime whereBotUserID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime whereScriptID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BotRuntime whereVersion($value)
 */
	class BotRuntime extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BotUser
 *
 * @property int $id
 * @property string $username
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BotExperience[] $experience
 * @property-read int|null $experience_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BotLog[] $logs
 * @property-read int|null $logs_count
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

namespace App\Models{
/**
 * App\Models\Item
 *
 * @property int $id
 * @property string $itemName
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereItemName($value)
 */
	class Item extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ItemStatus
 *
 * @property int $id
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|ItemStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemStatus whereStatus($value)
 */
	class ItemStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Script
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserScript[] $userScripts
 * @property-read int|null $user_scripts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Script newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Script newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Script query()
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereName($value)
 */
	class Script extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Skill
 *
 * @property int $id
 * @property string $skillName
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereSkillName($value)
 */
	class Skill extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
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

namespace App\Models{
/**
 * App\Models\UserScript
 *
 * @property int $id
 * @property int $userID
 * @property int $scriptID
 * @property-read \App\Models\Script|null $script
 * @property-read \App\Models\User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript whereScriptID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserScript whereUserID($value)
 */
	class UserScript extends \Eloquent {}
}

