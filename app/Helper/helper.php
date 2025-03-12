<?php
use Illuminate\Support\Str;
use App\Models\Jobcategories;
use App\Models\Jobvacancy;
use App\Models\Facilities;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Http\Controllers\DepartmentController;


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

// if (!function_exists('fileUpload')) {
//     function fileUpload($file, $folder = 'image') {
//         $fileName = mt_rand_custom(20);
//         $fileExtension = $file->getClientOriginalExtension();
//         $uploadPath = 'uploads/'.$folder.'/';
//         $filePath = $uploadPath.$fileName.'.'.$fileExtension;
//         $tmpPath = $file->getRealPath();
//         $mimeType = \File::mimeType($file);

//         if (!file_exists($uploadPath)) {
//             mkdir($uploadPath, 666, true);
//         }

//         // dd($fileName, $fileExtension, $uploadPath, $filePath);

//         // Handle images
//         if (in_array($fileExtension, ['jpeg', 'png', 'jpg', 'gif', 'webp'])) {
//             if (
//                 $fileExtension == "jpeg" ||
//                 $fileExtension == "png" ||
//                 $fileExtension == "jpg" ||
//                 $fileExtension == "webp"
//             ) {
//                 // THUMBNAIL CREATE HERE
//                 $smallImagePath = $uploadPath.$fileName.'_small-thumb_'.'.'.$fileExtension;
//                 $mediumImagePath = $uploadPath.$fileName.'_medium-thumb_'.'.'.$fileExtension;
//                 $largeImagePath = $uploadPath.$fileName.'_large-thumb_'.'.'.$fileExtension;

//                 createThumbnail($tmpPath, $smallImagePath, null, 100);
//                 createThumbnail($tmpPath, $mediumImagePath, null, 250);
//                 createThumbnail($tmpPath, $largeImagePath, null, 500);
//                 $largeOne = $largeImagePath;
//             } else {
//                 // THUMBNAIL CREATE HERE
//                 $smallImagePath = $uploadPath.$fileName.'_small-thumb_'.'.jpg';
//                 $mediumImagePath = $uploadPath.$fileName.'_medium-thumb_'.'.jpg';

//                 createThumbnail($tmpPath, $smallImagePath, null, 100);
//                 createThumbnail($tmpPath, $mediumImagePath, null, 250);
//                 // $file->move(public_path($uploadPath), $fileName.'.'.$fileExtension);
//                 $file->move($uploadPath, $fileName.'.'.$fileExtension);
//                 $largeOne = $filePath;
//             }

//             $resp = [
//                 'type' => $mimeType,
//                 'extension' => $fileExtension,
//                 'file' => [
//                     $smallImagePath,
//                     $mediumImagePath,
//                     $largeOne
//                 ],
//             ];
//         }
//         // Handle PDF, DOC, DOCX
//         elseif (in_array($fileExtension, ['pdf', 'doc', 'docx'])) {
//             // Move the file to the storage location
//             $file->move($uploadPath, $fileName.'.'.$fileExtension);
            
//             $resp = [
//                 'type' => $mimeType,
//                 'extension' => $fileExtension,
//                 'file' => [
//                     $filePath
//                 ],
//             ];
//         }
//         // Handle other file types (fallback)
//         else {
//             // $file->move(public_path($uploadPath), $fileName.'.'.$fileExtension);
//             $file->move($uploadPath, $fileName.'.'.$fileExtension);

//             $resp = [
//                 'type' => $mimeType,
//                 'extension' => $fileExtension,
//                 'file' => [
//                     $filePath
//                 ],
//             ];
//         }

//         return $resp;
//     }
// }

?>