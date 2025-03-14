<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        if (Schema::hasTable('order_status_tracks')) { 
            DB::statement("ALTER TABLE order_status_tracks ADD COLUMN performer_point public.geometry(Point, 4326);");
            DB::statement("ALTER TABLE order_status_tracks ADD COLUMN order_start_point public.geometry(Point, 4326);");
            DB::statement("ALTER TABLE order_status_tracks ADD COLUMN order_end_point public.geometry(Point, 4326);");
            DB::statement("ALTER TABLE order_status_tracks ADD COLUMN route_start public.geometry(Linestring, 4326);");
            DB::statement("ALTER TABLE order_status_tracks ADD COLUMN route_end public.geometry(Linestring, 4326);");
        }
    }

    public function down() {
        if (Schema::hasTable('order_status_tracks')) {
            DB::statement("ALTER TABLE order_status_tracks DROP COLUMN IF EXISTS performer_point;");
            DB::statement("ALTER TABLE order_status_tracks DROP COLUMN IF EXISTS order_start_point;");
            DB::statement("ALTER TABLE order_status_tracks DROP COLUMN IF EXISTS order_end_point;");
            DB::statement("ALTER TABLE order_status_tracks DROP COLUMN IF EXISTS route_start;");
            DB::statement("ALTER TABLE order_status_tracks DROP COLUMN IF EXISTS route_end;");
        }
    }
};


