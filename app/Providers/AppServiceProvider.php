<?php

namespace App\Providers;

use App\Models\Candidate;
use App\Models\Employee;
use App\Models\JobPost;
use App\Models\User;
use App\Policies\CandidatePolicy;
use App\Policies\EmployeePolicy;
use App\Policies\JobPostPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('is_candidate', function (User $user) {
            return $user->role === "candidate";
        });
        Gate::define('is_employee', function (User $user) {
            return $user->role === "employee";
        });
        Gate::define('Action_employee', function (Employee $employee,JobPost $jobPost) {
            return $employee->id === $jobPost->employee_id;
        });

        Gate::policy(Employee::class,EmployeePolicy::class);
        Gate::policy(Candidate::class,CandidatePolicy::class);
        Gate::policy(JobPost::class,JobPostPolicy::class);
        Paginator::useBootstrap();

    }


}
