import { defineConfig, splitVendorChunkPlugin } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import i18n from "laravel-vue-i18n/vite";
import path from "path";
// import Components from "unplugin-vue-components/vite";
// import { FileSystemScanner } from "unplugin-vue-components/resolvers";

export default defineConfig({
    plugins: [
        splitVendorChunkPlugin(),
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),

        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        i18n(),
    ],
    resolve: {
        alias: {
            "@": "/resources/js",
            // vue: "@vitejs/plugin-vue",
            vue: "vue/dist/vue.esm-bundler.js",
            ziggy: path.resolve("vendor/tightenco/ziggy/dist/vue.es.js"),
        },
    },
    build: {
        chunkSizeWarningLimit: 1600,
    },
});
