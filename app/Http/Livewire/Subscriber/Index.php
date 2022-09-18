<?php

namespace App\Http\Livewire\Subscriber;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Subscriber;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount() 
    {
        $this->sortBy            = 'user_id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Subscriber())->orderable;
    }

    public function render()
    {
        $query = Subscriber::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $subscribers = $query->paginate($this->perPage);

        return view('livewire.subscriber.index', compact('query', 'subscribers', 'subscribers'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('subscriber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Subscriber::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Subscriber $subscriber)
    {
        abort_if(Gate::denies('subscriber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriber->delete();
    }
}
