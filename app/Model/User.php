<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setKeyName('pycid');
    }

    /**
     * Check User has Permission
     *
     * @param string $permission Permission Name.
     *
     * @return bool Auth or not.
     */
    public function hasPermission($permission)
    {
        $permission = Permission::select('id')
            ->where(['name' => $permission])
            ->first();
        $id = $permission->id;
        $auth = DB::table('user_auth')
            ->select(['active'])
            ->where([
                'pycid' => $this->pycid,
                'permission' => $id
            ])->first();
        return null !== $auth && $auth->active;
    }

    /**
     * Get post in the community.
     *
     * @param string $community
     *
     * @return string post or null
     */
    public function getCommunityPost($community)
    {
        $community = Community::select('id')
            ->where(['name' => $community])
            ->first();

        $community = $community->id;

        $committee = Committee::select('post')
            ->where([
                'pycid' => $this->pycid,
                'community' => $community
            ])
            ->first();

        if (null === $committee) {
            return null;
        }

        return $committee->post;
    }

    public function hasCommunityAuth($community, $permission)
    {
        $post = $this->getCommunityPost($community);

        $community = Community::select('id')
            ->where(['name' => $community])
            ->first();

        $community = $community->id;

        $permission = Permission::select('id')
            ->where(['name' => $permission])
            ->first();
        $id = $permission->id;

        $auth = DB::table('community_permission')
            ->select('active')
            ->where([
                'community' => $community,
                'post' => $post,
                'permission' => $id
            ])
            ->first();

        return null !== $auth && $auth->active;
    }
    
}
