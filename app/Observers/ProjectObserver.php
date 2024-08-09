<?php

namespace App\Observers;

use App\Models\Classmember;
use App\Models\Project;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        $project->classmembers()->sync(Classmember::query()->pluck('id')->toArray());
    }

    public function deleting(Project $project): void
    {
        $project->classmembers()->detach();
    }
}
