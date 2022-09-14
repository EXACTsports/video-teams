<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        $videos = json_decode(file_get_contents(__DIR__ . '/../videos.json'), true);

        foreach ($videos as $video) {
            \App\Models\GameVideo::create($video);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_videos');
    }
};
