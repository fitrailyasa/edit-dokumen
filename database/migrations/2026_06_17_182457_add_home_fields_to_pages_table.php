<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('icon', 16)->nullable()->after('slug');
            $table->boolean('show_on_home')->default(false)->after('status');
            $table->unsignedSmallInteger('home_order')->default(0)->after('show_on_home');
            $table->boolean('is_featured')->default(false)->after('home_order');
            $table->string('icon_style', 32)->nullable()->after('is_featured');
            $table->json('highlights')->nullable()->after('icon_style');
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'icon',
                'show_on_home',
                'home_order',
                'is_featured',
                'icon_style',
                'highlights',
            ]);
        });
    }
};
