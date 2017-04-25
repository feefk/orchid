---
title: API Reference

language_tabs:
- bash
- javascript

includes:
- errors

search: true

toc_footers:
- Documentation Powered by Feefk
---

# Info

<b>Welcome to the Feefk API reference. </b>
[Get Postman Collection](storage/docs/collection.json)

<aside class="notice"> 除了Auth相关的API外,其他API均需要token验证,验证token有以下两种方式:
    <p>1. request参数: 在API请求的参数中加入http://uri?token=xxxxxxx。</p>
    <p>2. request Headers中加入Authorization:Bearer [token]。</p>
</aside>

# Available routes
#Login
## login

login

> Example request:

```bash
curl "http://laravel.dev//api/auth/login" \
-H "Accept: application/json" \
    -d "login_name"="non" \
    -d "password"="non" \

```

```javascript
var settings = {
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
});
```


### HTTP Request
`POST /api/auth/login`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    login_name | string |  required  | 
    password | string |  required  | Minimum: `6`

#Page
## all

get all

> Example request:

```bash
curl "http://laravel.dev//api/page/all" \
-H "Accept: application/json"
```

```javascript
var settings = {
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
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/page/all`

`HEAD /api/page/all`


## create

create one page

> Example request:

```bash
curl "http://laravel.dev//api/page/create" \
-H "Accept: application/json" \
    -d "title"="vel" \
    -d "content"="8114" \

```

```javascript
var settings = {
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
});
```


### HTTP Request
`POST /api/page/create`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Between: `1` and `50`
    content | string |  required  | Between: `1` and `10000`

## item

get Page detail

> Example request:

```bash
curl "http://laravel.dev//api/page/item/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
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
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/page/item/{id}`

`HEAD /api/page/item/{id}`


## update

update Page detail

> Example request:

```bash
curl "http://laravel.dev//api/page/update/{id}" \
-H "Accept: application/json" \
    -d "title"="nobis" \
    -d "content"="6852" \

```

```javascript
var settings = {
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
});
```


### HTTP Request
`POST /api/page/update/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Between: `1` and `50`
    content | string |  required  | Between: `1` and `10000`

## delete

delete page

> Example request:

```bash
curl "http://laravel.dev//api/page/delete/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
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
});
```


### HTTP Request
`POST /api/page/delete/{id}`


#Register
## register

register new user

> Example request:

```bash
curl "http://laravel.dev//api/auth/register" \
-H "Accept: application/json" \
    -d "email"="tmohr@example.net" \
    -d "password"="illum" \

```

```javascript
var settings = {
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
});
```


### HTTP Request
`POST /api/auth/register`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | Maximum: `255`
    password | string |  required  | Minimum: `6`

#Resource
## download

获取文件

> Example request:

```bash
curl "http://laravel.dev//api/resource/{name}" \
-H "Accept: application/json"
```

```javascript
var settings = {
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
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/resource/{name}`

`HEAD /api/resource/{name}`


#User
## me

get me information

> Example request:

```bash
curl "http://laravel.dev//api/user/me" \
-H "Accept: application/json"
```

```javascript
var settings = {
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
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/user/me`

`HEAD /api/user/me`


## /api/user/modify-avatar

> Example request:

```bash
curl "http://laravel.dev//api/user/modify-avatar" \
-H "Accept: application/json" \
    -d "avatar"="porro" \

```

```javascript
var settings = {
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
});
```


### HTTP Request
`POST /api/user/modify-avatar`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    avatar | image |  required  | Must be an image (jpeg, png, bmp, gif, or svg)

