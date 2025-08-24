import { argv } from "node:process";
import * as esbuild from "esbuild";

// eslint-disable-next-line no-undef
const productionMode = "dev" !== (argv[2] || process.env.NODE_ENV);
const target = "chrome58,firefox57,safari13".split(",");
// TODO: Use fs to get list of source files?

// bundle CSS
const buildCSS = await esbuild.context({
  entryPoints: [
    "./site/src/css/index.css",
    "./site/src/css/panel.css"
  ],
  bundle: true,
  target,
  logLevel: productionMode ? "error" : "info",
  minify: productionMode,
  sourcemap: !productionMode && "inline",
  outdir: "./assets/css",
  external: ["*.ttf", "*.woff2", "*.woff", "*.png"],
});

// bundle JS
const buildJS = await esbuild.context({
  entryPoints: [
    "./site/src/js/index.js"
  ],
  format: "esm",
  bundle: true,
  target,
  drop: productionMode ? ["debugger", "console"] : [],
  logLevel: productionMode ? "error" : "info",
  minify: productionMode,
  sourcemap: !productionMode && "inline",
  outdir: "./assets/js",
  define: {
    "global": "window", // adde 2025-04-13 for simplelightbox import
  }
});

if (productionMode) {
  // single production build
  await buildCSS.rebuild();
  buildCSS.dispose();

  await buildJS.rebuild();
  buildJS.dispose();
} else {
  // watch for file changes
  await buildCSS.watch();
  await buildJS.watch();
  console.log('building');

  // development server
  // await buildCSS.serve({
  //   servedir: './build'
  // });
}
