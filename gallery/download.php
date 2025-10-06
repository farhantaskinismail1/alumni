<?php
// ফোল্ডারের নাম URL থেকে নাও
$folder_name = isset($_GET['folder']) ? $_GET['folder'] : '';

// নিরাপত্তার জন্য ইনপুট ক্লিন করো
$safe_folder_name = preg_replace('/[^a-zA-Z0-9_\-]/', '', $folder_name);

if (empty($safe_folder_name) || !is_dir($safe_folder_name)) {
    die("Error: Folder not found or invalid name.");
}

$folder_path = $safe_folder_name;
$zip_file_name = $safe_folder_name . '_gallery.zip';

// ZipArchive ক্লাস আছে কিনা চেক করো
if (!class_exists('ZipArchive')) {
    die("Error: ZipArchive class not available on this server. Please enable it in php.ini.");
}

$zip = new ZipArchive();
// জিপ ফাইলটি তৈরি করো (যদি না থাকে) বা ওভাররাইট করো (যদি থাকে)
if ($zip->open($zip_file_name, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
    die("Error: Cannot create zip file.");
}

// ফোল্ডারের ভেতরের ফাইলগুলো যোগ করার জন্য রিকার্সিভ ফাংশন
function addFilesToZip($folder, $zip, $rootPath) {
    //RecursiveDirectoryIterator ব্যবহার করে ফোল্ডারের ভেতরের সমস্ত ফাইল খুঁজে বের করা
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($folder),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        // ডিরেক্টরিগুলো বাদ দাও
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            // জিপের মধ্যে পাথ তৈরি করা যাতে অপ্রয়োজনীয় ডিরেক্টরি না আসে
            $relativePath = substr($filePath, strlen($rootPath) + 1);

            // জিপ ফাইলে ফাইলটি যোগ করো
            $zip->addFile($filePath, $relativePath);
        }
    }
}

// জিপ ফাইলে ফোল্ডারের ভেতরের কন্টেন্ট যোগ করো
addFilesToZip($folder_path, $zip, $folder_path);

// জিপ ফাইলটি বন্ধ করো (এতে ফাইল লেখা সম্পন্ন হয়)
$zip->close();

// ডাউনলোড হেডার সেট করো
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . basename($zip_file_name) . '"');
header('Content-Length: ' . filesize($zip_file_name));
header('Cache-Control: must-revalidate');
header('Pragma: public');

// জিপ ফাইলটি আউটপুট করো
readfile($zip_file_name);

// তৈরি করা জিপ ফাইলটি সার্ভার থেকে ডিলিট করে দাও (পরিষ্কার রাখার জন্য)
unlink($zip_file_name);

exit;
?>