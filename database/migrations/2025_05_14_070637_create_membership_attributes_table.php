<?php

use App\Models\Munio\Organization\Organization;
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
        Schema::create('membership_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Organization::class);
            $table->string('fieldname');
            $table->string('label');
            $table->string('type');
            $table->json('options')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_private')->default(false);
            $table->boolean('is_required')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
