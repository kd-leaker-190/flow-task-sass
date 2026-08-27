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
        Schema::create('workspace_invitations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('workspace_id')->constrained('workspaces')->cascadeOnDelete();
            $table->foreignId('invited_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();

            $table->string('email');

            $table->string('token', 64)->unique();

            $table->enum('status', ['pending', 'accepted', 'rejected', 'expired', 'cancelled'])->default('pending');

            $table->timestamp('expires_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->index(['workspace_id', 'email', 'status']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace_invitations');
    }
};
