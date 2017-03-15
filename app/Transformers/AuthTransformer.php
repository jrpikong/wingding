<?php
/**
 * Created by PhpStorm.
 * User: jrpikong
 * Date: 11/03/17
 * Time: 14:39
 */
namespace App\Transformers;
use App\User;
use League\Fractal\TransformerAbstract;

class AuthTransformer extends TransformerAbstract
{

    public function transform(User $user)
    {
        return[
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'registered'    =>$user->created_at->diffForHumans(),
            'avatar'=> $user->avatar
        ];
    }
}