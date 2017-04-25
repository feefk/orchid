<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="css/style.css" />
    <script src="js/all.js"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li>Documentation Powered by Feefk</li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <h1>Info</h1>
<p><b>Welcome to the Feefk API reference. </b>
<a href="storage/docs/collection.json">Get Postman Collection</a></p>
<aside class="notice"> 除了Auth相关的API外,其他API均需要token验证,验证token有以下两种方式:
    <p>1. request参数: 在API请求的参数中加入http://uri?token=xxxxxxx。</p>
    <p>2. request Headers中加入Authorization:Bearer [token]。</p>
</aside>
<h1>Available routes</h1>
<h1>Login</h1>
<h2>login</h2>
<p>login</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/auth/login" \
-H "Accept: application/json" \
    -d "login_name"="non" \
    -d "password"="non" \
</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/auth/login",
    "method": "POST",
    "data": {
        "login_name": "non",
        "password": "non"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<h3>HTTP Request</h3>
<p><code>POST /api/auth/login</code></p>
<h4>Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>login_name</td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td>password</td>
<td>string</td>
<td>required</td>
<td>Minimum: <code>6</code></td>
</tr>
</tbody>
</table>
<h1>Page</h1>
<h2>all</h2>
<p>get all</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/page/all" \
-H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/page/all",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET /api/page/all</code></p>
<p><code>HEAD /api/page/all</code></p>
<h2>create</h2>
<p>create one page</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/page/create" \
-H "Accept: application/json" \
    -d "title"="vel" \
    -d "content"="8114" \
</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/page/create",
    "method": "POST",
    "data": {
        "title": "vel",
        "content": 8114
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<h3>HTTP Request</h3>
<p><code>POST /api/page/create</code></p>
<h4>Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>title</td>
<td>string</td>
<td>required</td>
<td>Between: <code>1</code> and <code>50</code></td>
</tr>
<tr>
<td>content</td>
<td>string</td>
<td>required</td>
<td>Between: <code>1</code> and <code>10000</code></td>
</tr>
</tbody>
</table>
<h2>item</h2>
<p>get Page detail</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/page/item/{id}" \
-H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/page/item/{id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET /api/page/item/{id}</code></p>
<p><code>HEAD /api/page/item/{id}</code></p>
<h2>update</h2>
<p>update Page detail</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/page/update/{id}" \
-H "Accept: application/json" \
    -d "title"="nobis" \
    -d "content"="6852" \
</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/page/update/{id}",
    "method": "POST",
    "data": {
        "title": "nobis",
        "content": 6852
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<h3>HTTP Request</h3>
<p><code>POST /api/page/update/{id}</code></p>
<h4>Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>title</td>
<td>string</td>
<td>required</td>
<td>Between: <code>1</code> and <code>50</code></td>
</tr>
<tr>
<td>content</td>
<td>string</td>
<td>required</td>
<td>Between: <code>1</code> and <code>10000</code></td>
</tr>
</tbody>
</table>
<h2>delete</h2>
<p>delete page</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/page/delete/{id}" \
-H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/page/delete/{id}",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<h3>HTTP Request</h3>
<p><code>POST /api/page/delete/{id}</code></p>
<h1>Register</h1>
<h2>register</h2>
<p>register new user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/auth/register" \
-H "Accept: application/json" \
    -d "email"="tmohr@example.net" \
    -d "password"="illum" \
</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/auth/register",
    "method": "POST",
    "data": {
        "email": "tmohr@example.net",
        "password": "illum"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<h3>HTTP Request</h3>
<p><code>POST /api/auth/register</code></p>
<h4>Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>email</td>
<td>email</td>
<td>required</td>
<td>Maximum: <code>255</code></td>
</tr>
<tr>
<td>password</td>
<td>string</td>
<td>required</td>
<td>Minimum: <code>6</code></td>
</tr>
</tbody>
</table>
<h1>Resource</h1>
<h2>download</h2>
<p>获取文件</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/resource/{name}" \
-H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/resource/{name}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET /api/resource/{name}</code></p>
<p><code>HEAD /api/resource/{name}</code></p>
<h1>User</h1>
<h2>me</h2>
<p>get me information</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/user/me" \
-H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/user/me",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<blockquote>
<p>Example response:</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET /api/user/me</code></p>
<p><code>HEAD /api/user/me</code></p>
<h2>/api/user/modify-avatar</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl "http://laravel.dev//api/user/modify-avatar" \
-H "Accept: application/json" \
    -d "avatar"="porro" \
</code></pre>
<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/user/modify-avatar",
    "method": "POST",
    "data": {
        "avatar": "porro"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});</code></pre>
<h3>HTTP Request</h3>
<p><code>POST /api/user/modify-avatar</code></p>
<h4>Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>avatar</td>
<td>image</td>
<td>required</td>
<td>Must be an image (jpeg, png, bmp, gif, or svg)</td>
</tr>
</tbody>
</table><h1>Errors</h1>
<aside class="notice">This error section is stored in a separate file in `includes/_errors.md`. Whiteboard allows you to optionally separate out your docs into many files...just save them to the `includes` folder and add them to the top of your `index.md`'s frontmatter. Files are included in the order listed.</aside>
<p>The Feefk API uses the following error codes:</p>
<table>
<thead>
<tr>
<th>Error Code</th>
<th>Meaning</th>
</tr>
</thead>
<tbody>
<tr>
<td>400</td>
<td>Bad Request -- Your request sucks</td>
</tr>
<tr>
<td>401</td>
<td>Unauthorized -- Your API key is wrong</td>
</tr>
<tr>
<td>403</td>
<td>Forbidden -- The kitten requested is hidden for administrators only</td>
</tr>
<tr>
<td>404</td>
<td>Not Found -- The specified kitten could not be found</td>
</tr>
<tr>
<td>405</td>
<td>Method Not Allowed -- You tried to access a kitten with an invalid method</td>
</tr>
<tr>
<td>406</td>
<td>Not Acceptable -- You requested a format that isn't json</td>
</tr>
<tr>
<td>410</td>
<td>Gone -- The kitten requested has been removed from our servers</td>
</tr>
<tr>
<td>418</td>
<td>I'm a teapot</td>
</tr>
<tr>
<td>429</td>
<td>Too Many Requests -- You're requesting too many kittens! Slow down!</td>
</tr>
<tr>
<td>500</td>
<td>Internal Server Error -- We had a problem with our server. Try again later.</td>
</tr>
<tr>
<td>503</td>
<td>Service Unavailable -- We're temporarially offline for maintanance. Please try again later.</td>
</tr>
</tbody>
</table>
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>