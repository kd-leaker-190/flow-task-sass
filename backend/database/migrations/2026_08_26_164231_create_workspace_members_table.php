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
        Schema::create('workspace_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('workspace_id')->constrained('workspaces')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();

            $table->enum('status', ['active', 'removed'])->default('active');

            $table->timestamp('joined_at')->nullable();

            $table->unique(['workspace_id', 'user_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace_members');
    }
};
