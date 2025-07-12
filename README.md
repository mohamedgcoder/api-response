# Welcome to Standardized API responses Package

## Package info

**URL**: https://packagist.org/packages/mohamedahmed/api-response

## How can install this Package?

There are several ways of using this Package.


```sh

composer require mohamedahmed/api-response

```

**How to use in code**

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