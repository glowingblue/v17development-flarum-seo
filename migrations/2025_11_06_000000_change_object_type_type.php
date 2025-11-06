<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        $schema->table('seo_meta', function (Blueprint $table) {
            $table->dropUnique(['object_id', 'object_type']);

            $table->string('object_type', 255)->change();

            $table->unique(['object_id', 'object_type']);
        });
    },
    'down' => function (Builder $schema) {
        if ($schema->hasTable('seo_meta')) {
            $schema->table('seo_meta', function (Blueprint $table) {
                $table->dropUnique(['object_id', 'object_type']);

                $table->string('object_type', 65535)->change();

                $table->unique(['object_id', 'object_type']);
            });
        }
    },
];
