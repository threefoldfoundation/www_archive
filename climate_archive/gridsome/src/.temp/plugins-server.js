import plugin_gridsome_plugin_tailwindcss_31 from "/home/samar/codewww/github/threefoldfoundation/www_archive/climate_archive/gridsome/node_modules/gridsome-plugin-tailwindcss/gridsome.client.js"
import plugin_gridsome_plugin_flexsearch_32 from "/home/samar/codewww/github/threefoldfoundation/www_archive/climate_archive/gridsome/node_modules/gridsome-plugin-flexsearch/gridsome.client.js"

export default [
  {
    run: plugin_gridsome_plugin_tailwindcss_31,
    options: {"tailwindConfig":"./tailwind.config.js","purgeConfig":{"whitelist":["svg-inline--fa","table","table-striped","table-bordered","table-hover","table-sm"],"whitelistPatterns":[{},{},{},{},{},{}]},"presetEnvConfig":{"stage":0,"autoprefixer":false,"features":{"focus-visible-pseudo-class":false,"focus-within-pseudo-class":false}},"shouldPurge":false,"shouldImport":true,"shouldTimeTravel":true,"shouldPurgeUnusedKeyframes":true,"importUrlConfig":{"modernBrowser":true}}
  },
  {
    run: plugin_gridsome_plugin_flexsearch_32,
    options: {"pathPrefix":"","siteUrl":"","searchFields":["title","name","content","status","linkedin","excerpt","cities","countries","websites"],"collections":[{"typeName":"Blog","indexName":"Blog","fields":["path"]},{"typeName":"Project","indexName":"Project","fields":["path"]},{"typeName":"Person","indexName":"Person","fields":["path"]},{"typeName":"News","indexName":"News","fields":["path"]},{"typeName":"MarkdownPage","indexName":"MarkdownPage","fields":["path"]}],"chunk":false,"compress":false,"autoFetch":true,"autoSetup":true,"flexsearch":{"profile":"default"}}
  }
]
