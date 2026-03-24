import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        // Override (not extend) fontSize so every utility class is one step larger.
        // Each entry shifts up one position from Tailwind's default scale.
        // e.g. text-xs renders at what was text-sm, text-sm at text-base, etc.
        fontSize: {
            xs:   ["0.875rem",  { lineHeight: "1.25rem"  }],  // was 0.75rem
            sm:   ["1rem",      { lineHeight: "1.5rem"   }],  // was 0.875rem
            base: ["1.125rem",  { lineHeight: "1.75rem"  }],  // was 1rem
            lg:   ["1.25rem",   { lineHeight: "1.75rem"  }],  // was 1.125rem
            xl:   ["1.5rem",    { lineHeight: "2rem"     }],  // was 1.25rem
            "2xl":["1.875rem",  { lineHeight: "2.25rem"  }],  // was 1.5rem
            "3xl":["2.25rem",   { lineHeight: "2.5rem"   }],  // was 1.875rem
            "4xl":["3rem",      { lineHeight: "1"        }],  // was 2.25rem
            "5xl":["3.75rem",   { lineHeight: "1"        }],  // was 3rem
            "6xl":["4.5rem",    { lineHeight: "1"        }],  // was 3.75rem
            "7xl":["6rem",      { lineHeight: "1"        }],  // was 4.5rem
            "8xl":["8rem",      { lineHeight: "1"        }],  // was 6rem
            "9xl":["9rem",      { lineHeight: "1"        }],  // was 8rem
        },

        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};