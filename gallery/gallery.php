<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni - Gallery</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <style>
        .gallery-list {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
        }

        .folder-row {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
            position: relative;
        }

        .folder-row:last-child {
            border-bottom: none;
        }

        .folder-row a {
            text-decoration: none;
            color: #333;
            flex-grow: 1;
            display: flex;
            align-items: center;
        }

        .folder-row a:hover {
            color: #007bff;
        }

        .folder-icon {
            font-size: 24px;
            color: #777;
            margin-right: 15px;
        }

        .folder-name {
            font-size: 16px;
            font-weight: 400;
        }

        /* থ্রি ডট অপশন মেনু */
        .options-btn {
            font-size: 20px;
            cursor: pointer;
            padding: 5px;
            margin-left: 10px;
            color: #777;
        }

        .options-menu {
            position: absolute;
            top: 100%;
            right: 10px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 4px;
            z-index: 10;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .options-menu a {
            display: block;
            padding: 8px 15px;
            white-space: nowrap;
            width: 100%;
            box-sizing: border-box;
            color: #333;
        }

        .options-menu a:hover {
            background-color: #f0f0f0;
        }

        .galleryWrapper {
            margin-top: 100px;
            text-align: center;
            flex: 1;
        }

        .galleryHead h2 {
            margin: auto;
            font-size: 35px;
            font-weight: 500;
            font-family: 'kohinoor';
        }

        span.devDetailsSpan {
            font-size: 19px;
        }

        .contactDev {
            margin-top: 0px;
            margin-bottom: 10px;
        }

        .folderDetails {
            font-size: 20px;
            margin-bottom: -5px;
        }

        span.devIsmail a {
            font-size: 18px;
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
                        <li class="active"> <a href="../gallery/gallery.php">গ্যালারি</a></li>
                        <li><a href="../site/contact.html">যোগাযোগ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="galleryWrapper">
        <div class="container">
            <div class="galleryHead">
                <h2>ফিরে দেখা সেই দিনগুলি</h2>
            </div>

            <div class="contactDev">
                <span class="devDetailsSpan">Want to add photos from your batch? Send photos to the developer 👉 </span>
                <span class="devIsmail"><a href="https://wa.me/8801403067758">Farhan Taskin Ismail</a></span>
            </div>

            <div class="folderDetails">
                <span>Go to your batch folder.</span>
            </div>

            <div class="gallery-list">
                <div class="folder-row"><a href="folder_view.php?folder=2000"><span class="folder-icon">📁</span><span class="folder-name">2000</span></a><span class="options-btn" onclick="toggleMenu(this)">&#x22EE;</span>
                    <div class="options-menu"><a href="download.php?folder=2000">Download Folder (ZIP)</a></div>
                </div>
                <div class="folder-row"><a href="folder_view.php?folder=2001"><span class="folder-icon">📁</span><span class="folder-name">2001</span></a><span class="options-btn" onclick="toggleMenu(this)">&#x22EE;</span>
                    <div class="options-menu"><a href="download.php?folder=2001">Download Folder (ZIP)</a></div>
                </div>
                <div class="folder-row"><a href="folder_view.php?folder=2002"><span class="folder-icon">📁</span><span class="folder-name">2002</span></a><span class="options-btn" onclick="toggleMenu(this)">&#x22EE;</span>
                    <div class="options-menu"><a href="download.php?folder=2002">Download Folder (ZIP)</a></div>
                </div>
                <div class="folder-row"><a href="folder_view.php?folder=2004"><span class="folder-icon">📁</span><span class="folder-name">2004</span></a><span class="options-btn" onclick="toggleMenu(this)">&#x22EE;</span>
                    <div class="options-menu"><a href="download.php?folder=2004">Download Folder (ZIP)</a></div>
                </div>
                <div class="folder-row"><a href="folder_view.php?folder=2005"><span class="folder-icon">📁</span><span class="folder-name">2005</span></a><span class="options-btn" onclick="toggleMenu(this)">&#x22EE;</span>
                    <div class="options-menu"><a href="download.php?folder=2005">Download Folder (ZIP)</a></div>
                </div>
                <div class="folder-row"><a href="folder_view.php?folder=2020"><span class="folder-icon">📁</span><span class="folder-name">2020</span></a><span class="options-btn" onclick="toggleMenu(this)">&#x22EE;</span>
                    <div class="options-menu"><a href="download.php?folder=2020">Download Folder (ZIP)</a></div>
                </div>
                <div class="folder-row"><a href="folder_view.php?folder=48764"><span class="folder-icon">📁</span><span class="folder-name">48764</span></a><span class="options-btn" onclick="toggleMenu(this)">&#x22EE;</span>
                    <div class="options-menu"><a href="download.php?folder=48764">Download Folder (ZIP)</a></div>
                </div>
            </div>
        </div>
    </div>

    <footer id="footerSec" class="footerBottom">
        <div class="footerText">© ২০২৫ বাঁশগ্রাম হাইস্কুল অ্যালামনাই। আমাদের স্মৃতি, আমাদের গর্ব।</div>
    </footer>

    <script>
        // জাভাস্ক্রিপ্ট: মেনু টগল করার জন্য
        function toggleMenu(button) {
            // অন্য সব মেনু বন্ধ করবে
            document.querySelectorAll('.options-menu').forEach(menu => {
                if (menu.parentNode.querySelector('.options-btn') !== button) {
                    menu.style.display = 'none';
                }
            });
            // বর্তমান মেনু টগল করবে
            const menu = button.nextElementSibling;
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }

        // জাভাস্ক্রিপ্ট: মেনুর বাইরে ক্লিক করলে বন্ধ হবে
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.folder-row')) {
                document.querySelectorAll('.options-menu').forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
    </script>
</body>

</html>