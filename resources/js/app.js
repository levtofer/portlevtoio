import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
import persist from "@alpinejs/persist";
import Masonry from "masonry-layout";
import imagesLoaded from 'imagesloaded';

Alpine.plugin(intersect);
Alpine.plugin(persist);

window.Alpine = Alpine;

// dark mode
window.darkMode = function () {
    return {
        dark: Alpine.$persist(false).as("darkMode"),
        init() {
            this.$watch("dark", (val) => {
                document.documentElement.classList.toggle("dark", val);
            });
            document.documentElement.classList.toggle("dark", this.dark);
        },
        toggle() {
            this.dark = !this.dark;
        },
    };
};

// music widget
window.musicWidget = function () {
    return {
        track: "loading...",
        artist: "",
        async init() {
            await this.fetch();
            setInterval(() => this.fetch(), 180000);
        },
        async fetch() {
            try {
                const res = await window.fetch("/api/music");
                const data = await res.json();
                this.track = data.track;
                this.artist = data.artist;
            } catch (e) {
                this.track = "something soft";
                this.artist = "...";
            }
        },
    };
};

// masonry
document.addEventListener("DOMContentLoaded", () => {
    const grid = document.querySelector(".masonry-grid");
    if (grid) {
        const msnry = new Masonry(grid, {
            itemSelector: ".masonry-item",
            columnWidth: ".masonry-sizer",
            percentPosition: true,
            gutter: 0,
        });
        imagesLoaded(grid, () => {
            msnry.layout();
        });
    }
});

// custom cursor
document.addEventListener("DOMContentLoaded", () => {
    if (!("ontouchstart" in window)) {
        const cursor = document.createElement("img");
        cursor.src = "/images/cursor.png";
        cursor.style.cssText = `
        position: fixed;
        pointer-events: none;
        z-index: 99999;
        width: 32px;
        height: 32px;
        transform: translate(-4px, -4px);
        transition: transform 0.05s ease;
    `;
        document.body.appendChild(cursor);
        document.body.style.cursor = "none";

        document.addEventListener("mousemove", (e) => {
            cursor.style.left = e.clientX + "px";
            cursor.style.top = e.clientY + "px";
        });

        document.addEventListener("mousedown", () => {
            cursor.style.opacity = "1";
        });

        document.addEventListener("mouseup", () => {
            cursor.style.opacity = "1";
        });
    }
});

// konami code + explosion
document.addEventListener("DOMContentLoaded", () => {
    const konami = [
        "ArrowUp",
        "ArrowUp",
        "ArrowDown",
        "ArrowDown",
        "ArrowLeft",
        "ArrowRight",
        "ArrowLeft",
        "ArrowRight",
        "b",
        "a",
    ];
    let index = 0;
    let explosionActive = false;

    const sound = new Audio("/sounds/deltarune-explosion.mp3");

    function triggerExplosion(x, y) {
        sound.currentTime = 0;
        sound.play();

        const gif = document.createElement("img");
        gif.src = "/images/deltarune-explosion.gif?t=" + Date.now();
        gif.style.cssText = `
            position: fixed;
            pointer-events: none;
            z-index: 999999;
            width: 120px;
            height: 120px;
            left: ${x - 60}px;
            top:  ${y - 60}px;
        `;
        document.body.appendChild(gif);
        setTimeout(() => gif.remove(), 1500);
    }

    document.addEventListener("keydown", (e) => {
        if (e.key === konami[index]) {
            index++;
            if (index === konami.length) {
                explosionActive = true;
                index = 0;
                triggerExplosion(window.innerWidth / 2, window.innerHeight / 2);
            }
        } else {
            index = 0;
        }
    });

    document.addEventListener("click", (e) => {
        if (explosionActive) {
            triggerExplosion(e.clientX, e.clientY);
        }
    });
});

Alpine.start();
