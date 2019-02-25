# Autoptimize Pre Compress Files Wordpress Plugin

This Autoptimize Gzip Wordpress plugin is a companion plugin to [Autoptimize Wordpress plugin](https://wordpress.org/plugins/autoptimize/) and hooks into [Autoptimize's API](https://github.com/futtta/autoptimize/) to enable pre-gzip compression of Autoptimize'd CSS & JS files via an add_filter:

```
add_filter('autoptimize_filter_cache_create_static_gzip','__return_true');
```

![autoptimize-gzip](/images/wp-autotpimize-gzip-plugin-01.png)

**Update:** 

* [Autoptimize Wordpress Plugin](https://github.com/futtta/autoptimize/) also [plans to add Brotli precompressed CSS/JS file](https://github.com/futtta/autoptimize/pull/237) support when above filter is enabled via installing my Autoptimize-gzip Wordpress plugin. You will need to enable/install [PHP Brotli Extension](https://github.com/kjdev/php-ext-brotli). 
* Centmin Mod users can do that via [enabling PHP_BROTLI='y' variable prior to PHP recompiles](https://community.centminmod.com/threads/add-additional-php-compression-extensions-by-default-in-123-09beta01.16616/) and ensuring they have Nginx Brotli module enabled via [NGXDYNAMIC_BROTLI='y' and NGINX_LIBBROTLI='y'](https://community.centminmod.com/threads/how-to-use-brotli-compression-for-centmin-mod-nginx-web-servers.10688/) variables prior to Centmin Mod Ngixn recompiles - which will also install [Brotli library](https://github.com/google/brotli/releases) required to do the actual Brotli compression.
* If not using Centmin Mod LEMP stack, you will need to install [Brotli library](https://github.com/google/brotli/releases) and [PHP Brotli Extension](https://github.com/kjdev/php-ext-brotli) yourself.

```
ls -lah wp-content/cache/autoptimize/{css,js}
wp-content/cache/autoptimize/css:
total 480K
drwxrwsrwx 2 nginx nginx 4.0K Feb 25 13:50 .
drwxrwsrwx 4 nginx nginx 4.0K Feb 25 13:50 ..
-rw-r--r-- 1 nginx nginx 167K Feb 25 13:50 autoptimize_d3e239245b3e0ab1497229cf52f5c68b.css
-rw-r--r-- 1 nginx nginx  24K Feb 25 13:50 autoptimize_d3e239245b3e0ab1497229cf52f5c68b.css.br
-rw-r--r-- 1 nginx nginx  30K Feb 25 13:50 autoptimize_d3e239245b3e0ab1497229cf52f5c68b.css.gz
-rw-r--r-- 1 nginx nginx 9.5K Feb 25 13:50 autoptimize_snippet_77cc244151bca6686caf7a9c44c9cce2.css
-rw-r--r-- 1 nginx nginx 1.9K Feb 25 13:50 autoptimize_snippet_77cc244151bca6686caf7a9c44c9cce2.css.br
-rw-r--r-- 1 nginx nginx 2.3K Feb 25 13:50 autoptimize_snippet_77cc244151bca6686caf7a9c44c9cce2.css.gz
-rw-r--r-- 1 nginx nginx  171 Feb 25 13:50 autoptimize_snippet_9c7e39ca0cdfdb09d68f8911c6ed0b7a.css
-rw-r--r-- 1 nginx nginx  105 Feb 25 13:50 autoptimize_snippet_9c7e39ca0cdfdb09d68f8911c6ed0b7a.css.br
-rw-r--r-- 1 nginx nginx  147 Feb 25 13:50 autoptimize_snippet_9c7e39ca0cdfdb09d68f8911c6ed0b7a.css.gz
-rw-r--r-- 1 nginx nginx 157K Feb 25 13:50 autoptimize_snippet_a720e340daf2495254cacbe2c33f6e4a.css
-rw-r--r-- 1 nginx nginx  23K Feb 25 13:50 autoptimize_snippet_a720e340daf2495254cacbe2c33f6e4a.css.br
-rw-r--r-- 1 nginx nginx  28K Feb 25 13:50 autoptimize_snippet_a720e340daf2495254cacbe2c33f6e4a.css.gz
-rwxrwxrwx 1 nginx nginx  189 Aug 21  2016 index.html

wp-content/cache/autoptimize/js:
total 124K
drwxrwsrwx 2 nginx nginx 4.0K Feb 25 13:50 .
drwxrwsrwx 4 nginx nginx 4.0K Feb 25 13:50 ..
-rw-r--r-- 1 nginx nginx  22K Feb 25 13:50 autoptimize_9312fc02835c0d9c86d7a3537e251868.js
-rw-r--r-- 1 nginx nginx 7.6K Feb 25 13:50 autoptimize_9312fc02835c0d9c86d7a3537e251868.js.br
-rw-r--r-- 1 nginx nginx 8.6K Feb 25 13:50 autoptimize_9312fc02835c0d9c86d7a3537e251868.js.gz
-rw-r--r-- 1 nginx nginx  15K Feb 25 13:50 autoptimize_snippet_29297b88a42936b62480d70a4fc3c51b.js
-rw-r--r-- 1 nginx nginx 5.2K Feb 25 13:50 autoptimize_snippet_29297b88a42936b62480d70a4fc3c51b.js.br
-rw-r--r-- 1 nginx nginx 5.8K Feb 25 13:50 autoptimize_snippet_29297b88a42936b62480d70a4fc3c51b.js.gz
-rw-r--r-- 1 nginx nginx 1.1K Feb 25 13:50 autoptimize_snippet_70cc32f4967e3d4450b3917f937614e3.js
-rw-r--r-- 1 nginx nginx  408 Feb 25 13:50 autoptimize_snippet_70cc32f4967e3d4450b3917f937614e3.js.br
-rw-r--r-- 1 nginx nginx  527 Feb 25 13:50 autoptimize_snippet_70cc32f4967e3d4450b3917f937614e3.js.gz
-rw-r--r-- 1 nginx nginx 2.5K Feb 25 13:50 autoptimize_snippet_8d69cb8f29130ffa6ab65ed2ec1ca745.js
-rw-r--r-- 1 nginx nginx  934 Feb 25 13:50 autoptimize_snippet_8d69cb8f29130ffa6ab65ed2ec1ca745.js.br
-rw-r--r-- 1 nginx nginx 1.2K Feb 25 13:50 autoptimize_snippet_8d69cb8f29130ffa6ab65ed2ec1ca745.js.gz
-rw-r--r-- 1 nginx nginx 4.0K Feb 25 13:50 autoptimize_snippet_eb6b3b5989a0e07edb9d53abaca76799.js
-rw-r--r-- 1 nginx nginx 1.6K Feb 25 13:50 autoptimize_snippet_eb6b3b5989a0e07edb9d53abaca76799.js.br
-rw-r--r-- 1 nginx nginx 1.8K Feb 25 13:50 autoptimize_snippet_eb6b3b5989a0e07edb9d53abaca76799.js.gz
-rwxrwxrwx 1 nginx nginx  189 Aug 21  2016 index.html
```

## Pre-Gzip vs Pre-Brotli Compressed Benchmarks

Recently ran gzip and brotli precompressed benchmarks on my Centmin Mod Nginx LEMP stack for `pigz level 11 gzip for zopfli` vs `brotli level 11` at https://github.com/centminmod/centminmod-brotli-vs-gzip.

The following 3 files are tested

* https://code.jquery.com/jquery-3.3.1.min.js served from http://localhost/jquery-3.3.1.min.js
* https://use.fontawesome.com/releases/v5.7.2/css/all.css served from http://localhost/fontawesome.css
* https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css served from http://localhost/bootstrap.min.css

```
test-gzip_comp_level precompress
http://localhost/fontawesome.css (gzip)
Uncompressed-size: 53.17 KiB
Compressed-size: 10.39 KiB
Requests/sec:  14625.34

test-gzip_comp_level precompress
http://localhost/jquery-3.3.1.min.js (gzip)
Uncompressed-size: 84.88 KiB
Compressed-size: 28.57 KiB
Requests/sec:  12508.26

test-gzip_comp_level precompress
http://localhost/bootstrap.min.css (gzip)
Uncompressed-size: 152.10 KiB
Compressed-size: 20.61 KiB
Requests/sec:  12588.12

test-brotli_comp_level precompress
http://localhost/fontawesome.css (br)
Uncompressed-size: 53.17 KiB
Compressed-size: 9.38 KiB
Requests/sec:  15153.08

test-brotli_comp_level precompress
http://localhost/jquery-3.3.1.min.js (br)
Uncompressed-size: 84.88 KiB
Compressed-size: 26.85 KiB
Requests/sec:  12517.74

test-brotli_comp_level precompress
http://localhost/bootstrap.min.css (br)
Uncompressed-size: 152.10 KiB
Compressed-size: 16.74 KiB
Requests/sec:  14108.05
```

## Pre-Gzip Compressed Benchmarks

For Nginx users, [gzip_static directive](https://nginx.org/en/docs/http/ngx_http_gzip_static_module.html) allows Nginx to serve pre-gzip compressed versions of static files if they're detected. How much faster are pre-gzip compressed static file serving with Nginx ? [Benchmarks](https://community.centminmod.com/threads/nginx-with-cloudflare-zlib-fork-vs-nxg_brotli-compression-level-tests.13820/#post-63601) show that Centmin Mod Nginx with default Cloudflare performance forked zlib library at level 5 gzip dynamic compression resulted in **21,906 requests/s**. Pre-gzip compressed files with Centmin Mod Nginx with Cloudfare performance zlib library at level 5 gzip compression, resulted in **72,443 requests/s**. Yes 3.3x times faster !

Besides the smaller sizes for pre-gzip compressed static file at 3.79KB versus on the fly dynamic compressed file size of 4.12KB, also check out the average and max latency of requests. Pre-gzip compressed files had almost 64% faster average latency and 56.4% faster max latency times !

| config | compressed size | req/s | avg latency | max latency
| --- | --- | --- | --- | --- 
|Centmin Mod Nginx zlib level 5 pre-compress static (cf fork) | 3.79KB | 72443 | 3.27ms | 32.38ms
|Centmin Mod Nginx zlib level 5 dynamic (cf fork) | 4.12KB | 21906 | 9.07ms | 74.32ms

## Autoptimize's API code

Autoptimize's API code which allows this plugin's add_filter to enable pre-gzip compression:

```
  if ( apply_filters( 'autoptimize_filter_cache_create_static_gzip', false ) ) {
      // Create an additional cached gzip file.
      file_put_contents( $this->cachedir . $this->filename . '.gz', gzencode( $data, 9, FORCE_GZIP ) );
  }
```

Contributions, comments or corrections for WP plugin code are welcomed !

# Install

You can upload contents of this repository to `wp-content/plugins/autoptimize-gzip` directory you manually create and actiavte plugin from within Wordpress Admin.

Or for [Centmin Mod LEMP stack Nginx users](https://centminmod.com), install from SSH command line - replacing domain variable `domain.com` with your domain name:

```
domain=domain.com
cd /home/nginx/domains/$domain/public/wp-content/plugins/
mkdir -p autoptimize-gzip
wget -O /home/nginx/domains/$domain/public/wp-content/plugins/autoptimize-gzip/autoptimize-gzip.php https://github.com/centminmod/autoptimize-gzip/raw/master/autoptimize-gzip.php
wget -O /home/nginx/domains/$domain/public/wp-content/plugins/autoptimize-gzip/index.html https://github.com/centminmod/autoptimize-gzip/raw/master/index.html
wget -O /home/nginx/domains/$domain/public/wp-content/plugins/autoptimize-gzip/readme.md https://github.com/centminmod/autoptimize-gzip/blob/master/readme.md
wget -O /home/nginx/domains/$domain/public/wp-content/plugins/autoptimize-gzip/LICENSE https://github.com/centminmod/autoptimize-gzip/raw/master/LICENSE
chown -R nginx:nginx /home/nginx/domains/$domain/public/wp-content/plugins/autoptimize-gzip
ls -lah /home/nginx/domains/$domain/public/wp-content/plugins/autoptimize-gzip
cd /home/nginx/domains/$domain/public
wp plugin activate autoptimize-gzip
wp plugin status autoptimize-gzip
```

Activate plugin

```
domain=domain.com
cd /home/nginx/domains/$domain/public

wp plugin activate autoptimize-gzip  
Plugin 'autoptimize-gzip' activated.
Success: Activated 1 of 1 plugins.
```

Check Status of plugin

```
domain=domain.com
cd /home/nginx/domains/$domain/public

wp plugin status autoptimize-gzip
Plugin autoptimize-gzip details: Name: Autoptimize Gzip Status: Active Version: 0.1 Author: George Liu Description: Hook into Frank Goossens (futtta) Autoptimize API to pre-compress CSS/JS files
```

Deactivate plugin

```
domain=domain.com
cd /home/nginx/domains/$domain/public

wp plugin deactivate autoptimize-gzip
Plugin 'autoptimize-gzip' deactivated.
Success: Deactivated 1 of 1 plugins.
```

# Example

Autoptimize Gzip companion Wordpress plugin is now installed on my [Wordpress7 Demo Site](https://wordpress7.centminmod.com/) for testing.

Pre-gzip compressed Autoptimized CSS & JS files on [Centmin Mod LEMP stack Nginx](https://centminmod.com) installed Wordpress site ([Webpagetest benchmarks](https://community.centminmod.com/posts/65227/)).

```
ls -lah wp-content/cache/autoptimize/{css,js}
wp-content/cache/autoptimize/css:
total 876K
drwxr-sr-x 2 nginx nginx 4.0K Jul 18 13:39 .
drwxr-sr-x 4 nginx nginx   58 Jul 18 13:39 ..
-rw-r--r-- 1 nginx nginx 360K Jul 18 13:39 autoptimize_45f52bb04c1484bf44abe6a7b9acbc26.css
-rw-r--r-- 1 nginx nginx  57K Jul 18 13:39 autoptimize_45f52bb04c1484bf44abe6a7b9acbc26.css.gz
-rw-r--r-- 1 nginx nginx 6.2K Jul 18 13:39 autoptimize_snippet_02186534fc2cb75d30ffeb4e4060f935.css
-rw-r--r-- 1 nginx nginx 1.3K Jul 18 13:39 autoptimize_snippet_02186534fc2cb75d30ffeb4e4060f935.css.gz
-rw-r--r-- 1 nginx nginx  12K Jul 18 13:39 autoptimize_snippet_1eb49ea21489172bd56a487a10870e2a.css
-rw-r--r-- 1 nginx nginx 2.5K Jul 18 13:39 autoptimize_snippet_1eb49ea21489172bd56a487a10870e2a.css.gz
-rw-r--r-- 1 nginx nginx  19K Jul 18 13:39 autoptimize_snippet_4601ba55044413706c2022cb6c1c3d05.css
-rw-r--r-- 1 nginx nginx 2.5K Jul 18 13:39 autoptimize_snippet_4601ba55044413706c2022cb6c1c3d05.css.gz
-rw-r--r-- 1 nginx nginx  11K Jul 18 13:39 autoptimize_snippet_4b467d2937419b5d1798dbbb1152cf0f.css
-rw-r--r-- 1 nginx nginx 2.4K Jul 18 13:39 autoptimize_snippet_4b467d2937419b5d1798dbbb1152cf0f.css.gz
-rw-r--r-- 1 nginx nginx  36K Jul 18 13:39 autoptimize_snippet_54e3c9ede8364f0230bbf0b126573f48.css
-rw-r--r-- 1 nginx nginx 5.5K Jul 18 13:39 autoptimize_snippet_54e3c9ede8364f0230bbf0b126573f48.css.gz
-rw-r--r-- 1 nginx nginx 154K Jul 18 13:39 autoptimize_snippet_7a3d1e443c9b01e31baba6cf73df2c51.css
-rw-r--r-- 1 nginx nginx  23K Jul 18 13:39 autoptimize_snippet_7a3d1e443c9b01e31baba6cf73df2c51.css.gz
-rw-r--r-- 1 nginx nginx  81K Jul 18 13:39 autoptimize_snippet_87a799a52deae21568519f4f59699fa6.css
-rw-r--r-- 1 nginx nginx  12K Jul 18 13:39 autoptimize_snippet_87a799a52deae21568519f4f59699fa6.css.gz
-rw-r--r-- 1 nginx nginx  31K Jul 18 13:39 autoptimize_snippet_be209e54c9b6a4495155c3a9a88d3d36.css
-rw-r--r-- 1 nginx nginx 6.9K Jul 18 13:39 autoptimize_snippet_be209e54c9b6a4495155c3a9a88d3d36.css.gz
-rw-r--r-- 1 nginx nginx 1.6K Jul 18 13:39 autoptimize_snippet_bf9646dfeee6767c35fd21dd649bfc3e.css
-rw-r--r-- 1 nginx nginx  675 Jul 18 13:39 autoptimize_snippet_bf9646dfeee6767c35fd21dd649bfc3e.css.gz
-rw-r--r-- 1 nginx nginx 5.1K Jul 18 13:39 autoptimize_snippet_c94c9f38516a99b1f2ab4bfb5da9840d.css
-rw-r--r-- 1 nginx nginx 1.6K Jul 18 13:39 autoptimize_snippet_c94c9f38516a99b1f2ab4bfb5da9840d.css.gz
-rw-r--r-- 1 nginx nginx  189 Jul 16 18:48 index.html

wp-content/cache/autoptimize/js:
total 952K
drwxr-sr-x 2 nginx nginx 4.0K Jul 18 13:39 .
drwxr-sr-x 4 nginx nginx   58 Jul 18 13:39 ..
-rw-r--r-- 1 nginx nginx 347K Jul 18 13:39 autoptimize_1b323efed247e12911173c54e22b3a4e.js
-rw-r--r-- 1 nginx nginx  93K Jul 18 13:39 autoptimize_1b323efed247e12911173c54e22b3a4e.js.gz
-rw-r--r-- 1 nginx nginx  20K Jul 18 13:39 autoptimize_snippet_14b16c0a613dccf79fea485ec09717a1.js
-rw-r--r-- 1 nginx nginx 7.0K Jul 18 13:39 autoptimize_snippet_14b16c0a613dccf79fea485ec09717a1.js.gz
-rw-r--r-- 1 nginx nginx 6.4K Jul 18 13:39 autoptimize_snippet_1c4a13edec1958817e83433aeaa42f62.js
-rw-r--r-- 1 nginx nginx 2.6K Jul 18 13:39 autoptimize_snippet_1c4a13edec1958817e83433aeaa42f62.js.gz
-rw-r--r-- 1 nginx nginx  12K Jul 18 13:39 autoptimize_snippet_3819c3569da71daec283a75483735f7e.js
-rw-r--r-- 1 nginx nginx 3.0K Jul 18 13:39 autoptimize_snippet_3819c3569da71daec283a75483735f7e.js.gz
-rw-r--r-- 1 nginx nginx  193 Jul 18 13:39 autoptimize_snippet_4ec3b19ffe467100c29c66bcc97ebc42.js
-rw-r--r-- 1 nginx nginx  173 Jul 18 13:39 autoptimize_snippet_4ec3b19ffe467100c29c66bcc97ebc42.js.gz
-rw-r--r-- 1 nginx nginx 1.2K Jul 18 13:39 autoptimize_snippet_4fb38de1728cf7f23aa8b49d85bddde5.js
-rw-r--r-- 1 nginx nginx  606 Jul 18 13:39 autoptimize_snippet_4fb38de1728cf7f23aa8b49d85bddde5.js.gz
-rw-r--r-- 1 nginx nginx 1014 Jul 18 13:39 autoptimize_snippet_7567776c328ea6a29916d6cbb521bed6.js
-rw-r--r-- 1 nginx nginx  518 Jul 18 13:39 autoptimize_snippet_7567776c328ea6a29916d6cbb521bed6.js.gz
-rw-r--r-- 1 nginx nginx 121K Jul 18 13:39 autoptimize_snippet_9234b7a231cefc9a6ca4299c8c538897.js
-rw-r--r-- 1 nginx nginx  32K Jul 18 13:39 autoptimize_snippet_9234b7a231cefc9a6ca4299c8c538897.js.gz
-rw-r--r-- 1 nginx nginx 9.9K Jul 18 13:39 autoptimize_snippet_af02609a4853bf8aa780e7614f25a8b5.js
-rw-r--r-- 1 nginx nginx 3.3K Jul 18 13:39 autoptimize_snippet_af02609a4853bf8aa780e7614f25a8b5.js.gz
-rw-r--r-- 1 nginx nginx  11K Jul 18 13:39 autoptimize_snippet_bb483d9d967a457fc9f0a1505bd958e7.js
-rw-r--r-- 1 nginx nginx 3.3K Jul 18 13:39 autoptimize_snippet_bb483d9d967a457fc9f0a1505bd958e7.js.gz
-rw-r--r-- 1 nginx nginx 1.3K Jul 18 13:39 autoptimize_snippet_c2940304f2c898ad4391a9ea96e37e64.js
-rw-r--r-- 1 nginx nginx  561 Jul 18 13:39 autoptimize_snippet_c2940304f2c898ad4391a9ea96e37e64.js.gz
-rw-r--r-- 1 nginx nginx  197 Jul 18 13:39 autoptimize_snippet_c5935bade23936a28a1b0f0eacd59912.js
-rw-r--r-- 1 nginx nginx  176 Jul 18 13:39 autoptimize_snippet_c5935bade23936a28a1b0f0eacd59912.js.gz
-rw-r--r-- 1 nginx nginx 120K Jul 18 13:39 autoptimize_snippet_cf0aff8f63c5c87968954baa1a1347c3.js
-rw-r--r-- 1 nginx nginx  31K Jul 18 13:39 autoptimize_snippet_cf0aff8f63c5c87968954baa1a1347c3.js.gz
-rw-r--r-- 1 nginx nginx 7.9K Jul 18 13:39 autoptimize_snippet_d0c2c0d7e37652e66657c8c8d6376442.js
-rw-r--r-- 1 nginx nginx 2.5K Jul 18 13:39 autoptimize_snippet_d0c2c0d7e37652e66657c8c8d6376442.js.gz
-rw-r--r-- 1 nginx nginx  37K Jul 18 13:39 autoptimize_snippet_eb8f10414a9287740be91bdc1d5951aa.js
-rw-r--r-- 1 nginx nginx  11K Jul 18 13:39 autoptimize_snippet_eb8f10414a9287740be91bdc1d5951aa.js.gz
-rw-r--r-- 1 nginx nginx  189 Jul 16 18:48 index.html
```