<?php

/**
 * THIS IS THE MAIN IMPORT/EXPORT PAGE WITH 3 BUTTONS
 * 1) IMPORT CSV -> csv_import.php -> upload_csv.php
 * 2) EXPORT CSV -> csv_export.php -> download_csv.php
 * 3) EXPORT DATA TO PDF -> pdf.php
 * @version    PHP 8.0.12
 * @since      June 2022
 * @author     AtharvaShah
 */

session_start();
if (empty($_SESSION)) {
    header("Location: ../login.php");
}
// require "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WYDRN - Export Options</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,700'>
    <link rel="stylesheet" href="../css/import_export.css">
</head>

<body>

    <div class="container">
        <div>
            At WYDRN, we strongly believe that the data you share with us is valuable to you. We value your privacy and want to make sure that your data is safe and secure. We also believe that users should have complete control over their data and should be able to easily import and export it as and when they want it instaneously. This is why we have created an Import/Export feature. You can use this feature to import your data from a CSV file and export it to a CSV file. You can also export your data to a PDF file for a more portable and easy to use format. If you wish to wipe your data, you can delete your account <a href='../delete_user.php'>here</a>. Please ensure that you export your data first before deleting your account so that you can import it back later. Cheers and keep adding your favorite medias to WYDRN.
        </div>
        <input type="button" value="Export to PDF" onclick="location.href='pdf.php'">
        <input type="button" value="Export to CSV" onclick="location.href='csv_export.php'">
        <input type="button" value="Import from CSV" onclick="location.href='csv_import.php'">


        <!------------------
        HOW TO IMPORT SECTION
    ----------------->


        <section id="fancyTabWidget" class="tabs t-tabs">
            <ul class="nav nav-tabs fancyTabs" role="tablist">

                <li class="tab fancyTab active">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-desktop"></span><span class="hidden-xs"><b>Goodreads</b><br>Import Books</span></a>
                    <div class="whiteBlock"></div>
                </li>

                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-firefox"></span><span class="hidden-xs"><b>RYM</b><br>Import Albums</span></a>
                    <div class="whiteBlock"></div>
                </li>

                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab2" href="#tabBody2" role="tab" aria-controls="tabBody2" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-envira"></span><span class="hidden-xs"><b>IMDB/Letterboxd</b><br>Import Movies</span></a>
                    <div class="whiteBlock"></div>
                </li>

                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab3" href="#tabBody3" role="tab" aria-controls="tabBody3" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-mortar-board"></span><span class="hidden-xs"><b>Steam</b><br>Import Videogames</span></a>
                    <div class="whiteBlock"></div>
                </li>

                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab4" href="#tabBody4" role="tab" aria-controls="tabBody4" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-stack-overflow"></span><span class="hidden-xs"><b>Trakt</b><br>Import TV Shows</span></a>
                    <div class="whiteBlock"></div>
                </li>

      
            </ul>
            <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                <div class="tab-pane  fade active in" id="tabBody0" role="tabpanel" aria-labelledby="tab0" aria-hidden="false" tabindex="0">
                    <div>
                        <div class="row">

                            <div class="col-md-12">
                                <p><b>Goodreads</b> is a website that allows you to keep a catalogue of your books. You can import your books from Goodreads and add them to WYDRN. </p>
                                <li>
                                    <b>Step 1:</b> Go to <a href="https://www.goodreads.com/user/sign_in">https://www.goodreads.com/user/sign_in</a> and sign in with your Goodreads account.
                                </li>
                                <li>
                                    <b>Step 2:</b> Click on the "My Books" tab. You will be redirected to the page where you can see all of your books.
                                </li>
                                <li>
                                    <b>Step 3:</b> Click on the "Export" button in the left sidebar and and request an export. You will be granted a link to download your book catalogue. Download the CSV.
                                </li>
                                <li>
                                    <b>Step 4:</b> Copy paste the Title and the Author fields from your export CSV into the blank CSV from WYDRN Template and upload it to WYDRN. Done!
                                </li>
                                <br>
 
                                <iframe width="1200" height="600" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                </iframe>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true" tabindex="0">
                    <div class="row">

                        <div class="col-md-12">
                            
                            <p><b> Rate Your Music </b> is a website that allows you to keep a catalogue of your albums. You can import your albums from RYM and add them to WYDRN.</p>

                            <li>
                                <b>Step 1:</b> Go to <a href="https://rateyourmusic.com/">https://rateyourmusic.com/</a> and sign in with your RYM account.

                            </li>
                            <li>
                                <b>Step 2:</b> Scroll to the bottom of the profile and find Export button. You will be redirected to the page where you can download a CSV containing all your catalogued albums.
                            </li>
                            <li>
                                <b>Step 3:</b> Copy paste the Album and the Artist fields from your export CSV to the Blank CSV from WYDRN Template and and upload it to WYDRN. Done!
                            </li>
                            
                            <br>
                            <iframe width="1200" height="600" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>

                        </div>
                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody2" role="tabpanel" aria-labelledby="tab2" aria-hidden="true" tabindex="0">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>This is the content of tab three.</h2>
                            <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy. Jean shorts kinfolk distillery lumbersexual
                                pinterest XOXO semiotics. Tilde meggings asymmetrical literally pork belly, heirloom food truck YOLO. Meh echo park lyft typewriter. </p>

                        </div>
                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody3" role="tabpanel" aria-labelledby="tab3" aria-hidden="true" tabindex="0">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>This is the content of tab four.</h2>
                            <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy. Jean shorts kinfolk distillery lumbersexual
                                pinterest XOXO semiotics. Tilde meggings asymmetrical literally pork belly, heirloom food truck YOLO. Meh echo park lyft typewriter. </p>

                        </div>
                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody4" role="tabpanel" aria-labelledby="tab4" aria-hidden="true" tabindex="0">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>This is the content of tab five.</h2>
                            <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy. Jean shorts kinfolk distillery lumbersexual
                                pinterest XOXO semiotics. Tilde meggings asymmetrical literally pork belly, heirloom food truck YOLO. Meh echo park lyft typewriter. </p>

                        </div>
                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody5" role="tabpanel" aria-labelledby="tab5" aria-hidden="true" tabindex="0">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>This is the content of tab six.</h2>
                            <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy. Jean shorts kinfolk distillery lumbersexual
                                pinterest XOXO semiotics. Tilde meggings asymmetrical literally pork belly, heirloom food truck YOLO. Meh echo park lyft typewriter. </p>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>


    <!------------------
       END OF HOW TO IMPORT SECTION
    ----------------->
    <!-- partial -->
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="./script.js"></script>
</body>

</html>