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
 * App\Models\Day
 *
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property float $water
 * @property int $first_missed
 * @property float $first_fat
 * @property int $second_missed
 * @property float $second_fat
 * @method static \Illuminate\Database\Eloquent\Builder|Day newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Day newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Day query()
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereFirstFat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereFirstMissed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereSecondFat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereSecondMissed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereWater($value)
 */
	class Day extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Note
 *
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property string $text
 * @method static \Illuminate\Database\Eloquent\Builder|Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note query()
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereUserId($value)
 */
	class Note extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $confirmation_code
 * @property string|null $api_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

