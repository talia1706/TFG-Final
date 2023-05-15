<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $rol0 = Role::create(['name'=>'superusuario']);
        $rol1 = Role::create(['name'=>'admin']);
        $rol2 = Role::create(['name'=>'asociacion']);
        $rol3 = Role::create(['name'=>'particular']);
        /* $user = User::find(1);
        $user->assignRole($rol1); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
