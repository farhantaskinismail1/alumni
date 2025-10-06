<?php
// URL থেকে ফোল্ডারের নাম নাও
$folder_name = isset($_GET['folder']) ? $_GET['folder'] : '';

// নিরাপত্তার জন্য ইনপুট ক্লিন করো
$safe_folder_name = preg_replace('/[^a-zA-Z0-9_\-]/', '', $folder_name);
$folder_path = $safe_folder_name . '/';

if (empty($safe_folder_name) || !is_dir($folder_path)) {
    header("Location: gallery.php");
    exit;
}

$items = scandir($folder_path);
$images = [];
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

foreach ($items as $item) {
    if ($item === '.' || $item === '..') {
        continue;
    }
    $extension = strtolower(pathinfo($item, PATHINFO_EXTENSION));
    if (in_array($extension, $allowed_extensions)) {
        $images[] = $item;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photos in <?php echo htmlspecialchars($safe_folder_name); ?></title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <style>
        body {}

        .batchOf h1 {
            margin: auto;
            margin-bottom: 10px;
            font-weight: 400;
            font-size: 35px;
        }

        .image-caption a {
            font-size: 20px;
            margin-top: -10px;
        }

        .image-caption p {
            margin-top: 5px;
            margin-bottom: 0px;
        }

        .controls {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
        }

        .back-link {
            color: #555;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .download-all-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .download-all-btn:hover {
            background-color: #0056b3;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .image-item {
            border: 1px solid #ccc;
            text-align: center;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .image-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .image-caption {
            padding: 10px;
        }

        .image-caption a {
            display: block;
            margin-top: 5px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .image-caption a:hover {
            text-decoration: underline;
        }

        .allWrapper {
            margin-top: 70px;
            flex: 1;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="container">
            <div class="headerWrapper">
                <div class="headLeft">
                    <a href="../index.html">
                        <h1>বাঁশগ্রাম হাইস্কুল অ্যালামনাই</h1>
                    </a>
                </div>
                <div class="headRight">
                    <ul>
                        <li><a href="../index.html">হোম</a></li>
                        <li><a href="../site/registration.html">রেজিস্ট্রেশন</a></li>
                        <li><a href="../gallery/gallery.php">গ্যালারি</a></li>
                        <li><a href="../site/contact.html">যোগাযোগ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="allWrapper">
        <div class="container">
            <div class="controls">
                <a href="gallery.php" class="back-link">← Back to Gallery Years</a>
            </div>
            <div class="batchOf">
                <h1>Batch <?php echo htmlspecialchars($safe_folder_name); ?> Photos</h1>
            </div>
            <div class="image-grid">
                <?php
                // PHP ব্যবহার করে ছবির URL-এর একটি JSON অ্যারে তৈরি করো
                $image_urls = [];
                if (empty($images)) {
                    echo "<p>No photos found in the folder " . htmlspecialchars($safe_folder_name) . ".</p>";
                } else {
                    foreach ($images as $image) {
                        $image_url = $safe_folder_name . '/' . $image;
                        $image_urls[] = ['url' => $image_url, 'name' => $image]; // জাভাস্ক্রিপ্টের জন্য ডেটা তৈরি

                        echo '<div class="image-item">';
                        echo '<img src="' . htmlspecialchars($image_url) . '" alt="' . htmlspecialchars($image) . '">';
                        echo '<div class="image-caption">';
                        echo '<p>' . htmlspecialchars($image) . '</p>';
                        // প্রতিটি ছবির জন্য ব্যক্তিগত ডাউনলোড লিঙ্ক
                        echo '<a href="' . htmlspecialchars($image_url) . '" download="' . htmlspecialchars($image) . '">Download</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        // PHP থেকে JavaScript-এ ছবির তালিকা পাস করা
        const imageList = <?php echo json_encode($image_urls); ?>;

        /**
         * জাভাস্ক্রিপ্ট ব্যবহার করে সমস্ত ছবি ডাউনলোড করার চেষ্টা করা
         *
         * ব্রাউজারের সীমাবদ্ধতা: ব্রাউজারগুলি একই সময়ে একাধিক ডাউনলোড শুরু করাকে
         * 'পপ-আপ' বা স্প্যাম হিসাবে ব্লক করতে পারে। ব্যবহারকারীকে এই ডাউনলোডের অনুমতি দিতে হতে পারে।
         */
        function downloadAllImages() {
            if (imageList.length === 0) {
                alert("No images to download!");
                return;
            }

            if (!confirm(`Are you sure you want to download ${imageList.length} images? Your browser may ask for permission to download multiple files.`)) {
                return;
            }

            // প্রতিটি ছবির জন্য ডাউনলোড শুরু করা
            imageList.forEach((image, index) => {
                // একটি ভার্চুয়াল লিঙ্ক তৈরি করা
                const link = document.createElement('a');
                link.href = image.url;
                link.download = image.name; // ছবির আসল নাম ব্যবহার করা

                // লিঙ্কটিতে ক্লিক করার সিমুলেশন করা
                document.body.appendChild(link);

                // একটি সামান্য বিলম্ব যোগ করা যাতে ব্রাউজার সব ডাউনলোড একসাথে ব্লক না করে
                setTimeout(() => {
                    link.click();
                    document.body.removeChild(link);
                }, index * 50); // 50ms ব্যবধানে ডাউনলোড শুরু হবে
            });

            alert(`${imageList.length} downloads started. Please check your browser's download folder and allow multiple downloads if prompted.`);
        }
    </script>
    <footer id="footerSec" class="footerBottom">
        <div class="footerText">© ২০২৫ বাঁশগ্রাম হাইস্কুল অ্যালামনাই। আমাদের স্মৃতি, আমাদের গর্ব।</div>
    </footer>
</body>

</html>