<?php

namespace MohamedAhmed\ApiResponse\Traits;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

trait PaginationTrait
{
    use DataTrait;

    protected array $pagination = [];

    public function paginate(Paginator|LengthAwarePaginator $paginator): self
    {
        $this->data = $paginator->items();

        $this->pagination = [
            'path' => $paginator->url($paginator->currentPage()),
            'total' => $paginator->total(),
            'perPage' => $paginator->perPage(),
            'currentPage' => $paginator->currentPage(),
            'lastPage' => method_exists($paginator, 'lastPage') ? $paginator->lastPage() : null,
        ];

        return $this;
    }
}
