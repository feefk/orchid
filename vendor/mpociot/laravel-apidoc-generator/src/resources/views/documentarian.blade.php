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
@if($showPostmanCollectionButton)
[Get Postman Collection]({{$outputPath}}/collection.json)

<aside class="notice"> 除了Auth相关的API外,其他API均需要token验证,验证token有以下两种方式:
    <p>1. request参数: 在API请求的参数中加入http://uri?token=xxxxxxx。</p>
    <p>2. request Headers中加入Authorization:Bearer [token]。</p>
</aside>
@endif

# Available routes
@foreach($parsedRoutes as $group => $routes)
@if($group)
#{{$group}}
@endif
@foreach($routes as $parsedRoute)
@if($parsedRoute['title'] != '')## {{ $parsedRoute['title']}}
@else## {{$parsedRoute['uri']}}
@endif
@if($parsedRoute['description'])

{{$parsedRoute['description']}}
@endif

> Example request:

```bash
curl "{{config('app.url')}}/{{$parsedRoute['uri']}}" \
-H "Accept: application/json"@if(count($parsedRoute['parameters'])) \
@foreach($parsedRoute['parameters'] as $attribute => $parameter)
    -d "{{$attribute}}"="{{$parameter['value']}}" \
@endforeach
@endif

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "{{config('app.url')}}/{{$parsedRoute['uri']}}",
    "method": "{{$parsedRoute['methods'][0]}}",
    @if(count($parsedRoute['parameters']))
"data": {!! str_replace('    ','        ',json_encode(array_combine(array_keys($parsedRoute['parameters']), array_map(function($param){ return $param['value']; },$parsedRoute['parameters'])), JSON_PRETTY_PRINT)) !!},
    @endif
    "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

@if(in_array('GET',$parsedRoute['methods']))
> Example response:

```json
@if(is_object($parsedRoute['response']) || is_array($parsedRoute['response']))
{!! json_encode($parsedRoute['response'], JSON_PRETTY_PRINT) !!}
@else
{!! json_encode(json_decode($parsedRoute['response']), JSON_PRETTY_PRINT) !!}
@endif
```
@endif

### HTTP Request
@foreach($parsedRoute['methods'] as $method)
`{{$method}} {{$parsedRoute['uri']}}`

@endforeach
@if(count($parsedRoute['parameters']))
#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
@foreach($parsedRoute['parameters'] as $attribute => $parameter)
    {{$attribute}} | {{$parameter['type']}} | @if($parameter['required']) required @else optional @endif | {!! implode(' ',$parameter['description']) !!}
@endforeach
@endif

@endforeach
@endforeach
