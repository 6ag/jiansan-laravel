define({ "api": [
  {
    "type": "get",
    "url": "/getcategories",
    "title": "获取全部分类信息",
    "name": "getcategories",
    "group": "Category",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>所有数据</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.id",
            "description": "<p>分类id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>分类名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.alias",
            "description": "<p>分类别名</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": [\n        {\n            \"id\": 1,\n            \"name\": \"大侠\",\n            \"alias\": \"daxia\"\n        },\n        {\n            \"id\": 2,\n            \"name\": \"纯阳\",\n            \"alias\": \"chunyang\"\n        },\n        {\n            \"id\": 3,\n            \"name\": \"万花\",\n            \"alias\": \"wanhua\"\n        },\n        {\n            \"id\": 4,\n            \"name\": \"藏剑\",\n            \"alias\": \"cangjian\"\n        },\n        {\n            \"id\": 5,\n            \"name\": \"唐门\",\n            \"alias\": \"tangmen\"\n        },\n        {\n            \"id\": 6,\n            \"name\": \"七秀\",\n            \"alias\": \"qixiu\"\n        },\n        {\n            \"id\": 7,\n            \"name\": \"少林\",\n            \"alias\": \"shaolin\"\n        },\n        {\n            \"id\": 8,\n            \"name\": \"五毒\",\n            \"alias\": \"wudu\"\n        },\n        {\n            \"id\": 9,\n            \"name\": \"明教\",\n            \"alias\": \"mingjiao\"\n        },\n        {\n            \"id\": 10,\n            \"name\": \"丐帮\",\n            \"alias\": \"gaibang\"\n        },\n        {\n            \"id\": 11,\n            \"name\": \"苍云\",\n            \"alias\": \"cangyun\"\n        },\n        {\n            \"id\": 12,\n            \"name\": \"长歌\",\n            \"alias\": \"changge\"\n        }\n    ]\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Api/V1/Controllers/CategoryController.php",
    "groupTitle": "Category"
  }
] });
