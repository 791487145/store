<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
/**
 * App\Model\Email
 *
 * @property int $id
 * @property int|null $admin_id
 * @property string|null $title 标题
 * @property string|null $describe 描述
 * @property string|null $content 内容
 * @property int|null $send_status 发送状态1未发送2已发送
 * @property int|null $time_type 时间类型1一次2每天
 * @property int|null $week_time 每周时间
 * @property string|null $send_time 发送时间
 * @property string|null $plan_send_time 计划发送时间
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email wherePlanSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereSendStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereTimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereWeekTime($value)
 * @mixin \Eloquent
 */
	class Email extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Menu
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 */
	class Menu extends \Eloquent {}
}

namespace App\Model{
/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * Class EmailLog
 *
 * @property int $id
 * @property int|null $email_id
 * @property int|null $status
 * @property array|null $result
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereUpdatedAt($value)
 */
	class EmailLog extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MemoAccount
 *
 * @property int $id
 * @property int|null $admin_id
 * @property string|null $name
 * @property string|null $account
 * @property string|null $psw
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount wherePsw($value)
 */
	class MemoAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MemoEmail
 *
 * @property int $id
 * @property int|null $admin_id
 * @property string|null $title
 * @property string|null $describe
 * @property string|null $content
 * @property int|null $send_status
 * @property int|null $time_type
 * @property int|null $week_time
 * @property string|null $send_time
 * @property string|null $plan_send_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail wherePlanSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereSendStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereTimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereWeekTime($value)
 */
	class MemoEmail extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MemoWebsite
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $url
 * @property string|null $describe
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite whereUrl($value)
 */
	class MemoWebsite extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ModelHasPermission
 *
 * @property int $permission_id
 * @property string $model_type
 * @property int $model_id
 * @property Permission $permission
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission wherePermissionId($value)
 */
	class ModelHasPermission extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ModelHasRole
 *
 * @property int $role_id
 * @property string $model_type
 * @property int $model_id
 * @property Role $role
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereRoleId($value)
 */
	class ModelHasRole extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|ModelHasPermission[] $model_has_permissions
 * @property Collection|Role[] $roles
 * @package App\Models
 * @property-read int|null $model_has_permissions_count
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|ModelHasRole[] $model_has_roles
 * @property Collection|Permission[] $permissions
 * @package App\Models
 * @property-read int|null $model_has_roles_count
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RoleHasPermission
 *
 * @property int $permission_id
 * @property int $role_id
 * @property Permission $permission
 * @property Role $role
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereRoleId($value)
 */
	class RoleHasPermission extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Wallpager
 *
 * @property int $id
 * @property string $large_image_url
 * @property string $image_id
 * @property string $tag
 * @property array $data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereLargeImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereUpdatedAt($value)
 */
	class Wallpager extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name 用户名
 * @property string $mobile 手机号
 * @property string $email 邮箱
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password 密码
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

