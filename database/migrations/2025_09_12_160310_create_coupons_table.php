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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->foreignId('tutor_id')->nullable();
            $table->unsignedInteger('uses')->default(0)->comment = "The number of uses currently";
            $table->unsignedInteger('max_uses')->nullable()->comment = "The max uses this voucher has";
            $table->unsignedInteger('discount');
            $table->boolean('is_fixed')->default( true);
            $table->decimal('budget', 64, 0)->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active')->index();
            $table->timestamp('start_at')->default(now());
            $table->timestamp('expire_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
