# Welcome to Standardized API responses Package

## Package info

**URL**: mohamedgcoder/response-api 

## How can install this Package?

There are several ways of using this Package.


```sh

composer require mohamedgcoder/response-api

```

**How to use**

```sh
use MohamedAhmed\ApiResponse\Traits\ResponseApi;

class SomeController extends Controller
{
    use ResponseApi;

    public function index()
    {
        $this->setData(SomeModel::all());
        return $this->apiResponse();
    }
}
```