# Autoptimize Pre Compress Files Wordpress Plugin

This Autoptimize Gzip Wordpress plugin hooks into [Autoptimize's API](https://github.com/futtta/autoptimize/) to enable pre-gzip compression of Autoptimize'd CSS & JS files via an add_filter:

```
add_filter('autoptimize_filter_cache_create_static_gzip','__return_true');
```

Autoptimize's API code which allows this plugin's add_filter to enable pre-gzip compression:

```
  if ( apply_filters( 'autoptimize_filter_cache_create_static_gzip', false ) ) {
      // Create an additional cached gzip file.
      file_put_contents( $this->cachedir . $this->filename . '.gz', gzencode( $data, 9, FORCE_GZIP ) );
  }
```

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