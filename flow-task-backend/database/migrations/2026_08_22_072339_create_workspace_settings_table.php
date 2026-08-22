<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workspace_settings', function (Blueprint $table) {
            $table->foreignId('workspace_id')->constrained('workspaces')->cascadeOnDelete();

            $table->foreignId('default_role_id')->constrained('roles')->cascadeOnDelete();

            $table->boolean('allow_self_register')->default(false);
            $table->unsignedBigInteger('max_members')->default(0);

            $table->primary('workspace_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace_settings');
    }
};
