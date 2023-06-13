# Overview

WYDRN is a Social Networking website where you can track your movies, tv, games, books and music. Match your interests with your friends and export your media items. I aim to develop it to provide a centralized platform to track all your favorite media instead of using multiple platforms like IMDB, Goodreads, Steam, RateYourMusic and TVTime. One platform to rule them all.

# Usage

The site is not deployed currently so you can't get a live preview but you can try it out on `localhost`.

## Installing on Local Machine

- Clone this repository/download the ZIP file in `C:/xampp/htdocs`
- Launch Xampp. Start Apache and MySQL services.

Expand All
	@@ -26,7 +32,7 @@ The site is not deployed currently so you can't get a live preview but you can t
- A guest account with `username` : `dev` and `password` : `deadlines` is already made avaiable for your usage. Login with it.
- For Load Testing use username `spammer` with password `hellohi123`.
- Admin Account: `username`:`admin` & `pass`:`godmodeon`
- You can now add media, export your media, search for other users and see your mutual medias.

## [Documentation](https://github.com/anay-deshpande/WYDRN/wiki/Documentation)

Expand All
	@@ -41,8 +47,9 @@ The site is not deployed currently so you can't get a live preview but you can t
- PDF exports are not UTF-8 safe.

## ToDo Checks

- All images must have alternate text
- Add Meta Description, Meta Keyword to all files. (<https://www.webfx.com/blog/web-design/20-html-best-practices-you-should-follow>)
- All image tags must be self-closed
- Minify CSS files using <https://www.cssportal.com/css-optimize/>
- add mysqli_real_escape_string() at all the places where data is being stored from forms or from GET/POST request methods.
