# Welcome to Standardized API responses Package

A reusable Laravel package for building **consistent JSON API responses**.  
It helps you standardize your API outputs with data, pagination, exceptions, and error structures — cleanly and efficiently.

## Package info

**URL**: https://packagist.org/packages/mohamedahmed/api-response

---

## 📦 Installation

```sh

composer require mohamedahmed/api-response

```

## 🚀 Usage

**In your Laravel controller:**

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

## 🧠 Available Methods

**setData($data)**

Sets the main response data.
If data is paginated, pagination details are auto-included.

```sh

$this->setData(User::all());
$this->setData(User::paginate(10));

```

**setPagination()**

Called automatically by setData() if paginated.
Extracts pagination info like path, total, currentPage, etc.

**setException(Throwable $exception)**

Stores an exception and adds error info in the response.

```sh

try {
    // logic
} catch (\Exception $e) {
    $this->setException($e);
    $this->setCode(500);
    return $this->apiResponse();
}

```

**setEc(int $code)**

Sets an internal error code, useful for debugging and frontend error mapping.

```sh

$this->setEc(1001); // Internal reference code

```

**setMessages(array|string $messages)**

Custom messages for the user.

```sh

$this->setMessages(['Created successfully']);

```

**setCode(int $httpCode)**

Sets HTTP status code (defaults to 200).

```sh

$this->setCode(201); // HTTP Created

```

**apiResponse()**

Builds and returns the full JSON response.

```sh

return $this->apiResponse();

```

## ✅ Example Response

```sh

{
  "code": 200,
  "responseStatus": true,
  "messages": [],
  "response": {
    "dataLength": 3,
    "pagination": {
      "path": "/api/products?page=1",
      "total": 50,
      "perPage": 10,
      "currentPage": 1,
      "lastPage": 5
    },
    "data": [{}, {}, {}]
  },
  "error": {
    "errorCode": null,
    "line": null,
    "errorMessage": null,
    "file": null
  }
}

```