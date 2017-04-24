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
## item

get post detail

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


#User
## list

list all users

> Example request:

```bash
curl "http://laravel.dev//api/user/list" \
-H "Accept: application/json" \
    -d "size"="1861433712" \
    -d "page"="1861433712" \
    -d "sort"="asc" \
    -d "end_time"="2010-12-15" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://laravel.dev//api/user/list",
    "method": "GET",
    "data": {
        "size": 1861433712,
        "page": 1861433712,
        "sort": "asc",
        "end_time": "2010-12-15"
},
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
`GET /api/user/list`

`HEAD /api/user/list`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    size | integer |  required  | Minimum: `1`
    page | integer |  required  | Minimum: `1`
    sort | string |  required  | `desc` or `asc`
    end_time | date |  optional  | 

## me

get me infomation

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


