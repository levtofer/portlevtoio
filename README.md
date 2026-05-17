<div align="center">
  <div style="
    background: #ffffff; 
    border: 1px solid #e1e4e8; 
    border-radius: 12px; 
    padding: 16px; 
    width: 250px;
    transform: rotate(01deg);
    box-shadow: 0 8px 24px rgba(149, 157, 165, 0.2);
  ">
    <img 
      src="./readme/levtofer.png" 
      width="100%" 
      alt="Levtofer" 
      style="border-radius: 8px;"
    >
    <div style="font-family: Lucida Handwriting; font-size: 14px; color: #6DA767; margin-top: 12px; font-weight: bold;">
      Levtofer (˶˃ ᵕ ˂˶) .ᐟ.ᐟ
    </div>
  </div>
</div>

---

# Portlevtoio

## What is Portlevtoio?

Portlevtoio is a portfolio by / for Levtofer. Well, the website itself just bunch of features that I don't know if it's different from the other or nah, at least the style is cool tho

## Tech Stack

### backend

* Laravel
* PHP
* MySQL

### frontend

* Blade
* Tailwind CSS
* Alpine.js

### tools

* VS Code
* Git & GitHub
* Laragon

## Pages

there are total 10 pages, with 8 being public pages and 2 for utility pages

### public pages

* `/` - home
* `/works` - works index
* `/works/{slug}` - works detail
* `/about` - about
* `/tools` - tools
* `/gallery` - sketchbook
* `/guestbook` - guestbook
* `/contact` - contact

### utility

* `/api/music` - music widget endpoint
* `404` - error page

## Features

* responsive masonry layout
* scrapbook / handwritten inspired UI
* mobile responsive layout
* music widget endpoint
* project tagging system

## Brief Break

You know what i love?

<a href="https://open.spotify.com/artist/2HkSsS8O2U2gPhnCGVN5vn"><img src="https://img.shields.io/badge/music-BETWEEN%20FRIENDS-faf7f2?style=for-the-badge"></a>

## Local Setup

clone the repository

```
git clone https://github.com/levtofer/portlevtoio.git
```

install dependencies

```
composer install
npm install
```

copy environment

```
cp .env.example .env
```

generate app key

```
php artisan key:generate
```

run migrations

```
php artisan migrate
```

run the project

```
php artisan serve
npm run dev
```

## Folder Structure

```
app/
├── Http/
│   └── Controllers/
│       ├── Controller.php
│       ├── GalleryController.php
│       ├── GuestbookController.php
│       └── WorksController.php
├── Models/
│   ├── Gallery.php
│   ├── Guestbook.php
│   └── Project.php
└── Providers/
    └── AppServiceProvider.php
config/
└── music.php
database/
└── migrations/
    ├── 2026_05_13_113649_create_projects_table.php
    ├── 2026_05_13_120845_add_url_to_projects_table.php
    ├── 2026_05_15_024147_create_guestbook_table.php
    └── 2026_05_15_031618_create_gallery_table.php

public/
├── images/
│   ├── gallery/
│   │   └── cuptoast.png
│   ├── works/
│   │   ├── portlevtoio.jpg
│   │   └── unfinished_archive.jpg
│   ├── cursor.png
│   ├── deltarune-explosion.gif
│   ├── profile.png
│   └── submit-button.png
├── icons/
│   ├── alightmotion.svg
│   ├── alpinedotjs.svg
│   ├── bluesky.svg
│   ├── discord.svg
│   ├── facebook.svg
│   ├── gamemaker.svg
│   ├── geode.svg
│   ├── git.svg
│   ├── github.svg
│   ├── gmail.svg
│   ├── godotengine.svg
│   ├── ibispaint.svg
│   ├── instagram.svg
│   ├── krita.svg
│   ├── laragon.svg
│   ├── laravel.svg
│   ├── lmms.svg
│   ├── medibangpaint.svg
│   ├── mysql.svg
│   ├── php.svg
│   ├── pinterest.svg
│   ├── roblox.svg
│   ├── shotcut.svg
│   ├── tailwindcss.svg
│   ├── telegram.svg
│   ├── visualstudiocode.svg
│   ├── x.svg
│   └── xampp.svg
└── sounds/
    └── deltarune-explosion.mp3

resources/
 ├── css/
    └── app.css
 ├── js/
    └── app.js
 └── views/
    ├── about/
    │   └── about.blade.php
    ├── contact/
    │   └── contact.blade.php
    ├── errors/
    │   └── 404.blade.php
    ├── gallery/
    │   └── gallery.blade.php
    ├── guestbook/
    │   └── guestbook.blade.php
    ├── layouts/
    │   ├── app.blade.php
    │   └── sidebar.blade.php
    ├── tools/
    │   └── tools.blade.php
    ├── works/
    │   ├── index.blade.php
    │   └── show.blade.php
    ├── home.blade.php
    └── welcome.blade.php
```

## Future Plans

* guestbook moderation
* bilingual support maybe idk

## Notes

"I'll always wait for you, ███████."