<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ✅ USERS (custom)
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');          // PK
            $table->unsignedBigInteger('property_id')->nullable()->index();

            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('role')->default('tenant')->index();  // super_admin, admin, tenant, ...
            $table->string('profile_image_url')->nullable();

            $table->string('otp_code')->nullable();
            $table->timestamp('otp_expiry')->nullable();

            $table->timestamps(); // created_at, updated_at
        });

        // ✅ PASSWORD RESET TOKENS (keep default)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // ✅ SESSIONS (database driver)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();

            // IMPORTANT: match users PK = user_id
            $table->unsignedBigInteger('user_id')->nullable()->index();

            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();

            // optional FK (safe)
            // $table->foreign('user_id')->references('user_id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
