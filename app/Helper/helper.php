<?php
use Illuminate\Support\Str;
use App\Models\Jobcategories;
use App\Models\Jobvacancy;
use App\Models\Facilities;
if (!function_exists('slugGenerate')) {
    function slugGenerate($title, $table) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('title', $title)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}
if (!function_exists('slugGenerateUpdate')) {
    function slugGenerateUpdate($title, $table, $productId) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('title', $title)->where('id', '!=', $productId)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}

?>