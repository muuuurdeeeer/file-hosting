<?php

namespace App\Providers;

//use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Polici  es\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-admin-panel', function(?User $user){
            if($user){
                if($user->role == 'админ') {
                    return Response::allow();
                }
                return Response::deny('Вы не обладаете правами администратора');
            }
            return Response::deny('Вы не аутентифицированны');
        });

//        Gate::define('update-user-post', function(User $user, Post $post){
//            if($user->id == $post->user_id || $user->role == 'админ'){
//                return Response::allow();
//            }
//            return Response::deny('Вы не можете редактировать чужой пост');
//        });
//
//        Gate::define('delete-user-post', function(User $user, Post $post){
//            if($user->id == $post->user_id || $user->role == 'админ'){
//                return Response::allow();
//            }
//            return Response::deny('Вы не можете удалить чужой пост');
//        });
    }
}
